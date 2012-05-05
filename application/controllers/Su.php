<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SU extends Admin_Controller {
	public function __construct()
	{
	   parent::__construct();
	}

	public function index()
	{
		$this->data['page_title'] = 'Admin home';
		$this->data['main_content'] = 'su_home_view';
		
		$this->load->view('includes/template', $this->data);
	}

}

/* End of file SU.php */
/* Location: ./application/controllers/SU.php */
?>