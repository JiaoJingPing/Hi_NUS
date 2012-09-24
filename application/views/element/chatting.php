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
			$('#contentBox').animate({
				'left' : '+=300px',
				width: $(window).width()*.9 - 300
			},'slow');
			$('#msgRcv').animate({
				width :  $(window).width() - 300
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
			$('#contentBox').animate({
				'left' : '-=300px',
				width: $(window).width()*.9
			},'slow');
			$('#msgRcv').animate({
				width :  $(window).width()
			}, 'slow');
		
		}
		divShown = 0;

	}
	function switchToChat() {
	
		if(chatScreen == 0)
		{
			chatScreen = 1;
			autoChangeDiv();
		}
		else if(chatScreen == 1)
		{
			chatScreen = 0;
			hideDiv();
		}
			
	}
	
	function autoChangeDiv() {
			if(chatScreen == 0)
				return;
			pageWidth = $(window).width();
			if (pageWidth > 900) {
				showDiv();
			} else {
				hideDiv();
			}
			
			$('#slideOutDiv').animate({
					height : $(window).height() - heightToSubtract/2
				}, 'slow');
			$('#contentBox').animate({
				'top' : $(window).height() - heightToSubtract,
			}, 'slow');
			$('#sendBtn').animate({
				'top' : $(window).height() - heightToSubtract,
			}, 'slow');
		<!--$('#slideOutDiv').tinyscrollbar();-->
		  
		  $('#contentBox').watermark('Type to chat!');
		  $('#sendBtn').animate({width:  $(window).width()*.1},'slow');
		  $('#msgRcv').animate({height: $(window).height() - heightToSubtract}, 'slow');
		
	}
	function gotMessage(msg)
	{
		if(msg == $('#contentBox').val())
			appendSend(msg);
		else
			appendRecv(msg);
	}
	function appendRecv(msg)
	{
			$('#msgRcv').append('<div class="recvMsg">'+msg+'</div><br>');
	}
	function appendSend(msg)
	{
		$('#contentBox').val('');
		$('#msgRcv').append('<div class="sendMsg">'+msg+'</div><br><br><br>');
		
	}
</script>
<style>
.recvMsg
{
	background: url('../application/views/images/chatrecv.png');
	padding:20px; 
	height: 100px;
	width: 400px;
	font-size: 20pt;
	text-align: right;
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
.sendMsg
{
	position: absolute;
	background: url('../application/views/images/chatsend.png');
	padding:20px; 
	height: 100px;
	width: 400px;
	font-size: 20pt;
	text-align: left;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	right: 0px;
}
#contentBox
{
	position: absolute;
    top: 500px;
    left: 0px;
	width: 90%;
	float: left;
	overflow: hidden;
}
#sendBtn
{
	position: absolute;
    top: 500px;
    right: 0px;
	width: 10%;
}
#msgRcv
{
	position: absolute;
	background: url('../application/views/css/images/chatbg.png');
	background-repeat: repeat;
	height: 700px;
	right: 0px;
}
</style>
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> Show People </a>
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> Hide People </a>
		<a data-role="button" data-transition="flip" href="#page1" onClick="switchToChat();" class="ui-btn-right">
			Map
		</a>
		<h3 id="location_title"> Header </h3>
	</div>
	<div data-role="content" id="chatmiddle" class="middlecontent" style={"background-image:url('css/images/chatbg.png');background-repeat:repeat;"}>
	
	
	
	<div id="msgRcv">
	<!--<textarea readonly=true id="recvBox" rows="50" cols="300">
	</textarea>-->
	</div>
	
	<input type="text" id="contentBox"/>
	
		<div id="sendBtn">
		<input type="button" id="enterButton" value="Send" disabled='true'/>
		</div>
	</div>
	<div data-role="footer">
		<div data-role="navbar" data-iconpos="left" data-theme="a">
			<ul>
				<li>
					<a href="#page1" data-theme="" onClick="switchToChat();" data-icon="home">
						Nearby
					</a>
				</li>
				<li>
					<a href="#page5" data-theme="" onClick="switchToChat();" data-icon="plus">
						Friends
					</a>
				</li>
				<li>
					<a href="#page6" data-theme="" onClick="switchToChat();" data-icon="info">
						Profile
					</a>
				</li>
				<li>
					<a href="#page7" data-theme="" onClick="switchToChat();" data-icon="gear">
						Setting
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>