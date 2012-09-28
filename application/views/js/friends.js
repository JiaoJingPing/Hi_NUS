(function() {
	window.buildFriendList=function(data) {
					var friends_info = '';
					
					$('#friend-list').empty();
					$.each(data, function(index, value) {
					var email = value.user_followed;
					var hashed = md5(email);
				
					//console.log(email);
					//console.log(value);
					$.ajax({
						type : "GET",
						url : urlConfig.user + '/email/' + hashed,
						headers : {
							'Authorization' : 'Basic ' + window.btoa(getState('member').user + ':' + getState('member').pw )
						},
						success : function(data) {
							var data = jQuery.parseJSON(data);
							data = data[0];
							var geometry=data.geometry;
							var geoname='undefined';
							if(geometry!=null){
								geoname=window.get_location(data.geometry.x,data.geometry.y).name;
							}
							//console.log(data);
							friends_info = '\
							<li><a class="friend-list-element" href="#page8"  data-transition="slide" style="padding:5px">\
								<div class="hidden" id=friends_email>'+data.email+'</div>\
								<table>\
									<tr>\
										<td class="left" >\
											<span ><img src='+data.profile+' height="70" width="70" /></span>\
										</td>\
										<td class="right" >\
											<div id="name" class='+data.gender+'>' + data.name + '\
											</div>\
											<div id="other">' + geoname + ' '+ data.last_location_timestamp + '\
											</div>\
											<div id="other">' + data.status + '\
											</div>\
										</td>\
									</tr>\
								</table>\
							</a></li>';
							$('#friend-list').append(friends_info);
							$('.friend-list-element').last().click(function(){
							 	var friend_email = $(this).children('div')[0].innerHTML;
							 	//setCookie('friend',friend_email,1);
							 	var hashed = md5(friend_email);
							 	$.ajax({
							        type : 'GET',
							        url : urlConfig.user+'/email/'+hashed,
							        headers : {
							            'Authorization' : 'Basic ' + window.btoa( getState('member').user + ':' + getState('member').pw  )
							        },
							        success : function(response) {
							            var result = jQuery.parseJSON(response);
							            var data = result[0];
							            var last_loc = get_location(data.geometry.x,data.geometry.y).name;
										$('#other_profile_last_location').html(last_loc);
										$('#other_profile_last_location').addClass(data.gender);
							            $('#other_profile').attr('src',data.profile);
							            $('#other_profile_email').text(data.email);
										$('#other_profile_name').html(data.name);
										$('#other_profile_name').addClass(data.gender);
										$('#other_profile_gender').html(data.gender.capitalize());
										$('#other_profile_gender').addClass(data.gender);
										$('#other_profile_status').html(data.status);
										$('#other_profile_status').addClass(data.gender);
										$('#profile_major').html(data.major);
										$('#profile_major').addClass(data.gender);
										$('#profile_hobbies').html(data.hobbies);
										$('#profile_hobbies').addClass(data.gender);
							        },
							        error : function(response) {
							            console.log(response);
							            //direct to login
							        }
		   						 });
								
							    $.ajax({
									type : 'GET',
									url : urlConfig.follow,
									headers : {
										'Authorization' : 'Basic ' + window.btoa(getState('member').user + ':' + getState('member').pw )
									},
									success : function(data) {
										var data = jQuery.parseJSON(data);
										$('#follow_btn').children('span').children('span').text('Follow');
										$.each(data, function(index, value) {
										 	if(friend_email==value.user_followed){
											    	$('#follow_btn').children('span').children('span').text('Unfollow');
										 	}
										});
									},
									error : function(response) {
										console.log('Cannot to get followed');
										//direct to login
									}
								});//end GET profile

							});
						},
						error : function(response){
							console.log('Error to get friends');
						}
					});
				});//end each
			};
	window.buildFriendListOffline=function(data) {
					var friends_info = '';
					$('#friend-list').empty();
					$.each(data, function(index, value) {
					var email = value.user_followed;
					var hashed = md5(email);
					
					var geoname='undefined';
					//console.log(value);
					//console.log(value.geometry);
					if(value.geometry!=null){
						geoname=window.get_location(value.geometry.x,value.geometry.y).name;
					}
					friends_info = '\
							<li><a class="friend-list-element" href="#page8"  data-transition="slide" style="padding:5px">\
								<div class="hidden" id=friends_email>'+value.email+'</div>\
								<table>\
									<tr>\
										<td class="left" >\
											<span ><img src='+value.profile+' height="70" width="70" /></span>\
										</td>\
										<td class="right" >\
											<div id="name" class='+value.gender+'>' + value.name + '\
											</div>\
											<div id="other">' +geoname  + ' '+ value.last_location_timestamp + '\
											</div>\
											<div id="other">' + value.status + '\
											</div>\
										</td>\
									</tr>\
								</table>\
							</a></li>';
					
					$('#friend-list').append(friends_info);
				});
		};
	window.getFollowed = function (){
		
				
		$.ajax({
			type : 'GET',
			url : urlConfig.follow,
			headers : {
				'Authorization' : 'Basic ' + window.btoa( getState('member').user + ':' + getState('member').pw )
			},
			success : function(data) {
				var friends = jQuery.parseJSON(data);
				//console.log(friends);
				buildFriendList(friends);
					//console.log(friends);
			
				set_friend(friends);
			},
			error : function(response) {
				console.log(response);
				//direct to login
			}
		});
	}
	$('#page5').live('pageshow', function() {
	if(navigator.onLine){
			console.log('online');
			getFollowed();
			
	}else{
			console.log('offline');
			var loc_friend_data = window.get_friend();
			if(loc_friend_data)
			buildFriendListOffline(loc_friend_data);
	}	
	});
})()