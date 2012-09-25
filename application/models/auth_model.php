<?php
class auth_model extends CI_Model {
	var $realm = 'The batcave';
	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
	}

	function getCurrentUser() {
		if ($this -> isMember()) {
			$digest = $this -> getDigest();
			$digestParts = $this -> digestParse($digest);
			return $digestParts['username'];
		} else {
			return false;
		}
	}

	function login() {
		

	}

	function isMember() {

		$realm = $this -> realm;
		$nonce = uniqid();

		$digest = $this -> getDigest();

		// If there was no digest, show login
		if (is_null($digest))
			$this -> requireLogin($realm, $nonce);

		$digestParts = $this -> digestParse($digest);

		if (!isset($digestParts['username'])) {
			$this -> requireLogin($realm, $nonce);
		}

		$email = $digestParts['username'];

		if (!$this -> user_model -> isExist(array('email' => $email))) {
			$this -> requireLogin($realm, $nonce);
		}

		$validUser = $email;
		$validPass = $this -> user_model -> getPassword($email);

		// Based on all the info we gathered we can figure out what the response should be
		$A1 = md5("{$validUser}:{$realm}:{$validPass}");
		$A2 = md5("{$_SERVER['REQUEST_METHOD']}:{$digestParts['uri']}");

		$validResponse = md5("{$A1}:{$digestParts['nonce']}:{$digestParts['nc']}:{$digestParts['cnonce']}:{$digestParts['qop']}:{$A2}");

		if ($digestParts['response'] != $validResponse)
			return false;

		return TRUE;
	}

	function getDigest() {
		$digest = null;
		// mod_php
		if (isset($_SERVER['PHP_AUTH_DIGEST'])) {
			$digest = $_SERVER['PHP_AUTH_DIGEST'];
			// most other servers
		} elseif (isset($_SERVER['HTTP_AUTHENTICATION'])) {

			if (strpos(strtolower($_SERVER['HTTP_AUTHENTICATION']), 'digest') === 0)
				$digest = substr($_SERVER['HTTP_AUTHORIZATION'], 7);
		}

		return $digest;

	}

	// This function forces a login prompt
	function requireLogin($realm, $nonce) {
		header('WWW-Authenticate: Digest realm="' . $realm . '",qop="auth",nonce="' . $nonce . '",opaque="' . md5($realm) . '"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Text to send if user hits Cancel button';
		die();
	}

	// This function extracts the separate values from the digest string
	function digestParse($digest) {
		// protect against missing data
		$needed_parts = array('nonce' => 1, 'nc' => 1, 'cnonce' => 1, 'qop' => 1, 'username' => 1, 'uri' => 1, 'response' => 1);
		$data = array();

		preg_match_all('@(\w+)=(?:(?:")([^"]+)"|([^\s,$]+))@', $digest, $matches, PREG_SET_ORDER);

		foreach ($matches as $m) {
			$data[$m[1]] = $m[2] ? $m[2] : $m[3];
			unset($needed_parts[$m[1]]);
		}

		return $needed_parts ? false : $data;
	}

}
?>