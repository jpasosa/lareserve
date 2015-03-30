<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url"));
		$this->load->library('grocery_CRUD');
		$this->load->model('usuarios_model');

	}


	//LOGIN


		public function login()
	{
		 $error = null;

		 if ($this->input->post('post'))
		 {

        	$login = array(
	          'email' => $this->input->post('email'),
	          'password' =>  $this->input->post('password'),
	         );

	      if(!empty ($login['email']) && (!empty ($login['password'])))
	      {

		//	$this->u->login($login);
			$user = $this->usuarios_model->login($login);



		  if(($user) > 0)
		  {

	      	 $newdata = array(
			'IdUsuario' => $user->IdUsuario,
			'Email' => $user->Email,
			'logged_in' => TRUE
			);

		  $this->session->set_userdata($newdata);

		  		  
		  redirect('admin/vouchers');
		  }

		  else
		  {
			$error = "Datos Incorrectos";
		  }

		  }

		  else

		  {
			$error = "Debe completar todos los datos";
		  }
          }

	$data['contenido'] = 'admin/login/form-login';
	$data['error']  = $error;
	$this->load->view('admin/login/layout-login',$data);
	}



	//LOGOUT

	public function logout()
	{
		 $this->session->sess_destroy();
		redirect('admin/login/', 'refresh');
	}



	// DASHBOARD

	public function dashboard()
	{
		//if (!$this->session->userdata('logged_in'))
	   //	{
	//	     redirect('admin/login/');
		//}

		$data['contenido'] = 'admin/dashboard';

		$this->load->view('admin/layout',$data);


	}


	// PERFIL

	public function perfil()
	{
		// if (!$this->session->userdata('logged_in'))
	   //	{
	//	     redirect('admin/login/');
		//}

		$data['contenido'] = 'admin/perfil';

		$this->load->view('admin/layout',$data);


	}



	// SERVICIOS

	public function servicios()
	{
		// if (!$this->session->userdata('logged_in'))
	   //	{
	//	     redirect('admin/login/');
		//}

		$crud = new grocery_CRUD();
			$crud->set_language("spanish");
		$crud->set_table('Servicio');


		$data['output'] = $crud->render()->output;
		$data['css_files'] = $crud->render()->css_files;
		$data['js_files'] = $crud->render()->js_files;

		$data['contenido'] = 'admin/crud';
		
		$data['titulo'] = 'Servicios';
		$this->load->view('admin/layout',$data);


	}




	// USUARIOS


	public function usuarios()
	{
			// if (!$this->session->userdata('logged_in'))
	   //	{
	//	     redirect('admin/login/');
		//}

		$crud = new grocery_CRUD();
		$crud->set_language("spanish");
		$crud->set_table('Usuario');
		$crud->columns('Email','Activo');
		$crud->required_fields('Email');

		$data['output'] = $crud->render()->output;
		$data['css_files'] = $crud->render()->css_files;
		$data['js_files'] = $crud->render()->js_files;

		$data['contenido'] = 'admin/crud';
		
		$data['titulo'] = 'Usuarios';
		$this->load->view('admin/layout',$data);
	}


	// VENTAS


	public function ventas()
	{
		// if (!$this->session->userdata('logged_in'))
	   //	{
	//	     redirect('admin/login/');
		//}

		$crud = new grocery_CRUD();
		$crud->set_language("spanish");
		$crud->set_table('Venta');
		$crud->unset_fields('Log');
		$crud->columns('IdEstado','FechaCreacion');
		$crud->display_as('IdEstado','Estado');
		$crud->set_relation('IdEstado','Estado','Nombre');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();


		$data['output'] = $crud->render()->output;
		$data['css_files'] = $crud->render()->css_files;
		$data['js_files'] = $crud->render()->js_files;


		$data['contenido'] = 'admin/crud';
		
		$data['titulo'] = 'Ventas';
		$this->load->view('admin/layout',$data);
	}


	// VOUCHERS


	public function vouchers()
	{
		// if (!$this->session->userdata('logged_in'))
		//	{
		//	     redirect('admin/login/');
		//}

		$crud = new grocery_CRUD();
		$crud->set_language("spanish");
		$crud->set_table('Voucher');
		$crud->unset_fields('Log');
		$crud->columns('FechaCreacion','NombreComprador','ApellidoComprador','EmailComprador', 'NombreAgasajado','ApellidoAgasajado','Code','IdVenta');
		$crud->display_as('IdServicio','Servicio')->display_as('IdVenta','Estado del pago');
		$crud->set_relation('IdServicio','Servicio','Nombre');
		$crud->set_relation_n_n('IdVenta', 'Venta', 'Estado', 'IdVenta', 'IdEstado', 'Nombre');
		$crud->display_as('NombreComprador','Nombre del comprador');
		$crud->display_as('ApellidoComprador','Apellido del comprador');
		$crud->display_as('EmailComprador','Email del comprador');
		$crud->display_as('NombreAgasajado','Nombre del agasajado');
		$crud->display_as('ApellidoAgasajado','Apellido del agasajado');
		$crud->display_as('Code','Codigo de Voucher');
		$crud->display_as('FechaCreacion','Fecha de compra');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();


		$data['output'] 		= $crud->render()->output;
		$data['css_files'] 	= $crud->render()->css_files;
		$data['js_files'] 		= $crud->render()->js_files;
		$data['contenido'] 	= 'admin/crud';

		$data['titulo'] = 'Vouchers';
		$this->load->view('admin/layout',$data);
	}


}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
