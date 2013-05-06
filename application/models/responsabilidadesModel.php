<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ResponsabilidadesModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getData(){
		$responsabilidades = $this->db->get('responsabilidades');
		return $responsabilidades->result();
	}

	function insert($data){
		$this->db->set('responsable', $data['responsable']);
		$this->db->set('cargo', $data['cargo']);
		$this->db->set('responsabilidad', $data['responsabilidad']);
		$this->db->set('autoridad', $data['autoridad']);
		$this->db->insert('responsabilidades');
	}

	function obtenerResponsabilidad($id){
		$this->db->select('responsable, cargo, responsabilidad, autoridad, id');
		$this->db->from('responsabilidades');
		$this->db->where('id = ' . $id);
		$responsabilidad = $this->db->get();
		return $responsabilidad->result();
	}

	function update($data){
		$this->db->set('cargo', $data['cargo']);
		$this->db->set('responsabilidad', $data['responsabilidad']);
		$this->db->set('autoridad', $data['autoridad']);
		$this->db->where('id', $data['id']);
		$this->db->update('responsabilidades');
	}


	function baja($responsable){
		$this->db->where('responsable', $responsable);
		$this->db->delete('responsabilidades');
	}

}
