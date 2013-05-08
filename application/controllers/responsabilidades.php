<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsabilidades extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('responsabilidadesModel');
		$this->load->helper('url');
     }

	function index(){
		$responsabilidades = $this->responsabilidadesModel->getData();
        $data['responsabilidades'] = $responsabilidades;
        $data['nombre']='Responsabilidades y Autoridades';
        $data['view'] = 'responsabilidades/responsabilidades';
        $this->load->view('template/body', $data);
	}

	function agregar(){
		$this->load->view('responsabilidades/agregar');
	}

	function alta(){
		$this->form_validation->set_rules('responsable','responsable','trim|required');
		$this->form_validation->set_rules('cargo','cargo','trim|required');
		$this->form_validation->set_rules('responsabilidad','responsabilidad','trim|required');
		$this->form_validation->set_rules('autoridad','autoridad','trim|required');
        if($this->form_validation->run() != FALSE){
			$data['responsable'] = $_POST['responsable'];
			$data['cargo'] = $_POST['cargo'];
			$data['responsabilidad'] = $_POST['responsabilidad'];
			$data['autoridad'] = $_POST['autoridad'];
			$this->responsabilidadesModel->insert($data);
			$this->load->view('responsabilidades/responsabilidades', $data);
			redirect('responsabilidades/responsabilidades', 'refresh');
		}
		else {
			$this->load->view('responsabilidades/alta');
		}
	}

	function accion(){
		$this->load->model('responsabilidadesModel');
		$data['responsabilidad'] = $this->responsabilidadesModel->obtenerResponsabilidad($_POST['actualizar']);
		$this->load->view('responsabilidades/actualizar', $data);
	}

	function actualizar(){
		$data['id'] = $_POST['id'];
		$data['cargo'] = $_POST['cargo'];
		$data['responsabilidad'] = $_POST['responsabilidad'];
		$data['autoridad'] = $_POST['autoridad'];
		$this->responsabilidadesModel->update($data);
		$this->index();
	}

	function borrar(){
		$responsable = $_POST['responsable'];
		$this->responsabilidadesModel->borrar($responsable);
		$this->load->model('responsabilidadesModel');
		$this->index();
	}
}