<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_model extends CI_Model {

    // Listar todas las reservas pendientes con detalles adicionales como cliente y tipo de servicio
    public function listarReservasConDetalles()
    {
        $this->db->select('reservas.*, clientes.nombre AS clienteNombre, clientes.telefono AS clienteTelefono');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.cliente_id = clientes.idCliente'); // Unir con la tabla clientes
        $this->db->where('reservas.estado', 'pendiente');
        return $this->db->get(); // Devuelve el resultado con detalles
    }

    // Listar reservas canceladas
    public function listaDeshabilitadosCans()
    {
        $this->db->select('reservas.*, clientes.nombre AS clienteNombre, clientes.telefono AS clienteTelefono');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.cliente_id = clientes.idCliente');
        $this->db->where('reservas.estado', 'cancelado');
        return $this->db->get();
    }

    // Agregar una nueva reserva
    public function agregarReserva($data)
    {
        return $this->db->insert('reservas', $data); // Inserta una nueva reserva
    }

    // Eliminar una reserva y sus pagos relacionados
    public function eliminarReserva($id_reserva)
    {
        // Eliminar pagos relacionados con la solicitud vinculada a la reserva
        $this->db->where('solicitud_id IN (SELECT idSolicitud FROM solicitudes WHERE reserva_id = '.$id_reserva.')');
        $this->db->delete('pagos'); // Elimina los pagos primero

        // Luego eliminar la reserva
        $this->db->where('idReserva', $id_reserva);
        $this->db->delete('reservas');

        // Verificar si la reserva fue eliminada correctamente
        return $this->db->affected_rows() > 0; // Retorna verdadero o falso
    }

    // Recuperar una reserva específica para modificarla
    public function recuperarReserva($id_reserva)
    {
        $this->db->select('reservas.*, clientes.nombre AS clienteNombre, clientes.telefono AS clienteTelefono');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.cliente_id = clientes.idCliente');
        $this->db->where('reservas.idReserva', $id_reserva);
        return $this->db->get()->row(); // Devuelve una fila
    }

    // Modificar una reserva existente
    public function modificarReserva($id_reserva, $data)
    {
        $this->db->where('idReserva', $id_reserva);
        return $this->db->update('reservas', $data); // Actualiza la reserva con los nuevos datos
    }

    // Listar todas las reservas activas
    public function listarReservasActivas()
    {
        $this->db->select('reservas.*, clientes.nombre AS clienteNombre, clientes.telefono AS clienteTelefono');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.cliente_id = clientes.idCliente');
        $this->db->where('reservas.estado', 'activo');
        return $this->db->get(); // Devuelve el resultado con detalles
    }

    // Listar todas las reservas confirmadas
    public function listarReservasConfirmadas()
    {
        $this->db->select('reservas.*, clientes.nombre AS clienteNombre, clientes.telefono AS clienteTelefono');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.cliente_id = clientes.idCliente');
        $this->db->where('reservas.estado', 'confirmado');
        return $this->db->get(); // Devuelve el resultado con detalles
    }

    // Listar todos los clientes
    public function listarClientes()
    {
        $this->db->select('*');
        $this->db->from('clientes');
        return $this->db->get()->result(); // Devuelve todos los clientes
    }

    // Listar todos los vehículos (puedes ajustar según tu estructura)
    public function listarVehiculos()
    {
        $this->db->select('*');
        $this->db->from('vehiculos'); // Asumiendo que hay una tabla de vehículos
        return $this->db->get()->result(); // Devuelve todos los vehículos
    }
}
