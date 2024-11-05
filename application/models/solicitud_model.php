<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_model extends CI_Model {

    // Listar todas las reservas pendientes
    public function listaSolicPendientes()
    {
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('estado', 'pendiente');
        return $this->db->get()->result_array();
    }

    public function listaSolicAsignadas()
    {
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('estado', 'asignado');
        return $this->db->get()->result_array();
    }
   
    // Listar todas las reservas completadas
    public function listaSolicCompletadas()
    {
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('estado', 'completado');
        return $this->db->get()->result_array();
    }

    public function listadeshabilitados()
	{
		$this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('estado', 'cancelado');
        return $this->db->get();//devuelve el resultado
	}

    // Listar todas las reservas canceladas
    public function listaSolicCanceladas()
    {
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('estado', 'cancelado');
        return $this->db->get();
    }

    public function insertarSolicitud($data) {
        return $this->db->insert('solicitudes', $data); // Asegúrate de que el nombre de la tabla sea correcto
    }

    // Métodos para obtener clientes, vehículos y parqueos
    public function get_clientes() {
        return $this->db->get('clientes')->result();
    }

    public function get_vehiculos() {
        return $this->db->get('vehiculos')->result();
    }

    public function get_parqueos() {
        return $this->db->get('parqueos')->result();
    }



    // Recuperar una reserva específica por su ID
    public function recuperarSolicitudes($idSolicitud)
    {
        $this->db->select('*');
        $this->db->from('solicitudes');
        $this->db->where('idSolicitud', $idSolicitud);
        return $this->db->get();
    }

    // Modificar una reserva existente
    public function modificarSolicitudes($idSolicitud, $data)
    {
        $this->db->where('idSolicitud', $idSolicitud);
        return $this->db->update('solicitudes', $data);
    }

    // Obtener pagos de una reserva específica
    public function obtenerPagosSolicitud($idSolicitud)
    {
        $this->db->select('*');
        $this->db->from('pagos');
        $this->db->where('solicitud_id', $idSolicitud);
        return $this->db->get()->result_array();
    }

    public function obtenerEstado($idSolicitud) {
        $this->db->select('estado');
        $this->db->where('idSolicitud', $idSolicitud);
        return $this->db->get('solicitudes')->row()->estado;
    }

    public function modificarEstado($idSolicitud, $nuevo_estado) {
        if ($this->estadoValido($nuevo_estado)) {
            $data = array('estado' => $nuevo_estado);
            $this->db->where('idSolicitud', $idSolicitud);
            return $this->db->update('solicitudes', $data);
        }
        return false; // Estado inválido
    }

    private function estadoValido($estado) {
        $estados_validos = ['pendiente', 'asignado', 'completado', 'cancelado'];
        return in_array($estado, $estados_validos);
    }

    public function obtenerSolicitudesPorEstado($estado) {
        $this->db->where('estado', $estado);
        return $this->db->get('solicitudes')->result_array();
    }

    public function contarSolicitudes($idUsuario) {
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->count_all_results('solicitudes'); // 'solicitudes' es el nombre de tu tabla
    }

    public function obtenerTodasLasSolicitudes() {
        // Consulta todas las solicitudes sin filtrar por estado
        $query = $this->db->get('solicitudes'); // Reemplaza 'solicitudes' con el nombre real de tu tabla
        return $query->result_array();
    }
    
    
}
