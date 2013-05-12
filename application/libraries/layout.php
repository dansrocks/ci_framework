<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Environment
 *
 * Environment Manager library for Code Igniter.
 *
 * @package		Auth
 * @author		Daniel Cabrera
 * @version		1.0.0
 * @based on	<none>
 * @license		2013 (c) author-not share-non commercial-non derived  
 */

class Layout
{
	private static $instance;
	
	private $content = array();
	private $tmpl_header = null;
	private $tmpl_footer = null;
	private $tmpl_body = null;
	private $addJS = array();

	static public function &getInstance() {
		return self::$instance;
	}
	
	public function __construct()
	{
		self::$instance =& $this;
	}
	
	public function aLE($var, $value=null) {
		$this->content[$var] = $value;
	}
	
	public function display($tmpl=null) {
		
		if ($tmpl===null) {
			$tmpl = $this->tmpl_body;
		}

		if ($tmpl===null) {
			throw new Exception('[Layout] No se ha definido template.');
		} else {
			$ci =& get_instance();
			$ci->load->view($tmpl, $this->content);
		}
	}
	
	public function dumpContent() {
		print_r($this->content);
	}

}
