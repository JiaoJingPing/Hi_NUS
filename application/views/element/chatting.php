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