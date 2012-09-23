<?php
class auth_model extends CI_Model {
	const ADMIN_NAME = 'admin';
	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
	}

	function isMember() {
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			header('WWW-Authenticate: Basic realm="server realm rocks"');
			header('HTTP/1.0 401 Unauthorized');
			return false;
		} else {
			return $this -> user_model -> authenticate($_SERVER['PHP_AUTH_USER'], md5($_SERVER['PHP_AUTH_PW']));
		}
	}

	function isAdmin() {
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			header('WWW-Authenticate: Basic realm="server realm rocks"');
			header('HTTP/1.0 401 Unauthorized');
			return false;
		} else if ($_SERVER['PHP_AUTH_USER'] == self::ADMIN_NAME) {
			return $this -> user_model -> authenticate($_SERVER['PHP_AUTH_USER'], md5($_SERVER['PHP_AUTH_PW']));
		} else {
			return false;
		}
	}

	function getCurrentUser() {
		if ($this -> isMember()) {
			return $_SERVER['PHP_AUTH_USER'];
		} else {
			return false;
		}
	}

	function logout() {
		Header('WWW-Authenticate: Basic realm="protected area"');
		Header('HTTP/1.0 401 Unauthorized');
	}

}
?>