<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->model('Servicios_model','Servicios');
		$this->load->model('Usuarios_model','Usuarios');
		
	}
	
	//LOGIN
	
	public function acceso()
	{
		$this->load->view('admin/header');	
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}
	
	//LOGOUT
	
	public function logout()
	{
		$this->load->view('admin/header');	
		$this->load->view('admin/logout');
		$this->load->view('admin/footer');
	}


	//DASHBOARD
	
	public function dashboard()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	// SERVICIOS
	
	//LISTAR SERVICIO
	
	public function servicios_listar()
	{
		$servicios = $this->Servicios->listar_servicio();	
		
		$data = array(
		'servicios' => $servicios
		);
		
		$this->load->view('admin/header');
		$this->load->view('admin/servicios_listar',$data);
		$this->load->view('admin/footer');
	}
	
	//EDITAR SERVICIO
	public function servicios_editar($IdServicio = null)
	{
	
	 	if(!is_numeric($IdServicio) or is_null($IdServicio))  show_404(); 


                if ($this->input->post('post')) {

        	        $guardar = array(
	                        'nombre' => $this->input->post('nombre'),
	                        'valor' =>  $this->input->post('valor'),
	                );

	                $this->Servicios->editar_servicio($IdServicio,$guardar);

                }


	    
		$servicio = $this->Servicios->traer_servicio($IdServicio);
				
		if(!count ($servicio)) show_404();
		
		$data = array(
			'servicio' => $servicio
		);
		
		
		$this->load->view('admin/header');
		$this->load->view('admin/servicios_traer',$data);
		$this->load->view('admin/footer');
	}
	
	
	
	//BORRAR SERVICIO
	public function borrar_servicio ($IdServicio = null) {
		
	 	if(!is_numeric($IdServicio) or is_null($IdServicio))  show_404(); 

		$this->Servicios->borrar_servicio($IdServicio);
		
		redirect('admin/servicios_listar/');
        		

	}

	
	
	// USUARIOS
	
	// LISTAR USUARIO

	public function usuarios_listar()
	{
		$usuarios = $this->Usuarios->listar_usuario();	
		
		$data = array(
		'usuarios' => $usuarios
		);
		
		$this->load->view('admin/header');
		$this->load->view('admin/usuarios_listar',$data);
		$this->load->view('admin/footer');
	}
	
	// EDITAR USUARIO
	
	public function usuarios_editar($IdUsuario = null)
	{
	
	 	if(!is_numeric($IdUsuario) or is_null($IdUsuario))  show_404(); 


                if ($this->input->post('post')) {

        	        $guardar = array(
	                        'email' => $this->input->post('email'),
	                        'password' =>  $this->input->post('password'),
	                );

	                $this->Usuarios->editar_usuario($IdUsuario,$guardar);

                }


	    
		$usuario = $this->Usuarios->traer_usuario($IdUsuario);
				
		if(!count ($usuario)) show_404();
		
		$data = array(
			'usuario' => $usuario
		);
		
		
		$this->load->view('admin/header');
		$this->load->view('admin/usuarios_traer',$data);
		$this->load->view('admin/footer');
}


	//BORRAR USUARIO
	public function borrar_usuario ($IdUsuario = null) {
		
	 	if(!is_numeric($IdUsuario) or is_null($IdUsuario))  show_404(); 

		$this->Usuarios->borrar_usuario($IdUsuario);
		
		redirect('admin/usuarios_listar/');
        		

	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
