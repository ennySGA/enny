<?php 
class posts extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('postsModel');
		$this->load->model('comentariosModel');
		
	}
	function index(){
		$this->load->view('posts');

	}
	function addPost(){
		$data=array(
			'titulo'=>$this->input->post('titulo'),
			'cuerpo'=>$this->input->post('cuerpo')
		);
		echo "<h1>".$this->postsModel->addPost($data)."</h1>";
	}
	public function showAll(){
		$posts=$this->postsModel->getAll();
		if($posts){
			$data['posts']=$posts;
			$this->load->view('posts/showAll',$data);
		}
	}
	public function getPost(){
		$this->is_logged_in();
		$id=$this->uri->segment(3);
		$enviar=$this->input->post('enviar');
		if($enviar!=false){
			$data_com['cuerpo']=$this->input->post('coment');
			$data_com['post_id']=$id;
			$this->comentariosModel->addComentario($data_com);
		}
		$data['posts']=$this->postsModel->getPostId($id);
		$data['comentarios']=$this->comentariosModel->getAllId($id);
		$data['id']=$id;
		if($data['posts']){
			$this->load->view('posts/getPost',$data);
		}

	}
	public function deletePost(){
		$id=$this->uri->segment(3);
		$this->postsModel->deletePost($id);
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
			//$this->load->view('login_form');
		}		
	}
}



 ?>