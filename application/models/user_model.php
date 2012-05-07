<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* The user class
*
*/
class User_model extends CI_Model
{
	function __construct()
	{
		// $this->_CI = get_instance();
		parent::__construct();
	}

	/**
	 * Gets the score of a user based on the user id
	 * @param  string $id="" The user id
	 * @return array        The user score
	 */
	public function get_user_score($id="")
	{
		$user_score = $this->db
							->select('user_id')
							->from('checkin')
							->where('user_id', $id)
							->get();
		return $user_score->num_rows();
	}

	public function get_user_id($username)
	{
		$query_str = "SELECT * FROM users WHERE username = ?";
		$user = $this->db->query($query_str, $username)->row();
		return $user->id;
	}

	/**
	 * Get the groups
	 * @return array array('id','group_name')
	 */
	public function get_groups()
	{
		$query_str = "SELECT * FROM groups";
		$groups_array = $this->db->query($query_str)->result_array();
		foreach ($groups_array as $key => $value) {
			$groups[$value['id']] = $value['name'];
		}
		return $groups;
	}
}