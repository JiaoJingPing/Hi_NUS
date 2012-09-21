<?php
class follow_model extends CI_Model {
	var $tableName = 'follow';
	var $notNullKeys = array('user', 'user_followed');
	var $primaryKeys = array('user', 'user_followed');

	function getAllFollow() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function insertFollow($follow) {
		if ($this -> isValidateInput($follow) && (!$this -> isExist($follow))) {
			$query = "INSERT INTO `" . $this -> database . "`.`follow` (`user`, `user_followed`, `timestamp`) 
			VALUES ('" . $users['user'] . "', '" . $users['user_followed'] . "',  CURRENT_TIMESTAMP)";
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
				$data[] = $row;
			}
		}
		return $data;
	}

}
?>