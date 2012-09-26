(function(){
	function init_profile(){
		var member=getState('member');
		var user = member.user;
		var password = member.pw;
		var hashed = md5(user);

		$.ajax({
	        type : 'GET',
	        url : urlConfig.user+'/email/'+hashed,
	        headers : {
	            'Authorization' : 'Basic ' + window.btoa( user +':' + password )
	        },
	        success : function(response) {
	            var result = jQuery.parseJSON(response);
	            var data = result[0];
				$('#profile_name').html(data.name);
				$('#profile_name').addClass(data.gender);
				$('#profile_gender').html(data.gender.capitalize());
				$('#profile_gender').addClass(data.gender);
				$('#profile_status').html(data.status);
				$('#profile_status').addClass(data.gender);
				$('#profile_education').html(data.faculty + ' ' + data.major);
				$('#profile_education').addClass(data.gender);
	        },
	        error : function(response) {
	            console.log('Cannot to login');
	            //direct to login
	        }
	    });

		$('a.edit').click(function(){
			var type = $(this).children('div')[0].innerHTML;
			var value = $(this).children('div')[1].innerHTML;
			$('#edit_header').html(type);
			$("#edit_input").attr('value',value);
			
		});

	}
	
	init_profile();

})()