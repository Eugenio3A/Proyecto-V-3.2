<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puesto_model extends CI_Model {

    // Método para listar todos los parqueos habilitados
    public function listarParqueos()
    {
        $this->db->select('*');
        $this->db->from('parqueos');
        $this->db->where('estado', '1'); // Solo los parqueos habilitados
        return $this->db->get(); // Devuelve el resultado
    }

    // Método para listar todos los parqueos deshabilitados
    public function listarDeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('parqueos');
        $this->db->where('estado', '0'); // Solo los parqueos deshabilitados
        return $this->db->get(); // Devuelve el resultado
    }

    // Método para agregar un nuevo parqueo
    public function agregarParqueo($data)
    {
        $this->db->insert('parqueos', $data);
    }

    // Método para eliminar un parqueo específico por ID
    public function eliminarParqueo($idParqueo)
    {
        $this->db->where('idParqueo', $idParqueo);
        $this->db->delete('parqueos');
    }

    // Método para recuperar la información de un parqueo específico por ID
    public function recuperarParqueo($idParqueo)
    {
        $this->db->select('*');
        $this->db->from('parqueos');
        $this->db->where('idParqueo', $idParqueo);
        return $this->db->get(); // Devuelve el resultado
    }

    // Método para modificar los datos de un parqueo específico
    public function modificarParqueo($idParqueo, $data)
    {
        $this->db->where('idParqueo', $idParqueo);
        $this->db->update('parqueos', $data);
    }

    // Método para obtener todos los parqueos
    public function getParqueos()
    {
        $query = $this->db->get('parqueos'); // Obtiene todos los parqueos
        return $query->result();
    }
    

    // Método para obtener un parqueo específico por su nombre
    public function obtenerPorNombre($nombreParq)
    {
        return $this->db->get_where('parqueos', ['nombreParq' => $nombreParq])->row();
    }
}
