<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

    // Constructor para cargar el modelo
    public function __construct()
    {
        parent::__construct();
        $this->load->model('veiculo_model'); // Carga el modelo conductor_model
    }


	public function demo(){
		$this->load->view('inc/vistaslte/head');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/test');
		$this->load->view('inc/vistaslte/footer');
	}

	public function curso()
	{
		if($this->session->userdata('login'))
		{
			$listaV=$this->veiculo_model->listaveiculo();
			$data ['taxis']=$listaV;

			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('listaV',$data);
			$this->load->view('inc/footer');
			$this->load->view('inc/pie');		
		}
		else
		{
			redirect('gerenteprop/index', 'refresh');
		}
		
	}

	public function deshabilitados()
	{
		$listaV=$this->veiculo_model->listadeshabilitados();
		$data['taxis']=$listaV;

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('deshabilVeiculo',$data);
		$this->load->view('inc/footer');
		$this->load->view('inc/pie');
	}

	public function agregar()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formVeiculo');
		$this->load->view('inc/footer');
		$this->load->view('inc/pie');
	}

	public function agregarbd()
	{
		$data['foto']=($_POST['foto']);
		$data['numMovil']=strtoupper($_POST['numMovil']);
		$data['modelo']=strtoupper($_POST['modelo']);
		$data['marca']=strtoupper($_POST['marca']);
        $data['placa']=strtoupper($_POST['placa']);
        $data['tipo']=strtoupper($_POST['tipo']);

		$this->veiculo_model->agregarveiculo($data);
		redirect('vehiculo/curso','refresh');
	}

	public function eliminarbd()
	{
		$id_vehiculo=$_POST['id_vehiculo'];
		$this->veiculo_model->eliminarveiculo($id_vehiculo);
		redirect('vehiculo/curso','refresh');
	}

	public function modificar()
	{
		$id_vehiculo=$_POST['id_vehiculo'];
		$data['infoveiculo']=$this->veiculo_model->recuperarveiculo($id_vehiculo);

		$this->load->view('inc/head');
		$this->load->view('inc/menuGt');
		$this->load->view('formmodVeiculo',$data);
		$this->load->view('inc/footer');
		$this->load->view('inc/pie');
	}

	
	public function modificarbd()
	{
		$id_vehiculo=$_POST['id_vehiculo'];
		$data['foto']=($_POST['foto']);
        $data['numMovil']=strtoupper($_POST['numMovil']);
		$data['modelo']=strtoupper($_POST['modelo']);
		$data['marca']=strtoupper($_POST['marca']);
        $data['placa']=strtoupper($_POST['placa']);
        $data['tipo']=strtoupper($_POST['tipo']);

		$this->veiculo_model->modificarveiculo($id_vehiculo,$data);
		redirect('vehiculo/curso','refresh');
	}

	
	public function deshabilitarbd()
	{
		$id_vehiculo=$_POST['id_vehiculo'];
		$data['estado']='0';

		$this->veiculo_model->modificarveiculo($id_vehiculo,$data);
		redirect('vehiculo/curso','refresh');
	}

	public function habilitarbd()
	{
		$id_vehiculo=$_POST['id_vehiculo'];
		$data['estado']='1';

		$this->veiculo_model->modificarveiculo($id_vehiculo,$data);
		redirect('vehiculo/deshabilitados','refresh');
	}

}
