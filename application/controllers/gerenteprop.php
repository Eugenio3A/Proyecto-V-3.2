<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerenteprop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gerente_model'); // Cargando el modelo
	}

	public function index()
	{
		$this->load->view('inc/vistaslte/head');
		$this->load->view('loginGrt');
		$this->load->view('inc/vistaslte/footer');
		$this->load->view('inc/vistaslte/test');
	}

	public function validarusuario1()
	{
		$login = $this->input->post('login'); // Usando input->post para mayor seguridad
		$password = md5($this->input->post('codigo'));

		echo $login;
		echo $password;

		$consulta = $this->gerente_model->validar($login, $password);

		echo $consulta->num_rows();

		if($consulta->num_rows() > 0)
		{
			echo 'inicio de sesion';
			// Usuario válido
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idGerente', $row->idGerente);
				$this->session->set_userdata('login', $row->login);
				$this->session->set_userdata('tipo', $row->tipo);

				redirect('gerenteprop/panel', 'refresh');
			}
		}
		else
		{
			// Acceso incorrecto - volvemos al login
			redirect('gerenteprop/index', 'refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('login'))
		{
			redirect('conductor/curso', 'refresh');
		}
		else
		{
			redirect('gerenteprop/index', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('gerenteprop/index', 'refresh');
	}
}
