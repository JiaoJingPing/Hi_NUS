<?php
require_once 'util.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <?php require_once 'element/include_css.php'; ?>
        <title>Mobile App</title>
    </head>
   <!-- Home -->
		<div data-role="page" id="page1">
		    <div data-role="content" style="padding: 0px">
		        <div data-theme="" data-role="header" data-position="fixed">
		            <a data-role="button" data-transition="flip" href="#page9" class="ui-btn-left">
		                People
		            </a>
		            <h5>
		                Header
		            </h5>
		            <a data-role="button" data-transition="flip" href="#page4" class="ui-btn-right">
		                Chat
		            </a>
		        </div>
		        <img src="https://maps.googleapis.com/maps/api/staticmap?center=Madison, WI&amp;zoom=14&amp;size=315x385&amp;markers=Madison, WI&amp;sensor=false"
		        width="100%" height="100%">
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
		<!-- chat -->
		<div data-role="page" id="page4">
		    <div data-theme="a" data-role="header">
		        <a data-role="button" data-transition="flip" href="#page1" class="ui-btn-right">
		            Map
		        </a>
		        <h3>
		            Location LT27
		        </h3>
		    </div>
		    <div data-role="content" style="padding: 15px">
		        <div>
		            <p>
		                <b>
		                    A: Hello
		                </b>
		            </p>
		            <p>
		                <b>
		                    B:Hi
		                </b>
		            </p>
		            <p>
		                <b>
		                    C: how are u
		                </b>
		            </p>
		            <p>
		                <b>
		                    D: fine
		                </b>
		            </p>
		            <p>
		                <b>
		                    <br>
		                </b>
		            </p>
		            <p>
		                <b>
		                    <br>
		                </b>
		            </p>
		            <p>
		                <b>
		                    <br>
		                </b>
		            </p>
		            <p>
		                <b>
		                    <br>
		                </b>
		            </p>
		            <p>
		                <b>
		                    <br>
		                </b>
		            </p>
		        </div>
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
		<!-- Friends -->
		<div data-role="page" id="page5">
		    <div data-theme="a" data-role="header">
		        <h3>
		            Friends
		        </h3>
		    </div>
		    <div data-role="content" style="padding: 15px">
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
		<!-- My profile -->
		<div data-role="page" id="page6">
		    <div data-theme="a" data-role="header">
		        <a data-role="button" data-transition="fade" href="#page6" class="ui-btn-right">
		            Edit
		        </a>
		        <h3>
		            Profile
		        </h3>
		    </div>
		    <div data-role="content" style="padding: 15px">
		        <div class="ui-grid-a">
		            <div class="ui-block-a">
		                <div style="">
		                    <img style="width: 150px; height: 120px" src="http://assets.codiqa.com/ps/33214/5f4d06279d261a441-1111051TA1.jpg">
		                </div>
		            </div>
		            <div class="ui-block-b">
		            </div>
		            <div class="ui-block-a">
		                <div>
		                    <p>
		                        <b>
		                            Name
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-b">
		                <div>
		                    <p>
		                        <b>
		                            Colin Tan
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-a">
		                <div>
		                    <p>
		                        <b>
		                            Account No
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-b">
		                <div>
		                    <p>
		                        <b>
		                            2503687
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-a">
		                <div>
		                    <p>
		                        <b>
		                            State
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-b">
		                <div>
		                    <p>
		                        <b>
		                            I am very happy
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-a">
		                <div>
		                    <p>
		                        <b>
		                            Introduction
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-b">
		                <div>
		                    <p>
		                        <b>
		                            I am the Lecture of cs3216 hahaha
		                        </b>
		                    </p>
		                </div>
		            </div>
		            <div class="ui-block-a">
		            </div>
		            <div class="ui-block-b">
		            </div>
		        </div>
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
		<!-- Setting -->
		<div data-role="page" id="page7">
		    <div data-theme="a" data-role="header">
		        <h3>
		            Setting
		        </h3>
		    </div>
		    <div data-role="content" style="padding: 15px">
		        <ul data-role="listview" data-divider-theme="b" data-inset="true">
		            <li data-theme="c">
		                <a href="#page1" data-transition="slide">
		                    Feedback
		                </a>
		            </li>
		        </ul>
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
		<!-- Nearby -->
		<div data-role="page" id="page9">
		    <div data-theme="a" data-role="header">
		        <h3>
		            Nearby
		        </h3>
		        <a data-role="button" data-transition="flip" href="#page1" class="ui-btn-left">
		            Map
		        </a>
		        <a data-role="button" data-transition="none" href="#page5" class="ui-btn-right">
		            Filter
		        </a>
		    </div>
		    <div data-role="content" style="padding: 15px">
		        <ul data-role="listview" data-divider-theme="b" data-inset="true">
		            <li data-theme="c">
		                <a href="#page1" data-transition="slide">
		                    AAA
		                </a>
		            </li>
		            <li data-theme="c">
		                <a href="#page1" data-transition="slide">
		                    BBB
		                </a>
		            </li>
		            <li data-theme="c">
		                <a href="#page1" data-transition="slide">
		                    CCC
		                </a>
		            </li>
		        </ul>
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
				


        <?php require_once 'element/include_js.php'; ?>
    <script type="text/javascript">
</script>
    </body>
</html>
