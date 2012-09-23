<!-- chat -->
<script>
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
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> Show People </a>
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> Hide People </a>
		<a data-role="button" data-transition="flip" href="#page1" class="ui-btn-right">
			Map
		</a>
		<h3>
			Location LT27
		</h3>
	</div>
	<div data-role="content" class="middlecontent" style={"background-image:url('css/images/chatbg.png');background-repeat:repeat;"}>
	
	<input type="text" id="contentBox"/>
	<input type="button" id="enterButton" value="Send" disabled='true' />
	<br>
	<textarea readonly=true id="recvBox" rows="50" cols="300">
	
	</textarea>

	</div>
	<div data-role="footer">
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