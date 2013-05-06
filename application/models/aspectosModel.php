<?php

class AspectosModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	function getAll(){

		$data = $this->db->get('aspectos');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('aspectos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertAspecto($data){
		$this->db->insert('aspectos', $data);
	}

	function getByTipoId($tipoId){
		$this->db->where('tipo_id', $tipoId);
		$data = $this->db->get('aspectos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteAspecto($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('aspectos', $newData);
	}

	function updateAspecto($data){
		$newData = array('nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
						);
		$this->db->where('id', $data['id']);
		$this->db->update('aspectos', $newData);
		return $newData;
	}
}
