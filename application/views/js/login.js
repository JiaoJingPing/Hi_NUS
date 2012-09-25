(function() {
	if ((getCookie('user') && getCookie('pw'))) {
		window.location.href = urlConfig.home;
	}
	$('a.toggle').click(function() {
		if (!$(this).hasClass('toggle_btn'))
			$('a.toggle').toggleClass("toggle_btn");
	});

	//join validate
	$('a#join_btn').click(function() {
		var error = false;
		$('#re_pass_error_msg').html(' ');
		$('#password_error_msg').html(' ');
		$('#email_error_msg').html(' ');
		if (!isEmail($('#email').val())) {
			$('#email').val('');
			$('#email_error_msg').html('Email not validate');
			error = true;
		}

		if ($('#password').val().length < 6) {
			$('#password').val('');
			$('#re-password').val('');
			$('#password_error_msg').html('password is too short');
			error = true;
		}

		if ($('#password').val() != $('#re-password').val()) {
			$('#password').val('');
			$('#re-password').val('');
			$('#re_pass_error_msg').html('password re-type is not same');
			error = true;
		}
		if (!error) {
			var user_info = {
				gender : $('a.toggle_btn > span >span').text().toLowerCase(),
				name : $('#name').val(),
				email : $('#email').val(),
				password : $('#password').val()
			};
			$.post(urlConfig.new_user, user_info, function(result) {
				console.log(result);
				if (result) {
					console.log('!!!!');
					console.log($('#email').val());
					setCookie('user', $('#email').val(), 7);
					setCookie('pw', md5($('#password').val()), 7);
				} else {
					$('#email_error_msg').html('Sorry, this email has been used');
				}
			}, 'json');
			window.location.href = urlConfig.home;
		}

	});

	$('a#login_btn').click(function() {
		var error = false;
		$('#error_msg').html(' ');
		if (!isEmail($('#login_email').val())) {
			$('#login_email').val('');
			$('#error_msg').html('Email not validate');
			error = true;
		}
		if (!error) {
			$.ajax({
				type : 'POST',
				url : 'user/login',
				headers : {
					'Authorization' : 'Basic ' + window.btoa($('#login_email').val() + ':' + md5($('#login_pass').val()))
				},
				success : function(response) {
					var result = jQuery.parseJSON(response);
					console.log(result);
					if (result.isSuccess) {
						setCookie('user', result.user, 7);
						setCookie('pw', md5($('#login_pass').val()), 7);
						// $.cookie("user", result.user, {
						//     expires : 7
						// });
						// $.cookie("pw", md5($('#login_pass').val()), {
						//     expires : 7
						// });
						window.location.href = urlConfig.home;

					} else {
						//invalid password or email
						alert('Invalid pw or email');
					}
				},
				error : function(response) {
					alert('Failed to login')
				}
			});
		}
	});

})()