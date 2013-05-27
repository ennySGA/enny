<?php
class objetivosModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getAll(){

		$data = $this->db->get('objetivos');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('objetivos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertObjetivo($data){
		$this->db->insert('objetivos', $data);
		return $this->db->insert_id();
	}

	function getByProgramaId($programaId){
		$this->db->where('programa_id', $programaId);
		$data = $this->db->get('objetivos');
		if($data->num_rows > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function deleteObjetivo($data){
		$newData = array('active' => 0);
		$this->db->where('id', $data['id']);
		$this->db->update('objetivos', $newData);
	}

	function updateObjetivo($data){
		$newData = array('nombre' => $data['nombre'],
						'descripcion' => $data['descripcion'],
						'imagen' => $data['imagen']
						);
		$this->db->where('id', $data['id']);
		$this->db->update('objetivos', $newData);
		return $newData;
	}

	public function getDatosTablaByPrograma($programa_id){
		$this->load->model('metasModel');
		$objetivos=$this->getByProgramaId($programa_id);
		$data=array();
		$i=0;
		foreach ($objetivos as $objetivo) {
			$metas=$this->metasModel->getByObjetivoId($objetivo->id);
			$total_metas=count($metas);
			$terminadas=$this->metasModel->getTerminadasByObjetivoId($objetivo->id);
			$total_terminadas=count($terminadas);
			if($total_metas>0){
				$data[$i]['nombre']=$objetivo->nombre;
				$data[$i]['total_metas']=$total_metas;
				$data[$i]['total_terminadas']=$total_terminadas;
				$data[$i]['porcentaje']=($total_terminadas/$total_metas)*100;
				$i++;
			}
		}
		return $data;
	}



}




?>