<?php
require_once 'util.php';
echo ('cs3216 mobile app');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <?php require_once 'element/include_css.php'; ?>
        <title>Mobile App</title>
    </head>
    <body>
        <div data-role="page">

			<div data-role="header">
				<h1>My Title</h1>
			</div><!-- /header -->

			<div data-role="content">	
				<p>Hello world</p>		
			</div><!-- /content -->
		</div><!-- /page -->



        <?php require_once 'element/include_js.php'; ?>
    <script type="text/javascript">
</script>
    </body>
</html>
