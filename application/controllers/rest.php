<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class rest extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
	}

	function index() {
		$this -> load -> view('index');
	}

	function location() {
		$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		$url_segs = $this -> uri -> segment_array();
		$seg_size = count($url_segs);
		print_r($request_method);
		print_r($url_segs);

		if ($seg_size >= 3) {
			switch($url_segs[2]) {
				case'msg' :
					//location/msg
					break;
				default :
				//location/params
			}
		} else {
			//location/
		}
	}

	function follower() {
		$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		$url_segs = $this -> uri -> segment_array();
		$seg_size = count($url_segs);
		print_r($request_method);
		print_r($url_segs);

	}

	function user() {
		$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		$url_segs = $this -> uri -> segment_array();
		$seg_size = count($url_segs);
		print_r($request_method);
		print_r($url_segs);

		if ($seg_size >= 3) {
			switch($url_segs[2]) {
				case'msg' :
					//user/msg
					break;
				case'location' :
					//user/location
					break;
				default :
				//user/params
			}
		} else {
			//user/
		}
	}

}
