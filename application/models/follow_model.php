<?php
class follow_model extends CI_Model {

	var $tableName = 'follow';
	var $notNullKeys = array('user', 'user_followed');
	var $primaryKeys = array('user', 'user_followed');

	function getAllFollow() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function getFollower($email) {
		$q = $this -> db -> select('user');
		$this -> db -> where('user_followed', $email);
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function getFollowed($email) {
		$q = $this -> db -> select('user_followed');
		$this -> db -> where('user', $email);
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function addFollowed($user, $param) {
		if (isset($param['user_followed']) && (!$this -> isExist($user, $param['user_followed']))) {
			$user_followed = $param['user_followed'];
			$query = "INSERT INTO `" . $this -> tableName . "` (`user`, `user_followed`, `timestamp`) 
			VALUES ('" . $user . "', '" . $user_followed . "',  CURRENT_TIMESTAMP)";
			$this -> db -> query($query);
			return TRUE;
		} else {
			return FALSE;
		}

	}

	function isExist($user, $user_followed) {
		$this -> db -> where('user', $user);
		$this -> db -> where('user_followed', $user_followed);
		$q = $this -> db -> get($this -> tableName);
		return ($q -> num_rows() > 0);
	}

	private function prepareResult($resultArray = array()) {
		$data = array();
		if ($resultArray -> num_rows() > 0) {
			foreach ($resultArray->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

}
?>