<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento_model extends CI_Model {

    public function registrarUbicacion($data) {
        return $this->db->insert('seguimiento_conductores', $data);
    }

    public function obtenerUbicaciones() {
        $this->db->select('id_conductor, latitud, longitud, timestamp');
        $query = $this->db->get('seguimiento_conductores');
        return $query->result();
    }
}
