<!-- Friends -->

<?php
	$friend_info = "";

?>
<style type="text/css">

table{
	width:100%;
}
td.left {
	width:25%;
}
td.right {
	height:100%;
}
td div#name{
	height:33%;
	margin-bottom:5px
}

td div#other{
	color:grey;
	height:33%;
	margin-bottom:5px;
}


</style>


<div data-role="page" id="page5">
	<div data-theme="a" data-role="header">
		<h3>
			Friends
		</h3>
	</div>
	<div data-role="content" class="middlecontent">
		<ul id="friend-list" data-role="listview" data-filter="true" data-inset="true" data-filter-placeholder="Search people...">

			<li><a href="index.html">
				<div style="display:inline">
					<table>
						<tr>
							<td class="left" >
								<span ><img src="images/meinv.jpg" height="60" width="60" /></span>
							</td>
							<td class="right" >
								<div id="name">Bei Chuan Jing Zi
								</div>
								<div id="other">10km | 3days ago
								</div>
								<div id="other">too young too simple
								</div>
							</td>

						</tr>
					</table>
				</div>
			</a></li>
		</ul>

	</div>
	<div data-role="footer">
		<div data-role="navbar" data-iconpos="left" data-theme="a">
			<ul>
				<li>
					<a href="#page1" data-transition="slide" data-direction="reverse"  data-theme="" data-icon="home">
						Nearby
					</a>
				</li>
				<li>
					<a data-theme="b" data-icon="plus">
						Friends
					</a>
				</li>
				<li>
					<a href="#page6" data-transition="slide" data-theme="" data-icon="info">
						Profile
					</a>
				</li>
				<li>
					<a href="#page7" data-transition="slide" data-theme="" data-icon="gear">
						Setting
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>