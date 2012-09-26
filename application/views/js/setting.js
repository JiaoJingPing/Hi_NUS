(function(){

	$('#logout').click(function(){
		deleteState('member');
		console.log(window.location);
		window.location = window.location.origin+'/index.php/rest';
	});
	
})()