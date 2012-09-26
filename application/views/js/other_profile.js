(function(){
	function init(){
		var user = getCookie('user');
		var password = getCookie('pw');

		// var hashed = md5(email);
		// $.ajax({
	 //        type : 'GET',
	 //        url : urlConfig.user+'/email/'+hashed,
	 //        headers : {
	 //            'Authorization' : 'Basic ' + window.btoa( user +':' + password )
	 //        },
	 //        success : function(response) {
	 //            var result = jQuery.parseJSON(response);
	 //            var data = result[0];
		// 		$('#other_profile_name').html(data.name);
		// 		$('#other_profile_name').addClass(data.gender);
		// 		$('#other_profile_gender').html(data.gender.capitalize());
		// 		$('#other_profile_gender').addClass(data.gender);
		// 		$('#other_profile_status').html(data.status);
		// 		$('#other_profile_status').addClass(data.gender);
		// 		$('#other_profile_education').html(data.faculty + ' ' + data.major);
		// 		$('#other_profile_education').addClass(data.gender);
	 //        },
	 //        error : function(response) {
	 //            console.log('Cannot to login');
	 //            //direct to login
	 //        }
	 //    });

	   

		


	}
	init();


})()