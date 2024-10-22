<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->model('Solicitud_model');
    }

    // Acción para recibir la solicitud desde WhatsApp
    public function registrar_solicitud() {
        // Verificar si el cliente existe
        $cliente = $this->Cliente_model->obtener_por_telefono($numero_telefono);

        if ($cliente) {
            // Si el cliente existe, registrar la solicitud
            $data_solicitud = [
                'cliente_id' => $cliente->idCliente,
                'tipoServicio' => $tipo_servicio,
                'estado' => 'pendiente'
            ];

            $this->Solicitud_model->crear($data_solicitud);
            echo 'Solicitud registrada correctamente.';
        } else {
            // Si el cliente no existe, redirigir al formulario de creación de cliente
            redirect('SolicitudController/formulario_agregar_cliente');
        }
    }

    // Formulario para agregar cliente si no existe
    public function formulario_agregar_cliente() {
        $this->load->view('clientes/formulario_agregar_cliente');
    }

    // Acción para registrar un nuevo cliente
    public function agregar_cliente() {
        $data_cliente = [
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono'),
            'direccion' => $this->input->post('direccion')
        ];

        $this->Cliente_model->crear($data_cliente);
        redirect('SolicitudController/registrar_solicitud/'.$data_cliente['telefono']);
    }


}
