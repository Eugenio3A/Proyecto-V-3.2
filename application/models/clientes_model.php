<?php
class Cliente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Verificar si el cliente existe por su número de teléfono
    public function obtener_por_telefono($telefono) {
        return $this->db->get_where('clientes', ['telefono' => $telefono])->row();
    }

    // Crear un nuevo cliente
    public function crear($data) {
        return $this->db->insert('clientes', $data);
    }
}
