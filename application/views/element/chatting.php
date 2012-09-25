<!-- chat -->
<script>
	function hideAllForSmallScreen()
	{
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
				$('#contentBox').hide();
				$('#chatTable').hide();
				$('#goToMap').hide();
				$('#enterButton').hide();
	}
	function showAllForSmallScreen()
	{
				$('#showPeopleBtn').show();
				$('#hidePeopleBtn').hide();
				$('#hidePeopleBtn').css({
					'visibility' : 'collapse'
				});
				$('#hidePeopleBtn').animate({
					'left' : '-=300px'
				}, 'slow');
				$('#slideOutDiv').animate({
					'left' : '-=500px'
				}, 'slow');
				$('#contentBox').show();
				$('#chatTable').show();
				$('#goToMap').show();
				$('#enterButton').show();
	}
	function showDiv() {
		if (divShown == 0) {
			if(!(navigator.platform == 'Win32' || navigator.platform == 'MacIntel' || navigator.platform == 'iPad'))
			{
				// this means not computer or ipad - so screen too small
				hideAllForSmallScreen();
			}
			else
			{
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
				/*$('#msgRcv').animate({
					width :  $(window).width() - 300
				}, 'slow');*/
				
				$('#chatTable').animate({
					'left' : '+=300px',
					width :  $(window).width() - 300
				},'slow');
			}
		}
		divShown = 1;

	}

	function hideDiv() {
		if (divShown == 1) {
			
			if(!(navigator.platform == 'Win32' || navigator.platform == 'MacIntel' || navigator.platform == 'iPad'))
			{
				// this means not computer or ipad - so screen too small
				showAllForSmallScreen();
			}
			else
			{
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
				/*$('#msgRcv').animate({
					width :  $(window).width()
				}, 'slow');*/
				$('#chatTable').animate({
					'left' : '-=300px',
					width :  $(window).width()
				}, 'slow');
			}
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
			if (pageWidth > 900 && $(window).height() > 600) {
				if(navigator.platform == 'Win32' || navigator.platform == 'MacIntel')
					showDiv();
			} else {
				hideDiv();
			}
			$('#contentBox').animate({
				width: $(window).width()*.9 - (divShown * 300)
			},'slow');
			$('#slideOutDiv').animate({
					height : $(window).height() - heightToSubtract/2
				}, 'slow');
			$('#contentBox').animate({
				'bottom' : heightToSubtract/2,
			}, 'slow');
			$('#sendBtn').animate({
				'bottom' : heightToSubtract/2,
			}, 'slow');
			$('#waitImg').animate({
				'bottom' : heightToSubtract/2,
				'right': $(window).width()*.11,
			}, 'slow');
		
		  
		  $('#contentBox').watermark('Type to chat!');
		  $('#sendBtn').animate({width:  $(window).width()*.1},'slow');
		  //sendBtn').animate({height:  $('#contentBox').height()},'slow');
		  //$('#msgRcv').animate({height: $(window).height() - heightToSubtract}, 'slow');
		  $('#chatTable').animate({height: $(window).height() - heightToSubtract}, 'slow');
		
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
			//$('#msgRcv').append('<div class="recvMsg">'+msg+'</div><br>');
			$('#chatTable').append('<tr><td class="recvMsg" colspan=1 rowspan=1>'+msg+'</td></tr>');
	}
	function appendSend(msg)
	{
		$('#contentBox').val('');
		//$('#msgRcv').append('<div class="sendMsg">'+msg+'</div><br><br><br>');
		$('#chatTable').append('<tr><td class="sendMsg" colspan=1 rowspan=1>'+msg+'</td></tr>');
		endSending();
	}

	function startSending()
	{
			$('#enterButton').button('disable');
			$('#contentBox').attr('disabled',true);
			$('#waitImg').css('visibility', 'visible');
	}
	function endSending()
	{
			$('#enterButton').button('enable');
			$("#contentBox").removeAttr('disabled');
			$('#waitImg').css('visibility', 'collapse');
	}
</script>
<style>
.recvMsg
{
	position: absolute;
	background: url('../application/views/images/chatrecv.png');
	padding:20px; 
	height: 40px;
	width: 300px;
	font-size: 1em;
	text-align: right;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	font-family:arial; 
}
.sendMsg
{
	position: absolute;
	background: url('../application/views/images/chatsend.png');
	padding:20px; 
	height: 40px;
	width: 300px;
	font-size: 1em;
	text-align: left;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	right: 0px;
	color: #FFFFFF;
	font-family:arial; 
}
#contentBox
{
	position: absolute;
    left: 0px;
	width: 90%;
	float: left;
	overflow: scroll;
}
#sendBtn
{
	position: absolute;
    
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
#waitImg
{
	position: absolute;
	visibility: collapse;
	padding-bottom: 20px;
}
#chatTable
{
	position: absolute;
	right: 0px;
}
.outerDiv
{
	 max-height: 500px; 
	 overflow-y: scroll;
     display: inline-block;
	 margin-right: 10px;
}
.innerDiv
{
	 width: 100%; 
	 margin-right: 20px; 
}
</style>
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> Show People </a>
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> Hide People </a>
		<a data-role="button" data-transition="flip" href="#page1" onClick="switchToChat();" class="ui-btn-right" id="goToMap">
			Map
		</a>
		<h3 id="location_title"> Header </h3>
	</div>
	<div data-role="content" id="chatmiddle" class="middlecontent" style={"background-image:url('css/images/chatbg.png');background-repeat:repeat;"}>
	
	
	<div class="outerDiv">
	<div class="innerDiv">
		<table id="chatTable">
		
		</table>
	</div>
	</div>
	<input type="text" id="contentBox"/>
		<img src="../application/views/images/spinner.gif" id="waitImg"/>
		<div id="sendBtn" valign="middle">
		<input type="button" onClick="startSending();" id="enterButton" value="Go!" disabled='true'/>
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