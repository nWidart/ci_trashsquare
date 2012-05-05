<?php

class Admin_Controller extends CI_Controller {

	//Class-wide variable to store user object in.
	protected $the_user;

	public function __construct() {

		parent::__construct();

		//Check if user is in admin group
		if ( $this->ion_auth->is_admin() ) {
			$data->good = "good";

			//Put User in Class-wide variable
			$data->the_user = $this->ion_auth->user()->row();
			//Store user in $data
			$this->the_user = $data->the_user;

			//Load $the_user in all views
			$this->load->vars($data);
		}
		else {
			redirect('/');
		}
	}
}

class User_Controller extends CI_Controller {

	protected $the_user;

	public function __construct() {

		parent::__construct();

		if($this->ion_auth->is_group('eleves')) {
			$data->the_user = $this->ion_auth->user()->row();
			$this->the_user = $data->the_user;
			$this->load->vars($data);
		}
		else {
			redirect('/');
		}
	}
}

class Common_Auth_Controller extends CI_Controller {

	protected $the_user;

	public function __construct() {

		parent::__construct();

		if($this->ion_auth->logged_in()) {
			// Loading the user var
			$data->the_user = $this->ion_auth->user()->row();
			$this->the_user = $data->the_user;
			$this->load->model('user_model');
			// Getting the user score
			$this->data['user_score'] = $this->user_model->get_user_score($data->the_user->id);
			$this->load->vars($data);
		}
		else {
			redirect('Guest/'. $this->uri->segment(2) );
		}
	}
}