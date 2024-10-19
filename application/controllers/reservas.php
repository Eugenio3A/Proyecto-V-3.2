<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reservas_model');  
        $this->load->library('form_validation');
    }

    // Función para mostrar la lista de reservas
    public function movil() {
        if ($this->session->userdata('cuenta')) {
            $listaRes = $this->Reservas_model->listarReservasConDetalles(); 
            $data['reservas'] = $listaRes;

            $this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('listaRes', $data);
            $this->load->view('inc/pieLis');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    // Función para mostrar el formulario de agregar reserva
    public function agregar() {
        $data['clientes'] = $this->Reservas_model->listarClientes();
        $data['vehiculos'] = $this->Reservas_model->listarVehiculos();

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('formReservas', $data);
        $this->load->view('inc/pieLis');
    }

    // Función para procesar el formulario de agregar reserva
    public function agregarbd() {
        $this->form_validation->set_rules('cliente_id', 'Cliente', 'required');
        $this->form_validation->set_rules('tipoServicio', 'Tipo de Servicio', 'required');
        $this->form_validation->set_rules('fechaReserva', 'Fecha Reserva', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->agregar(); // Si la validación falla, mostrar el formulario nuevamente
        } else {
            $data = array(
                'cliente_id' => $this->input->post('cliente_id'),
                'tipoServicio' => $this->input->post('tipoServicio'),
                'fechaReserva' => $this->input->post('fechaReserva'),
                'activo' => 1,
                'estado' => 'pendiente'
            );

            $this->Reservas_model->agregarReserva($data);
            $this->session->set_flashdata('mensaje', 'Reserva agregada correctamente.'); 
            redirect('Reservas/movil', 'refresh');
        }
    }

    // Función para mostrar el formulario de modificar reserva
    public function modificar() {
        $idReserva = $this->input->post('idReserva');
        $data['reserva'] = $this->Reservas_model->recuperarReserva($idReserva)->row(); 

        // Cargar datos adicionales
        $data['clientes'] = $this->Reservas_model->listarClientes();
        $data['vehiculos'] = $this->Reservas_model->listarVehiculos(); 

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('formmodificar', $data);
        $this->load->view('inc/pieLis');
    }

    // Función para procesar el formulario de modificar reserva
    public function modificarbd() {
        $idReserva = $this->input->post('idReserva');

        // Validación de datos
        $this->form_validation->set_rules('tipoServicio', 'Tipo de Servicio', 'required');
        $this->form_validation->set_rules('fechaReserva', 'Fecha Reserva', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, volver al formulario de modificación
            $this->modificar();
        } else {
            $data = array(
                'tipoServicio' => $this->input->post('tipoServicio'),
                'fechaReserva' => $this->input->post('fechaReserva'),
                'estado' => $this->input->post('estado') // Asegúrate de que el formulario tenga este campo
            );

            $this->Reservas_model->modificarReserva($idReserva, $data); 
            $this->session->set_flashdata('mensaje', 'Reserva modificada correctamente.'); 
            redirect('Reservas/movil', 'refresh');
        }
    }

    // Función para eliminar una reserva
    public function eliminar() {
        $idReserva = $this->input->post('idReserva');
        if (!$idReserva) {
            $this->session->set_flashdata('error', 'ID de reserva no proporcionado.');
            redirect('Reservas/movil', 'refresh');
        }

        $resultado = $this->Reservas_model->eliminarReserva($idReserva); 

        if ($resultado) {
            $this->session->set_flashdata('mensaje', 'Reserva eliminada correctamente.');
        } else {
            $this->session->set_flashdata('error', 'No se pudo eliminar la reserva. Puede que no exista.');
        }

        redirect('Reservas/movil');
    }

    // Función para deshabilitar una reserva
    public function deshabilitarbd() {
        $idReserva = $this->input->post('idReserva');
        $data = array('estado' => 'completada');

        $this->Reservas_model->modificarReserva($idReserva, $data); 
        $this->session->set_flashdata('mensaje', 'Reserva completada correctamente.'); 
        redirect('Reservas/movil', 'refresh');
    }

    // Función para habilitar una reserva
    public function habilitarbd() {
        $idReserva = $this->input->post('idReserva');
        $data = array('estado' => 'pendiente');

        $this->Reservas_model->modificarReserva($idReserva, $data); 
        $this->session->set_flashdata('mensaje', 'Reserva habilitada nuevamente.'); 
        redirect('Reservas/deshabilitados', 'refresh');
    }

    // Función para mostrar reservas deshabilitadas
    public function deshabilitados() {
        $listaRes = $this->Reservas_model->listaDeshabilitadosCans()->result(); 
        $data['reservas'] = $listaRes;

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('deshabilitados', $data);
        $this->load->view('inc/pie');
    }
}
