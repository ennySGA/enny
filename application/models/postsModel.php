<?php
class postsModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function addPost($data){
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
	}
	function getAll(){
		$data = $this->db->get('posts');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return FALSE;
		}		
	}
	function getPostId($id){
		//$this->db->query("SELECT id,titulo,cuerpo FROM posts WHERE id=")
		$this->db->from('posts');
		$this->db->select('id,titulo,cuerpo');
		$this->db->where('id',$id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}
	function deletePost($id){
		$this->db->where('id',$id);
		$this->db->delete('posts');
	}

}




?>