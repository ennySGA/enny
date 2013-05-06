<?php

class CategoriasModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('categorias');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('categorias');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertCategoria($data){
		$this->db->insert('categorias', $data);
	}

	function updateCategoria($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
			);
		$this->db->where('id', $id);
		$this->db->update('categorias', $newData);
	}


	function deletecategoria($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('categorias', $newData);
	}
}
