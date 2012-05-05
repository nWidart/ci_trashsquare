<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poubelle_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->query("SELECT * FROM poubelle");
		return $query->result();
	}

}
/* End of file poubelle_model.php */
/* Location: ./application/models/poubelle_model.php */