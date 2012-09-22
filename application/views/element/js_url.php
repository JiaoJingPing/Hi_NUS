<?php
$urls = array('location' => 'location/info',
			  'nearby_user' => 'ajax/near_users.php', 
			  'user' => 'user/info',
			  'post_location' => 'user/location',
			  );
?>
<script type="text/javascript">
urlConfig = {
<?php
	echo 'location' . ':  "' . WEBSITE_URL . $urls['location'] . '",';
	echo 'post_location' . ':  "' . WEBSITE_URL . $urls['post_location'] . '",';
	echo 'nearby_user' . ':  "' . VIEW_URL . $urls['nearby_user'] . '",';
	echo 'user' . ':  "' . WEBSITE_URL . $urls['user'] . '",';
?>};
</script>