<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_aspectos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tipos_aspectosModel');
		$this->load->model('aspectosModel');
		
     }

	function index(){
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['tipos_aspectos'] = $this->tipos_aspectosModel->getAll();
		$data['view'] ='tipos_aspectos/tipos_aspectos';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['view'] ='tipos_aspectos/agregar';
		$this->load->view('template/body', $data);
	}

	function addTipo(){
		$guardar = $this->input->post('guardar');
		if($this->input->post('guardar')){
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'active' => 1
			);
		$this->tipos_aspectosModel->insertTipo($data);
		$data['tipos_aspectos'] = $this->tipos_aspectosModel->getAll();
		$this->load->view('tipos_aspectos/tipos_aspectos', $data);
		redirect('tipos_aspectos/tipos_aspectos', 'refresh');
		}// end if guardar
		else{
			$data['nombre']='Tipos de Aspectos ambientales';
			$data['view'] ='tipos_aspectos/addTipo';
			$this->load->view('template/body', $data);
			//$this->load->view('Tipos_aspectos/addTipo');
		}
	}//end addtipo

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Tipos de Aspectos ambientales';
		$data['tipos_aspectos'] = $this->tipos_aspectosModel->getById($id);
		$data['aspectos'] = $this->aspectosModel->getByTipoId($id);
		$data['view'] ='tipos_aspectos/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->tipos_aspectosModel->updateTipo($data);
			redirect('tipos_aspectos/tipos_aspectos', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$tipoData = $this->tipos_aspectosModel->getById($id);
			$data['view'] = 'tipos_aspectos/actualizar';
			$data['nombre'] = $tipoData[0]->nombre;
			$data['descripcion'] = $tipoData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->tipos_aspectosModel->deleteTipo($data);
		redirect('tipos_aspectos/tipos_aspectos', 'refresh');
	}
}