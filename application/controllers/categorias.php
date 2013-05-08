<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('categoriasModel');
		$this->load->model('usuariosaModel');
		
     }

	function index(){
		$data['nombre']='Tipos de usuario';
		$data['categorias'] = $this->categoriasModel->getAll();
		$data['view'] ='categorias/categorias';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$data['nombre']='Tipos de usuario';
		$data['view'] ='categorias/agregar';
		$this->load->view('template/body', $data);
		//$this->load->view('categorias/nueva');
	}

	function addCategoria(){
		$guardar = $this->input->post('guardar');

		if($this->input->post('guardar')){

			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'active' => 1
			);
		
		$this->categoriasModel->insertCategoria($data);

		$data['categorias'] = $this->categoriasModel->getAll();
		$this->load->view('categorias/categorias', $data);
		redirect('categorias/categorias', 'refresh');
		}// end if guardar
		
		else{
			$data['nombre']='Tipos de usuario';
			$data['view'] ='categorias/addCategoria';
			$this->load->view('template/body', $data);
			//$this->load->view('categorias/addCategoria');
		}
	}//end addcategoria

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Tipos de usuario';
		$data['categorias'] = $this->categoriasModel->getById($id);
		$data['usuarios'] = $this->usuariosaModel->getByCategoriaId($id);
		$data['view'] ='categorias/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->categoriasModel->updateCategoria($data);
			redirect('categorias/categorias', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$categoriaData = $this->categoriasModel->getById($id);
			$data['view'] = 'categorias/actualizar';
			$data['nombre'] = $categoriaData[0]->nombre;
			$data['descripcion'] = $categoriaData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->categoriasModel->deleteCategoria($data);
		redirect('categorias/categorias', 'refresh');
	}
}