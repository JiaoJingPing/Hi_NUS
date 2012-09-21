<!-- chat -->
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="flip" href="#page1" class="ui-btn-right">
			Map
		</a>
		<h3>
			Location LT27
		</h3>
	</div>
	<div data-role="content" class="middlecontent" style={"background-image:url('css/images/chatbg.png');background-repeat:repeat;"}>
	
	<input type="text" id="contentBox"/>
	<input type="button" id="enterButton" value="Send" disabled=true' onclick='sendChat("hello_world", $("#contentBox").val());'/>
	<br>
	<textarea readonly=true id="recvBox" rows="15" cols="300">
	
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