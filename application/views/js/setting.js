(function(){

	$('#logout').click(function(){
		setCookie('user','', -1);
		setCookie('pw','', -1);
		console.log(window.location);
		window.location = window.location.origin+'/mobile/index.php/rest';
	});
	
})()