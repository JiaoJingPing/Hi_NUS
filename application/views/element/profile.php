<?php
	$name = "Bei Chuan";
	$last_location ="National University of Singapore SOC";
	$status = "CSS is really a shit stuff";
	$gender="female";
	$education="National University of Singapore SOC";
	$hobbies ="Reading, Swimming, Playing games";
?>


<div data-role="page" id="page6">
    <div id='profile_header' data-theme="a" data-role="header">
        
        <h3>Profile</h3>
    </div>
    <div data-role="content" class="middlecontent ceil-text">
    	<div class="photo-area">
    		<img class="photo"  src="http://assets.codiqa.com/ps/33214/5f4d06279d261a441-1111051TA1.jpg">
    		<!--<button id="change_photo" data-inline="true" data-theme="e">Change</button>-->
    	</div>
    	<div class="info-area">
    		<ul id="info"  data-role="listview" data-inset="true">
    			<li ><a href='#page10' class="edit single-line" data-transition="slide" data-theme="">
    				<div class="single-line-left">Name</div>
    				<div class="single-line-right" id='profile_name'></div>
    			</a></li>
    			<li><a>
    				<div>Last Location</div>
    				<div class=<?php echo($gender);?>><?php echo($last_location);?></div>
    			</a></li>
    			<li><a href='#page10' class='edit'>
    				<div>Status</div>
    				<div id="profile_status"></div>
    			</a></li>
    		</ul>
    		<br/>
    		<ul id='info' data-role="listview" data-inset="true" data-divider-theme="a" >
    			<li data-role="list-divider">Basic Info</li>
    			<li ><a class="single-line" >
    				<div class="single-line-left">Gender</div>
    				<div class="single-line-right" id="profile_gender"></div>
    			</a></li>
    			<li><a href='#page10' class='edit'>
    				<div>Education</div>
    				<div id="profile_education"> </div>
    			</a></li>	        		
    			<li><a href='#page10' class='edit'> 
    				<div>Hobbies</div>
    				<div class = <?php echo($gender);?> > <?php echo($hobbies);?></div>
    			</a></li>
    			
    		</ul>
        </div>
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
	                <a href="#page5" data-transition="slide" data-direction="reverse"  data-theme="" data-icon="plus">
	                    Friends
	                </a>
	            </li>
	            <li>
	                <a data-theme="b" data-icon="info">
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

