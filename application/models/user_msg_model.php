<?php
class user_msg_model extends CI_Model {
	var $tableName = 'user_msg';
	var $notNullKeys = array('user_from', 'user_to', 'content');
	var $primaryKeys = array('user_from', 'user_to');

	function getAllUserMsg() {
		$q = $this -> db -> get($this -> tableName);
		return $this -> prepareResult($q);
	}

	function getUserMsgWithCondition($data = array(), $email = 'testmail@gmail.com') {
		$date = new DateTime();
		$before = $date -> getTimestamp();
		$isValidQuery = false;
		foreach ($data as $key => $value) {
			if ($key == 'from' && $value) {
				$this -> db -> where('md5(user_from)', $value);
				if ($value == $email) {
					$isValidQuery = TRUE;
				}
			} else if ($key == 'to') {
				$this -> db -> where('md5(user_to)', $value);
				if ($value == $email) {
					$isValidQuery = TRUE;
				}
			} else if ($key == 'before') {
				$before = $value;
			} else if ($key == 'after') {
				$this -> db -> where('timestamp >', " FROM_UNIXTIME( " . $value . " )", FALSE);
			}
		}
		$this -> db -> where("timestamp < ", " FROM_UNIXTIME( " . $before . " ) ", false);
		if (!$isValidQuery) {
			$this -> db -> where("user_from='" . $email . "' OR user_to = '", $email . "'	", false);
		}
		$q = $this -> db -> get($this -> tableName);
		//echo $this -> db -> last_query();
		return $this -> prepareResult($q);
	}

	function insertUserMsg($userMsg) {
		//TODO need to ensure the msg is related to the called user
		try {
			if ($this -> isValidateInput($userMsg)) {
				$query = "INSERT INTO `" . $this -> tableName . "` (`user_from`, `user_to`, `content`, `timestamp`)
				VALUES ('" . $userMsg['user_from'] . "', '" . $userMsg['user_to'] . "', '" . $userMsg['content'] . "', CURRENT_TIMESTAMP)";
				$this -> db -> query($query);
				return TRUE;
			} else {
				return false;
			}
		} catch (Exception $e) {
			throw $e;
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