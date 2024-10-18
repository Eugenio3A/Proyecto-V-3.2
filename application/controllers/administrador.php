<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('cargos_model'); // Cargar el modelo de cargos
        }

	public function index()
	{
			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('inc/footer');
			$this->load->view('inc/pie');
	}

	public function usuario()
	{
		if($this->session->userdata('cuenta'))
		{

			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('inc/footer');
			$this->load->view('inc/pie');		
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
	}

	public function registrar()
	{
		
			$data['cargos'] = $this->cargos_model->listacargos();
			
			$this->load->view('formAdmin', $data);
			
		
	}


	public function registrarbd()
	{
		$data['nombre'] = strtoupper ($_POST['nombre']);
		$data['primerApellido'] = strtoupper ($_POST['primerApellido']);
		$data['segundoApellido'] = strtoupper ($_POST['segundoApellido']);
		$data['ciNit'] = $_POST['ciNit'];
		$data['cuenta'] = $_POST['cuenta'];
		$data['contrasena'] = md5($_POST['contrasena']);  // Para seguridad
		$data['turno'] = strtoupper ($_POST['turno']);

		$id = $_POST['id'];

		// Subir foto
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = $data['ciNit'] . ".jpg"; // Usar CI/NIT como nombre del archivo

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$data['foto'] = $config['file_name'];
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}

		$this->cargos_model->agregarCargo($id, $data);
		redirect('usuarios/index', 'refresh');
	}

	public function guest()
	{
		if($this->session->userdata('cuenta'))
		{ 
			$this->load->view('inc/header');
			$this->load->view('panelguest');
			$this->load->view('inc/footer');
		}
	}

	public function modificar()
	{
		$idUsuario = $_POST['idUsuario'];
		$data['infousuario'] = $this->usuario_model->recuperarUsuario($idUsuario);

		$data['cargos'] = $this->cargo_model->listarCargos(); // Para modificar el cargo si es necesario

		$this->load->view('inc/header');
		$this->load->view('modificar_usuario_form', $data);
		$this->load->view('inc/footer');
	}

	public function modificarbd()
	{
		$idUsuario = $_POST['idUsuario'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['ciNit'] = $_POST['ciNit'];
		$data['email'] = $_POST['email'];
		$data['turno'] = $_POST['turno'];
		$data['estado'] = $_POST['estado'];

		$nombrearchivo = $data['ciNit'] . ".jpg"; // Asignar el nombre de la foto

		// Configurar subida de archivos
		$config['upload_path'] = './uploads/';
		$config['file_name'] = $nombrearchivo;
		$config['allowed_types'] = 'jpg|png';
		$direccion = "./uploads/" . $nombrearchivo;

		if (file_exists($direccion)) {
			unlink($direccion);
		}

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$data['foto'] = $nombrearchivo;
		}

		$this->usuario_model->modificarUsuario($idUsuario, $data);
		redirect('usuario/index', 'refresh');
	}

	public function eliminarbd()
	{
		$idUsuario = $_POST['idUsuario'];
		$this->usuario_model->eliminarUsuario($idUsuario);
		redirect('usuario/index', 'refresh');
	}

	public function deshabilitarbd()
	{
		$idUsuario = $_POST['idUsuario'];
		$data['estado'] = '0'; // Estado deshabilitado

		$this->usuario_model->modificarUsuario($idUsuario, $data);
		redirect('usuario/index', 'refresh');
	}

	public function habilitarbd()
	{
		$idUsuario = $_POST['idUsuario'];
		$data['estado'] = '1'; // Estado habilitado

		$this->usuario_model->modificarUsuario($idUsuario, $data);
		redirect('usuario/deshabilitados', 'refresh');
	}

	public function deshabilitados()
	{
		$lista = $this->usuario_model->listarUsuariosDeshabilitados();
		$data['usuarios'] = $lista;

		$this->load->view('inc/header');
		$this->load->view('lista_usuarios_deshabilitados', $data);
		$this->load->view('inc/footer');
	}
}
