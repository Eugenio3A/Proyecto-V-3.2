<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	//Validar Administrador

	public function validarAdmin($login,$password)
	{
		$this->db->select('*');
		$this->db->from('Administrador');
		$this->db->where('login',$login);
		$this->db->where('codigo',$password);
		$this->db->where('activo','1');
		return $this->db->get(); //devuelve el resultado
	}

	//Validar Empleado

	public function validarEmp($login,$password)
	{
		$this->db->select('*');
		$this->db->from('Administrador');
		$this->db->where('login',$login);
		$this->db->where('codigo',$password);
		$this->db->where('activo','1');
		return $this->db->get(); //devuelve el resultado
	}

	//Validar Conductor

	public function validarConduc($login,$password)
	{
		$this->db->select('*');
		$this->db->from('Administrador');
		$this->db->where('login',$login);
		$this->db->where('codigo',$password);
		$this->db->where('activo','1');
		return $this->db->get(); //devuelve el resultado
	}
}


