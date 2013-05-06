<?php

class UsuariosaModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	function getAll(){

		$data = $this->db->get('usuarios_a');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('usuarios_a');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertUsuario($data){
		$this->db->insert('usuarios_a', $data);
	}

	function getByCategoriaId($categoriaId){
		$this->db->where('categoria_id', $categoriaId);
		$data = $this->db->get('usuarios_a');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteUsuario($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('usuarios_a', $newData);
	}

	function updateUsuario($data){
		$newData = array('nombre' => $data['nombre'],
						'apellido' => $data['apellido'],
						'correo' => $data['correo'],
						);
		$this->db->where('id', $data['id']);
		$this->db->update('usuarios_a', $newData);
		return $newData;
	}
}
