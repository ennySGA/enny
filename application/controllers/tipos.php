<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tiposModel');
		$this->load->model('aspectosModel');
		
     }

	function index(){
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['tipos'] = $this->tiposModel->getAll();
		$data['view'] ='tipos/tipos';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['view'] ='tipos/agregar';
		$this->load->view('template/body', $data);
	}

	function addTipo(){
		$guardar = $this->input->post('guardar');

		if($this->input->post('guardar')){

			$data = array(
			'nombre' => $this->input->post('nombre'),
			'active' => 1
			);
		
		$this->tiposModel->insertTipo($data);

		$data['tipos'] = $this->tiposModel->getAll();
		$this->load->view('tipos/tipos', $data);
		redirect('tipos/tipos', 'refresh');
		}// end if guardar
		
		else{
			$data['nombre']='Tipos de Aspectos ambientales';
			$data['view'] ='tipos/addTipo';
			$this->load->view('template/body', $data);
			//$this->load->view('tipos/addTipo');
		}
	}//end addtipo

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['tipos'] = $this->tiposModel->getById($id);
		$data['aspectos'] = $this->aspectosModel->getByTipoId($id);
		$data['view'] ='tipos/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->tiposModel->updateTipo($data);
			redirect('tipos/tipos', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$tipoData = $this->tiposModel->getById($id);
			$data['view'] = 'tipos/actualizar';
			$data['nombre'] = $tipoData[0]->nombre;
			$data['descripcion'] = $tipoData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->tiposModel->deleteTipo($data);
		redirect('tipos/tipos', 'refresh');
	}
}