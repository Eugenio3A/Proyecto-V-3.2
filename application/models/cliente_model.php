<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public function listaclientes()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('habilitado','1');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('habilitado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarcliente($data)
	{
		$this->db->insert('clientes',$data);
	}

	public function eliminarcliente($idCliente)
	{
		$this->db->where('idCliente',$idCliente);
		$this->db->delete('clientes');
	}

	public function recuperarcliente($idCliente)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('idCliente',$idCliente);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarcliente($idCliente,$data)
	{
		$this->db->where('idCliente',$idCliente);
		$this->db->update('clientes',$data);
	}
}
