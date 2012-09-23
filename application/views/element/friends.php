<!-- Friends -->

<?php
$friend_info = "";
$name = "Bei Chuan Jing Zi";
$distance = 10;
$last_active_time = 3;
$status = "too young too simple";
$friend_info .= '
	<li><a href="index.html" style="padding:5px">
					<table>
						<tr>
							<td class="left" >
								<span ><img src="' . VIEW_URL . 'images/meinv.jpg" height="70" width="70" /></span>
							</td>
							<td class="right" >
								<div id="name">' . $name . '
								</div>
								<div id="other">' . $distance . 'km | ' . $last_active_time . 'days ago
								</div>
								<div id="other">' . $status . '
								</div>
							</td>
						</tr>
					</table>
			</a></li>';
?>
<style type="text/css">
	table {
		width: 100%;
	}
	td.left {
		width: 25%;
	}
	td.right {
		height: 100%;
	}
	td div#name {
		height: 33%;
		margin-bottom: 5px
	}

	td div#other {
		color: grey;
		height: 33%;
		margin-bottom: 5px;
	}

</style>

<div data-role="page" id="page5">
	<div data-theme="a" data-role="header">
		<h3> Friends </h3>
	</div>
	<div data-role="content" class="middlecontent">
		<ul id="friend-list" data-role="listview" data-filter="true" data-inset="true" data-filter-placeholder="Search people...">
			<?php echo($friend_info); ?>
		</ul>

	</div>
	<div data-role="footer">
		<div data-role="navbar" data-iconpos="left" data-theme="a">
			<ul>
				<li>
					<a id='friends_nearby' href="#page1" data-transition="slide" data-direction="reverse"  data-theme="" data-icon="home"> Nearby </a>
				</li>
				<li>
					<a data-theme="b" data-icon="plus"> Friends </a>
				</li>
				<li>
					<a href="#page6" data-transition="slide" data-theme="" data-icon="info"> Profile </a>
				</li>
				<li>
					<a href="#page7" data-transition="slide" data-theme="" data-icon="gear"> Setting </a>
				</li>
			</ul>
		</div>
	</div>
</div>