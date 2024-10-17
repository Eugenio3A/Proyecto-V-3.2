<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos_model extends CI_Model {

	public function listacargos()
	{
		$this->db->select('*'); // select *
		$this->db->from('cargos'); //tabla
		return $this->db->get(); //devolución del resultado de la consulta
	}

	public function agregarCargo($cargo_id,$data)
	{
         
		$this->db->trans_start();
		$this->db->insert('usuarios',$data);
		$usuario_id=$this->db->insert_id();

		$data2['cargo_id']=$cargo_id;
		$data2['usuario_id']=$usuario_id;
		$this->db->insert('registro',$data2);

		$this->db->trans_complete();

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
	}

    
}
