<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	

		public function get_usuarios() {
			$query = $this->db->get('usuarios'); // 'usuarios' es el nombre de tu tabla
			return $query->result(); // Devuelve un array de objetos
		}
	

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
		$this->db->insert('usuarios',$data);
	}

	public function eliminarcliente($id_usuario)
	{
		$this->db->where('id_usuario',$id_usuario);
		$this->db->delete('usuarios');
	}

	public function recuperarcliente($id_usuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id_usuario',$id_usuario);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarcliente($id_usuario,$data)
	{
		$this->db->where('id_usuario',$id_usuario);
		$this->db->update('usuarios',$data);
	}
}
