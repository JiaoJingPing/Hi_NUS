<!-- chat -->

<style>

.timeStyle
{
	font-size: 0.7em;
	
}
.recvMsg
{
	
	!position: absolute;
	background: url('../application/views/images/chatrecv.png');
	padding:20px; 
	height: auto;
	width: auto;
	font-size: 1em;
	text-align: right;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	font-family:arial; 
	overflow: auto;
	word-wrap: break-word;
	max-width:250px;
	padding-top: 10px;
	
}
.sendMsg
{
	
	!position: absolute;
	background: url('../application/views/images/chatsend.png');
	padding:20px; 
	height: auto;
	width: auto;
	font-size: 1em;
	text-align: left;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	float: right;
	color: #FFFFFF;
	font-family:arial; 
	overflow: auto;
	word-wrap: break-word;
	max-width:250px;
	padding-top: 10px;
	
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

#waitImg
{
	position: absolute;
	visibility: collapse;
	padding-bottom: 20px;
}

#conversation
{
	height: 400px; 
	overflow-y: scroll;
}
</style>
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> People </a>
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> << Hide </a>
		<a data-role="button" data-transition="flip" href="#page1" onClick="switchToChat();" class="ui-btn-right" id="goToMap">
			Map
		</a>
		<h3 id="location_title"> Somewhere Near SoC </h3>
	</div>
	
	<div data-role="content" class="middlecontent">
	
	
	<div id="conversation">
	</div>
	<div>
	<input type="text" id="contentBox" style="max-height: 9%;height: 9%;overflow: auto"/>
	<img src="../application/views/images/spinner.gif" id="waitImg"/>
	<div id="sendBtn" valign="middle">
		<input type="button" onClick="startSending();"  style="height: 9%;min-height:9%;max-height:9%;" id="enterButton" style="font-size: 0.5em" value="Go" disabled='true'/>
	</div>
	
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