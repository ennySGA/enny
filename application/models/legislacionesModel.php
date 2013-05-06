<?php

class LegislacionesModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	function getAll(){

		$data = $this->db->get('legislaciones');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('legislaciones');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertLegislacion($data){
		$this->db->insert('legislaciones', $data);
	}

	function getByNivelId($nivelId){
		$this->db->where('nivel_id', $nivelId);
		$data = $this->db->get('legislaciones');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteLegislacion($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('legislaciones', $newData);
	}

	function updateLegislacion($data){
		$newData = array('nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
						);
		$this->db->where('id', $data['id']);
		$this->db->update('legislaciones', $newData);
		return $newData;
	}
}
