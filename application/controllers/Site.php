<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   session_start();
	}
	public function index()
	{
		// Loading the user
		if ( isset($_SESSION['login']) ) {
			$this->load->model('user_model');
			$user = $this->user_model->init_user($_SESSION['login']);
			$user->user_nomp = $this->user_model->nom_p($user->nom,$user->prenom);
		}
		else {
			$user = null;
		}
		// Loading the home page
		$data = array(
			'main_content' => 'home_view',
			'page_title'   => 'Home',
			'user'         => $user
		);
		$this->load->view('includes/template', $data);
	}

	public function classement()
	{
		if ( isset($_SESSION['login']) ) {
			$this->load->model('user_model');
			$user = $this->user_model->init_user($_SESSION['login']);
			$user->user_nomp = $this->user_model->nom_p($user->nom,$user->prenom);
		}
		// Loading the FirePHP lib
		$this->load->library('firephp');
		// $this->firephp->log('Log message');

		$data = array(
			'main_content' => 'rank_view',
			'page_title'   => 'Classement',
			'user'         => $user
		);
		$this->load->view('includes/template', $data);
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */
?>