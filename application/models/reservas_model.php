<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_model extends CI_Model {

    // Listar todas las reservas pendientes
    public function listaReservasPendientes()
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->where('estado', 'pendiente');
        return $this->db->get()->result_array();
    }

    // Listar todas las reservas completadas
    public function listaReservasCompletadas()
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->where('estado', 'completada');
        return $this->db->get()->result_array();
    }

    // Listar todas las reservas canceladas
    public function listaReservasCanceladas()
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->where('estado', 'cancelada');
        return $this->db->get()->result_array();
    }

    // Agregar una nueva reserva
    public function insertarReserva($data)
{
    return $this->db->insert('reservas', $data);
}


    // Eliminar una reserva y sus pagos relacionados
    public function eliminarReserva($idReserva)
    {
        // Eliminar los pagos relacionados
        $this->db->where('idReserva', $idReserva);
        $this->db->delete('pagos');

        // Eliminar la reserva
        $this->db->where('idReserva', $idReserva);
        $this->db->delete('reservas');

        return $this->db->affected_rows() > 0;
    }

    // Recuperar una reserva específica por su ID
    public function recuperarReserva($idReserva)
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->where('idReserva', $idReserva);
        return $this->db->get()->row_array();
    }

    // Modificar una reserva existente
    public function modificarReserva($idReserva, $data)
    {
        $this->db->where('idReserva', $idReserva);
        return $this->db->update('reservas', $data);
    }

    // Obtener pagos de una reserva específica
    public function obtenerPagosReserva($idReserva)
    {
        $this->db->select('*');
        $this->db->from('pagos');
        $this->db->where('solicitud_id', $idReserva);
        return $this->db->get()->result_array();
    }

    public function obtenerReservasPorEstado($estado) {
        $this->db->where('estado', $estado);
        return $this->db->get('reservas')->result_array();
    }

}
