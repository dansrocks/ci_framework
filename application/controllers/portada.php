<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Portada extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->layout->aLE('page_description', 'Soy GenteDivertida');
		$this->layout->aLE('page_author', 'Dans Norvey');
		$this->layout->aLE('page_title', 'GenteDivertida');
		
		/*
		if ($this->auth->isLogged()) {
			echo "El usuario está logeado.";
		} else {
			$logininfo = array ('email' => 'drocks2000@gmail.com', 'passwd' => 'daniel');
			$this->load->model('auth_model');
			$this->auth_model->getUserByLogin($logininfo);
			
			if ($this->auth->isLogged()) {
				echo "El usuario ha sido logeado.";
			} else {
				
				echo "El usuario no esta logeado";
			}
			print_r($this->session->userdata);
			
			echo '<a href="/acceder">Login</a>';
		}
		*/
		
		$this->layout->display('portada');
	}
	
	public function debug() {
		
		print_r($this->layout);
		
	}
	
}


/* End of file portada.php */
