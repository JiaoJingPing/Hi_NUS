<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class location extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
		$this -> load -> model('auth_model');
		$this -> load -> model('location_model');
		$this -> load -> model('location_msg_model');
		$this -> load -> model('output_model');
		
	}

	function index() {
		//location/
		$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
		$output = array();
		$result = array();

	}

	function info() {
		$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
		$output = array();
		$result = array();
		try {
			//TODO AUTHENTICATION
			if (true) {
				//if member
				switch($request_method) {
					case'GET' :
						$result = $this -> location_model -> getAllLocation();
						$this -> output_model -> sendResponse(200, $result);
						break;
					case'POST' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					case'PUT' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					case'DELETE' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					default :
						$this -> output_model -> sendResponse(405, $result);
				}
			} else {
				switch($request_method) {
					case'GET' :
						$result = $this -> location_model -> getAllLocation();
						$this -> output_model -> sendResponse(200, $result);
						break;
					case'POST' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					case'PUT' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					case'DELETE' :
						$this -> output_model -> sendResponse(405, $result);
						break;
					default :
						$this -> output_model -> sendResponse(405, $result);
				}
			}
		} catch(Exception $e) {
			$this -> output_model -> sendResponse(400, $result, $e -> getMessage());
		}
	}

	function msg() {
		//user/msg/params
		$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
		$output = array();
		$result = array();

		if (true) {
			//if member
			//TODO $email = $this -> auth_model -> getCurrentUser();
			$email = 'elleyjiao@gmail.com';
			switch($request_method) {
				case'GET' :
					$param = $this -> uri -> uri_to_assoc();
					$result = $this -> user_msg_model -> getLocationMsgWithCondition($param);
					$this -> output_model -> sendResponse(200, $result);
					break;
				case'POST' :
					$param = $this -> input -> post();
					$result = $this -> user_msg_model -> insertLocationMsg($param);
					$this -> output_model -> sendResponse(200, $result);
					break;
				case'PUT' :
					$this -> output_model -> sendResponse(405, $result);
					break;
				case'DELETE' :
					$this -> output_model -> sendResponse(405, $result);
					break;
				default :
					$output['error'] = 'NO METHOD';
					$output['method'] = $request_method;
					$this -> load -> view('error', $output);
			}
		} else {
			//else
			$this -> output_model -> sendResponse(405, $result);
		}
	}

	function user() {
		//user/msg/params
		$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
		$output = array();
		$result = array();

		if (true) {
			//if member
			//$email = md5($this -> auth_model -> getCurrentUser());
			$email = 'elleryjiao@gmail.com';
			switch($request_method) {
				case'GET' :
					$result = $this -> user_model -> getUserLastLocation($email);
					$this -> output_model -> sendResponse(200, $result);
					break;
				case'POST' :
					$param = $this -> input -> post();
					$result = $this -> user_model -> updateUserLastLocation($email, $param);
					$this -> output_model -> sendResponse(200, $result);
					break;
				case'PUT' :
					break;
				case'DELETE' :
					break;
				default :
					$output['error'] = 'NO METHOD';
					$output['method'] = $request_method;
					$this -> load -> view('error', $output);
			}
		} else {
			//else
			$this -> output_model -> sendResponse(405, $result);
		}
	}

}
