<?php
require_once __DIR__ . '/../util.php';
global $js_includes;
if (!$js_includes)
    $js_includes = array();

$js_includes = array_merge(array(
    'js/jquery-1.8.0.min.js', 
    'js/base.js',
    'js/google_analytics.js',
    'js/jquery.placeholder.min.js',
    'js/jquery.mobile-1.1.1.js', 
), $js_includes);
?>
<?php
foreach ($js_includes as $js)
    echo '<script src="' . get_file_url($js) . '"></script>' . "\n";
?>
