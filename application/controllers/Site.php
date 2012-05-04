<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Common_Auth_Controller {

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

		$data = array(
			'main_content' => 'rank_view',
			'page_title'   => 'Classement',
			'user'         => $user
		);
		$this->load->view('includes/template', $data);
	}

	public function profil()
	{
		$this->data['page_title'] = 'Profil';
		// Checking if the user is logged in
		if ($this->ion_auth->logged_in())
		{
			// Serving the profile page
			$this->data['main_content'] = 'profil_view';
			$this->data['message'] = 'Vous êtes bien loggé.';
			$this->load->view('includes/template_logged', $this->data);
		}
		else
		{
			// What the hell are you doing here dude?
			$this->session->set_flashdata('message', 'You are not allowed to access that page. Please login first.');
			redirect('auth/login');
		}
	}

	public function param()
	{
		$this->data['page_title'] = "Paramètres";
		$this->load->library('form_validation');
		// Validate the input
		$this->form_validation->set_rules('first_name', 'Prénom', 'xss_clean');
		$this->form_validation->set_rules('last_name', 'Nom', 'xss_clean');
		$this->form_validation->set_rules('classe', 'Classe', 'xss_clean');

		// Run the form & set the values
		if ($this->form_validation->run() == true)
		{
			//
		}

		// updating the user
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//
		}
		else
		{
			$this->data['message'] =(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->data['first_name'] = array(
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => ($this->form_validation->set_value('first_name')) ? $this->load->view('includes/template_logged', $this->data) : $this->the_user->first_name,
			);
			$this->data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => ($this->form_validation->set_value('last_name')) ? $this->load->view('includes/template_logged', $this->data) : $this->the_user->last_name,
			);
			$this->data['classe'] = array(
				'name' => 'classe',
				'id' => 'classe',
				'type' => 'text',
				'value' => ($this->form_validation->set_value('classe')) ? $this->load->view('includes/template_logged', $this->data) : $this->the_user->classe,
			);
			$this->data['main_content'] = 'param_view';
			$this->load->view('includes/template_logged', $this->data);
		}


	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */
?>