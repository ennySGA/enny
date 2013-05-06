<?php

class AreasModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('areas');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('areas');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertArea($data){
		$this->db->insert('areas', $data);
	}

	function updateArea($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion'],
						'tipo' => $data['tipo']
			);
		$this->db->where('id', $id);
		$this->db->update('areas', $newData);
	}


	function deleteArea($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('areas', $newData);
	}
}
