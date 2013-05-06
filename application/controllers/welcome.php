<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "<h1>Hola mundo</h1>";
		$arr=array();
		$arr[0]="David";
		$arr[1]="Miguel Omar Chita";
		echo "<h2>".$arr[1]."</h2><br/>";
		$n=5;
		$aux=1;
		for ($i=1; $i <= $n; $i++) { 
			$aux*=$i;
		}
		echo "<h2>".$aux."</h2>";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */