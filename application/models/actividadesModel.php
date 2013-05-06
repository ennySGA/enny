<?php

class ActividadesModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	function getAll(){

		$data = $this->db->get('actividades');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('actividades');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertActividad($data){
		$this->db->insert('actividades', $data);
	}

	function getByAreaId($areaId){
		$this->db->where('area_id', $areaId);
		$data = $this->db->get('actividades');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteActividad($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('actividades', $newData);
	}

	function updateActividad($data){
		$newData = array('nombre' => $data['nombre'],
						'descripcion' => $data['descripcion']
						);
		$this->db->where('id', $data['id']);
		$this->db->update('actividades', $newData);
		return $newData;
	}
}
