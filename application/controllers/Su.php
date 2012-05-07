<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Su extends Admin_Controller {
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
				redirect('Su/checkin');
			}
			else
			{
				$this->session->set_flashdata('message', "Il y a eu une erreur");
				redirect('Su/checkin');
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

		// Form validations
		$this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('classe', 'classe', 'trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');

		// if the form runs
		if ($this->form_validation->run() == true)
		{
			// setting variables
			$first_name = $this->input->post('prenom');
			$last_name = $this->input->post('nom');
			$classe = $this->input->post('classe');
			$email = $this->input->post('email');

			// Getting a random username
			$username = random_string();
			// Getting a random password and display afterwars!
			$password = rand(1000, 9999);

			$additional_data = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'classe' => $classe,
			);
			$group = array('2');
			if ( $this->ion_auth->register($username, $password, $email, $additional_data,$group) )
			{
				$this->session->set_flashdata('message', "Utilisateur ajouté avec succes.<br /> Mot de passe: " . $password . "<br /> Login: " . $username);
				redirect('Su/add_user');
			}
			else
			{
				$this->session->set_flashdata('message', "Il y a un problème.");
				redirect('Su/add_user');
			}

		}
		else
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['first_name'] = array(
				'name' => 'prenom',
				'id' => 'prenom',
				'type' => 'text',
				'value' => $this->form_validation->set_value('prenom'),
			);
			$this->data['last_name'] = array(
				'name' => 'nom',
				'id' => 'nom',
				'type' => 'text',
				'value' => $this->form_validation->set_value('nom'),
			);
			$this->data['classe'] = array(
				'name' => 'classe',
				'id' => 'classe',
				'type' => 'text',
				'value' => $this->form_validation->set_value('classe'),
			);
			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->load->view('includes/template', $this->data);
		}
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