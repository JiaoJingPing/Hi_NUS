<?php
class profile_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	var $profiles = array('male' => '/application/views/images/profile/male.jpg', 'female' => '/application/views/images/profile/female.jpg');

	function getDefaultProfile($gender = 'male') {
		return base_url() . $this -> profiles[$gender];
	}

}
?>