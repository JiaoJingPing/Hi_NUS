<?php
class location_msg_model extends CI_Model {
	var $tableName = 'location_msg';
	var $notNullKeys = array('location_id', 'email', 'content');
	var $primaryKeys = array('email', 'location');

	function getAllLocationMsg() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function insertLocationMsg($localMsg) {
		if ($this -> isValidateInput($localMsg)) {

			$query = "INSERT INTO `" . $this -> database . "`.`location_msg` (`location_id`, `email`, `content`, `timestamp`) 
			VALUES ('" . $locationMsg['location_id'] . "', '" . $locationMsg['email'] . "', '" . $locationMsg['content'] . "', CURRENT_TIMESTAMP);";

			$this -> db -> query($query);
			return TRUE;
		} else {
			return false;
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