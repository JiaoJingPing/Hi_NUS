<?php
class profile_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	var $profiles = array('male' => 'http://ec2-122-248-209-136.ap-southeast-1.compute.amazonaws.com/application/views/images/profile/male.jpg', 'female' => 'http://ec2-122-248-209-136.ap-southeast-1.compute.amazonaws.com/application/views/images/profile/female.jpg');

	function getDefaultProfile($gender = 'male') {
		return $this -> profiles[$gender];
	}

}
?>