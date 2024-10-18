<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function demo(){
		$this->load->view('inc/vistaslte/head');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/test');
		$this->load->view('inc/vistaslte/footer');
	}
	

	public function listaClientes()
	{
		$lista=$this->cliente_model->listaclientes();
		$data ['personas']=$lista;

		$this->load->view('inc/head');
		$this->load->view('inc/cabeza');
		$this->load->view('lista',$data);
		$this->load->view('inc/pieLis');
	}

	public function listaSolic()
	{
		$this->load->model('solicitudes_model');
		$listaSolicitudes=$this->solicitudes_model->listarSolic();
		$data ['usuarios']=$listaSolicitudes;

		$this->load->view('inc/head');
		
		$this->load->view('listaSolicitudes',$data);
		$this->load->view('inc/pie');
	}

	public function buscarPorMovil() {
		$numeroMovil = $this->input->post('numero_movil');
		
		// Llama al modelo para obtener los datos
		$data['usuarios'] = $this->solicitudes_model->obtenerPorMovil($numeroMovil);
		
		// Cargar la vista con los datos encontrados
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('listaSolicitudes', $data);
		$this->load->view('inc/pie');
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
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['familia']=strtoupper($_POST['familia']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['telefono']=$_POST['telefono'];
		$id_vehiculo=$_POST['id_vehiculo'];

		$this->carrera_model->inscribirestudiante($id_vehiculo,$data);
		redirect('cliente/usuario','refresh');
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
		$lista=$this->cliente_model->listadeshabilitados();
		$data['personas']=$lista;

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('deshabilitados',$data);
		$this->load->view('inc/pie');
	}

	public function agregar()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formulario');
		$this->load->view('inc/pie');
	}

	public function agregarbd()
	{
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['familia']=strtoupper($_POST['familia']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['telefono']=$_POST['telefono'];

		$this->cliente_model->agregarcliente($data);
		redirect('cliente/usuario','refresh');
	}

	public function eliminarbd()
	{
		$id_usuario=$_POST['id_usuario'];
		$this->cliente_model->eliminarcliente($id_usuario);
		redirect('cliente/usuario','refresh');
	}

	public function modificar()
	{
		$id_usuario=$_POST['id_usuario'];
		$data['infoestudiante']=$this->cliente_model->recuperarcliente($id_usuario);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formmodificar',$data);
		$this->load->view('inc/pie');
	}

	public function modificarbd()
	{
		$id_usuario=$_POST['id_usuario'];
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['familia']=strtoupper($_POST['familia']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['telefono']=$_POST['telefono'];

		$this->cliente_model->modificarcliente($id_usuario,$data);
		redirect('cliente/usuario','refresh');
	}

	public function deshabilitarbd()
	{
		$id_usuario=$_POST['id_usuario'];
		$data['activo']='0';

		$this->cliente_model->modificarcliente($id_usuario,$data);
		redirect('cliente/usuario','refresh');
	}

	public function habilitarbd()
	{
		$id_usuario=$_POST['id_usuario'];
		$data['activo']='1';

		$this->cliente_model->modificarcliente($id_usuario,$data);
		redirect('cliente/deshabilitados','refresh');
	}

	

}


