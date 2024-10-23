<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Seguimiento_model');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('vistaSeguimiento');
    }

    public function registrarUbicacion() {
        $id_conductor = $this->input->post('id_conductor');
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');

        $data = array(
            'id_conductor' => $id_conductor,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'timestamp' => date('Y-m-d H:i:s')
        );

        if ($this->Seguimiento_model->registrarUbicacion($data)) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function obtenerUbicaciones() {
        $ubicaciones = $this->Seguimiento_model->obtenerUbicaciones();
        echo json_encode($ubicaciones);
    }
}
