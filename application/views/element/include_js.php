<?php
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/js_url.php';
global $js_includes;
if (!$js_includes)
    $js_includes = array();

$js_includes = array_merge(array(
    'js/jquery-1.8.0.min.js', 
    'js/base.js',
	'js/google_analytics.js',
    'js/jquery.placeholder.min.js',
    'js/jquery.mobile-1.1.1.js', 
	'js/jquery.autosize.js',
	'js/chatcode.js',
	'js/pubnub-3.1.min.js',
	'js/geolocation.js',
), $js_includes);

?>
<?php
foreach ($js_includes as $js)
    echo '<script src="' . get_file_url($js) . '"></script>' . "\n";
//echo '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=true"></script>'

?>
