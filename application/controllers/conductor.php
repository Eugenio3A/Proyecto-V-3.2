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

    public function listaConductores()
    {
        if ($this->session->userdata('cuenta')) {
            // Cargar lista de conductores con detalles de vehículos y propietarios
            $lista2 = $this->conductor_model->listaconductoresConDetalles();
            $data['conductores'] = $lista2;

            $this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('lista2', $data); // Cambia 'lista2' si tu vista tiene otro nombre
            $this->load->view('inc/pieLis');
        } else {
            redirect('gerentpro/index', 'refresh');
        }
    }

    public function deshabilitados()
    {
        $listaConductoresDeshabilitados = $this->conductor_model->listadeshabilitados1();
        $data['conductores'] = $listaConductoresDeshabilitados;

        $this->load->view('inc/head');
        $this->load->view('deshabilconduc', $data);
        $this->load->view('inc/pie');
    }

    public function agregar()
    {
        
        $this->load->view('formconductor');
        $this->load->view('inc/pie');
    }

    public function agregarbd2()
    {
        $data = [
            'nombre' => strtoupper($this->input->post('nombre')),
            'primerApellido' => strtoupper($this->input->post('primerApellido')),
            'segundoApellido' => strtoupper($this->input->post('segundoApellido')),
            'licencia' => $this->input->post('licencia'),
            'telefono' => $this->input->post('telefono'),
            'domicilio' => $this->input->post('domicilio'),
            'antecedentes' => $this->input->post('antecedentes'),
            'foto' => $this->input->post('foto'),
            'detalleConductor' => $this->input->post('detalleConductor') // Campo para saber si es propietario
        ];

        // Agregar conductor y obtener el ID
        $idConductor = $this->conductor_model->agregarconductores($data);

        if ($data['detalleConductor'] == 1) {
            // Si es propietario, también agregar el vehículo
            $vehiculoData = [
                'conductor_id' => $idConductor,
                'identificador' => $this->input->post('identificador'),
                'foto' => $this->input->post('fotoVehiculo'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'anio' => $this->input->post('anio'),
                'color' => $this->input->post('color'),
                'placa' => $this->input->post('placa')
            ];
            $this->conductor_model->agregarVehiculo($vehiculoData);
        } else {
            // Si no es propietario, agregar el propietario del vehículo
            $propietarioData = [
                'ciNit' => $this->input->post('ciNitPropietario'),
                'nombre' => strtoupper($this->input->post('nombrePropietario')),
                'primerApellido' => strtoupper($this->input->post('primerApellidoPropietario')),
                'segundoApellido' => strtoupper($this->input->post('segundoApellidoPropietario')),
                'telefono' => $this->input->post('telefonoPropietario'),
                'direccion' => $this->input->post('direccionPropietario')
            ];
            $idPropietario = $this->conductor_model->agregarPropietario($propietarioData);

            // Relacionar el propietario con el vehículo
            $vehiculoData = [
                'conductor_id' => $idConductor,
                'identificador' => $this->input->post('identificador'),
                'foto' => $this->input->post('fotoVehiculo'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'anio' => $this->input->post('anio'),
                'color' => $this->input->post('color'),
                'placa' => $this->input->post('placa')
            ];
            $idVehiculo = $this->conductor_model->agregarVehiculo($vehiculoData);

            // Relacionar el vehículo y el propietario
            $this->conductor_model->relacionarVehiculoPropietario($idVehiculo, $idPropietario);
        }

        redirect('conductor/listaConductores', 'refresh');
    }

    public function eliminarbd()
    {
        $idConductor = $this->input->post('idConductor');
        $this->conductor_model->eliminarconductores($idConductor);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function modificar()
    {
        $idConductor = $this->input->post('idConductor');
        $data['infoconductor'] = $this->conductor_model->recuperarconductores($idConductor);

        // Cargar información del vehículo si es propietario
        $data['vehiculo'] = $this->conductor_model->obtenerVehiculoPorConductor($idConductor);

        $this->load->view('inc/head');
        $this->load->view('formmodicond', $data);
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $idConductor = $this->input->post('idConductor');
        $data = [
            'nombre' => strtoupper($this->input->post('nombre')),
            'primerApellido' => strtoupper($this->input->post('primerApellido')),
            'segundoApellido' => strtoupper($this->input->post('segundoApellido')),
            'licencia' => $this->input->post('licencia'),
            'telefono' => $this->input->post('telefono'),
            'domicilio' => $this->input->post('domicilio'),
            'antecedentes' => $this->input->post('antecedentes'),
            'foto' => $this->input->post('foto')
        ];

        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function deshabilitarbd()
    {
        $idConductor = $this->input->post('idConductor');
        $data['disponible'] = '0';

        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function habilitarbd()
    {
        $idConductor = $this->input->post('idConductor');
        $data['disponible'] = '1';

        $this->conductor_model->modificarconductores($idConductor, $data);
        redirect('conductor/deshabilitados', 'refresh');
    }
}
