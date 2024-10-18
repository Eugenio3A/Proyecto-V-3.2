<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	// Constructor para cargar el modelo
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model'); // Carga el modelo conductor_model
    }

	public function index()
	{
		$this->load->view('inc/vistaslte/head');
		$this->load->view('loginform');
		$this->load->view('inc/vistaslte/footer');
		$this->load->view('inc/vistaslte/test');
	}

	public function validarusuario()
	{
		$login=$_POST['cuenta'];
		$password=md5($_POST['contrasena']);

		echo $login;
		echo $password;
		$consulta=$this->usuario_model->validar($login,$password);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('cuenta',$row->cuenta);
				$this->session->set_userdata('tipo',$row->tipo);
				$this->session->set_userdata('estado',$row->estado);

				redirect('usuarios/panel','refresh');
			}
		}
		else
		{
			//acceso incorrecto - volvemos al login
			redirect('usuarios/index','refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('cuenta'))
		{
			redirect('administrador/usuario','refresh');
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index','refresh');
	}

}