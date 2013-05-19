<?php

class Tipos_legislacionesModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('niveles');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('niveles');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertNivel($data){
		$this->db->insert('niveles', $data);
	}

	function updateNivel($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
		);
		$this->db->where('id', $id);
		$this->db->update('niveles', $newData);
	}


	function deleteNivel($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('niveles', $newData);
	}
}
