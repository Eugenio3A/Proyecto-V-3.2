<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los reclamos con los datos del cliente
    public function obtenerReclamos() {
        $this->db->select('r.*, c.nombre AS nombre_cliente, c.telefono AS telefono_cliente');
        $this->db->from('reclamos r');
        $this->db->join('clientes c', 'r.cliente_id = c.idCliente', 'left');
        $this->db->order_by('r.fechaRegistro', 'DESC'); // Cambié a fechaRegistro para coincidir con el esquema
        return $this->db->get()->result();
    }

    // Obtener un reclamo por su ID
    public function obtenerReclamoPorId($id) {
        return $this->db->get_where('reclamos', ['idReclamo' => $id])->row();
    }

    // Insertar un nuevo reclamo
    public function agregarReclamo($data) {
        return $this->db->insert('reclamos', $data);
    }

    // Actualizar un reclamo existente
    public function actualizarReclamo($id, $data) {
        $this->db->where('idReclamo', $id);
        return $this->db->update('reclamos', $data);
    }

    // Eliminar un reclamo por su ID
    public function eliminarReclamo($id) {
        return $this->db->delete('reclamos', ['idReclamo' => $id]);
    }
}
