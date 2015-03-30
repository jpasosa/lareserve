<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model  extends CI_Model {

	function __construct() 
	{
			
	parent::__construct();
	}


		
	function listar_usuario () 		
	{
	
		$query = $this->db->get('Usuario');
		return $query->result();
		
	}
	
			
	public function traer_usuario ($IdUsuario) 		
	{
		$query = $this->db->where('IdUsuario',$IdUsuario);	
		$query = $this->db->get('Usuario');
		if($query->num_rows() > 0) {
		 return $query->row();
		} else {
		 return array();
	
		}
	}
	
	
	public function editar_usuario($IdUsuario,$guardar)
	{
		
		$this->db->where('IdUsuario',$IdUsuario);
		$this->db->update('Usuario',$guardar);
		
	} 
	
	
	public function borrar_usuario($IdUsuario)
	{
	
	$usuario = $this->traer_usuario ($IdUsuario);
		
	if ($usuario ) {
		
		$this->db->where('IdUsuario',$IdUsuario);
		$this->db->delete('Usuario');
	
	} else { return false; 
	
	       }	
		
	
	} 
	
	
	public function crear_usuario($data)
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		
		$data = array(
		'email' => $this->input->post('Email'),
		'password' => $this->input->post('Password')
		); 
		
		return $this->db->insert('Usuario', $data); 
	}
		
	
	// LOGIN
	
	public function login($data)
{
		   	$this->db->where('Email',$data['email']);
	    	$this->db->where('Password',$data['password']);
	    	$resultado = $this->db->get('Usuario');
			
	 		
	    	if($resultado->num_rows > 0)
			{
	    	    return $resultado->row();
	    	}
			else
			{
	            return FALSE;
	        }
}
	
	
}

