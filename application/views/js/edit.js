(function(){

	$('#edit_btn').click(function(event){
		$('#edit_msg').html('');
		
		var title = $('#edit_header').html().toString();
		var raw_value = $("#edit_input").attr('value').toString();
		
		//validate info
		//name
		title = $.trim(title.toLowerCase());
		value = $.trim(raw_value.toLowerCase());

		var edit_data;
		switch(title){
			case 'name':
			edit_data = {'name':value};
			break;
			case 'status':
			edit_data = {'status':value};
			break;
			case 'faculty':
			edit_data = {'faculty':value};
			break;
			case 'major':
			edit_data = {'major':value};
			break;
			case 'hobbies':
			edit_data = {'hobbies':value};
			break;
		}

		if(title=='name' && value==''){
			event.preventDefault();
			event.stopImmediatePropagation();
			$('#edit_msg').html('Name can not be empty');
		}
		else{
			$.ajax({
		        type : 'POST',
		        url : urlConfig.user,
		        headers : {
		            'Authorization' : 'Basic ' + window.btoa( getState('member').user +':' + getState('member').pw )
		        },
		        data : edit_data,
		        success : function(response){
		        	console.log(title);
		        	console.log(value);
		        	switch(title){
						case 'name':
						$('#profile_name').html(raw_value);
						break;
						case 'status':
						$('#profile_status').html(raw_value);
						break;
						case 'faculty':
						$('#profile_faculty').html(raw_value);
						break;
						case 'major':
						$('#profile_major').html(raw_value);
						break;
						case 'hobbies':
						$('#profile_hobbies').html(raw_value);
						break;
					}

		        	console.log('success');
		        } ,
		        error : function(response) {
		        	console.log(response);
		            console.log('Cannot to login');
		            //direct to login
		        }
		    });

 

		}

	});
	
})()