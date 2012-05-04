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
}