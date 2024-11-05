<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropVehiculo_model extends CI_Model {

	public function get_vehiculos() {
		$query = $this->db->get('propietariovehiculo'); // 'usuarios' es el nombre de tu tabla
		return $query->result(); // Devuelve un array de objetos
	}
	public function listaPropVehiculo()
	{
		$this->db->select('*');
		$this->db->from('propietariovehiculo');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('propietariovehiculo');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarPropVehiculo($data)
	{
		$this->db->insert('propietariovehiculo',$data);
	}

	public function eliminarPropVehiculo($idPropietario)
	{
		$this->db->where('idPropietario',$idPropietario);
		$this->db->delete('propietariovehiculo');
	}

	public function recuperPropVehiculo($idPropietario)
	{
		$this->db->select('*');
		$this->db->from('propietariovehiculo');
		$this->db->where('idPropietario',$idPropietario);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarPropVehiculo($idPropietario,$data)
	{
		$this->db->where('idPropietario',$idPropietario);
		$this->db->update('propietariovehiculo',$data);
	}
}


