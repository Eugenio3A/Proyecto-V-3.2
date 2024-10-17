<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductor extends CI_Controller {

    // Constructor para cargar el modelo
    public function __construct()
    {
        parent::__construct();
        $this->load->model('conductor_model'); // Carga el modelo conductor_model
    }

    public function demo()
    {
        $this->load->view('inc/vistaslte/head');
        $this->load->view('inc/vistaslte/menu');
        $this->load->view('inc/vistaslte/test');
        $this->load->view('inc/vistaslte/footer');
    }

    public function curso()
    {
        if($this->session->userdata('login'))
        {
            $lista2 = $this->conductor_model->listaconductores();
            $data['alumnos'] = $lista2;

            $this->load->view('inc/head');
            $this->load->view('inc/menu');
            $this->load->view('lista2', $data);
            $this->load->view('inc/pie');        
        }
        else
        {
            redirect('gerentpro/index', 'refresh');
        }
    }



    public function listaConductores()
    {
        $lista2 = $this->conductor_model->listaconductores();
        $data['alumnos'] = $lista2;

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('lista2', $data);
        $this->load->view('inc/pieLis');
    }
    public function deshabilitados()
    {
        $lista2 = $this->conductor_model->listadeshabilitados1();
        $data['alumnos'] = $lista2;

        $this->load->view('inc/head');
       
        $this->load->view('deshabilconduc', $data);
        
        $this->load->view('inc/pie');
    }

    public function agregar()
    {
        $this->load->view('inc/head');
        
        $this->load->view('formconductor');
        $this->load->view('inc/pie');
    }

    public function agregarbd2()
    {
        $data['nombre'] = strtoupper($_POST['nombre']);
        $data['primerApellido'] = strtoupper($_POST['primerApellido']);
        $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        $data['licencia'] = $_POST['licencia'];
        $data['telefono'] = $_POST['telefono'];
        $data['domicilio'] = $_POST['domicilio'];
        $data['antecedentes'] = $_POST['antecedentes'];
        $data['foto'] = $_POST['foto'];

        $this->conductor_model->agregarconductores($data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function eliminarbd()
    {
        $id_conductor = $_POST['id_conductor'];
        $this->conductor_model->eliminarconductores($id_conductor);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function modificar()
    {
        $id_conductor = $_POST['id_conductor'];
        $data['infoconductor'] = $this->conductor_model->recuperarconductores($id_conductor);

        $this->load->view('inc/head');
        $this->load->view('formmodicond', $data);
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $id_conductor = $_POST['id_conductor'];
        $data['nombre'] = strtoupper($_POST['nombre']);
        $data['primerApellido'] = strtoupper($_POST['primerApellido']);
        $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        $data['licencia'] = $_POST['licencia'];
        $data['telefono'] = $_POST['telefono'];
        $data['domicilio'] = $_POST['domicilio'];
        $data['antecedentes'] = $_POST['antecedentes'];
        $data['foto'] = $_POST['foto'];

        $this->conductor_model->modificarconductores($id_conductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function deshabilitarbd()
    {
        $id_conductor = $_POST['id_conductor'];
        $data['disponible'] = '0';

        $this->conductor_model->modificarconductores($id_conductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function habilitarbd()
    {
        $id_conductor = $_POST['id_conductor'];
        $data['disponible'] = '1';

        $this->conductor_model->modificarconductores($id_conductor, $data);
        redirect('conductor/deshabilitados', 'refresh');
    }
}
