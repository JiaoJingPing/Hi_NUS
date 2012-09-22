(function(){
	var email = "testemail@gmail.com";
	var hashed = md5(email);
	$.get(urlConfig.user+'/email/'+hashed, function(data){
		data = data[0];
		$('#profile_name').html(data.name);
		$('#profile_name').addClass(data.gender);
		$('#profile_gender').html(data.gender.capitalize());
		$('#profile_gender').addClass(data.gender);
		$('#profile_status').html(data.status);
		$('#profile_status').addClass(data.gender);
		$('#profile_education').html(data.faculty + ' ' + data.major);
		$('#profile_education').addClass(data.gender);
	},'json');
})()