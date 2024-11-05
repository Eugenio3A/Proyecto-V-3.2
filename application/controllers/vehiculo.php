<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

    // Constructor para cargar los modelos necesarios
    public function __construct()
    {
        parent::__construct();
        $this->load->model('veiculo_model'); // Carga el modelo veiculo_model
        $this->load->model('propVehiculo_model'); // Carga el modelo propVehiculo_model
    }

    public function demo(){
        $this->load->view('inc/vistaslte/head');
        $this->load->view('inc/vistaslte/menu');
        $this->load->view('inc/vistaslte/test');
        $this->load->view('inc/vistaslte/footer');
    }

    public function curso()
    {
        if($this->session->userdata('login'))
        {
            $listaV = $this->veiculo_model->listaveiculo();
            $data['taxis'] = $listaV;

            $this->load->view('inc/head');
            $this->load->view('inc/menu');
            $this->load->view('listaV', $data);
            $this->load->view('inc/footer');
            $this->load->view('inc/pie');		
        }
        else
        {
            redirect('gerenteprop/index', 'refresh');
        }
    }

    public function deshabilitados()
    {
        $listaV = $this->veiculo_model->listadeshabilitados();
        $data['taxis'] = $listaV;

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('deshabilVeiculo', $data);
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function agregar()
    {
        $this->load->view('inc/head');
        $this->load->view('formVehiculo');
        $this->load->view('inc/pie');
    }

    public function agregarbd()
{
    // Obtener el ID del usuario actual desde la sesión
    $idUsuario = $this->session->userdata('idUsuario');
    
    // Recuperar el último idConductor registrado
    $this->db->select_max('idConductor'); // Selecciona el máximo idConductor
    $query = $this->db->get('conductores'); // Consulta la tabla conductores
    $resultado = $query->row(); // Obtiene la fila resultante

    // Verifica que se haya encontrado un idConductor
    if ($resultado && isset($resultado->idConductor)) {
        $data['conductor_id'] = $resultado->idConductor; // Usar el idConductor recuperado
    } else {
        // Manejar el caso donde no se encontró un conductor
        // Podrías redirigir o mostrar un mensaje de error
        echo "No se encontró un conductor registrado.";
        return;
    }

    // Rellenar los otros datos del vehículo
    $data['foto'] = $_POST['foto'];
    $data['numMovil'] = strtoupper($_POST['numMovil']);
    $data['numChasis'] = $_POST['numChasis'];
    $data['marca'] = strtoupper($_POST['marca']);
    $data['modelo'] = strtoupper($_POST['modelo']);
    $data['color'] = strtoupper($_POST['color']);
    $data['placa'] = strtoupper($_POST['placa']);
    $data['tipo'] = $_POST['tipo'];
    $data['idUsuario'] = $idUsuario; // Agregamos el ID del usuario logueado

    // Llamar al modelo para agregar el vehículo
    $this->veiculo_model->agregarveiculo($data);
    
    // Redirigir a la lista de conductores
    redirect('conductor/listaConductores', 'refresh');
}


    public function agregarVehProp()
    {
        $this->load->view('inc/head');
        $this->load->view('formPropVehiculo');
        $this->load->view('formVehiculo');
        $this->load->view('inc/pie');
    }

    public function agregarPropbd()
    {
        $idUsuario = $this->session->userdata('idUsuario'); 

        $data['ciNit'] = $_POST['ciNit'];
        $data['nombre'] = strtoupper($_POST['nombre']);
        $data['primerApellido'] = strtoupper($_POST['primerApellido']);
        $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        $data['telefono'] = $_POST['telefono'];
        $data['direccion'] = $_POST['direccion'];
        $data['idUsuario'] = $idUsuario; // Agregamos el ID del usuario logueado

        // Agregar propietario de vehículo
        $this->propVehiculo_model->agregarPropVehiculo($data);

        // Redirigir a la lista de conductores
        redirect('vehiculo/agregar');
    }

    public function eliminarbd()
    {
        $id_vehiculo = $_POST['id_vehiculo'];
        $this->veiculo_model->eliminarveiculo($id_vehiculo);
        redirect('vehiculo/curso', 'refresh');
    }

    public function modificar()
    {
        $id_vehiculo = $_POST['id_vehiculo'];
        $data['infoveiculo'] = $this->veiculo_model->recuperarveiculo($id_vehiculo);

        $this->load->view('inc/head');
        $this->load->view('inc/menuGt');
        $this->load->view('formmodVeiculo', $data);
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $id_vehiculo = $_POST['id_vehiculo'];
        $data['foto'] = ($_POST['foto']);
        $data['numMovil'] = strtoupper($_POST['numMovil']);
        $data['modelo'] = strtoupper($_POST['modelo']);
        $data['marca'] = strtoupper($_POST['marca']);
        $data['placa'] = strtoupper($_POST['placa']);
        $data['tipo'] = strtoupper($_POST['tipo']);

        $this->veiculo_model->modificarveiculo($id_vehiculo, $data);
        redirect('vehiculo/curso', 'refresh');
    }

    public function deshabilitarbd()
    {
        $id_vehiculo = $_POST['id_vehiculo'];
        $data['estado'] = '0';

        $this->veiculo_model->modificarveiculo($id_vehiculo, $data);
        redirect('vehiculo/curso', 'refresh');
    }

    public function habilitarbd()
    {
        $id_vehiculo = $_POST['id_vehiculo'];
        $data['estado'] = '1';

        $this->veiculo_model->modificarveiculo($id_vehiculo, $data);
        redirect('vehiculo/deshabilitados', 'refresh');
    }
}
