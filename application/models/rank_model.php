<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rank_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$query = $this->db->query('SELECT first_name,last_name,classe, COUNT(user_id) as count FROM checkin AS c INNER JOIN users ON users.id = c.user_id GROUP BY user_id ORDER BY count DESC');
		return $query->result();
	}

	/**
	 * Get the top 10
	 * @return array An array of objects (user objects)
	 */
	public function get_top10()
	{
		$query = $this->db->query('SELECT first_name,last_name,classe, COUNT(user_id) as count FROM checkin AS c INNER JOIN users ON users.id = c.user_id GROUP BY user_id ORDER BY count DESC LIMIT 10');
		return $query->result();
	}

}

?>