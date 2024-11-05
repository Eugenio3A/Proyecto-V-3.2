<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo correctamente
        $this->load->model('Reservas_model');  // Asegúrate de que el nombre del modelo esté correctamente capitalizado
    }

    public function demo() {
        $this->load->view('inc/vistaslte/head');
        $this->load->view('inc/vistaslte/menu');
        $this->load->view('inc/vistaslte/test');
        $this->load->view('inc/vistaslte/footer');
    }

    public function movil() {
        if ($this->session->userdata('codigo')) {
            $listaRes = $this->Reservas_model->listaReservasPendientes(); // Cambiado a listaReservasPendientes
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
        $data['reservas'] = $this->Reservas_model->listaReservasPendientes(); // Devuelve un array

        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('listaRes', $data);
        $this->load->view('inc/pieLis');
    }

    public function agregar() {
        // Cargar el modelo de clientes y vehículos
        $this->load->model('cliente_model');
        $this->load->model('Veiculo_model');

        // Cargar clientes y vehículos desde la base de datos
        $data['clientes'] = $this->cliente_model->get_cliente(); // Cambiado a 'clientes'
        $data['vehiculos'] = $this->Veiculo_model->get_vehiculos();

        // Cargar la vista con los datos
        $this->load->view('inc/head');
        $this->load->view('inc/cabeza');
        $this->load->view('formReservas', $data);
        $this->load->view('inc/pieLis');
    }

    public function agregarbd()
{
    $this->load->model('reservas_model'); // Asegúrate de que el modelo de reservas está cargado.

    $data = array(
        'cliente_id' => $this->input->post('idCliente'),
        'nombreCliente' => $this->input->post('nombre'),
        'telefono' => $this->input->post('telefono'),
        'tipoServicio' => $this->input->post('tipoServicio'),
        'fechaReserva' => $this->input->post('fechaReserva'),
        'idUsuario' => $this->input->post('idUsuario'), // Capturamos el ID del usuario
    );

    // Llama al modelo para insertar la reserva
    if ($this->reservas_model->insertarReserva($data)) {
        // Puedes redirigir a una página de éxito o mostrar un mensaje
        $this->session->set_flashdata('success', 'Reserva creada con éxito.');
        redirect('reservas/lista'); // Cambia a la ruta correcta
    } else {
        // Manejar el error
        $this->session->set_flashdata('error', 'Error al crear la reserva. Intenta nuevamente.');
        redirect('reservas/formReservas'); // Regresar al formulario
    }
}


    public function eliminarbd() {
        $id_reserva = $this->input->post('id_reserva');
        $this->Reservas_model->eliminar_reserva($id_reserva); // Usando la función de eliminación de reservas
        redirect('Reservas/movil', 'refresh');
    }

    public function modificar() {
        $id_reserva = $this->input->post('id_reserva');
        $data['infoReserva'] = $this->Reservas_model->recuperarestaurante($id_reserva); // Cambiado a 'infoReserva'

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('formmodificar', $data);
        $this->load->view('inc/footer');
        $this->load->view('inc/pie');
    }

    public function modificarbd() {
        $id_reserva = $this->input->post('id_reserva');
        $data = array(
            'nombreCliente' => strtoupper($this->input->post('nombreCliente')),
            'telefono' => $this->input->post('telefono'),
            'tipoServicio' => $this->input->post('tipoServicio'),
            'estado' => $this->input->post('estado'), // Cambiado a 'estado'
        );

        $this->Reservas_model->modificarReserva($id_reserva, $data); // Usando la función de modificación de reservas
        redirect('Reservas/movil', 'refresh');
    }

    public function deshabilitarbd() {
        $idReserva = $this->input->post('idReserva');
        $data['estado'] = 'completada'; // Cambiado a 'completada'

        $this->Reservas_model->modificarReserva($idReserva, $data); // Usando la función de modificación de reservas
        redirect('Reservas/lista', 'refresh');
    }

    public function deshabilitados()
	{
		$listaRes=$this->Reservas_model->listaReservasCompletadas();
		$data['estado']=$listaRes;

		$this->load->view('inc/head');
		$this->load->view('listaconfRes',$data);
		$this->load->view('inc/pie');
	}


    public function habilitarbd() {
        $idReserva = $this->input->post('idReserva');
        $data['estado'] = 'pendiente'; // Cambiado a 'pendiente'

        $this->Reservas_model->modificarReserva($idReserva, $data); // Usando la función de modificación de reservas
        redirect('Reservas/deshabilitados', 'refresh');
    }

    public function modificarEstado() {
        $idReserva = $this->input->post('idReserva');
        $nuevo_estado = $this->input->post('nuevo_estado');
    
        // Cargar el modelo
        $this->load->model('Reservas_model');
    
        // Crear un arreglo con los datos a actualizar
        $data = array(
            'estado' => $nuevo_estado,
            'fechaActualizacion' => date('Y-m-d H:i:s') // Actualiza la fecha de actualización
        );
    
        // Actualizar el estado en la base de datos
        if ($this->Reservas_model->modificarReserva($idReserva, $data)) {
            $this->session->set_flashdata('mensaje', 'Estado de la reserva actualizado con éxito.');
        } else {
            $this->session->set_flashdata('error', 'Error al actualizar el estado de la reserva.');
        }
    
        // Redirigir a la lista de reservas
        redirect('reservas/lista');
    }

    public function listaCancelados() {
        $this->load->model('Reservas_model');
        $data['solicitudes'] = $this->Reservas_model->obtenerReservasPorEstado('cancelado');
        
        $this->load->view('inc/head');
		$this->load->view('listaEstCanceldo',$data);
		$this->load->view('inc/pie');
    }
}
