(function(){

	$('#edit_btn').click(function(event){
		$('#edit_msg').html('');
		
		var type = $('#edit_header').html();
		var value = $("#edit_input").attr('value');
		console.log(type);
		console.log(value);
		//validate info
		//name
		if(type=='Name' && value==''){
			event.preventDefault();
			event.stopImmediatePropagation();
			$('#edit_msg').html('Name can not be empty');
		}
		else{

			// $.ajax({
		 //        type : 'POST',
		 //        url : urlConfig.user,
		 //        headers : {
		 //            'Authorization' : 'Basic ' + window.btoa( getState('member').user +':' + getState('member').pw )
		 //        },
		 //        data : {}
		 //        error : function(response) {
		 //            console.log('Cannot to login');
		 //            //direct to login
		 //        }
		 //    });



		}

	});
	
})()