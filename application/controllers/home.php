<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use Omnipay\Omnipay;
use Omnipay\Common\CreditCard;



class Home extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->model('servicios_model');
		$this->load->model('gift_model');
		$this->load->model('ventas_model');

	}


	/**
	 * Formulario para el completado de las tarjetas gifts
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	22 de Enero del 2014
	 **/
	public function index()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$gift 	= $this->get_data_post();
			if ($gift['IdVenta'] == 0) { // PRIMER TARJETA

				$this->session->set_userdata ('cantidad_total',$gift['cantidad']);
				$this->session->set_userdata ('nombre_comprador',$gift['NombreComprador']);
				$this->session->set_userdata ('apellido_comprador',$gift['ApellidoComprador']);
				$insert_venta = $this->ventas_model->primer_insert(); // Lo va a poner en estado de espera y la fecha de creación, fecha actual.
				$gift['IdVenta']	= $insert_venta;
				$insert_gift 	= $this->gift_model->insert($gift);
			} else {
				$insert_gift 	= $this->gift_model->insert($gift); // Puede ser el segundo voucher que inserta.
			}

			if ( $insert_gift > 0) // Insertó correctamente los datos del voucher.
			{
				$gift['cantidad']--;
				$gift = $this->_limpiar_gift($gift); // borra los datos que tiene que volver a completar en el siguiente voucher, por ejemplo nombre agasajado, mensaje, etc.
				if ( $gift['cantidad'] == 0) // Llegó al último Voucher debe enviar el email y cambiar los estados.
				{

					// Recogo todos los datos para enviar por paypal
					$items 					= $this->gift_model->get_gifts_for_mc($gift['IdVenta']);
					$amount = (float)0;
					foreach( $items AS $it)
					{
						$amount += $it['unit_price'];
					}
					$this->session->set_userdata('external_id', $gift['IdVenta'] );
					$this->session->set_userdata('amount', $amount);
					// PAYPAL
					$this->config->load('paypal');
					$gateway = Omnipay::create('PayPal_Express');
					$gateway->setUsername( $this->config->item('paypal_username') );
					$gateway->setPassword( $this->config->item('paypal_pass') );
					$gateway->setSignature( $this->config->item('paypal_signature') );
					$gateway->setTestMode(false);
					$response = $gateway->purchase(
															array(
															'cancelUrl'=>base_url('home/error'),
															'returnUrl'=>base_url('home/pay'),
															'amount' =>  $amount,
															'currency' => 'USD'
															)
														)->send();
					if ($response->isRedirect()) {
						// redirect to offsite payment gateway
						$response->redirect();
					} else {
						// payment failed: display message to customer
						echo $response->getMessage();
						exit(1);
					}
					// FIN PAYPAL
				}
			}

		} else { // GET
			$gift = array();
		}

		$data['gift'] 		= $gift;
		$data['fecha_venc']= date('d-m-Y', strtotime("+90 days"));
		$data['servicios'] 	= $this->servicios_model->get_all();


		$this->load->view('home', $data);
	}



	/**
	 * Recibo los datos que devuelve paypal
	 **/
	public function pay()
	{

		$gateway = Omnipay::create('PayPal_Express');
		$gateway->setUsername('jpasosa_api1.gmail.com');
		$gateway->setPassword('6U3MTUXB4TPUT2BH');
		$gateway->setSignature('Au9yzpsJniTJon2P-Jo3tVpZ7dagAUv1aXC5hLb9TzpxTzgzkEMhXfMM');
		$gateway->setTestMode(true);

		$response = $gateway->completePurchase(
												array(
												'cancelUrl'=>base_url('home/error'),
												'returnUrl'=>base_url('home/pay'),
												'amount' =>  $this->session->userdata('amount'),
												'currency' => 'USD'
												)
											)->send();

    		$data = $response->getData(); // this is the raw response object




		if ( $data['ACK'] == 'Success') {
			// Debe capturar el estado que devuelve mercado pago y completarlo en el estado de la venta.
			$status_paypal = 3; // ingreso ACEPTADO por que está devolviendo approved el array de mercadopago.
			$estado_paypal = $this->ventas_model->set_estado_mp($this->session->userdata('external_id'), $status_paypal);
			$send_mails = $this->_send_mails( $this->session->userdata('external_id') );
			if ( $send_mails ) {
				$this->session->set_flashdata('success','Los Vouchers se han cargado y enviado con éxito');
				$this->session->unset_userdata('external_id');
				$this->session->unset_userdata('amount');
				redirect('home/gracias');
			} else {
				$this->session->set_flashdata('success','Los Vouchers no se pudieron enviar.');
				$this->session->unset_userdata('external_id');
				$this->session->unset_userdata('amount');
				redirect('home');
			}

		} else { // Por algún motivo no fue aceptada.
			$status_paypal = 4; // estado ERROR por que la devolucion de MP fue de error.
			$estado_paypal = $this->ventas_model->set_estado_mp($this->session->userdata('external_id'), $status_paypal);
			$this->session->set_flashdata('success','La transacción no se pudo realizar a través de Paypal. Controlar con su usuario por favor.');
			$this->session->unset_userdata('external_id');
			$this->session->unset_userdata('amount');
			redirect('home');
		}


	}

	/**
	 * método si se cancela la transacción
	 **/
	public function error()
	{
		$this->session->unset_userdata('external_id');
		$this->session->unset_userdata('amount');
		redirect('home');
	}



	public function gracias()
	{
		$data = array();
		$this->session->unset_userdata('cantidad_total');
		$this->load->view('gracias', $data);
	}

	public function mailing()
	{
		$data = array();
		$this->load->view('template_gift', $data);
	}



	/**
	 * Envía los mails con los Vouchers.
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	02-feb-2015
	 *
	 * @param      int 			idVenta
	 * @return      boolean		true si envío todos los mails correctamente | false si falló por algún lado.
	 **/
	private function _send_mails( $id_venta )
	{
		try {


			$gift = $this->gift_model->get_all_gifts($id_venta);

			foreach ($gift AS $gif)
			{
				$gif['fecha_venc']= date('d-m-Y', strtotime("+90 days"));
				$message = $this->load->view('template_gift',$gif,TRUE);

				$this->load->library('email');
				$this->load->config('data_mail');
				$config = array(
						    'protocol' 	=> $this->config->item('mail_protocol'),
						    'smtp_host' 	=> $this->config->item('mail_smtp_host'),
						    'smtp_port' 	=> $this->config->item('mail_smtp_port'),
						    'smtp_user' 	=> $this->config->item('mail_smtp_user'),
						    'smtp_pass' 	=> $this->config->item('mail_smtp_pass'),
						    'smtp_timeout' => $this->config->item('mail_smtp_timeout'),
						    'mailtype'  	=> $this->config->item('mail_mailtype'),
						    'charset'   	=>$this->config->item('mail_charset')
						);
				$this->email->initialize($config);
				$this->email->from('recepcion@lareserve.com.uy');
				$this->email->to($gif['EmailComprador']);
				$this->email->bcc('recepcion@lareserve.com.uy');
				$this->email->subject('La Réserve - Gift Certificate');
				$this->email->message($message);

				$this->email->send();
				//echo $this->email->print_debugger();
				sleep(1);
				$this->email->clear();
			}

			return true;

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}

	}







	/**
	 * Agarro datos por POST()
	 **/
	private function get_data_post()
	{

		$gift = array();

		if($this->input->post('IdVenta') != 0)
		{
			$gift['IdVenta'] = $this->input->post('IdVenta');
		} else {
			$gift['IdVenta'] = 0;
		}

		if($this->input->post('cantidad'))
		{
			$gift['cantidad'] = $this->input->post('cantidad');
		} else {
			$gift['cantidad'] = -1;
		}

		if($this->input->post('IdServicio'))
		{
			$gift['IdServicio'] = $this->input->post('IdServicio');
		} else {
			$gift['IdServicio'] = 1;
		}

		if($this->input->post('NombreComprador'))
		{
			$gift['NombreComprador'] = $this->input->post('NombreComprador');
		} else {
			$gift['NombreComprador'] = '';
		}

		if($this->input->post('ApellidoComprador'))
		{
			$gift['ApellidoComprador'] = $this->input->post('ApellidoComprador');
		} else {
			$gift['ApellidoComprador'] = '';
		}

		if($this->input->post('EmailComprador'))
		{
			$gift['EmailComprador'] = $this->input->post('EmailComprador');
		} else {
			$gift['EmailComprador'] = '';
		}

		if($this->input->post('TelefonoComprador'))
		{
			$gift['TelefonoComprador'] = $this->input->post('TelefonoComprador');
		} else {
			$gift['TelefonoComprador'] = '';
		}

		if($this->input->post('NombreAgasajado'))
		{
			$gift['NombreAgasajado'] = $this->input->post('NombreAgasajado');
		} else {
			$gift['NombreAgasajado'] = '';
		}

		if($this->input->post('ApellidoAgasajado'))
		{
			$gift['ApellidoAgasajado'] = $this->input->post('ApellidoAgasajado');
		} else {
			$gift['ApellidoAgasajado'] = '';
		}

		if($this->input->post('MensajePersonalizado'))
		{
			$gift['MensajePersonalizado'] = $this->input->post('MensajePersonalizado');
		} else {
			$gift['MensajePersonalizado'] = '';
		}

		return $gift;
	}



	/**
	 * Vacia el array gift para pasarselo a la siguiente vista,
	 * así puede continuar enviandos gifts, pero mantiene el id_venta
	 * el nombre, apellido, email y teléfono del comprador
	 *
	 * @author 	Juan Pablo Sosa <jpasosa@gmail.com>
	 * @date 	22 de Enero del 2014
	 *
	 * @param       int
	 * @return      array()
	 **/
	private function _limpiar_gift( $gift )
	{
		unset($gift['MensajePersonalizado'], $gift['IdServicio'], $gift['ApellidoAgasajado'], $gift['NombreAgasajado']);

		return $gift;
	}







}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
