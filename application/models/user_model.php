<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* The user class
*/
class User_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Verify if the sent user exist
	 * @param  string $login    The login
	 * @param  string $password The password
	 * @return object           The user object or 'false' if none found.
	 */
	public function verify_user($login,$password)
	{
		$q = $this
			->db
			->where('login',$login)
			->where('password', $password)
			->limit(1)
			->get('user');
		if ( $q->num_rows > 0 ) {
			return $q->row();
		}
		return false;
	}

	/**
	 * Initialize the user
	 * @param  string $login The user login
	 * @return object        The user object
	 */
	public function init_user($login)
	{
		$user = $this->db->where('login',$login)->limit(1)->get('user');
		if ( $user->num_rows > 0 ) {
			return $user->row();
		}
	}

	/**
	 * Updates the user profile
	 * @param  array/object? $user The user
	 * @return string       Success message
	 */
	public function update($user,$user_info)
	{
		// updating the user

		$data = array(
			'id' => $user->id,
			'nom' => $user_info['nom'],
			'prenom' => $user_info['prenom'],
			'classe' => $user_info['classe']
		);
		$q = $this->db
				->where('id',$user->id)
				->update('user',$data);
		if ($this->db->affected_rows()) {
			return true;
		}
		return false;
	}

	public function nom_p($nom,$prenom)
	{
		return $nom . " " . substr($prenom,0,1) . ".";
	}
}