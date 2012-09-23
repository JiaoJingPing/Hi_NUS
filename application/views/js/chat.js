(function(){

	$("#contentBox").keyup(function(){
		if($('#contentBox').val().length>0 )
			$('#enterButton').button('enable');
		else
			$('#enterButton').button('disable');
	})
	
})()