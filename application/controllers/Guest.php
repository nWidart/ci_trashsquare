<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function index()
	{
		$this->data['page_title'] = 'Index';
		$this->data['main_content'] = 'home_view';
		$this->load->view('includes/template',$this->data);
	}

	public function classement()
	{
		$this->data['page_title'] = 'Classement';
		$this->data['main_content'] = 'rank_view';
		// Getting the global ranking
		$this->load->model('rank_model');
		$this->data['global_rank'] = $this->rank_model->get_all();
		$this->load->view('includes/template', $this->data);
	}

	public function profil()
	{
		redirect('auth/login');
	}
}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */
?>