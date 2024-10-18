<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function listausuarioAdmin()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitadosAdmin()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarAdmin($data)
	{
		$this->db->insert('usuarios',$data);
	}

	public function eliminarAdmin($idUsuario)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->delete('usuarios');
	}

	public function recuperarAdmin($idAdmin)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarAdmin($idUsuario,$data)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuarios',$data);
	}
}
