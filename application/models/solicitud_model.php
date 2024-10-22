<?php
class Solicitud_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Crear una nueva solicitud
    public function crear($data) {
        return $this->db->insert('solicitudes', $data);
    }
}
