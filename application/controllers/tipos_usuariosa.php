<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_usuariosa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tipos_usuariosaModel');
		$this->load->model('usuariosaModel');
		
     }

	function index(){
		$data['nombre']='Tipos de usuario';
		$data['tipos_usuariosa'] = $this->tipos_usuariosaModel->getAll();
		$data['view'] ='tipos_usuariosa/tipos_usuariosa';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$data['nombre']='Tipos de usuario';
		$data['view'] ='tipos_usuariosa/agregar';
		$this->load->view('template/body', $data);
	}

	function addCategoria(){
		$guardar = $this->input->post('guardar');
		if($this->input->post('guardar')){
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'active' => 1
			);
		$this->tipos_usuariosaModel->insertCategoria($data);
		$data['tipos_usuariosa'] = $this->tipos_usuariosaModel->getAll();
		$this->load->view('tipos_usuariosa/tipos_usuariosa', $data);
		redirect('tipos_usuariosa/tipos_usuariosa', 'refresh');
		}// end if guardar
		else{
			$data['nombre']='Tipos de usuario';
			$data['view'] ='tipos_usuariosa/addCategoria';
			$this->load->view('template/body', $data);
			//$this->load->view('tipos_usuariosa/addCategoria');
		}
	}//end addcategoria

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Tipos de usuario';
		$data['tipos_usuariosa'] = $this->tipos_usuariosaModel->getById($id);
		$data['usuarios'] = $this->usuariosaModel->getByCategoriaId($id);
		$data['view'] ='tipos_usuariosa/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->tipos_usuariosaModel->updateCategoria($data);
			redirect('tipos_usuariosa/tipos_usuariosa', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$categoriaData = $this->tipos_usuariosaModel->getById($id);
			$data['view'] = 'tipos_usuariosa/actualizar';
			$data['nombre'] = $categoriaData[0]->nombre;
			$data['descripcion'] = $categoriaData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->tipos_usuariosaModel->deleteCategoria($data);
		redirect('tipos_usuariosa/tipos_usuariosa', 'refresh');
	}
}