<?php 
class login extends CI_Controller{
	function index()
	{
		$data['nombre']='Login';	
		$data['view'] = 'login/loginForm';
		$this->load->view('template/body',$data);	
	}
	
	function validateCredentials()
	{		
		$this->load->model('adminModel');
		$query = $this->adminModel->validate();
		
		if($query) // si fue validado correctamente
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('programas/');
		}
		else // password o username incorrecto
		{
			$this->index();
		}
	}	
	
	function signup()
	{

		$data['view'] = 'login/signupForm';
		$this->load->view('template/body',$data);	
	}
	
	function createUser()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Confirmacion de Password', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$data['view'] = 'login/signupForm';
			$this->load->view('template/body',$data);	
		}
		
		else
		{			
			$this->load->model('adminModel');
			
			if($query = $this->adminModel->createUser())
			{
				$data['view'] = 'login/signupSucces';
				$this->load->view('template/body',$data);	
			}
			else
			{
				$data['view'] = 'login/signupForm';
				$this->load->view('template/body',$data);	
			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}



 ?>