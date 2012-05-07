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

	/**
	 * Get all users
	 * @return array of objects
	 */
	public function get_all()
	{
		$query_str = "SELECT * FROM users";
		$users_data = $this->db->query($query_str)->result();

		return $users_data;
	}

	/**
	 * Get the group of a user based from his ID
	 * @param  string $id user id
	 * @return string     group id
	 */
	public function get_user_group($id)
	{
		$query_str = "SELECT * FROM users_groups AS g ";
		$query_str .= "INNER JOIN users ON users.id = g.user_id ";
		$query_str .= "INNER JOIN groups ON groups.id = g.group_id ";
		$query_str .= "WHERE user_id = ?";
		$result = $this->db->query($query_str, $id)->row();

		if (isset($result->group_id))
		{
			return $result->group_id;
		}
		else
		{
			return 2;
		}
	}
}