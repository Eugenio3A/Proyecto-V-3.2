<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reporte_model');
    }

    // Reporte de reservas de transporte por tipo
    public function reservas_por_tipo() {
        $data['reservas'] = $this->reporte_model->get_reservas_por_tipo();
        $this->load->view('reportes/reservas_por_tipo', $data);
    }

    // Reporte de ingresos por servicio de transporte
    public function ingresos_por_servicio() {
        $data['ingresos'] = $this->reporte_model->get_ingresos_por_servicio();
        $this->load->view('reportes/ingresos_por_servicio', $data);
    }

    // Reporte de conductores disponibles
    public function conductores_disponibles() {
        $data['conductores'] = $this->reporte_model->get_conductores_disponibles();
        $this->load->view('reportes/conductores_disponibles', $data);
    }

    // Análisis de disponibilidad de vehículos
    public function disponibilidad_vehiculos() {
        $data['vehiculos'] = $this->reporte_model->get_disponibilidad_vehiculos();
        $this->load->view('reportes/disponibilidad_vehiculos', $data);
    }

    // Reporte de mantenimiento de vehículos
    public function mantenimiento_vehiculos() {
        $data['mantenimientos'] = $this->reporte_model->get_mantenimiento_vehiculos();
        $this->load->view('reportes/mantenimiento_vehiculos', $data);
    }

    // Reporte de satisfacción de los usuarios
    public function satisfaccion_usuarios() {
        $data['satisfacciones'] = $this->reporte_model->get_satisfaccion_usuarios();
        $this->load->view('reportes/satisfaccion_usuarios', $data);
    }

    // Reporte de cumplimiento de horarios y servicios
    public function cumplimiento_horarios() {
        $data['cumplimientos'] = $this->reporte_model->get_cumplimiento_horarios();
        $this->load->view('reportes/cumplimiento_horarios', $data);
    }

    // Reporte de pagos y facturación
    public function pagos_facturacion() {
        $data['pagos'] = $this->reporte_model->get_pagos_facturacion();
        $this->load->view('reportes/pagos_facturacion', $data);
    }

    // Reporte de incidentes o problemas durante los servicios
    public function incidentes_servicios() {
        $data['incidentes'] = $this->reporte_model->get_incidentes_servicios();
        $this->load->view('reportes/incidentes_servicios', $data);
    }

    // Análisis de eficiencia de rutas y tiempos de transporte
    public function eficiencia_rutas() {
        $data['eficiencia'] = $this->reporte_model->get_eficiencia_rutas();
        $this->load->view('reportes/eficiencia_rutas', $data);
    }
}
