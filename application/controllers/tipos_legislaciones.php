<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_legislaciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tipos_legislacionesModel');
		$this->load->model('legislacionesModel');
		
     }

	function index(){
		$data['nombre']='Nivel de legislación ambiental';
		$data['tipos_legislaciones'] = $this->tipos_legislacionesModel->getAll();
		$data['view'] ='tipos_legislaciones/tipos_legislaciones';
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$this->load->view('tipos_legislaciones/agregar');
	}

	function addNivel(){
		$guardar = $this->input->post('guardar');

		if($this->input->post('guardar')){

			$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'active' => 1
			);
		
		$this->tipos_legislacionesModel->insertnivel($data);

		$data['tipos_legislaciones'] = $this->tipos_legislacionesModel->getAll();
		$this->load->view('tipos_legislaciones/body', $data);
		redirect('tipos_legislaciones/tipos_legislaciones', 'refresh');
		}// end if guardar
		
		else{
			$data['nombre']='Nivel de legislación ambiental';
			$data['view'] ='tipos_legislaciones/addnivel';
			$this->load->view('template/body', $data);
			//$this->load->view('tipos_legislaciones/addnivel');
		}
	}//end addnivel

	function ver(){
		$id=$this->uri->segment(3);
		$data['nombre']='Nivel de legislación ambiental';
		$data['tipos_legislaciones'] = $this->tipos_legislacionesModel->getById($id);
		$data['legislaciones'] = $this->legislacionesModel->getBynivelId($id);
		$data['view'] ='tipos_legislaciones/ver';
		$this->load->view('template/body', $data);
	}

	function actualizar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data['id'] = $this->input->post('id');
			$data['nombre'] = $this->input->post('nombre');
			$data['descripcion'] = $this->input->post('descripcion');
			$this->tipos_legislacionesModel->updateNivel($data);
			redirect('tipos_legislaciones/tipos_legislaciones', 'refresh');		

		}else{
			$id = $this->uri->segment(3);
			$nivelData = $this->tipos_legislacionesModel->getById($id);
			$data['view'] = 'tipos_legislaciones/actualizar';
			$data['nombre'] = $nivelData[0]->nombre;
			$data['descripcion'] = $nivelData[0]->descripcion;
			$this->load->view('template/body', $data);
		}
	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$this->tipos_legislacionesModel->deleteNivel($data);
		redirect('tipos_legislaciones/tipos_legislaciones', 'refresh');
	}
}