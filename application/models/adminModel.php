<?php

class adminModel extends CI_Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('usuarios');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}
	function getByName($username){
		$this->db->where('username', $username);
		$query = $this->db->get('usuarios');
		return $query->result();
	}
	
	function createUser()
	{
		
		$new_member_insert_data = array(		
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('usuarios', $new_member_insert_data);
		return $insert;
	}
}