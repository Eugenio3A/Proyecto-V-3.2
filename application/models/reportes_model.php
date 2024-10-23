<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    // Reporte de reservas de transporte por tipo
    public function get_reservas_por_tipo() {
        $query = $this->db->select('tipo_reserva, COUNT(*) AS total_reservas')
                          ->from('reservas')
                          ->group_by('tipo_reserva')
                          ->get();
        return $query->result();
    }

    // Reporte de ingresos por servicio de transporte
    public function get_ingresos_por_servicio() {
        $query = $this->db->select('servicio, SUM(ingreso) AS total_ingresos')
                          ->from('pagos')
                          ->group_by('servicio')
                          ->get();
        return $query->result();
    }

    // Reporte de conductores disponibles
    public function get_conductores_disponibles() {
        $query = $this->db->select('nombre, apellido')
                          ->from('conductores')
                          ->where('estado', 'disponible')
                          ->get();
        return $query->result();
    }

    // Análisis de disponibilidad de vehículos
    public function get_disponibilidad_vehiculos() {
        $query = $this->db->select('placa, estado')
                          ->from('vehiculos')
                          ->get();
        return $query->result();
    }

    // Reporte de mantenimiento de vehículos
    public function get_mantenimiento_vehiculos() {
        $query = $this->db->select('v.placa, m.fecha_mantenimiento, m.descripcion')
                          ->from('vehiculos v')
                          ->join('mantenimiento m', 'v.id = m.id_vehiculo')
                          ->get();
        return $query->result();
    }

    // Reporte de satisfacción de los usuarios
    public function get_satisfaccion_usuarios() {
        $query = $this->db->select('nota, COUNT(*) AS cantidad')
                          ->from('satisfaccion')
                          ->group_by('nota')
                          ->get();
        return $query->result();
    }

    // Reporte de cumplimiento de horarios y servicios
    public function get_cumplimiento_horarios() {
        $query = $this->db->select('fecha, hora_salida, hora_llegada, estado')
                          ->from('reservas')
                          ->where('estado', 'cumplido')
                          ->get();
        return $query->result();
    }

    // Reporte de pagos y facturación
    public function get_pagos_facturacion() {
        $query = $this->db->select('p.fecha, p.monto, c.nombre AS cliente')
                          ->from('pagos p')
                          ->join('clientes c', 'p.id_cliente = c.id')
                          ->get();
        return $query->result();
    }

    // Reporte de incidentes o problemas durante los servicios
    public function get_incidentes_servicios() {
        $query = $this->db->select('descripcion, fecha, id_reserva')
                          ->from('incidentes')
                          ->get();
        return $query->result();
    }

    // Análisis de eficiencia de rutas y tiempos de transporte
    public function get_eficiencia_rutas() {
        $query = $this->db->select('ruta, AVG(TIMESTAMPDIFF(MINUTE, hora_salida, hora_llegada)) AS tiempo_promedio')
                          ->from('reservas')
                          ->group_by('ruta')
                          ->get();
        return $query->result();
    }
}
