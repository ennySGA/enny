<?php
class checkModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function add($data){
		$this->db->insert('checklist',$data);
		return $this->db->insert_id();
	}
	function update($data,$id){
		return $this->db->update('checklist',$data,'id = '.$id);
	}
	function delete($id){
		$this->db->delete('checklist', array('id' => $id));
	}
	function getAllByW($id){
		$this->db->from('checklist');
		$this->db->select('checklist.*');
		$this->db->where('checklist.widgetobj_id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
	

}




?>