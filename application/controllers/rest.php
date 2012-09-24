<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class rest extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
		//BASEURL
		define('VIEW_URL', 'http://ec2-54-251-18-32.ap-southeast-1.compute.amazonaws.com/mobile/application/views/');
		define('WEBSITE_URL', base_url() . 'index.php/');
		$this -> load -> model('auth_model');
	}

	function index() {
		if ($this -> auth_model -> isMember()) {
			$this -> load -> view('index');
		} else {
			//TODO redirect to register page
			$this -> load -> view('login');
		}
	}



}
