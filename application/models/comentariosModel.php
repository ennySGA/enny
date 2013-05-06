<?php
class comentariosModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function add($data){
		$this->db->insert('comentarios',$data);
		return $this->db->insert_id();
	}
	function update($data,$id){
		return $this->db->update('comentarios',$data,'id = '.$id);
	}
	function delete($id){
		$this->db->delete('comentarios', array('id' => $id));
	}
	function getAllByW($id){
		//Join con datos del usuario
		$this->db->from('comentarios');
		$this->db->select('comentarios.*');
		$this->db->select('usuarios.username');
		$this->db->join('usuarios','comentarios.usuario_id = usuarios.id');
		$this->db->where('comentarios.widgetobj_id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
	function getAllById($id){
		$this->db->from('comentarios');
		$this->db->select('posts.*');
		$this->db->select('comentarios.id AS com_id, comentarios.cuerpo AS com_cuerpo');
		$this->db->join('posts', 'comentarios.post_id = posts.id');
		$this->db->where('comentarios.post_id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}	
	}
	

}




?>