<?php
class location_msg_model extends CI_Model {
	var $tableName = 'location_msg';
	var $notNullKeys = array('location_id', 'content');
	var $primaryKeys = array('email', 'location_id');

	function getAllLocationMsg() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function getLocationMsgWithCondition($param, $email = 'testmail@gmail.com') {
		$date = new DateTime();
		$before = $date -> getTimestamp();

		foreach ($param as $key => $value) {
			if ($key == 'location_id' && $value) {
				$this -> db -> where('location_id', $value);
			} else if ($key == 'before' && $value) {
				$before = $value;
			} else if ($key == 'after' && $value) {
				$this -> db -> where('timestamp >', " FROM_UNIXTIME( " . $value . " )", FALSE);
			}
		}

		$this -> db -> where("timestamp < ", " FROM_UNIXTIME( " . $before . " ) ", false);
		$this -> db -> where('email', $email);
		$q = $this -> db -> get($this -> tableName);
		//echo $this -> db -> last_query();
		return $this -> prepareResult($q);
	}

	function insertLocationMsg($locationMsg, $email) {
		if ($this -> isValidateInput($locationMsg)) {

			$query = "INSERT INTO `cs3216`.`location_msg` (`location_id`, `email`, `content`, `timestamp`) VALUES ('" . $locationMsg['location_id'] . "', '" . $email . "', '" . $locationMsg['content'] . "', CURRENT_TIMESTAMP)";
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