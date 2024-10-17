<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	//Validar Administrador

	public function validarAdmin($login,$password)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('email',$login);
		$this->db->where('contrasena',$password);
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	//Validar Empleado

	public function validarEmp($login,$password)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('email',$login);
		$this->db->where('contrasena',$password);
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}

	//Validar Conductor

	public function validarConduc($login,$password)
	{
		$this->db->select('*');
		$this->db->from('conductores');
		$this->db->where('email',$login);
		$this->db->where('contrasena',$password);
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}
}


