<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class rest extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
		//BASEURL
		define('VIEW_URL', 'http://ec2-122-248-209-136.ap-southeast-1.compute.amazonaws.com/application/views/');
	}

	function index() {
		$this -> load -> view('index');
	}

}
