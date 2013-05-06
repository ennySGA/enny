<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aspectos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('aspectosModel');
		$this->load->model('tiposModel');
     }

	function index(){
		$data['nombre']='Aspectos ambientales';
		$data['view'] = 'aspectos/aspectos';
		$data['aspectos'] = $this->aspectosModel->getAll();
		$this->load->view('template/body', $data);
	}

	function nuevo(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'tipo_id' => $this->input->post('tipo_id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'active' => 1
				);
			$this->aspectosModel->insertAspecto($data);
			redirect('tipos/ver/'.$data['tipo_id']);
		}else{
			$data['nombre']='Aspectos ambientales';
			$data['view'] = 'aspectos/nuevo';
			$this->load->view('template/body', $data);
		}
	}

	function ver(){
			$id=$this->uri->segment(3);
			$data['aspectos'] = $this->aspectosModel->getById($id);
			echo $data['aspectos'][0]->tipo_id;
			$data['tipos'] = $this->tiposModel->getById($id);
			$data['nombre']='Aspectos ambientales';
			$data['view'] ='aspectos/ver';
			$this->load->view('template/body', $data);

	}

	function eliminar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$aspecto = $this->aspectosModel->getById($id);
		$tipo_id = $aspecto[0]->tipo_id;
		//var_dump($cosa);
		$this->aspectosModel->deleteAspecto($data);
		redirect('tipos/ver/'.$tipo_id);
	}


	function editar(){
		$id = $this->uri->segment(3);
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'tipo_id' => $this->input->post('tipo_id'),
				);
			$this->aspectosModel->updateAspecto($data);
			//$this->aspectosModel->insertaspecto($data);
			redirect('tipos/ver/'.$data['tipo_id']);

		}else{
			$aspectoData = $this->aspectosModel->getById($id);
			$data['view'] = 'aspectos/editar';
			$data['nombre'] = $aspectoData[0]->nombre;
			$data['descripcion'] = $aspectoData[0]->descripcion;
			$data['tipo_id'] = $aspectoData[0]->tipo_id;
			$this->load->view('template/body', $data);
		}
	}
}