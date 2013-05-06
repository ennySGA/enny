<?php 
class programasModel extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('programas');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('programas');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertPrograma($data){
		$this->db->insert('programas', $data);
		return $this->db->insert_id();
	}

	function updatePrograma($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion'],
						'imagen' => $data['imagen']
			);
		$this->db->where('id', $id);
		$this->db->update('programas', $newData);
		echo $data['id'];
	
	}

	function deletePrograma($data){
		$newData = array('activo' => 0);
		$this->db->where('id', $data['id']);
		//var_dump($data);
		//var_dump($newData);
		$this->db->update('programas', $newData);
	}
}
 ?>