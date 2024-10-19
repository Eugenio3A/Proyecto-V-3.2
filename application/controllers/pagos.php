<?php
class Pagos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pagos_model');
        $this->load->helper('url');
    }

    // Ver todos los pagos
    public function index() {
        $data['pagos'] = $this->Pagos_model->obtener_pagos();
        
        if (empty($data['pagos'])) {
            $data['pagos'] = []; // Si no hay datos, pasa un array vacío
        }
    
        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('listaPag', $data);
        $this->load->view('inc/pieLis');
    }

    // Crear un nuevo pago
    public function agregar() {
        $this->load->view('crear');
    }

    public function agregarbd() {
        $data = array(
            'monto' => strtoupper($this->input->post('monto')),
            'metodo' => strtoupper($this->input->post('metodoPago')), // Asegúrate de usar el nombre correcto
            'estado' => strtoupper($this->input->post('estadoPago')), // Asegúrate de usar el nombre correcto
            'idUsuario' => $this->input->post('solicitud_id'), // Cambiar a solicitud_id según el formulario
            'id_reserva' => $this->input->post('transaccion_id') // Cambiar a transaccion_id según el formulario
        );

        $this->Pagos_model->crear_pago($data);
        redirect('pagos/index', 'refresh');
    }

    // Actualizar un pago
    public function editar($id_pago) {
        $data['pago'] = $this->Pagos_model->obtener_pagos($id_pago);
        
        if ($this->input->post()) {
            $update_data = array(
                'monto' => $this->input->post('monto'),
                'metodo' => strtoupper($this->input->post('metodoPago')), // Asegúrate de usar el nombre correcto
                'estado' => strtoupper($this->input->post('estadoPago')), // Asegúrate de usar el nombre correcto
                'idUsuario' => $this->input->post('solicitud_id'), // Cambiar a solicitud_id según el formulario
                'id_reserva' => $this->input->post('transaccion_id') // Cambiar a transaccion_id según el formulario
            );
            $this->Pagos_model->actualizar_pago($id_pago, $update_data);
            redirect('pagos');
        } else {
            $this->load->view('pagos/editar', $data);
        }
    }

    // Eliminar un pago
    public function eliminar($id_pago) {
        $this->Pagos_model->eliminar_pago($id_pago);
        redirect('pagos');
    }
}
?>
