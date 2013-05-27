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

	public function getByObjetivoId($objetivo_id){
		$this->db->where('objetivo_id',$objetivo_id);
		$query=$this->db->get('metas');
		return $query->result();
	}

	public function getTerminadasByObjetivoId($objetivo_id){
		$metas=$this->getByObjetivoId($objetivo_id);
		$terminadas=array();
		foreach ($metas as $meta) {
			if($this->esTerminada($meta->tipo,$meta->edo_actual,$meta->edo_lograr)){
				$terminadas[]=$meta;
			}
		}
		return $terminadas;
	}

	public function esTerminada($tipo, $edo_actual, $edo_lograr){
		switch ($tipo) {
			case 'Reducir':
				if($edo_actual<=$edo_lograr){
					return true;
				}
				else{
					return false;
				}
				break;
			case 'Incrementar':
				if($edo_actual>=$edo_lograr){
					return true;
				}
				else{
					return false;
				}
				break;
			case 'Mantener':
				if($edo_actual==$edo_lograr){
					return true;
				}
				else{
					return false;
				}
				break;
			
			default:
				# code...
				break;
		}
	}

	public function getByPrograma($programa_id){
		$query=$this->db->query("select * from metas where objetivo_id in (select id from objetivos where programa_id='".$programa_id."')");
		return $query->result();
	}

	public function getTerminadasByPrograma($programa_id){
		$metas=$this->getByPrograma($programa_id);
		$terminadas=array();
		foreach ($metas as $meta) {
			if($this->esTerminada($meta->tipo,$meta->edo_actual,$meta->edo_lograr)){
				$terminadas[]=$meta;
			}
		}
		return $terminadas;
	}

	public function getAll(){
		$query=$this->db->get('Metas');
		return $query->result();
	}
}