<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('nivelesModel');
		$this->load->model('legislacionesModel');
		
     }

	function index(){
		$data['nombre']='Nivel de legislación ambiental';
		$data['niveles'] = $this->nivelesModel->getAll();
		$data['view'] ='niveles/niveles';
		$this->load->view('template/body', $data);
	}

	function nuevoNivel(){
		$this->load->view('niveles/nuevo');
	}

	function addNivel(){
		$guardar = $this->input->post('guardar');

		if($this->input->post('guardar')){

			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'active' => 1
			);
		
		$this->nivelesModel->insertnivel($data);

		$data['niveles'] = $this->nivelesModel->getAll();
		$this->load->view('niveles/body', $data);
		redirect('niveles/niveles', 'refresh');
		}// end if guardar
		
		else{
			$data['nombre']='Nivel de legislación ambiental';
			$data['view'] ='niveles/addnivel';
			$this->load->view('template/body', $data);
			//$this->load->view('niveles/addnivel');
		}
	}//end addnivel

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Nivel de legislación ambiental';
		$data['niveles'] = $this->nivelesModel->getById($id);
		$data['legislaciones'] = $this->legislacionesModel->getBynivelId($id);
		$data['view'] ='niveles/ver';
		$this->load->view('template/body', $data);
	}

	function editar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->nivelesModel->updateNivel($data);
			redirect('niveles/niveles', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$nivelData = $this->nivelesModel->getById($id);
			$data['view'] = 'niveles/editar';
			$data['nombre'] = $nivelData[0]->nombre;
			$data['descripcion'] = $nivelData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function eliminar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->nivelesModel->deleteNivel($data);
		redirect('niveles/niveles', 'refresh');
	}
}