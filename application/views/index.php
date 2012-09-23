<?php
$this -> load -> view('util.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<?php
		$this -> load -> view('element/include_css.php');
		?>
		<script>
			var heightToSubtract;
			var pageWidth;
			var divShown;
			window.onload = function() {
				heightToSubtract = $('#topbar').height() * 2;
				pageWidth = $(window).width();
				divShown = 0;
				
				// setup chat connection as soon as user open home page so that he dont have to wait later
				$('.middlecontent').animate({
					height : $(window).height() - heightToSubtract
				}, 1500);
				// $('#map_container').animate({height: $(window).height() - ($('#topbar').height() * 2)}, 1500);

			};
			window.addEventListener('orientationchange', handleOrientation, false);

			function handleOrientation() {

				$('.middlecontent').animate({
					height : $(window).height() - heightToSubtract
				}, 1500);

				//$('#map_container').animate({height: $(window).height() - ($('#topbar').height() * 2)}, 1500);

				//$('#map_container').hide();
				//$('#map_container').height($(window).height() - ($('#topbar').height() * 2));
				//$('#map_container').show();
				//
			}

			function showDiv() {
				if (divShown == 0) {
					$('#showPeopleBtn').hide();
					$('#hidePeopleBtn').show();
					$('#hidePeopleBtn').css({
						'visibility' : 'visible'
					});
					$('#hidePeopleBtn').animate({
						'left' : '+=300px'
					}, 'slow');
					$('#slideOutDiv').animate({
						'left' : '+=500px'
					}, 'slow');
				}
				divShown = 1;

			}

			function hideDiv() {
				if (divShown == 1) {
					$('#slideOutDiv').animate({
						'left' : '-=500px'
					}, 'slow');
					$('#hidePeopleBtn').animate({
						'left' : '-=300px'
					}, 'slow', function() {
						$('#hidePeopleBtn').hide();
						$('#showPeopleBtn').show();
					});
				}
				divShown = 0;

			}

			function autoChangeDiv() {
				pageWidth = $(window).width();
				if (pageWidth > 900) {
					showDiv();
				} else {
					hideDiv();
				}
			}
		</script>

		<title>Mobile App</title>
	</head>
	<body>
		<!-- Home -->
		<div data-role="page" id="page1" class="page">

			<div data-theme="a" data-role="header" id="topbar">
				<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> Show People </a>
				<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> Hide People </a>
				<h3 id="location_title"> Header </h3>
				<a data-role="button" data-transition="flip" href="#page4" class="ui-btn-right"> Chat </a>
			</div>
			<div data-role="content" class="middlecontent">
				<div id="map_container" height="100%">
					<span id="status">Loading...</span>
				</div>
			</div>
			<div data-role="footer">
				<div data-role="navbar" data-iconpos="left" data-theme="a">
					<ul>
						<li>
							<a data-icon="home" data-theme="b"> Nearby </a>
						</li>
						<li>
							<a data-transition="slide" href="#page5" data-theme="" data-icon="plus"> Friends </a>
						</li>
						<li>
							<a data-transition="slide" href="#page6" data-theme="" data-icon="info"> Profile </a>
						</li>
						<li>
							<a data-transition="slide" href="#page7" data-theme="" data-icon="gear"> Setting </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div pub-key="pub-0d10a610-c98a-49d8-afd4-8a5f2d5974ab" sub-key="sub-22a06fee-fc1d-11e1-b851-adb3f4169f17" ssl="off" origin="pubsub.pubnub.com" id="pubnub"></div>
		<?php
		$this -> load -> view('element/include_php.php');
		$this -> load -> view('element/include_js.php');
		?>
		<script>
			$(window).resize(function() {
				autoChangeDiv();
			});
			autoChangeDiv();
		</script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=true"></script>
	</body>
</html>
