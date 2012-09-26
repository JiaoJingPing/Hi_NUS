(function(){
	function init(){
		var user = getCookie('user');
		var password = getCookie('pw');


        $('#follow_btn').click(function(){
            //get button val
            var flag = $(this).children('span').children('span').text();
            var friend_email = $('#other_profile_email').text();
            console.log(friend_email);
            if(flag=='Follow'){
            	console.log(1);
                $.ajax({
                    type : 'POST',
                    url : urlConfig.follow,
                    headers : {
                        'Authorization' : 'Basic ' + window.btoa(getCookie('user') + ':' + getCookie('pw'))
                    },
                    data : {'user_followed': friend_email},
                    success : function(response) {
                        var result = jQuery.parseJSON(response);
                        if(result)
                            $('#follow_btn').children('span').children('span').text('Unfollow');
                    },
                    error : function(response) {
                        console.log('Cannot to follow');
                    }   
                });
            }
            else{
            	console.log(2);
                $.ajax({
                    type : 'DELETE',
                    url : urlConfig.follow,
                    headers : {
                        'Authorization' : 'Basic ' + window.btoa(getCookie('user') + ':' + getCookie('pw'))
                    },
                    data : {'user_followed': friend_email},
                    success : function(response) {
                        var result = jQuery.parseJSON(response);
                        if(result)
                            $('#follow_btn').children('span').children('span').text('Follow');
                    },
                    error : function(response) {
                        console.log('Cannot to Unfollow');
                    }   
                });
            }
        });
		


	}
	init();


})()