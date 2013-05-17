<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventosModel extends CI_Model{

	public function create(){
		$publicar=false;
		if($this->input->post('publicar')){
			$publicar=true;
		}
		$interno=false;
		if($this->input->post('interno')){
			$interno=true;
		}
		$datos=array(
			'nombre'=>$this->input->post('nombre'),
			'objetivo_id'=>$this->input->post('objetivo_id'),
			'descripcion'=>$this->input->post('descripcion'),
			'fecha_evento'=>$this->input->post('fecha_evento'),
			'publico'=>$this->input->post('publico'),
			'publicar'=>$publicar,
			'interno'=>$interno,
			'responsable'=>$this->input->post('responsable'),
			'lugar'=>$this->input->post('lugar')
		);

		$this->db->insert('Eventos', $datos);
	}

}