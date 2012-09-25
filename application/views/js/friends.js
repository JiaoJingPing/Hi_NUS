(function() {
	var friends_info = '';
	$.ajax({
		type : 'GET',
		url : urlConfig.follow,
		headers : {
			'Authorization' : 'Basic ' + window.btoa(getCookie('user') + ':' + getCookie('pw'))
		},
		success : function(data) {
			console.log(data);
			$.each(data, function(index, value) {

				var email = value.user_followed;
				var hashed = md5(email);

				$.ajax({
					type : "GET",
					url : urlConfig.user + '/email/' + hashed,
					success : function(data) {
						data = data[0];
						console.log(data);
						friends_info = '\
						<li><a href="index.html" style="padding:5px">\
							<table>\
								<tr>\
									<td class="left" >\
										<span ><img src='+data.profile+' height="70" width="70" /></span>\
									</td>\
									<td class="right" >\
										<div id="name" class='+data.gender+'>' + data.name + '\
										</div>\
										<div id="other">' + data.name + 'km | ' + data.last_location_timestamp + '\
										</div>\
										<div id="other">' + data.status + '\
										</div>\
									</td>\
								</tr>\
							</table>\
						</a></li>';
						$('#friend-list').append(friends_info);
					},
				});
			});
		},
		error : function(response) {
			console.log('Cannot to login');
			//direct to login
		}
	});

})()