<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrera_model extends CI_Model {

	public function listaCarreras()
	{
		$this->db->select('*'); // select *
		$this->db->from('Vehiculos'); //tabla
		return $this->db->get(); //devolución del resultado de la consulta
	}

	public function inscribirestudiante($id_vehiculo,$data)
	{
		$this->db->trans_start();
		$this->db->insert('Usuarios',$data);
		$id_usuario=$this->db->insert_id();

		$data2['id_vehiculo']=$id_vehiculo;
		$data2['id_usuario']=$id_usuario;
		$this->db->insert('Reservas',$data2);

		$this->db->trans_complete();

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
	}
}
