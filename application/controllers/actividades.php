<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('actividadesModel');
		$this->load->model('areasModel');
     }

	function index(){
		$data['nombre']='Actividades';
		$data['view'] = 'actividades/actividades';
		$data['actividades'] = $this->actividadesModel->getAll();
		$this->load->view('template/body', $data);
	}

	function nueva(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'area_id' => $this->input->post('area_id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'active' => 1
				);
			$this->actividadesModel->insertActividad($data);
			redirect('areas/ver/'.$data['area_id']);
		}else{
			$data['nombre']='Actividades';
			$data['view'] = 'actividades/nueva';
			$this->load->view('template/body', $data);
		}
	}

	function ver(){
			$id=$this->uri->segment(3);
			$data['actividades'] = $this->actividadesModel->getById($id);
			echo $data['actividades'][0]->area_id;
			$data['areas'] = $this->areasModel->getById($id);
			$data['nombre']='Actividades';
			$data['view'] ='actividades/ver';
			$this->load->view('template/body', $data);

	}

	function eliminar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$actividad = $this->actividadesModel->getById($id);
		$area_id = $actividad[0]->area_id;
		//var_dump($cosa);
		$this->actividadesModel->deleteactividad($data);
		redirect('areas/ver/'.$area_id);
	}


	function editar(){
		$id = $this->uri->segment(3);
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'area_id' => $this->input->post('area_id'),
				);
			$this->actividadesModel->updateactividad($data);
			//$this->actividadesModel->insertactividad($data);
			redirect('areas/ver/'.$data['area_id']);

		}else{
			$actividadData = $this->actividadesModel->getById($id);
			$data['nombre']='Actividades';
			$data['view'] = 'actividades/editar';
			$data['nombre'] = $actividadData[0]->nombre;
			$data['descripcion'] = $actividadData[0]->descripcion;
			$data['area_id'] = $actividadData[0]->area_id;
			$this->load->view('template/body', $data);
		}
	}
}