<?php
class widgetobjModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function add($data){
		$this->db->insert('widget_obj',$data);
		return $this->db->insert_id();
	}
	function update($data,$id){
		return $this->db->update('widget_obj',$data,'id = '.$id);
	}
	function delete($id){
		$this->db->delete('widget_obj', array('id' => $id));
	}
	function getAllById($id){
		$this->db->from('objetivos');
		$this->db->select('objetivos.*');
		$this->db->select('widget_obj.id AS widgetobj_id, tipo, widget_obj.nombre AS widget_nombre');
		$this->db->join('widget_obj', 'objetivos.id = widget_obj.objetivo_id');
		$this->db->where('objetivos.id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
	

}




?>