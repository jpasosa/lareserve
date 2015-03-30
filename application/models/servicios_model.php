<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Servicios_model extends CI_Model
{

	public function __contruct()
	{
		parent::__construct();
	}


	/**
	 * Get all servicios
	 **/
	public function get_all()
	{

		try {

			$query = $this->db->get('Servicio');

			$servicios 	= $query->result_array();

			if (count($servicios) > 0) {
				return $servicios;
			} else {
				return array();
			}



		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}

	}




}


?>