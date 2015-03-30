<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->model('Servicios_model','Servicios');
		$this->load->model('Usuarios_model','Usuarios');
		$this->load->library('session');
		
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
	      	
			$this->Usuarios->login($login); 
			$user = $this->Usuarios->login($login); 
			
		
				
		  if(($user) > 0)
		  {
			
	      	 $newdata = array(
			'IdUsuario' => $user->IdUsuario, 
			'Email' => $user->Email,
			'logged_in' => TRUE
			);
			
		  $this->session->set_userdata($newdata);
			

		  redirect('admin/dashboard');
		  }
			
		  else
		  {
			$error = "el usuario no existe en la base de datos";
		  }
				
		  }	
			
		  else
			
		  {
			$error = "Debe completar todos los datos";
		  }
          }
	
		$this->load->view('admin/header');	
		$this->load->view('admin/footer'); 
		$this->load->view('admin/login' , array('error' => $error)); 
	}
	
	//LOGOUT
	
	public function logout()
	{
		 $this->session->sess_destroy();
		redirect('admin/login/', 'refresh');
	}


	//DASHBOARD
	
	public function dashboard()
	{
		
		 if (!$this->session->userdata('logged_in')) 
		{
		     redirect('admin/login/', 'refresh'); 
		}
		
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}
	

	public function ejemplo()
	{
		
		 if (!$this->session->userdata('logged_in')) 
		{
		     redirect('admin/login/', 'refresh'); 
		}

		$data['contenido'] = 'admin/dashboard';	
		
		$this->load->view('admin/ejemplo',$data);
		
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


                if ($this->input->post('post')) 
				{

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
	
	//CREAR USUARIO
	
	public function usuarios_crear()
	{
		$data['title'] = 'Crear un nuevo usuario';
		
		
		
		if ($this->input->post('procesar'))	
		{
			
			$data = array(
	          'email' => $this->input->post('email'),
	          'password' =>  $this->input->post('password'), 
	         );
			
			
		}
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/header', $data);
			$this->load->view('admin/usuarios_crear',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			$this->Usuarios->crear_usuario();
			$this->load->view('admin/exito_usuario'); 
		}
		
	}
	
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


                if ($this->input->post('post')) 
				{

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
 