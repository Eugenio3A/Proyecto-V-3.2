<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reclamo_model'); // Carga el modelo de reclamos
    }

    // Método para mostrar el formulario de reclamos
    public function reclamo() {
        $data['nombre'] = $this->session->userdata('nombre');
        $data['telefono'] = $this->session->userdata('telefono');
        $data['numConductor'] = $this->session->userdata('numConductor');
        $data['placa'] = $this->session->userdata('placa');

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('formReclamos', $data);
        $this->load->view('inc/pie');
    }

    // Método para guardar el reclamo en la base de datos
    public function agregarReclamoBd() {
        $data = array(
            'cliente_id' => $this->session->userdata('idCliente'), // Asegúrate de tener el idCliente en la sesión
            'mensaje' => strtoupper($this->input->post('mensaje')),
            'estado' => 'pendiente' // Estado inicial
        );

        $this->reclamo_model->agregarReclamo($data); // Asegúrate de usar el nombre correcto del modelo
        redirect('reclamos/listarReclamos', 'refresh');
    }

    // Método para listar los reclamos
    public function listarReclamos() {
        $data['reclamos'] = $this->reclamo_model->obtenerReclamos(); // Obtén la lista de reclamos
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaReclamos', $data); // Vista para listar reclamos
        $this->load->view('inc/pie');
    }

    // Método para editar un reclamo
    public function editarReclamo($id) {
        $data['reclamo'] = $this->reclamo_model->obtenerReclamoPorId($id); // Obtén el reclamo por ID
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('form_editar_reclamo', $data); // Vista para editar reclamo
        $this->load->view('inc/pie');
    }

    // Método para actualizar el reclamo en la base de datos
    public function actualizarReclamo() {
        $id = $this->input->post('idReclamo'); // Asegúrate de que el campo se llama 'idReclamo'
        $data = array(
            'mensaje' => strtoupper($this->input->post('mensaje')),
            'estado' => strtoupper($this->input->post('estado')) // Si se necesita actualizar el estado
        );

        $this->reclamo_model->actualizarReclamo($id, $data); // Actualiza el reclamo
        redirect('reclamos/listarReclamos', 'refresh');
    }

    // Método para eliminar un reclamo
    public function eliminarReclamo($id) {
        $this->reclamo_model->eliminarReclamo($id); // Elimina el reclamo
        redirect('reclamos/listarReclamos', 'refresh');
    }
}
