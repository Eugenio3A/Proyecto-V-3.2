<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puestos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar los modelos necesarios
        $this->load->model('puesto_model');
    }

    public function demo(){
        $this->load->view('inc/vistaslte/head');
        $this->load->view('inc/vistaslte/menu');
        $this->load->view('inc/vistaslte/test');
        $this->load->view('inc/vistaslte/footer');
    }
    
    public function listaParqueo()
    {
        $listaPuestos=$this->puesto_model->listarParqueos();
        $data['parqueos'] = $listaPuestos;

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('listaPuestos', $data);
        $this->load->view('inc/pieLis');
    }

    public function agregar()
    {
        $this->load->view('inc/head');
        $this->load->view('formPuesto');
        $this->load->view('inc/pie');
    }

    public function agregarbd()
    {
        $idUsuario = $this->session->userdata('idUsuario'); 

        $data['nombreParq'] = strtoupper($_POST['nombreParq']);
        $data['direccion'] = strtoupper($_POST['direccion']);
        $data['latitud'] = $_POST['latitud'];
        $data['longitud'] = $_POST['longitud'];
        $data['idUsuario'] = $idUsuario; // Asigna el ID del usuario logueado

        $this->puesto_model->agregarParqueo($data);
        redirect('puestos/listaParqueo', 'refresh');
    }

    public function eliminarbd()
    {
        $idParqueo = $_POST['idParqueo'];
        $this->parqueo_model->eliminarParqueo($idParqueo);
        redirect('parqueo/listaParqueo', 'refresh');
    }

    public function modificar()
    {
        $idParqueo = $_POST['idParqueo'];
        $data['infoParqueo'] = $this->parqueo_model->recuperarParqueo($idParqueo);

        $this->load->view('inc/head');
        $this->load->view('formModificarParqueo', $data);
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $idParqueo = $_POST['idParqueo'];
        $data['nombre'] = strtoupper($_POST['nombre']);
        $data['direccion'] = strtoupper($_POST['direccion']);
        $data['latitud'] = $_POST['latitud'];
        $data['longitud'] = $_POST['longitud'];
        
        $this->parqueo_model->modificarParqueo($idParqueo, $data);
        redirect('parqueo/listaParqueo', 'refresh');
    }

    public function deshabilitarbd()
    {
        $idParqueo = $_POST['idParqueo'];
        $data['estado'] = '0';

        $this->parqueo_model->modificarParqueo($idParqueo, $data);
        redirect('parqueo/listaParqueo', 'refresh');
    }

    public function habilitarbd()
    {
        $idParqueo = $_POST['idParqueo'];
        $data['estado'] = '1';

        $this->parqueo_model->modificarParqueo($idParqueo, $data);
        redirect('parqueo/listaDeshabilitados', 'refresh');
    }

    public function listaDeshabilitados()
    {
        $lista = $this->parqueo_model->listarDeshabilitados();
        $data['parqueos'] = $lista;

        $this->load->view('inc/head');
        $this->load->view('listaDeshabilitados', $data);
        $this->load->view('inc/pie');
    }
}
