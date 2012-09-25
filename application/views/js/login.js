(function(){


    $('a.toggle').click(function(){
    	if(!$(this).hasClass('toggle_btn'))
        	$('a.toggle').toggleClass("toggle_btn");
    });


    //join validate
    $('a#join_btn').click(function(){
    	var error = false;
    	$('#re_pass_error_msg').html(' ');
    	$('#password_error_msg').html(' ');
    	$('#email_error_msg').html(' ');
    	if(!isEmail( $('#email').val() )){
    		$('#email').val('');
    		$('#email_error_msg').html('email not validate');
    		error=true;
    	}

    	if( $('#password').val().length < 6 ){
    		$('#password').val('');
    		$('#re-password').val('');
    		$('#password_error_msg').html('password is too short');
    		error=true;
    	}

    	if($('#password').val()!=$('#re-password').val()){
    		$('#password').val('');
    		$('#re-password').val('');
    		$('#re_pass_error_msg').html('password re-type is not same');
    		error=true;
    	}
    	if(!error){
    		var user_info = {
	    		gender: $('a.toggle_btn > span >span').text().toLowerCase(),
	    		name : $('#name').val(),
	    		email : $('#email').val(),
	    		password : $('#password').val()
    		};
    		$.post(urlConfig.new_user,user_info);
    	}
    	

    });




})();