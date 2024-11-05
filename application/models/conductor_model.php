<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductor_model extends CI_Model {

	public function listaconductores()
	{
		$this->db->select('*');
		$this->db->from('Conductores');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitados1()
	{
		$this->db->select('*');
		$this->db->from('Conductores');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarconductores($data)
	{
		$this->db->insert('Conductores',$data);
	}

	public function eliminarconductores($idConductor)
	{
		$this->db->where('idConductor',$idConductor);
		$this->db->delete('Conductores');
	}

	public function recuperarconductores($idConductor)
	{
		$this->db->select('*');
		$this->db->from('Conductores');
		$this->db->where('idConductor',$idConductor);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarconductores($idConductor,$data)
	{
		$this->db->where('idConductor',$idConductor);
		$this->db->update('Conductores',$data);
	}
}
