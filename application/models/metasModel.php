<?php
class metasModel extends CI_Model{

	public function add($datos){
		$this->db->insert('metas', $datos);
		return $this->db->insert_id();
	}

	public function select(){
		$query=$this->db->get('metas');
		return $query->result();
	}
	function delete($id){
		$this->db->delete('metas', array('id' => $id));
	}
	function getAllByW($id){
		$this->db->from('metas');
		$this->db->select('metas.*');
		$this->db->where('metas.widgetobj_id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
}