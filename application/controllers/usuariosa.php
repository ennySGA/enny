<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuariosModel');
		$this->load->model('categoriasModel');
     }

	function index(){
		$data['nombre']='Usuarios';
		$data['view'] = 'usuarios/usuarios';
		$data['usuarios'] = $this->usuariosModel->getAll();
		$this->load->view('template/body', $data);
	}

	function nuevo(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'categoria_id' => $this->input->post('categoria_id'),
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'correo' => $this->input->post('correo'),
				'password' => $this->input->post('password'),
				'active' => 1
				);
			$this->usuariosModel->insertUsuario($data);
			redirect('categorias/ver/'.$data['categoria_id']);
		}else{
			$data['nombre']='Usuarios';
			$data['view'] = 'usuarios/nuevo';
			$this->load->view('template/body', $data);
		}
	}

	function ver(){
			$id=$this->uri->segment(3);
			$data['usuarios'] = $this->usuariosModel->getById($id);
			echo $data['usuarios'][0]->categoria_id;
			$data['nombre']='Usuarios';
			$data['categorias'] = $this->categoriasModel->getById($id);
			$data['view'] ='usuarios/ver';
			$this->load->view('template/body', $data);

	}

	function eliminar(){
		$id = $this->uri->segment(3);
		$data['active'] = 0;
		$data['id'] = $id;
		$usuario = $this->usuariosModel->getById($id);
		$categoria_id = $usuario[0]->categoria_id;
		//var_dump($cosa);
		$this->usuariosModel->deleteUsuario($data);
		redirect('categorias/ver/'.$categoria_id);
	}


	function editar(){
		$id = $this->uri->segment(3);
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'correo' => $this->input->post('correo'),
				'categoria_id' => $this->input->post('categoria_id'),
				);
			$this->usuariosModel->updateUsuario($data);
			//$this->usuariosModel->insertusuario($data);
			redirect('categorias/ver/'.$data['categoria_id']);

		}else{
			$usuarioData = $this->usuariosModel->getById($id);
			$data['view'] = 'usuarios/editar';
			$data['nombre'] = $usuarioData[0]->nombre;
			$data['apellido'] = $usuarioData[0]->apellido;
			$data['correo'] = $usuarioData[0]->correo;
			$data['categoria_id'] = $usuarioData[0]->categoria_id;
			$this->load->view('template/body', $data);
		}
	}
}