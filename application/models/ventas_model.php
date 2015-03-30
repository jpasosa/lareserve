<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ventas_model extends CI_Model
{

	public function __contruct()
	{
		parent::__construct();
	}



	public function primer_insert()
	{

		try {

			$venta['idEstado'] 			= 1; // Es estado NUEVO, cuando está ingresando los Vouchers. Todavía no pagó, ni terminó de ingresar todos.
			$venta['FechaCreacion'] 	= date('Y-m-d');

			$insert = $this->db->insert('Venta', $venta );

			if ( $insert )
			{
				return $this->db->insert_id();
			} else {
				return 0;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}

	}

	/**
	 * Seteo el estado que me devuelve mercadopago
	 *
	 * @team 	Allytech
	 * @author 	Juan Pablo Sosa <juans@allytech.com>
	 * @date 	29 de enero del 2015
	 *
	 * @param       (int) 	id del registro de ventas
	 * @param       (int) 	estado de mercadopago, por el momento estoy harckodeando
	 * @return      	(boolean) 	true si lo pudosetear | false si no pudo.
	 **/
	public function set_estado_mp( $id_venta, $status_mp)
	{

		try {

			$this->db->where('IdVenta', $id_venta);
			$this->db->update('Venta', array('IdEstado'=>$status_mp));

			if ( $this->db->affected_rows() )
			{
				return true;
			} else {
				return false;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			exit(1);
		}


	}




}


?>