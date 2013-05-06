<?php
class textModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function add($data){
		$this->db->insert('text',$data);
		return $this->db->insert_id();
	}
	function update($data,$id){
		return $this->db->update('text',$data,'id = '.$id);
	}
	function delete($id){
		$this->db->delete('text', array('id' => $id));
	}
	function getAllByW($id){
		$this->db->from('text');
		$this->db->select('text.*');
		$this->db->where('text.widgetobj_id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
	

}




?>