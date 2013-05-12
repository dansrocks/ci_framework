<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller extender
 *
 * Advance Controller for Code Igniter.
 *
 * @package		Auth
 * @author		Daniel Cabrera
 * @version		1.0.0
 * @based on	<none>
 * @license		2013 (c) author-not share-non commercial-non derived  
 */


class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		// load required libraries for auth
		$required_libraries = array('layout', 'auth');
		$this->load->library($required_libraries);
	}
	
	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($to=null, $subject=null, $body=null, $from=null)
	{
		$this->load->library('email');
		/* @var $this->email CI_Email */
		
		if (!$from)      $from = 'soy@gentedivertida.es';
		if (!$to)        $to = 'soy@gentedivertida.es';
		if (!$subject)   $subject = '[GD-MI] Mensaje interno GenteDivertida';
		if (!$body)      $body = '[GD-MI] Mensaje interno GenteDivertida';
		
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($body);
		$this->email->send();
	}
	
} // end of class