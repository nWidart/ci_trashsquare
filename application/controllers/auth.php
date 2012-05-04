<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('/');
	}

	/**
	 * Method to log the user in
	 * @return void
	 */
	public function login()
	{
		$this->data['page_title'] = 'Login';
		if ($this->ion_auth->logged_in())
		{
			redirect('Site/index');
		}
		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ( $this->form_validation->run() == true )
		{
			$identity = $this->input->post('identity', true);
			$password = $this->input->post('password', true);
			if ( $this->ion_auth->login($identity,$password) )
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				// redirect to profile page
				redirect('Site/profil', 'refresh');
			}
			else
			{
				// login unsuccessful
				// redirect back to login
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login','refresh');
			}
		}
		else
		{
			// Not logging in but displaying the login page
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			$this->data['main_content'] = 'login_view';
			$this->load->view('includes/template', $this->data);
		}
	}

	/**
	 * Log out
	 * @return void
	 */
	public function logout()
	{
		// logging the user out
		$logout = $this->ion_auth->logout();
		redirect('Site/index');
	}

	/**
	 * Bash add users
	 * Adds x users
	 * @return void
	 */
	public function bash_add_users()
	{
		$i = 0;
		while ($i <= 10)
		{
			$i++;
			$username = random_string();
			$password = rand(1000, 9999);
			$email = 'vide'.$i.'@vide.com';
			$additional_data = array(
			'first_name' => 'vide',
			'last_name' => 'vide',
			);
			$group = array('2');
			if ($this->ion_auth->register($username, $password, $email, $additional_data, $group))
			{
				echo "user " . $i . " added <br />";
			}
			else
			{
				echo 'failed <br />';
			}
		}
	}


}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
?>