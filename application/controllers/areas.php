<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('areasModel');
		$this->load->model('actividadesModel');
		
     }

	function index(){
		$data['nombre']='Areas';
		$data['areas'] = $this->areasModel->getAll();
		$data['view'] ='areas/areas';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$data['nombre']='Areas';
		$data['view'] ='areas/agregar';
		$this->load->view('template/body', $data);
	}

	function addArea(){
		$guardar = $this->input->post('guardar');
		if($this->input->post('guardar')){
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'tipo' => $this->input->post('tipo'),
			'active' => 1
			);
		$this->areasModel->insertArea($data);
		$data['nombre']='Áreas';
		$data['areas'] = $this->areasModel->getAll();
		$data['view'] ='areas/areas';
		$this->load->view('template/body', $data);
		redirect('areas/areas', 'refresh');
		}// end if guardar
		
		else{
			$data['nombre']='Areas';
			$data['view'] ='areas/addArea';
			$this->load->view('template/body', $data);
		}
	}//end addArea

	function ver(){
		$id=$this->uri->segment(3);
		$data['areas'] = $this->areasModel->getById($id);
		$data['actividades'] = $this->actividadesModel->getByAreaId($id);
		$data['view'] ='areas/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$data['tipo'] = $this->input->post('tipo');
			$this->areasModel->updateArea($data);
			redirect('areas/areas', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$areaData = $this->areasModel->getById($id);
			$data['view'] = 'areas/actualizar';
			$data['nombre'] = $areaData[0]->nombre;
			$data['descripcion'] = $areaData[0]->descripcion;
			$data['tipo'] = $areaData[0]->tipo;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->areasModel->deleteArea($data);
		redirect('areas/areas', 'refresh');
	}
}