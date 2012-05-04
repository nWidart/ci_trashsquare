<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* The user class
*
*/
class User_model extends CI_Model
{
	public $user_score;
	public $user_nomp;
	public $user_rank;
	// private $_CI;

	function __construct()
	{
		// $this->_CI = get_instance();
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
	public function init_user($login="")
	{
		$user = $this->db->where('login',$login)->limit(1)->get('user');
		if ( $user->num_rows > 0 ) {
			// Getting the user score
			$this->user_score = $this->get_user_score(1);
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

	/**
	 * Get the top 10
	 * @return array An array of objects (user objects)
	 */
	public function get_top10()
	{
		$query = $this->db->query('SELECT first_name,last_name,classe, COUNT(user_id) as count FROM checkin AS c INNER JOIN users ON users.id = c.user_id GROUP BY user_id ORDER BY count DESC');
		return $query->result();
	}

	/**
	 * Creation d'un Nom P.
	 * @param  string $nom    Le nom du user
	 * @param  string $prenom Le prenom du user
	 * @return string         La nouvelle variable Nom P.
	 */
	public function nom_p($nom,$prenom)
	{
		return $nom . " " . substr($prenom,0,1) . ".";
	}
}