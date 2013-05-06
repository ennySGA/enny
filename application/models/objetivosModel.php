<?php
class objetivosModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getAll(){

		$data = $this->db->get('objetivos');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('objetivos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertObjetivo($data){
		$this->db->insert('objetivos', $data);
		return $this->db->insert_id();
	}

	function getByProgramaId($programaId){
		$this->db->where('programa_id', $programaId);
		$data = $this->db->get('objetivos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteObjetivo($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('objetivos', $newData);
	}

	function updateObjetivo($data){
		$newData = array('nombre' => $data['nombre'],
						'descripcion' => $data['descripcion'],
						'imagen' => $data['imagen']
						);
		$this->db->where('id', $data['id']);
		$this->db->update('objetivos', $newData);
		return $newData;
	}

}




?>