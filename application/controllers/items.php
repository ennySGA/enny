<?php 
class items extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('objetivosModel');
		$this->load->model('textModel');
		$this->load->model('checkModel');
		$this->load->model('comentariosModel');
		$this->load->model('adminModel');
		$this->load->model('widgetobjModel');
		$this->load->model('metasModel');
	}
	function index(){
		$data['nombre']='Objetivos';
		$data['view'] = 'objetivos/objetivos';
		$data['objetivos'] = $this->objetivosModel->getAll();
		$this->load->view('template/body', $data);
	}
	function  saveItemText(){
		/**************************************Texto*******************************/
		if(isset($_POST['save'])){
			$regs=array();
			$id=$this->input->post('obj_id');
			$type='text';
			$nombre=$this->input->post('widget_nombre');		
			$item=array('descripcion'=>$this->input->post('descripcion'));
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			$item['widgetobj_id']=$w;
			if($this->textModel->add($item))
				$msg="Guardado con éxito";
			else
				$msg= "Error al guardar";
		}elseif(isset($_POST['edit'])){
			$nombre=$_POST['widget_nombre'];
			$w=$this->widgetobjModel->update(array('nombre'=>$nombre),$this->input->post('w_id'));
			$reg=array('descripcion'=>$this->input->post('descripcion'));
			$id=$this->input->post('id');
			$this->textModel->update($reg,$id);
		}
		$id=$this->uri->segment(3);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function saveItemMeta(){
		if($this->input->post('save')){
			$id=$this->input->post('obj_id');
			$type='meta';
			$nombre=$this->input->post('widget_nombre');	
			$cuantificable=false;
			if($this->input->post('cuantificable')){
				$cuantificable=true;
			}	
			$item=array(
				'nombre'=>$this->input->post('nombre'),
				'descripcion'=>$this->input->post('descripcion'),
				'edo_actual'=>$this->input->post('edo_actual'),
				'edo_inicial'=>$this->input->post('edo_actual'),
				'edo_lograr'=>$this->input->post('edo_lograr'),
				'metrica'=>$this->input->post('metrica'),
				'fecha_meta'=>$this->input->post('fecha_meta'),
				'fecha_inicio'=>$this->input->post('fecha_inicio'),
				'cuantificable'=>$cuantificable,
				'tipo'=>$this->input->post('tipo')
				);
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			$item['widgetobj_id']=$w;
			if($this->metasModel->add($item))
				$msg="Guardado con éxito";
			else
				$msg= "Error al guardar";
		}elseif($this->input->post('add-meta')){	
			$cuantificable=false;
			if($this->input->post('cuantificable')){
				$cuantificable=true;
			}	
			$item=array(
				'nombre'=>$this->input->post('nombre'),
				'descripcion'=>$this->input->post('descripcion'),
				'edo_actual'=>$this->input->post('edo_actual'),
				'edo_inicial'=>$this->input->post('edo_actual'),
				'edo_lograr'=>$this->input->post('edo_lograr'),
				'metrica'=>$this->input->post('metrica'),
				'fecha_meta'=>$this->input->post('fecha_meta'),
				'fecha_inicio'=>$this->input->post('fecha_inicio'),
				'cuantificable'=>$cuantificable,
				'tipo'=>$this->input->post('tipo')
				);
			$item['widgetobj_id']=$this->input->post('w_id');
			if($this->metasModel->add($item))
				$msg="Guardado con éxito";
			else
				$msg= "Error al guardar";
			echo $msg;
		}
		$id=$this->uri->segment(3);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function saveItemComments(){
		/**************************************Comentarios*******************************/
		if(isset($_POST['save-comentario'])){
			$regs=array();
			$id=$_POST['obj_id'];
			$type=$_POST['type'];
			$nombre=$_POST['widget_nombre'];		
			$item=array('cuerpo'=>$_POST['cuerpo'],'usuario_id'=>$_POST['usuario_id']);
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			$item['widgetobj_id']=$w;

			if($this->comentariosModel->add($item))
				echo "Guardado con éxito";
			else
				echo "Error al guardar";

		}elseif(isset($_POST['add-comentario'])){
			$item=array('cuerpo'=>$_POST['cuerpo']);
			$item['widgetobj_id']=$_POST['w_id'];
			$item['usuario_id']=$_POST['usuario_id'];
			$this->comentariosModel->add($item);
		}elseif(isset($_POST['edit-comentario'])){
			var_dump($_POST);
			$id=$_POST['id'];
			$item=array('cuerpo' => $_POST['cuerpo']);
			$this->comentariosModel->update($item,$id);
		}
		$id=$this->uri->segment(3);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function saveItemChecklist(){
		/**************************************Checklist*******************************/
		if($this->input->post('save')){
			$regs=array();
			foreach ($this->input->post('cuerpo') as $key => $value) {
				if(isset($_POST['status'][$key]) && $_POST['status'][$key]=='on'){
					$regs[]=array('cuerpo'=>$value,'status'=>1);
				}else{
					$regs[]=array('cuerpo'=>$value,'status'=>0);
				}
			}
			$id=$this->input->post('obj_id');
			$type='check';
			$nombre=$this->input->post('widget_nombre');
			$data=array();
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			foreach ($regs as $item) {
				$item['widgetobj_id']=$w;
				if($this->checkModel->add($item))
					$msg= "Guardado con éxito";
				else
					$msg= "Error al guardar";
			}	
		}
		if (isset($_POST['edit-check'])) {
			//var_dump($_POST);
			$nombre=$_POST['widget_nombre'];
			$w=$this->widgetobjModel->update(array('nombre'=>$nombre),$_POST['w_id']);
			foreach ($_POST['cuerpo'] as $key => $value) {

				if(isset($_POST['id'][$key])){
					if(isset($_POST['status'][$_POST['id'][$key]]) && $_POST['status'][$_POST['id'][$key]]=='on'){
						$reg=array('cuerpo'=>$value,'status'=>1);
					}else{
						$reg=array('cuerpo'=>$value,'status'=>0);
					}
					$id=$_POST['id'][$key];
					$this->checkModel->update($reg,$id);
				}else{//Agregar los nuevos registros en la edición
					$reg['widgetobj_id']=$_POST['w_id'];
					$reg['status']=0;
					$this->checkModel->add($reg);
				}
			}
		}
		$id=$this->uri->segment(3);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function SaveItemImpact(){
		/**************************************Impacto*******************************/
		if(isset($_POST['save-impacto'])){
			$regs=array();
			foreach ($_POST['cuerpo'] as $key => $value) {
				$regs[]=array('cuerpo'=>$value,'descripcion'=>$_POST['descripcion'][$key]);
			}
			$id=$_POST['obj_id'];
			$type=$_POST['type'];
			$nombre=$_POST['widget_nombre'];
			switch ($type) {
				/*Save de fields in the respective table (type)*/
				case 'text':
					$data=array();
					$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
					foreach ($regs as $item) {
						$item['widgetobj_id']=$w;
						if($this->textModel->add($item))
							echo "Guardado con éxito";
						else
							echo "Error al guardar";
					}
					break;
				default:
					echo "no text";
					break;
			}
		
		}elseif(isset($_POST['edit-impacto'])){
			//var_dump($_POST);
			$regs=array();
			$ids=array();
			$nombre=$_POST['widget_nombre'];
			$w=$this->widgetobjModel->update(array('nombre'=>$nombre),$_POST['w_id']);
			foreach ($_POST['cuerpo'] as $key => $value) {
				$reg=array('cuerpo'=>$value,'descripcion'=>$_POST['descripcion'][$key]);
				if(isset($_POST['id'][$key])){
					$id=$_POST['id'][$key];
					$this->textModel->update($reg,$id);
				}else{//Agregar los nuevos registros en la edición
					$reg['widgetobj_id']=$_POST['w_id'];
					$this->textModel->add($reg);
				}
			}
		}
		$id=$this->uri->segment(3);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function borrarComent(){
		$this->comentariosModel->delete($this->uri->segment(3));
		redirect('/objetivos/single/'.$this->uri->segment(4), 'refresh');
	}
	function delCheck(){
		$id=$this->input->post('id');
		$this->checkModel->delete($id);
	}
	function delMeta(){
		$id=$this->uri->segment(3);
		$this->metasModel->delete($id);
		redirect('/objetivos/single/'.$this->uri->segment(4), 'refresh');
	}
	function delReg(){
		$id=$_POST['id'];
		echo $this->textModel->delete($id);
	}
	function delItem(){
		$wid=$this->uri->segment(3);
		$this->widgetobjModel->delete($wid);
		$id=$this->uri->segment(4);
		redirect('/objetivos/single/'.$id, 'refresh');
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'No tienes permisos para ver este sitio. <a href="'.base_url().'index.php/login">Login</a>';	
			die();	
			$data['nombre']='Login';	
			$data['view'] = 'login/login_form';
			$this->load->view('template/body', $data);
		}		
	}




}