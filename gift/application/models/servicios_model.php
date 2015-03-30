<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios_model  extends CI_Model 
{

	public	function __construct() 
	{		
		parent::__construct();
	}

		
	public	function listar_servicio () 		
	{
	
		$query = $this->db->get('Servicio');
		return $query->result();
		
	}
	
			
	public function traer_servicio ($IdServicio) 		
	{
		$query = $this->db->where('IdServicio',$IdServicio);	
		$query = $this->db->get('Servicio');
			
		if($query->num_rows() > 0) {
			 return $query->row();
		} else {
			 return array();
		
		}
	}
		
		

	
	public function editar_servicio($IdServicio,$guardar)
	{
		
		$this->db->where('IdServicio',$IdServicio);
		$this->db->update('Servicio',$guardar);
		
	} 
	
	
	public function borrar_servicio($IdServicio)
	{
	
	$servicio = $this->traer_servicio ($IdServicio);
		
	if ($servicio ) {
		
		$this->db->where('IdServicio',$IdServicio);
		$this->db->delete('Servicio');
	
	} else { return false; 
	
	       }	
		
	
	} 
	
	
}
