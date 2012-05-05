<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SU extends Admin_Controller {
	public function __construct()
	{
	   parent::__construct();
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$this->data['page_title'] = 'Admin home';
		$this->data['main_content'] = 'su_home_view';

		$this->load->view('includes/template', $this->data);
	}

	public function checkin()
	{
		$this->data['page_title'] = 'Checkin';
		$this->data['main_content'] = 'su_checkin_view';
		$this->load->model('poubelle_model');
		$poubelles = $this->poubelle_model->get_all();
		$this->data['options'] = array();
		foreach ($poubelles as $poubelle => $value) {
			$this->data['options'] .= array($poubelle => $value);
		}

		// $this->firephp->log($this->data['options']);

		if ($this->form_validation->run() == true)
		{
			// do something
		}
		else
		{
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->load->view('includes/template', $this->data);
		}
	}

	public function add_user()
	{
		$this->data['page_title'] = 'Ajouter utilisateur';
		$this->data['main_content'] = 'su_add_user';

		$this->load->view('includes/template', $this->data);
	}

	public function user_list()
	{
		$this->data['page_title'] = 'List utilisateur';
		$this->data['main_content'] = 'su_user_list';

		$this->load->view('includes/template', $this->data);
	}

}

/* End of file SU.php */
/* Location: ./application/controllers/SU.php */