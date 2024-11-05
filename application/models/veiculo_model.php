<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo_model extends CI_Model {

	public function get_vehiculos() {
		$query = $this->db->get('vehiculos'); // 'usuarios' es el nombre de tu tabla
		return $query->result(); // Devuelve un array de objetos
	}
	public function listaveiculo()
	{
		$this->db->select('*');
		$this->db->from('Vehiculos');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('Vehiculos');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarveiculo($data)
	{
		$this->db->insert('Vehiculos',$data);
	}

	public function eliminarveiculo($idVehiculo)
	{
		$this->db->where('idVehiculo',$idVehiculo);
		$this->db->delete('Vehiculos');
	}

	public function recuperarveiculo($idVehiculo)
	{
		$this->db->select('*');
		$this->db->from('Vehiculos');
		$this->db->where('idVehiculo',$idVehiculo);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarveiculo($idVehiculo,$data)
	{
		$this->db->where('idVehiculo',$idVehiculo);
		$this->db->update('Vehiculos',$data);
	}
}


