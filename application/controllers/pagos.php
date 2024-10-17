<?php
class Pagos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pagos_model');
        $this->load->helper('url');
    }

    // Ver todos los pagos
    public function index() {
            $this->load->model('Pagos_model');
            $data['pagos'] = $this->Pagos_model->obtener_pagos();
            
            // Verifica si $pagos es un array o un objeto de resultados
            if (empty($data['pagos'])) {
                $data['pagos'] = []; // Si no hay datos, pasa un array vacío
            }
        
            $this->load->view('inc/head');
            $this->load->view('inc/cabeza');
            $this->load->view('listaPag',$data);
            $this->load->view('inc/pieLis');
    }

    // Crear un nuevo pago
    public function crear() {
        if ($this->input->post()) {
            $data = array(
                'monto' => $this->input->post('monto'),
                'metodo' => $this->input->post('metodo'),
                'estado' => $this->input->post('estado'),
                'idUsuario' => $this->input->post('idUsuario'),
                'id_reserva' => $this->input->post('id_reserva')
            );
            $this->Pagos_model->crear_pago($data);
            redirect('pagos');
        } else {
            $this->load->view('pagos/index');
        }
    }


    public function agregar()
	{
		$this->load->view('crear');
		
	}

	public function agregarbd()
	{
		$data['monto']=strtoupper($_POST['monto']);
		$data['metodo']=strtoupper($_POST['metodo']);
		$data['estado']=strtoupper($_POST['estado']);
		$data['idUsuario']=$_POST['idUsuario'];
        $data['id_reserva']=$_POST['id_reserva'];

		$this->Pagos_model->crear_pago($data);
		redirect('pagos/index','refresh');
	}

    // Actualizar un pago
    public function editar($id_pago) {
        $data['pago'] = $this->Pagos_model->obtener_pagos($id_pago);
        
        if ($this->input->post()) {
            $update_data = array(
                'monto' => $this->input->post('monto'),
                'metodo' => $this->input->post('metodo'),
                'estado' => $this->input->post('estado'),
                'idUsuario' => $this->input->post('idUsuario'),
                'id_reserva' => $this->input->post('id_reserva')
            );
            $this->Pagos_model->actualizar_pago($id_pago, $update_data);
            redirect('pagos');
        } else {
            $this->load->view('pagos/editar', $data);
        }
    }

    // Eliminar un pago
    public function eliminar($id_pago) {
        $this->Pagos_model->eliminar_pago($id_pago);
        redirect('pagos');
    }
}
?>
