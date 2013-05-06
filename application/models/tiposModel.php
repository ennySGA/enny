<?php

class TiposModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('tipos');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('tipos');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertTipo($data){
		$this->db->insert('tipos', $data);
	}

	function updateTipo($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
		);
		$this->db->where('id', $id);
		$this->db->update('tipos', $newData);
	}


	function deleteTipo($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('tipos', $newData);
	}
}
