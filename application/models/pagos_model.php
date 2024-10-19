<?php
class Pagos_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Crear un nuevo pago
    public function crear_pago($data) {
        return $this->db->insert('pagos', $data);
    }

    // Obtener todos los pagos o un pago específico
    public function obtener_pagos($id_pago = null) {
        if ($id_pago) {
            $this->db->where('id_pago', $id_pago);
            $query = $this->db->get('pagos');
            return $query->row(); // Devuelve un solo resultado
        } else {
            $query = $this->db->get('pagos');
            return $query->result(); // Retorna un array de resultados
        }
    }

    // Actualizar un pago
    public function actualizar_pago($id_pago, $data) {
        $this->db->where('id_pago', $id_pago);
        return $this->db->update('pagos', $data);
    }

    // Eliminar un pago
    public function eliminar_pago($id_pago) {
        $this->db->where('id_pago', $id_pago);
        return $this->db->delete('pagos');
    }
}
?>
