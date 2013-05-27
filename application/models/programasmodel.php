<?php 
class programasModel extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getAll(){
		$data = $this->db->get('programas');
		if ($data->num_rows() > 0) {
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function getById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('programas');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return FALSE;
		}
	}

	function insertPrograma($data){
		$this->db->insert('programas', $data);
		return $this->db->insert_id();
	}

	function updatePrograma($data){
		$id = $data['id'];
		$newData = array(
						'nombre' => $data['nombre'],
						'descripcion' => $data['descripcion'],
						'imagen' => $data['imagen']
			);
		$this->db->where('id', $id);
		$this->db->update('programas', $newData);
		echo $data['id'];
	
	}

	function deletePrograma($data){
		$newData = array('activo' => 0);
		$this->db->where('id', $data['id']);
		//var_dump($data);
		//var_dump($newData);
		$this->db->update('programas', $newData);
	}

	public function getByEmpresaId($empresa_id){
		$this->db->where('empresa_id',$empresa_id);
		$query=$this->db->get('programas');
		return $query->result();
	}

	public function getTablaAvance($empresa_id){
		$programas=$this->getByEmpresaId($empresa_id);
		$this->load->model('metasModel');
		$data=array();
		$i=0;
		foreach($programas as $programa){
			$total_metas=count($this->metasModel->getByPrograma($programa->id));
			$total_terminadas=count($this->metasModel->getTerminadasByPrograma($programa->id));
			if($total_metas>0){
				$data[$i]['nombre']=$programa->nombre;
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