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
            $data['conductores'] = $this->conductor_model->listaconductoresConDetalles();
            
            $this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('lista2', $data);
            $this->load->view('inc/pieLis');
        } else {
            redirect('gerentpro/index', 'refresh');
        }
    }

    public function deshabilitados()
    {
        $data['conductores'] = $this->conductor_model->listadeshabilitados1();

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
        // Obtener datos del formulario
        $data = [
            'nombre' => strtoupper($this->input->post('nombre')),
            'primerApellido' => strtoupper($this->input->post('primerApellido')),
            'segundoApellido' => strtoupper($this->input->post('segundoApellido')),
            'foto' => $this->input->post('foto'),
            'detalleConductor' => $this->input->post('esPropietario') == 1 ? 'propietario' : 'conductor',
            'estado' => 1 // Por defecto, el conductor está habilitado
        ];

        // Agregar conductor y obtener el ID
        $idConductor = $this->conductor_model->agregarconductores($data);

        // Verificar si es propietario
        $esPropietario = $this->input->post('esPropietario');

        // Datos del vehículo
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

        if ($esPropietario == 1) {
            // Si es propietario, agregar el vehículo
            $this->conductor_model->agregarVehiculo($vehiculoData);
        } else {
            // Si no es propietario, agregar el propietario del vehículo
            $propietarioData = [
                'ciNit' => $this->input->post('ciNit'),
                'nombre' => strtoupper($this->input->post('nombrePropietario')),
                'primerApellido' => strtoupper($this->input->post('primerApellidoPropietario')),
                'segundoApellido' => strtoupper($this->input->post('segundoApellidoPropietario')),
                'telefono' => $this->input->post('telefonoPropietario'),
                'direccion' => $this->input->post('direccionPropietario')
            ];
            $idPropietario = $this->conductor_model->agregarPropietario($propietarioData);
            
            // Agregar el vehículo relacionado
            $idVehiculo = $this->conductor_model->agregarVehiculo($vehiculoData);

            // Relacionar el vehículo y el propietario
            $this->conductor_model->relacionarVehiculoPropietario($idVehiculo, $idPropietario);
        }

        redirect('conductor/listaConductores', 'refresh');
    }

    public function editar($id)
    {
        // Cargar datos del conductor para editar
        $data['conductor'] = $this->conductor_model->obtenerConductorPorId($id);
        $this->load->view('editar_conductor', $data);
        $this->load->view('inc/pie');
    }

    public function actualizar($id)
    {
        // Obtener datos del formulario
        $data = [
            'nombre' => strtoupper($this->input->post('nombre')),
            'primerApellido' => strtoupper($this->input->post('primerApellido')),
            'segundoApellido' => strtoupper($this->input->post('segundoApellido')),
            'foto' => $this->input->post('foto'),
            'estado' => $this->input->post('estado')
        ];

        // Actualizar conductor
        $this->conductor_model->actualizarConductor($id, $data);

        redirect('conductor/listaConductores', 'refresh');
    }

    public function eliminar($id)
    {
        // Eliminar conductor
        $this->conductor_model->eliminarConductor($id);
        redirect('conductor/listaConductores', 'refresh');
    }

    public function deshabilitar($id)
    {
        // Cambiar el estado a deshabilitado
        $this->conductor_model->cambiarEstadoConductor($id, 0); // 0 para deshabilitar
        redirect('conductor/listaConductores', 'refresh');
    }

    public function habilitar($id)
    {
        // Cambiar el estado a habilitado
        $this->conductor_model->cambiarEstadoConductor($id, 1); // 1 para habilitar
        redirect('conductor/deshabilitados', 'refresh');
    }
}
