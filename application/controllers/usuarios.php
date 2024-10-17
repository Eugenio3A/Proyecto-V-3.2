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

	// VALIDAR USUARIO ADMINISTRADOR
	public function validarusuarioAdmin()
	{
		$login=$_POST['email'];
		$password=md5($_POST['contrasena']);

		echo $login;
		echo $password;
		$consulta=$this->usuario_model->validarAdmin($login,$password);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('tipo',$row->tipo);
				$this->session->set_userdata('estado',$row->estado);

				redirect('usuarios/panelAdmin','refresh');
			}
		}
		else
		{
			//acceso incorrecto - volvemos al login
			redirect('usuarios/index','refresh');
		}
	}

	public function panelAdmin()
	{
		if($this->session->userdata('email'))
		{
			redirect('cliente/usuario','refresh');
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
	}

	public function logoutAdmin()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index','refresh');
	}


	// VALIDAR USUARIO EMPLEADO(OPERADOR)

	public function validarusuarioEmp()
	{
		$login=$_POST['email'];
		$password=md5($_POST['contrasena']);

		echo $login;
		echo $password;
		$consulta=$this->usuario_model->validarEmp($login,$password);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('tipo',$row->tipo);
				$this->session->set_userdata('estado',$row->estado);

				redirect('usuarios/panelEmp','refresh');
			}
		}
		else
		{
			//acceso incorrecto - volvemos al login
			redirect('usuarios/index','refresh');
		}
	}

	public function panelEmp()
	{
		if($this->session->userdata('login'))
		{
			redirect('cliente/usuario','refresh');
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
	}

	public function logoutEmp()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index','refresh');
	}


	// VALIDAR USUARIO CONDUCTOR

	public function validarusuarioConduc()
	{
		$login=$_POST['email'];
		$password=md5($_POST['contrasena']);

		echo $login;
		echo $password;
		$consulta=$this->usuario_model->validarConduc($login,$password);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('tipo',$row->tipo);
				$this->session->set_userdata('estado',$row->estado);

				redirect('usuarios/panelConduc','refresh');
			}
		}
		else
		{
			//acceso incorrecto - volvemos al login
			redirect('usuarios/index','refresh');
		}
	}

	public function panelConduc()
	{
		if($this->session->userdata('login'))
		{
			redirect('cliente/usuario','refresh');
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
	}

	public function logoutConduc()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index','refresh');
	}


}


