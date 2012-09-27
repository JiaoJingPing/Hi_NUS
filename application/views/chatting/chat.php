<head>
	<div pub-key="pub-0d10a610-c98a-49d8-afd4-8a5f2d5974ab" sub-key="sub-22a06fee-fc1d-11e1-b851-adb3f4169f17" ssl="off" origin="pubsub.pubnub.com" id="pubnub"></div>
</head>
<body onload="chatConnection();">

	<input type="text" id="contentBox"/>
	<input type="button" id="enterButton" value="Send" disabled=true onclick='sendChat("hello_world", $("#contentBox").val());'/>
	<br>
	<input type="text" readonly=true id="recvBox"/>
	<?php $this->load->view('element/include_js.php') ?>
</body>
