<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo correctamente
        $this->load->model('resevas_model');  // Aquí carga el modelo
    }


	public function demo(){
		$this->load->view('inc/vistaslte/head');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/test');
		$this->load->view('inc/vistaslte/footer');
	}

	public function movil()
	{
		if($this->session->userdata('login'))
		{
			$listaRes=$this->resevas_model->listaestudiantes();
			$data ['alumnos']=$listaRes;
			
			$this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('listaRes',$data);
            $this->load->view('inc/pieLis');
				
		}
		else
		{
			redirect('usuarios/index','refresh');
		}


		
	}

	public function lista()
	{
			$listaRes=$this->resevas_model->listaestudiantes();
			$data ['alumnos']=$listaRes;
			
			$this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('listaRes',$data);
            $this->load->view('inc/pieLis');
				
	}

	public function inscribir()
	{
		if($this->session->userdata('login'))
		{ 
			$data['infocarreras']=$this->carrera_model->listaCarreras();
			
			$this->load->view('inc/head');
			$this->load->view('inc/menuGt');
			$this->load->view('inscribirform',$data);
			$this->load->view('inc/footer');
			$this->load->view('inc/pie');	
		}
		else
		{
			redirect('usuarios/panel','refresh');
		}
	}

	public function inscribirbd()
	{
		$data['fechaServicio']=strtoupper($_POST['fechaServicio']);
		$data['origen']=strtoupper($_POST['origen']);
		$data['destino']=strtoupper($_POST['destino']);
		$data['precio']=$_POST['precio'];
		$id_vehiculo=$_POST['id_vehiculo'];

		$this->carrera_model->inscribirestudiante($id_vehiculo,$data);
		redirect('Reservas/movil','refresh');
	}

	public function guest()
	{
		if($this->session->userdata('login'))
		{ 
			$this->load->view('inc/header');
			$this->load->view('panelguest');
			$this->load->view('inc/footer');
		}
	}

	public function deshabilitados()
	{
		$listaRes=$this->resevas_model->listadeshabilitados();
		$data['alumnos']=$listaRes;

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('deshabilitados',$data);
		$this->load->view('inc/pie');
	}

	public function agregar()
	{
		

		$this->load->view('inc/head');
		$this->load->view('inc/cabeza');
		$this->load->view('formReservas');
		
		$this->load->view('inc/pieLis');
		
	}
	public function agregarU() {
        // Asegúrate de cargar el modelo correcto
        $this->load->model('cliente_model'); // Carga el modelo de usuarios
        $this->load->model('Veiculo_model'); // Carga el modelo de vehículos

        // Cargar usuarios y vehículos desde la base de datos
        $data['usuarios'] = $this->cliente_model->get_cliente();
        $data['vehiculos'] = $this->Veiculo_model->get_vehiculos();

        // Cargar la vista con los datos
        $this->load->view('reservas/agregar', $data);
    }

	public function agregarbd()
	{
			// Lógica para insertar los datos de la reserva en la base de datos
			$this->load->model('resevas_model');
			
			$data = array(
				'fechaServicio' => $this->input->post('fechaServicio'),
				'origen' => $this->input->post('origen'),
				'destino' => $this->input->post('destino'),
				'precio' => $this->input->post('precio'),
				'estado' => $this->input->post('estado'),
				'id_usuario' => $this->input->post('id_usuario'),
				'id_vehiculo' => $this->input->post('id_vehiculo')
			);
		$this->resevas_model->agregarestudiante($data);
		redirect('Reservas/movil','refresh');
	}


	
	

	public function eliminarbd()
	{
		$id_reserva=$_POST['id_reserva'];
		$this->resevas_model->eliminarestudiante($id_reserva);
		redirect('reservas/movil','refresh');
	}

	
    public function eliminar() {
        // Cargar el modelo
		$id_reserva=$_POST['id_reserva'];

        // Llamar al método eliminar_reserva del modelo
        $resultado = $this->resevas_model->eliminar_reserva($id_reserva);

        if ($resultado) {
            // Redirigir o mostrar mensaje de éxito
            $this->session->set_flashdata('mensaje', 'Reserva eliminada correctamente.');
        } else {
            // Mostrar mensaje de error
            $this->session->set_flashdata('error', 'No se pudo eliminar la reserva.');
        }

        // Redirigir a la página donde se listan las reservas
        redirect('reservas/movil');
    }

	public function modificar()
	{
		$id_reserva=$_POST['id_reserva'];
		$data['infoestudiante']=$this->resevas_model->recuperarestudiante($id_reserva);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formmodificar',$data);
		$this->load->view('inc/footer');
		$this->load->view('inc/pie');
	}

	public function modificarbd()
	{
		$id_reserva=$_POST['id_reserva'];
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['familia']=strtoupper($_POST['familia']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['telefono']=$_POST['telefono'];

		$this->Resevas_model->modificarestudiante($id_reserva,$data);
		redirect('Reservas/movil','refresh');
	}

	public function deshabilitarbd()
	{
		$id_reserva=$_POST['id_reserva'];
		$data['estado']='completada';

		$this->resevas_model->modificarestudiante($id_reserva,$data);
		redirect('Reservas/movil','refresh');
	}

	public function habilitarbd()
	{
		$id_reserva=$_POST['id_reserva'];
		$data['estado']='pendiente';

		$this->Resevas_model->modificarestudiante($id_reserva,$data);
		redirect('Reservas/deshabilitados','refresh');
	}

}
