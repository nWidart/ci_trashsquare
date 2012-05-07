<?php

class Checkin_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	/**
	 * Adds a checkin to the checkin table
	 * @param string $user_id     the user id
	 * @param string $poubelle_id the poubelle id
	 * @return boolean
	 */
	public function add($user_id,$poubelle_id)
	{
		$query_str = "INSERT INTO checkin(user_id,poubelle_id) ";
		$query_str .= "VALUES($user_id, $poubelle_id)";
		$result = $this->db->query($query_str);

		if ($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
/* End of file Checkin_model.php */
/* Location: ./application/models/Checkin_model.php */