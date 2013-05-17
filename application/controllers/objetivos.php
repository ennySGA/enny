<?php 
class objetivos extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('objetivosModel');
		$this->load->model('textModel');
		$this->load->model('checkModel');
		$this->load->model('comentariosModel');
		$this->load->model('adminModel');
		$this->load->model('widgetobjModel');
	}
	function index(){
		$data['nombre']='Objetivos';
		$data['view'] = 'objetivos/objetivos';
		$data['objetivos'] = $this->objetivosModel->getAll();
		$this->load->view('template/body', $data);
	}
	function single(){
		/*$this->is_logged_in();*/
		$user=$this->adminModel->getByName($this->session->userdata('username'));
		$data['user_id'] = $user[0]->id;
		$id=$this->uri->segment(3);
		$data['nombre']='Objetivos';
		$data['objetivos']=$this->objetivosModel->getById($id);
		$data['widgets']=$this->widgetobjModel->getAllById($id);
		/*
		  Consultar los campos de cada widget (switch)
		  Mediante el Tipo, puede saberse la tabla a usar para la consulta
		*/
		if($data['widgets']){
			foreach ($data['widgets'] as $widget) {
				switch ($widget->tipo) {
					case 'text':
						$widget->rows=$this->textModel->getAllByW($widget->widgetobj_id);
						break;
					case 'check':
						$widget->rows=$this->checkModel->getAllByW($widget->widgetobj_id);
						break;
					case 'comentario':
						$widget->rows=$this->comentariosModel->getAllByW($widget->widgetobj_id);
						break;
					default:
						# code...
						break;
				}
			}
		}
		$data['id']=$id;
		if($data['objetivos']){
			/*EDUARDO: Comienza validacion de form Metas*/
			$this->load->library('form_validation');

			if($this->input->post('submit_meta')){
				$config=array(
					array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required'
	                ),
	                array(
		             'field'   => 'fecha_meta',
		             'label'   => 'Fecha de la meta',
		             'rules'   => 'required'
	                ),
	                array(
		             'field'   => 'edo_actual',
		             'label'   => 'Estado actual',
		             'rules'   => 'required'
	                ),
	                array(
		             'field'   => 'edo_lograr',
		             'label'   => 'Estado a lograr',
		             'rules'   => 'required'
	                )
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == true){
					$this->load->model('MetasModel');
					$this->MetasModel->create();
					$data['message']='Meta dada de alta correctamente';
				}
			}
			if($this->input->post('submit_evento')){
				$config=array(
					array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required'
	                ),
	                array(
		             'field'   => 'fecha_evento',
		             'label'   => 'Fecha del evento',
		             'rules'   => 'required'
	                )
				);
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == true){
					$this->load->model('EventosModel');
					$this->EventosModel->create();
					$data['message']='Evento creado';
				}
			}

			

			$data['nombre']='Objetivos';
			$data['view']='objetivos/single';
			$data['title']='Objetivo';
			$data['cont']=count($data['widgets'])-1;
			$this->load->view('template/body',$data);

			//$this->load->view('objetivos/single',$data);
		}else{
			echo "error al cargar objetivos";
		}
	}
	function saveItem(){
		/**************************************Texto*******************************/
		if(isset($_POST['save-text'])){
			$regs=array();
			$id=$_POST['obj_id'];
			$type=$_POST['type'];
			$nombre=$_POST['widget_nombre'];		
			$item=array('descripcion'=>$_POST['descripcion']);
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			$item['widgetobj_id']=$w;
			if($this->textModel->add($item))
				echo "Guardado con éxito";
			else
				echo "Error al guardar";

		}elseif(isset($_POST['edit-text'])){
			$nombre=$_POST['widget_nombre'];
			$w=$this->widgetobjModel->update(array('nombre'=>$nombre),$_POST['w_id']);
			$reg=array('descripcion'=>$_POST['descripcion']);
			$id=$_POST['id'];
			$this->textModel->update($reg,$id);
		}
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
		/**************************************Checklist*******************************/
		if(isset($_POST['save-check'])){
			$regs=array();
			foreach ($_POST['cuerpo'] as $key => $value) {
				if(isset($_POST['status'][$key]) && $_POST['status'][$key]=='on'){
					$regs[]=array('cuerpo'=>$value,'status'=>1);
				}else{
					$regs[]=array('cuerpo'=>$value,'status'=>0);
				}
			}
			$id=$_POST['obj_id'];
			$type=$_POST['type'];
			$nombre=$_POST['widget_nombre'];
			$data=array();
			$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id,'nombre'=>$nombre));
			foreach ($regs as $item) {
				$item['widgetobj_id']=$w;
				if($this->checkModel->add($item))
					echo "Guardado con éxito";
				else
					echo "Error al guardar";
			}	
		}
		if (isset($_POST['edit-check'])) {
			var_dump($_POST);
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
		
		//var_dump($_POST);
		/*$id=$_POST['id'];
		$type=$_POST['type'];
		switch ($type) {
			case 'text':
				$cont=2;/*Cant. of fields per row*/	
				/*Save de fields in the respective table (type)*/
				/*$data=array();
				$w=$this->widgetobjModel->add(array('tipo'=>$type,'objetivo_id'=>$id));
				foreach ($_POST['fields'] as $item) {
					if($item['name']=="cuerpo[]")$data['cuerpo']=$item['value'];
					if($item['name']=="descripcion[]")$data['descripcion']=$item['value'];
					if(count($data)==$cont){
						$data['widgetobj_id']=$w;
						if($this->textModel->add($data))
							echo "Guardado con éxito";
						else
							echo "Error al guardar";
						$data=array();
					}
				}
				break;
			default:
				echo "no text";
				break;
		}*/
		
	}
	function borrarComent(){
		$this->comentariosModel->delete($this->uri->segment(3));
		redirect('/objetivos/single/'.$this->uri->segment(4), 'refresh');
	}
	function delCheck(){
		echo $id=$_POST['id'];
		echo $this->checkModel->delete($id);
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
	function nuevo(){
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'programa_id' => $this->input->post('programa_id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'active' => 1
				);
			$id = $this->objetivosModel->insertObjetivo($data);
			$this->load->library('upload');
			$files = $_FILES;

			if($this->sube_imagen($files, $id, $data)){
				$data['objetivos'] = $this->objetivosModel->getAll();
				var_dump($data);
				redirect('programas/ver/'.$data['programa_id']);

			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['nombre']='Objetivos';
				$this->load->view('programas/programas', $error);
			}

		}else{
			$data['nombre']='Objetivos';
			$data['view'] = 'objetivos/nuevo';
			$this->load->view('template/body', $data);
		}

	}
	function sube_imagen($files, $id, $data){
		$_FILES['userfile']['name']= $files['userfile']['name'][0];
	    $_FILES['userfile']['type']= $files['userfile']['type'][0];
	    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][0];
	    $_FILES['userfile']['error']= $files['userfile']['error'][0];
	    $_FILES['userfile']['size']= $files['userfile']['size'][0];

	    if($files['userfile']['size'][0] != 0){
	    	$nom = $files['userfile']['name'][0];
	    	$ext = end(explode('.',$nom));
	    	var_dump($ext);
	    	$nombre = 'imagen_objetivo_'.$id;
	    	$imagen = 'imagen_objetivo_'.$id.'.'.$ext;
	    	$data['imagen'] = $imagen;
	    	$data['id'] = $id;

	    	$this->upload->initialize($this->set_upload_options($nombre));
			    
			if($this->upload->do_upload()){
			 	$imagen = $nombre.'.'.$ext;
				$this->objetivosModel->updateObjetivo($data);
				
				$valor = TRUE;
			}else{
				$valor = FALSE;
				}
	    }
	    return $valor;
	}


	private function set_upload_options($name){   
	    $config = array();
	    
	    $config['upload_path'] = './uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']      = '2048';
	    $config['file_name'] = $name;
	    $config['overwrite']     = TRUE;

	    return $config;
	}


	function ver(){
			$id=$this->uri->segment(3);
			$data['objetivos'] = $this->objetivosModel->getById($id);
			echo $data['objetivos'][0]->programa_id;
			//$data['programas'] = $this->programasModel->getById();
			$data['nombre']='Objetivos';
			$data['view'] ='objetivos/ver';
			$this->load->view('template/body', $data);
	}

	function eliminar(){
		$id = $this->uri->segment(3);
		$data['activo'] = 0;
		$data['id'] = $id;
		var_dump($data);
		$objetivo = $this->objetivosModel->getById($id);
		$programa_id = $objetivo[0]->programa_id;
		//var_dump($cosa);
		$this->objetivosModel->deleteObjetivo($data);
		redirect('programas/ver/'.$programa_id);
	}

	function editar(){
		$id = $this->uri->segment(3);
		$guardar = $this->input->post('guardar');
		if($guardar){
			$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'programa_id' => $this->input->post('programa_id')
				);

			$this->objetivosModel->updateObjetivo($data);

			$id = $data['id'];

			$this->load->library('upload');
			$files = $_FILES;

			if($this->sube_imagen($files, $id, $data)){
				$data['nombre']='Objetivos';
				$data['objetivos'] = $this->objetivosModel->getAll();
				$this->load->view('programas/programas', $data);

			}else{
				$data['nombre']='Objetivos';
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('programas/programas', $error);
			}

			redirect('programas/ver/'.$data['programa_id']);

		}else{
			$objetivoData = $this->objetivosModel->getById($id);
			$data['nombre']='Objetivos';
			$data['view'] = 'objetivos/editar';
			$data['nombre'] = $objetivoData[0]->nombre;
			$data['descripcion'] = $objetivoData[0]->descripcion;
			$data['programa_id'] = $objetivoData[0]->programa_id;
			$this->load->view('template/body', $data);
		}
	}

	public function showAll(){
		$objetivos=$this->objetivosModel->getAll();
		if($objetivos){
			$data['nombre']='Objetivos';
			$data['objetivos']=$objetivos;
			$this->load->view('objetivos/showAll',$data);
		}
	}
	
	public function deleteObjetivo(){
		$id=$this->uri->segment(3);
		$this->objetivosModel->deleteObjetivo($id);
	}
	public function getNew(){
		$id=$this->uri->segment(3);
		echo $id;
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



 ?>