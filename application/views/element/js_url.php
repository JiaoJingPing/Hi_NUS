<?php
$urls = array('location' => 'ajax/location.php', 'nearby_user' => 'ajax/near_users.php', );
?>
<script type="text/javascript">
urlConfig = {
<?php
foreach ($urls as $name => $url)
	echo $name . ':  "' . VIEW_URL . $url . '",';
?>};</script>