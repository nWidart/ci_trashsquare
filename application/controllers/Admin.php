<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   session_start();
	}

	public function index()
	{
		if ( isset($_SESSION['login']) ) {
			redirect('Admin/profil');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('login','Login','required');
		$this->form_validation->set_rules('password','Password','required|min_length[4]');

		if ( $this->form_validation->run() !== false ) {
			// validation passed
			$this->load->model('user_model');
			$res = $this->user_model->verify_user($this->input->post('login'), $this->input->post('password'));
			if ( $res !== false ) {
				$_SESSION['login'] = $this->input->post('login');
				$_SESSION['id'] = $res->login;
				redirect('Admin/profil');
			}
		}

		$data = array(
			'main_content' => 'login_view',
			'page_title' => 'Login'
			);
		$this->load->view('includes/template', $data);
	}

	public function profil()
	{
		if ( !isset($_SESSION['login']) ) {
			redirect('Admin/index');
		}
		$this->load->model('user_model');
		$user = $this->user_model->init_user($_SESSION['login']);
		$user_nomp = $this->user_model->nom_p($user->nom,$user->prenom);

		$data = array(
			'main_content' => 'profil_view',
			'page_title' => 'Profil',
			'user' => $user,
			'nom_p' => $user_nomp
			);
		$this->load->view('includes/template_logged', $data);
	}

	public function param()
	{
		if ( !isset($_SESSION['login']) ) {
			redirect('Admin/index');
		}
		$this->load->model('user_model');
		$user = $this->user_model->init_user($_SESSION['login']);
		$user_nomp = $this->user_model->nom_p($user->nom,$user->prenom);

		if ($_POST) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nom','Nom','required|alpha');
			$this->form_validation->set_rules('prenom','Prenom','required|alpha');
			$this->form_validation->set_rules('classe','Classe','alpha_numeric|exact_length[5]');

			if ( $this->form_validation->run() !== false ) {
				// passed
				$nom = $this->input->post('nom');
				$prenom = $this->input->post('prenom');
				$classe = $this->input->post('classe');

				$user_info = array(
					'nom' => $nom,
					'prenom' => $prenom,
					'classe' => $classe
					);

				$this->load->model('user_model');
				if ($this->user_model->update($user,$user_info)) {
					$this->session->set_flashdata('error_msg', 'Votre profil à été mit à jour.');
					redirect('Admin/param');
				}
				else {
					$this->session->set_flashdata('error_msg', 'Not updated');
				}
			}
		}

		$data = array(
			'main_content' => 'param_view',
			'page_title' => 'Paramètres',
			'user' => $user,
			'error_msg' => $this->session->flashdata('error_msg'),
			'nom_p' => $user_nomp
			);
		$this->load->view('includes/template_logged', $data);
	}
	public function logout()
	{
		session_destroy();
		redirect('Admin/index');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>