<?php
require_once __DIR__ . '/../util.php';
$urls = array(
    'location' => 'ajax/location.php',

);
?>
<script type="text/javascript">
urlConfig = {
    <?php
    foreach ($urls as $name => $url)
        echo $name . ':  "' . get_file_url($url) . '",';
    ?>
};
</script>