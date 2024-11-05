<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo correctamente
        $this->load->model('Solicitud_model');  // Asegúrate de que el nombre del modelo esté correctamente capitalizado
    }

    public function demo() {
        $this->load->view('inc/vistaslte/head');
        $this->load->view('inc/vistaslte/menu');
        $this->load->view('inc/vistaslte/test');
        $this->load->view('inc/vistaslte/footer');
    }

    public function movil() {
        if ($this->session->userdata('codigo')) {
            $listaRes = $this->Solicitud_model->listaReservasPendientes(); // Cambiado a listaReservasPendientes
            $data['reservas'] = $listaRes->result(); // Cambiado a 'reservas'
            
            $this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('listaRes', $data);
            $this->load->view('inc/pieLis');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function lista() {
        $data['solicitudes'] = $this->Solicitud_model->listaSolicPendientes(); // Devuelve un array

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('listaSolicitudes', $data);
        $this->load->view('inc/pieLis');
    }

    public function agregar() {
        // Cargar el modelo de clientes y vehículos
        $this->load->model('cliente_model');
        $this->load->model('Veiculo_model');
        $this->load->model('puesto_model');

        // Cargar clientes y vehículos desde la base de datos
        $data['clientes'] = $this->cliente_model->get_cliente(); // Cambiado a 'clientes'
        $data['vehiculos'] = $this->Veiculo_model->get_vehiculos();
        $data['parqueos'] = $this->puesto_model->getParqueos();


        // Cargar la vista con los datos
        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('formSolicitudes', $data);
        $this->load->view('inc/pieLis');
    }

    public function agregarbd() {
        // Cargar la librería de validación de formularios
        $this->load->library('form_validation');
    
        // Definir las reglas de validación
        $this->form_validation->set_rules('idCliente', 'Clientes', 'required');
        $this->form_validation->set_rules('idVehiculo', 'Vehículos', 'required');
        $this->form_validation->set_rules('idParqueo', 'Parqueos', 'required');
        // Otras reglas si es necesario
    
        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, cargar nuevamente la vista del formulario
            $data['clientes'] = $this->Solicitud_model->get_clientes();
            $data['vehiculos'] = $this->Solicitud_model->get_vehiculos();
            $data['parqueos'] = $this->Solicitud_model->get_parqueos();
            
            $this->load->view('formSolicitudes', $data); // Asegúrate de que la vista se llame correctamente
        } else {
            // Si la validación es exitosa, recoger los datos del formulario
            $data = array(
                'cliente_id' => $this->input->post('idCliente'),
                'vehiculo_id' => $this->input->post('idVehiculo'),
                'parqueo_id' => $this->input->post('idParqueo'),
                'nombreCliente' => $this->input->post('nombre'), // Asegúrate que este campo esté en tu tabla
                'telefonoCliente' => $this->input->post('telefono'), // Asegúrate que este campo esté en tu tabla
                'direccionCiente' => $this->input->post('direccion'), // Asegúrate que este campo esté en tu tabla
                'tipoServicio' => $this->input->post('tipo'),
                'nombreParqueo' => $this->input->post('nombreParq'), // Asegúrate que este campo esté en tu tabla
                'numConductor' => $this->input->post('numMovil'), // Asegúrate que este campo esté en tu tabla
                'idUsuario' => $this->input->post('idUsuario'),
                'fechaSolicitud' => date('Y-m-d H:i:s'), // O la fecha actual en el formato que desees
            );
    
            // Insertar datos en la tabla 'solicitudes'
            $insert_id = $this->Solicitud_model->insertarSolicitud($data);
            
            if ($insert_id) {
                // Redirigir a la lista de solicitudes o mostrar un mensaje de éxito
                $this->session->set_flashdata('success', 'Solicitud agregada correctamente.');
                redirect('solicitudes/lista'); // Ajusta la redirección a donde quieras
            } else {
                // Manejo de errores
                $this->session->set_flashdata('error', 'Error al agregar la solicitud.');
                redirect('solicitudes/agregar'); // Redirigir nuevamente al formulario
            }
        }
    }
    



    public function eliminarbd() {
        $id_reserva = $this->input->post('id_reserva');
        $this->Solicitud_model->eliminar_reserva($id_reserva); // Usando la función de eliminación de reservas
        redirect('Reservas/movil', 'refresh');
    }

    public function modificar()
	{
        $idSolicitud = $this->input->post('idSolicitud');
        $data['infosolicitud'] = $this->Solicitud_model->recuperarSolicitudes($idSolicitud); // Cambiado a 'infoReserva'

        $this->load->model('cliente_model');
        $this->load->model('Veiculo_model');
        $this->load->model('puesto_model');

        // Cargar clientes y vehículos desde la base de datos
        $data['clientes'] = $this->cliente_model->get_cliente(); // Cambiado a 'clientes'
        $data['vehiculos'] = $this->Veiculo_model->get_vehiculos();
        $data['parqueos'] = $this->puesto_model->getParqueos();


		$this->load->view('inc/head');
		$this->load->view('formmodiSolicitud',$data);
		$this->load->view('inc/pie');
	}

    public function modificarbd() {

        $this->load->library('form_validation');
        
    $this->form_validation->set_rules('idVehiculo', 'Vehículos', 'required');
    $this->form_validation->set_rules('idParqueo', 'Parqueos', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Si la validación falla, cargar nuevamente la vista del formulario
       
        $data['vehiculos'] = $this->Solicitud_model->get_vehiculos();
        $data['parqueos'] = $this->Solicitud_model->get_parqueos();
        

    $this->load->view('formSolicitudes', $data); 
       
} else {
    // Si la validación es exitosa, recoger los datos del formulario
    $idSolicitud=$_POST['idSolicitud'];
    $data = array(
        
        'vehiculo_id' => $this->input->post('idVehiculo'),
        'parqueo_id' => $this->input->post('idParqueo'),
        // Asegúrate que este campo esté en tu tabla
        'tipoServicio' => $this->input->post('tipo'),
        'nombreParqueo' => $this->input->post('nombreParq'), // Asegúrate que este campo esté en tu tabla
        'numConductor' => $this->input->post('numMovil'), // Asegúrate que este campo esté en tu tabla
        'idUsuario' => $this->input->post('idUsuario'),
        'fechaAsignacion' => date('Y-m-d H:i:s'), // O la fecha actual en el formato que desees
    );


    $insert_id = $this->Solicitud_model->modificarSolicitudes($idSolicitud,$data);
        
    if ($insert_id) {
        // Redirigir a la lista de solicitudes o mostrar un mensaje de éxito
        $this->session->set_flashdata('success', 'Solicitud agregada correctamente.');
        redirect('solicitudes/lista'); // Ajusta la redirección a donde quieras
    } else {
        // Manejo de errores
        $this->session->set_flashdata('error', 'Error al agregar la solicitud.');
        redirect('solicitudes/agregar'); // Redirigir nuevamente al formulario
    }

}
        
}      

    public function completadobd() {
        $idSolicitud=$_POST['idSolicitud'];
        $data['estado'] = 'completado'; // Cambiado a 'completada'

        $this->Solicitud_model->modificarSolicitudes($idSolicitud, $data); // Usando la función de modificación de reservas
        redirect('solicitudes/lista', 'refresh');
    }

    public function canceladobd()
	{
		$idSolicitud=$_POST['idSolicitud'];
		$data['estado']='cancelado';

		$this->Solicitud_model->modificarSolicitudes($idCliente,$data);
		redirect('solicitudes/lista','refresh');
	}

    public function deshabilitarbd()
	{
		$idSolicitud=$_POST['idSolicitud'];
		$data['estado']='pendiente';

		$this->solicitud_model->modificarEstado($idSolicitud,$data);
		redirect('solicitudes/lista','refresh');
	}

    public function listaCancelados() {
        $this->load->model('Solicitud_model');
        $data['solicitudes'] = $this->Solicitud_model->obtenerSolicitudesPorEstado('cancelado');
        
        $this->load->view('inc/head');
		$this->load->view('listaEstCanceldo',$data);
		$this->load->view('inc/pie');
    }

    public function listaAcignados() {
        $this->load->model('Solicitud_model');
        $data['solicitudes'] = $this->Solicitud_model->obtenerSolicitudesPorEstado('asignado');
        
        $this->load->view('inc/head');
		$this->load->view('listaEstAcignados',$data);
		$this->load->view('inc/pie');
    }

    public function listaCompletado() {
        $this->load->model('Solicitud_model');
        $data['solicitudes'] = $this->Solicitud_model->obtenerSolicitudesPorEstado('completado');
        
        $this->load->view('inc/head');
		$this->load->view('listaEstCompletado',$data);
		$this->load->view('inc/pie');
    }

    public function listaTotal() {
        $this->load->model('Solicitud_model');
        // Llamar al modelo sin filtrar por estados
        $data['solicitudes'] = $this->Solicitud_model->obtenerTodasLasSolicitudes();
        
        $this->load->view('inc/head');
        $this->load->view('listaEstTotal', $data); // Asegúrate de que listaEstTotal esté preparado para todos los estados
        $this->load->view('inc/pie');
    }
    

    public function deshabilitados()
	{
		$lista=$this->Solicitud_model->listadeshabilitados();
		$data['estado']=$lista;

		$this->load->view('inc/head');
		$this->load->view('listaEstSolicitud',$data);
		$this->load->view('inc/pie');
	}


    public function habilitarbd() {
        $idSolicitud = $this->input->post('idSolicitud');
        $data['estado'] = 'cancelado'; // Cambiado a 'pendiente'

        $this->Solicitud_model->modificarEstado($idSolicitud, $data); // Usando la función de modificación de reservas
        redirect('solicitudes/listaCancelados', 'refresh');
    }

    
    public function modificarEstado() {
        $idSolicitud = $this->input->post('idSolicitud');
        $nuevo_estado = $this->input->post('nuevo_estado');

        $estado_actual = $this->Solicitud_model->obtenerEstado($idSolicitud);
        if ($estado_actual === $nuevo_estado) {
            $this->session->set_flashdata('info', 'El estado ya es ' . $nuevo_estado . '.');
        } else if ($this->Solicitud_model->modificarEstado($idSolicitud, $nuevo_estado)) {
            $this->session->set_flashdata('success', 'Estado actualizado correctamente a ' . $nuevo_estado . '.');
        } else {
            $this->session->set_flashdata('error', 'No se pudo actualizar el estado. Estado no válido.');
        }

        redirect('solicitudes/lista');
    }

    public function contarSolicitudesUsuario($idUsuario) {
        $this->load->model('Solicitud_model');
        return $this->Solicitud_model->contarSolicitudes($idUsuario);
    }
    
    
    
    

}
