<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    // Constructor para cargar el modelo
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model'); // Carga el modelo conductor_model
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
            $lista3 = $this->admin_model->listaconductores();
            $data['alumnos'] = $lista3;

            $this->load->view('inc/head');
            $this->load->view('inc/menu');
            $this->load->view('lista3', $data);
            $this->load->view('inc/footer');
            $this->load->view('inc/pie');        
        }
        else
        {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function deshabilitados()
    {
        $lista3 = $this->admin_model->listadeshabilitados1();
        $data['alumnos'] = $lista3;

        $this->load->view('inc/head');
        $this->load->view('inc/menuGt');
        $this->load->view('deshabilAdmin', $data);
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function agregar()
    {
        $this->load->view('inc/head');
        $this->load->view('inc/menuGt');
        $this->load->view('formAdmin');
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function agregarbd3()
    {
        $data['ciNit'] = ($_POST['ciNit']);
        $data['nombre'] = ($_POST['nombre']);
        $data['primerApellido'] = ($_POST['primerApellido']);
        $data['segundoApellido'] = ($_POST['segundoApellido']);
        $data['login'] = ($_POST['login']);
        $data['codigo']=md5($_POST['codigo']);
        $data['cargo'] = ($_POST['cargo']);
        
        $this->admin_model->agregarconductores($data);
        redirect('administrador/curso', 'refresh');
    }

    public function eliminarbd()
    {
        $idAdmin = $_POST['idAdmin'];
        $this->admin_model->eliminarconductores($idAdmin);
        redirect('administrador/curso', 'refresh');
    }

    public function modificar()
    {
        $idAdmin = $_POST['idAdmin'];
        $data['infoconductor'] = $this->admin_model->recuperarconductores($idAdmin);

        $this->load->view('inc/head');
        $this->load->view('inc/menuGt');
        $this->load->view('formmodAdmin', $data);
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $idAdmin = $_POST['idAdmin'];
        $data['ciNit'] = ($_POST['ciNit']);
        $data['nombre'] = ($_POST['nombre']);
        $data['primerApellido'] = ($_POST['primerApellido']);
        $data['segundoApellido'] = ($_POST['segundoApellido']);
        $data['login'] = ($_POST['login']);
        $data['codigo'] = md5($_POST['codigo']);
        $data['cargo'] = ($_POST['cargo']);

        $this->admin_model->modificarconductores($idAdmin, $data);
        redirect('administrador/curso', 'refresh');
    }

    public function deshabilitarbd()
    {
        $idAdmin = $_POST['idAdmin'];
        $data['activo'] = '0';

        $this->admin_model->modificarconductores($idAdmin, $data);
        redirect('administrador/curso', 'refresh');
    }

    public function habilitarbd()
    {
        $idAdmin = $_POST['idAdmin'];
        $data['activo'] = '1';

        $this->admin_model->modificarconductores($idAdmin, $data);
        redirect('administrador/deshabilitados', 'refresh');
    }
}
