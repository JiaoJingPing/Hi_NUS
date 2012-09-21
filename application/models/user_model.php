<?php
class user_model extends CI_Model {
	var $tableName = 'user';
	var $notNullKeys = array('name', 'password', 'email', 'gender');
	var $primaryKeys = array('email');

	//supposed not to use
	function getAllUser() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function getUserWithEmail($email = 'test@mail.com') {
		$q = $this -> db -> get_where($this -> tableName, array('email' => $email));
		return $this -> prepareResult($q);
	}

	function getUserWithCondition($data = array()) {
		$point = array();
		foreach ($data as $key => $value) {
			if ($key == 'email') {
				$query = "SELECT * FROM `" . $this -> tableName . "` WHERE md5(email)='" . $value . "'";
				$q = $this -> db -> query($query);
				return $this -> prepareResult($q);
			} else if ($key == 'x') {
				$point['x'] = $value;
			} else if ($key == 'y') {
				$point['y'] = $value;
			} else if ($key == 'major') {
				$this -> db -> where('major like', '%' . $value . '%');
			} else if ($key == 'status') {
				$this -> db -> where('status LIKE', '%' . $value . '%');
			} else if ($key == 'faculty') {
				$this -> db -> where('faculty LIKE', '%' . $value . '%');
			} else if ($key == 'name') {
				$this -> db -> where('name LIKE', '%' . $value . '%');
			} else if ($key == 'gender') {
				$this -> db -> where('gender', $value);
			}
		}
		if (isset($point['x']) && isset($point['y'])) {
			//$this -> db -> where('last_location', $this -> prepareGeoPoint($point));
		}
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function updateUserLastLocation($email, $point) {
		$query = "UPDATE  `" . $this -> tableName . "` SET  `last_location` = " . $this -> prepareGeoPoint($point) . " ,`last_location_timestamp` =  CURRENT_TIMESTAMP WHERE `email` =  '" . $email . "'";
		$q = $this -> db -> query($query);
		//echo $this -> db -> last_query();
		return $this -> getUserWithEmail($email);
	}

	function getUserLastLocation($email) {
		$this -> db -> select('last_location,last_location_timestamp');
		$this -> db -> where('email', $email);
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function updateUser($email, $data) {

		if (isset($data['email']))
			unset($array['email']);
		if (isset($data['password']))
			unset($array['password']);
		if (isset($data['last_location']))
			unset($array['last_location']);
		$this -> db -> where('email', $email);
		$this -> db -> update($this -> tableName, $data);
		return $this -> getUserWithEmail($email);
	}

	function insertUser($user = array()) {
		if ($this -> isValidateInput($user) && (!$this -> isExist($user))) {

			$default = 'NULL';
			$status = array_key_exists('status', $user) ? "'" . $user['status'] . "'" : $default;
			$faculty = array_key_exists('faculty', $user) ? "'" . $user['faculty'] . "'" : $default;
			$major = array_key_exists('major', $user) ? "'" . $user['major'] . "'" : $default;
			$profile = array_key_exists('profile', $user) ? $user['profile'] : $default;

			$query = "INSERT INTO `" . $this -> tableName . "` ( `email` ,`name` ,`password` ,`gender` ,`status` , `major` ,`faculty` ,`profile`)
			VALUES ('" . $user['email'] . "',  '" . $user['name'] . "', MD5(  '" . $user['password'] . "' ) ,  '" . $user['gender'] . "',  " . $status . ",  " . $major . ",  " . $faculty . ", " . $profile . ")";

			$this -> db -> query($query);
			return TRUE;
		} else {
			return false;
		}
	}

	function isExist($input) {
		foreach ($this->primaryKeys as $key) {
			$this -> db -> where($key, $input[$key]);
		}
		$query = $this -> db -> get($this -> tableName);
		if ($query -> num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function authenticate($email, $pw) {
		$this -> db -> where('email', $email);
		$this -> db -> where('password', $pw);
		$query = $this -> db -> get($this -> tableName);
		if ($query -> num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function isValidateInput($input) {
		$result = true;
		foreach ($this->notNullKeys as $key) {
			$result = $result && (array_key_exists($key, $input));
			if ($result == true) {
				$result = $result && (!(is_null($input[$key]) || $input[$key] == ''));
			} else {
				break;
			}
		}
		return $result;
	}

	private function prepareResult($resultArray = array()) {
		$data = array();
		if ($resultArray -> num_rows() > 0) {
			foreach ($resultArray->result_array() as $row) {
				unset($row['password']);
				//NEVER RETURN PASSWORD
				$data[] = $row;
			}
		}
		return $data;
	}

	private function prepareGeoPoint($point) {
		return "GEOMFROMTEXT('POINT(" . $point['x'] . " " . $point['y'] . ")',0)";
	}

}
?>