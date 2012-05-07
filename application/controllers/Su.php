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

		// Getting the names and converting the object to an array
		$this->load->model('poubelle_model');
		$poubelles = object_to_array( $this->poubelle_model->get_all() );

		// Creating the options for the dropdown
		foreach ($poubelles as $key => $value) {
			// $this->firephp->log($value['nom']);
			$options[$value['id']] = $value['nom'];
		}
		$this->data['options'] = $options;

		// Setting form_validation
		$this->form_validation->set_rules('username', 'Utilisateur', 'trim|required|min_length[4]|xss_clean');

		// If the form runs
		if ($this->form_validation->run() == true)
		{
			// Setting variables
			$username = $this->input->post('username', true);
			$poubelle_id = $this->input->post('poubelle', true);

			// Getting the user_id from the username
			$this->load->model('user_model');
			$user_id = $this->user_model->get_user_id($username);

			// Add a row to the checkins table.
			$this->load->model('checkin_model');
			if ( $this->checkin_model->add($user_id,$poubelle_id) )
			{
				$this->session->set_flashdata('message', "Checkin prit en compte!");
				redirect('SU/checkin');
			}
			else
			{
				$this->session->set_flashdata('message', "Il y a eu une erreur");
				redirect('SU/checkin');
			}
		}
		else
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
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