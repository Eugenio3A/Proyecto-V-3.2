<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function validar($login,$password)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('cuenta',$login);
		$this->db->where('contrasena',$password);
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}
}


