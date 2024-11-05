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

    public function loge()
    {
        if($this->session->userdata('cuenta'))
        {
            $lista2 = $this->conductor_model->listaconductores();
            $data['conductor'] = $lista2;

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
        $data['conductor'] = $lista2;

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('lista2', $data);
        $this->load->view('inc/pieLis');
    }
    public function deshabilitados()
    {
        $lista2 = $this->conductor_model->listadeshabilitados1();
        $data['conductor'] = $lista2;

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
    $idUsuario = $this->session->userdata('idUsuario'); 
    // Recolectar los datos del formulario
    $data['foto'] = $_POST['foto'];
    $data['nombre'] = strtoupper($_POST['nombre']);
    $data['primerApellido'] = strtoupper($_POST['primerApellido']);
    $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
    $data['licencia'] = $_POST['licencia'];
    $data['telefono'] = $_POST['telefono'];
    $data['cuenta'] = $_POST['cuenta'];
    $data['codigo'] = md5($_POST['codigo']);
    $data['domicilio'] = $_POST['domicilio'];
    $data['detalleChofProp'] = $_POST['detalleChofProp'];
    $data['idUsuario'] = $idUsuario; // Agregamos el ID del usuario logueado

    // Insertar datos en la base de datos usando el modelo
    $this->conductor_model->agregarconductores($data);

    // Redirigir dependiendo del tipo de conductor
    if ($data['detalleChofProp'] == 'chofer') {
        // Si es chofer, redirigir a agregar vehículo
        redirect('vehiculo/agregarVehProp', 'refresh');
        
        // Luego, redirigir a agregar propietario del vehículo (deberás manejar esto en la vista del vehículo)
        // Esta lógica puede requerir un flujo adicional, ya que las redirecciones no se pueden hacer en cadena de esta manera.
    } else if ($data['detalleChofProp'] == 'propietario') {
        // Si es propietario, redirigir solo a agregar vehículo
        redirect('vehiculo/agregar', 'refresh');
    } else {
        // Redirigir a la lista de conductores si no coincide con ninguna opción
        redirect('conductor/listaConductores', 'refresh');
    }
}


    public function eliminarbd()
    {
        $idConductor = $_POST['idConductor'];
        $this->conductor_model->eliminarconductores($idConductor);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function modificar()
    {
        $id_conductor = $_POST['id_conductor'];
        $data['infoconductor'] = $this->conductor_model->recuperarconductores($idConductor);

        $this->load->view('inc/head');
        $this->load->view('formmodicond', $data);
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $idConductor = $_POST['idConductor'];
        $data['foto'] = $_POST['foto'];
        $data['nombre'] = strtoupper($_POST['nombre']);
        $data['primerApellido'] = strtoupper($_POST['primerApellido']);
        $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        $data['licencia'] = $_POST['licencia'];
        $data['telefono'] = $_POST['telefono'];
        $data['cuenta'] = $_POST['cuenta'];
        $data['codigo'] = md5($_POST['codigo']);
        $data['domicilio'] = $_POST['domicilio'];
        $data['detalleChofProp'] = $_POST['detalleChofProp'];


        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function deshabilitarbd()
    {
        $idConductor = $_POST['idConductor'];
        $data['disponible'] = '0';

        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function habilitarbd()
    {
        $idConductor = $_POST['idConductor'];
        $data['disponible'] = '1';

        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/deshabilitados', 'refresh');
    }
}
