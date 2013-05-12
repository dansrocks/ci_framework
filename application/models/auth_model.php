<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth 
 *
 * This model provide a way to manage user access and user rights
 *
 * @package	Auth
 * @author	Daniel Cabrera
 */
class Auth_model extends CI_Model
{
	private $table_name = 'users';

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Check a valid log in. If valid, return user data.  i.o.c, return false;
	 *
	 * @param	mix
	 * @return	user data | false
	 */
	function getUserByLogin($logininfo)
	{
		$user_info = false;
		
		$this->db->where(
				array(
					'email' => $logininfo['email'],
					'password' => $logininfo['passwd'],
					'activated' => 1
				));
		$query = $this->db->get($this->table_name);
		$num_rows = $query->num_rows();
		if ($num_rows == 1) {
			$users_info = $query->result();
			$user_info = $users_info[0];
			
		} elseif ($num_rows > 2) {
			//  ---------------------------------------- 
			//  @TODO  mandar un correo de aviso.
			//  ----------------------------------------
		}
		
		return $user_info;
	}

	
	/**
	 * Return user data given its user_id.
	 *
	 * @param	user_id
	 * @return	user data | false
	 */
	function getUserById($user_id)
	{
		$user_info = false;
		
		if (is_numeric($user_id) && $user_id>0) {
			$this->db->where(array( 'id' => $user_id, 'activated' => 1));
			$query = $this->db->get($this->table_name);
			$num_rows = $query->num_rows();
			if ($num_rows == 1) {
				$users_info = $query->result();
				$user_info = $users_info[0];

			} elseif ($num_rows > 2) {
				//  ---------------------------------------- 
				//  @TODO  mandar un correo de aviso.
				//  ----------------------------------------
			}
		}
		
		return $user_info;
	}
	
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */