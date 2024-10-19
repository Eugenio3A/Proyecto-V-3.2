<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_model extends CI_Model {

    // Método para agregar un reclamo
    public function agregarReclamo($data) {
        $this->db->insert('reclamos', $data);
    }

    // Método para obtener todos los reclamos
    public function obtenerReclamos() {
        $this->db->select('r.*, c.nombre AS nombre_cliente, c.telefono AS telefono_cliente');
        $this->db->from('reclamos r');
        $this->db->join('clientes c', 'r.cliente_id = c.idCliente');
        return $this->db->get()->result();
    }

    // Método para obtener un reclamo por ID
    public function obtenerReclamoPorId($id) {
        $this->db->select('*');
        $this->db->from('reclamos');
        $this->db->where('idReclamo', $id);
        return $this->db->get()->row();
    }

    // Método para actualizar un reclamo
    public function actualizarReclamo($id, $data) {
        $this->db->where('idReclamo', $id);
        $this->db->update('reclamos', $data);
    }

    // Método para eliminar un reclamo
    public function eliminarReclamo($id) {
        $this->db->where('idReclamo', $id);
        $this->db->delete('reclamos');
    }
}
?>
