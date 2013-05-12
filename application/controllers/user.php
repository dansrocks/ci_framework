<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		redirect('/');
	}

	/**
	 * Login user on the site
	 *
	 * @return void
	 */
	function login()
	{
		if ($this->auth->isLogged()) {
			redirect('user/profile');
		} else {
			if ($this->validateLogin()) {
				$logininfo = $this->getLoginInfo();
				$user_info = $this->auth->getUserByLogin($logininfo);
				if ($user_info !== false) {
					$this->auth->setLogIn($user_info);
					redirect('/portada');
				} else {
					$this->layout->aLE('login_error_message', 'Usuario incorrecto. Intentalo de nuevo.');
				}
			}
			$this->showLoginForm();
		}
		
	}

	/**
	 * Logout user
	 *
	 * @return void
	 */
	function logout()
	{
		if ($this->auth->isLogged()) {
			$this->auth->setLogOut();
			$this->layout->display('user/logout.php');
		} else {
			redirect('/');
		}
	}

	/**
	 * Register user on the site
	 *
	 * @return void
	 */
	function register()
	{
	}

	/**
	 * Send activation email again, to the same or new email address
	 *
	 * @return void
	 */
	function send_again()
	{
	}

	/**
	 * Activate user account.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function activate()
	{
	}

	/**
	 * Generate reset code (to change password) and send it to user
	 *
	 * @return void
	 */
	function forgot_password()
	{
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user).
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_password()
	{
	}

	/**
	 * Change user password
	 *
	 * @return void
	 */
	function change_password()
	{
	}

	/**
	 * Change user email
	 *
	 * @return void
	 */
	function change_email()
	{
	}

	/**
	 * Replace user email with a new one.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_email()
	{
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 *
	 * @return void
	 */
	function unregister()
	{
	}





	/**
	 * show user's profile
	 *
	 * @return	string
	 */
	public function profile()
	{
	}

	
	
/*
 * ================== PRIVATE METHODS FOR LOGIN ==================
 */	
/*
 * 			if ($this->validateLogin()) {
 
				$userinfo = getLoginInfo();
				$this->auth->setLogIn($userinfo);
				redirect('/portada');
			} else {
				$this->showLoginForm();
*/
	
	private function validateLogin() {
		$this->load->library('form_validation');
		
		// SET VALIDATION RULES
		$this->form_validation->set_rules( 'email', 'correo electrónico', 'required|valid_email' );
		$this->form_validation->set_rules( 'passwd', 'contraseña', 'required' );

		$this->form_validation->set_message('required', 'Introduce tu %s.');
		$this->form_validation->set_error_delimiters( '<em>','</em>' );

		return $this->form_validation->run();
	}

	private function getLoginInfo() {
		$this->load->library('form_validation');
		$info = array(
			'email' => set_value('email'),
			'passwd' => set_value('passwd')
			);
		return $info;
	}

	private function showLoginForm() {
		$this->layout->aLE('form_action', $this->uri->uri_string());
		$this->layout->display('user/login_form.php');
	}

}

/* End of file user.php */
/* Location: ./application/libraries/user.php */