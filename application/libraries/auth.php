<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth
 *
 * Authentication library for Code Igniter.
 *
 * @package		Auth
 * @author		Daniel Cabrera
 * @version		1.0.0
 * @based on	<none>
 * @license		2013 (c) author-not share-non commercial-non derived  
 */

class Auth
{
	
	const PASSWORD_SALT = '47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU=';
	const CONTENT_PREFIX = 'userinfo_';

	private $user_info = null;
	
	private static $instance;
	
	private $ci = null;

	public function __construct()
	{
		if ($this->ci == null) {
			$this->ci =& get_instance();
		}
		$user_data = $this->ci->session->userdata('user_data');
		
		// if user is logged in, then get the userinfo 
		if ($this->isLogged()) {
			$id = $this->getUserIdFromSession();
			$this->ci->load->model('auth_model');
			$user_info = $this->ci->auth_model->getUserById($id);
			if ($user_info !== false) {
				$this->user_info = $user_info;
				
				// refrescamos los datos de la sesión para mantenerla
				$this->ci->session->set_userdata('user_data', $user_data);
				
				// anyadimso la información del usuario al layout para mostrarla
				$this->addUserInfoToContent($this->ci->layout);
				
			} else {
				$this->setLogOut();			// if user doesn't exists -> logout "for unknow user"
				//  ---------------------------------------- 
				//  @TODO  mandar un correo de aviso.
				//  ----------------------------------------
				
			}
		}
	}
	
	public function setLogIn($user_info) {
		$user_data = array('isLogged' => true, 'userId' => $user_info->id);
		$this->ci->session->set_userdata('user_data', $user_data);
		$this->user_info = $user_info;
	}
	
	public function setLogOut() {
		$this->ci->session->set_userdata('user_data', null);
		$this->user_info = null;
	}

	public function isLogged() {
		$user_data = $this->ci->session->userdata('user_data');
		if (isset($user_data['isLogged'])) {
			$isLogged = $user_data['isLogged'];
		} else {
			$isLogged = false;
		}
			
		return $isLogged;
	}
	
	private function getUserIdFromSession() {
		$user_data = $this->ci->session->userdata('user_data');
		if (isset($user_data['userId'])) {
			$user_id = $user_data['userId'];
		} else {
			$user_id = false;
		}
			
		return $user_id;
	}
	
	public function getUserByLogin($form = array()) {
		$user_info = false;
		
		if (!empty($form['email']) && !empty($form['passwd'])) {
			// load User model  to get userinfo
			$this->ci->load->model('auth_model');
			$user_info= $this->ci->auth_model->getUserByLogin($form);
		}
		
		return $user_info;
	}
	
	public function addUserInfoToContent(&$layout) {
		if ($this->isLogged()) {
			$properties = array ('id','username', 'email');
			foreach ($properties as $property) {
				if (property_exists($this->user_info, $property)) {
					$name = self::CONTENT_PREFIX . $property;
					$layout->aLE($name, $this->user_info->$property);
				}
			}
			$name = self::CONTENT_PREFIX . 'isLogged';
			$layout->aLE($name, true);
		} else {
			$name = self::CONTENT_PREFIX . 'isLogged';
			$layout->aLE($name, false);
		}
	}
	
	public function __toString() {
		return "Not implemented Auth::__toString().";
	}
}
