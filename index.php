<?php
require_once 'util.php';
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php require_once 'element/include_css.php'; ?>
		<script>
		window.onload = function()
                {
                   chatConnection(); // setup chat connection as soon as user open home page so that he dont have to wait later
				   $('.middlecontent').animate({height: $(window).height() - ($('#topbar').height() * 2) -30}, 1500);
				   $('#map_container').animate({height: $(window).height() - ($('#topbar').height() * 2) -30}, 1500);
					
                };
		window.addEventListener('orientationchange', handleOrientation, false);
		function handleOrientation() {
		
			$('.middlecontent').animate({height: $(window).height() - ($('#topbar').height() * 2) -30}, 1500);
			$('#map_container').animate({height: $(window).height() - ($('#topbar').height() * 2) -30}, 1500);
			
			
			
			//$('#map_container').hide();
			//$('#map_container').height($(window).height() - ($('#topbar').height() * 2));
			//$('#map_container').show();
		}
		</script>
        
        <title>Mobile App</title>
    </head>
	<body> 
   <!-- Home -->
		<div data-role="page" id="page1" class="page">
		    
		        <div data-theme="a" data-role="header" id="topbar">
		            <a data-role="button" data-transition="flip" href="#page9" class="ui-btn-left">
		                People
		            </a>
		            <h3>
		                Header
		            </h3>
		            <a data-role="button" data-transition="flip" href="#page4" class="ui-btn-right">
		                Chat
		            </a>
		        </div>
			<div data-role="content" style="padding: 15px" class="middlecontent">
		        <div id="map_container" height="100%"><span id="status">Loading...</span></div>
		     </div>
		    <div data-role="footer" id="commonfooter">
			    <div data-role="navbar" data-iconpos="left" data-theme="a">
			        <ul>
			            <li>
			                <a href="#page1" data-theme="" data-icon="home">
			                    Nearby
			                </a>
			            </li>
			            <li>
			                <a href="#page5" data-theme="" data-icon="plus">
			                    Friends
			                </a>
			            </li>
			            <li>
			                <a href="#page6" data-theme="" data-icon="info">
			                    Profile
			                </a>
			            </li>
			            <li>
			                <a href="#page7" data-theme="" data-icon="gear">
			                    Setting
			                </a>
			            </li>
			        </ul>
			    </div>
			</div>
		</div>
		<div pub-key="pub-0d10a610-c98a-49d8-afd4-8a5f2d5974ab" sub-key="sub-22a06fee-fc1d-11e1-b851-adb3f4169f17" ssl="off" origin="pubsub.pubnub.com" id="pubnub"></div>
        <?php 
				require_once 'element/include_php.php';
				require_once 'element/include_js.php';
				
		?>
	
    </body>
</html>
