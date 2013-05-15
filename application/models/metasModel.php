<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MetasModel extends CI_Model{
	public function create(){
		$cuantificable=false;
		if($this->input->post('cuantificable')){
			$cuantificable=true;
		}
		$promover=false;
		if($this->input->post('promover')){
			$promover=true;
		}
		$usar_menos=false;
		if($this->input->post('usar_menos')){
			$usar_menos=true;
		}
		$datos=array(
			'nombre'=>$this->input->post('nombre'),
			'objetivo_id'=>$this->input->post('objetivo_id'),
			'descripcion'=>$this->input->post('descripcion'),
			'edo_actual'=>$this->input->post('edo_actual'),
			'edo_inicial'=>$this->input->post('edo_actual'),
			'edo_lograr'=>$this->input->post('edo_lograr'),
			'metrica'=>$this->input->post('metrica'),
			'fecha_meta'=>$this->input->post('fecha_meta'),
			'cuantificable'=>$cuantificable,
			'tipo'=>$this->input->post('tipo'),
			'promover'=>$promover,
			'usar_menos'=>$usar_menos,
		);

		$this->db->insert('Metas', $datos);
	}

	public function getAll(){
		$query=$this->db->get('Metas');
		return $query->result();
	}
}