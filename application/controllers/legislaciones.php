<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legislaciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('legislacionesModel');
		$this->load->model('nivelesModel');
     }

	function index(){
		$data['nombre']='Legislación ambiental';
		$data['view'] = 'legislaciones/legislaciones';
		$data['legislaciones'] = $this->legislacionesModel->getAll();
		$this->load->view('template/body', $data);
	}

	function agregar(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'nivel_id' => $this->input->post('nivel_id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'active' => 1
				);
			$this->legislacionesModel->insertLegislacion($data);
			redirect('niveles/ver/'.$data['nivel_id']);
		}else{
			$data['nombre']='Legislación ambiental';
			$data['view'] = 'legislaciones/agregar';
			$this->load->view('template/body', $data);
		}
	}

	function ver(){
			$id=$this->uri->segment(3);
			$data['legislaciones'] = $this->legislacionesModel->getById($id);
			echo $data['legislaciones'][0]->nivel_id;
			$data['niveles'] = $this->nivelesModel->getById($id);
			$data['nombre']='Legislación ambiental';
			$data['view'] ='legislaciones/ver';
			$this->load->view('template/body', $data);

	}

	function borrar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$legislacion = $this->legislacionesModel->getById($id);
		$nivel_id = $legislacion[0]->nivel_id;
		//var_dump($cosa);
		$this->legislacionesModel->deleteLegislacion($data);
		redirect('niveles/ver/'.$nivel_id);
	}


	function actualizar(){
		$id = $this->uri->segment(3);
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'nivel_id' => $this->input->post('nivel_id'),
				);
			$this->legislacionesModel->updateLegislacion($data);
			//$this->legislacionesModel->insertlegislacion($data);
			redirect('niveles/ver/'.$data['nivel_id']);

		}else{
			$legislacionData = $this->legislacionesModel->getById($id);
			$data['view'] = 'legislaciones/actualizar';
			$data['nombre'] = $legislacionData[0]->nombre;
			$data['descripcion'] = $legislacionData[0]->descripcion;
			$data['nivel_id'] = $legislacionData[0]->nivel_id;
			$this->load->view('template/body', $data);
		}
	}
}