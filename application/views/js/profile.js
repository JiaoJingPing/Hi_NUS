(function(){
	var email = "admin";
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


	$('a#edit_btn').click(function(){
		$this = $(this);
		$span = $(this).children('span').children('span');
		if($span.text()=='Edit'){
			$span.text('Save');
			//$('div#profile_header').append('<a id="cencil_btn" data-role="button" class="ui-btn-left ui-btn ui-shadow ui-btn-corner-all ui-btn-hover-a ui-btn-up-a" style="width:80px" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="a"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Cencil</span></span></a>');
		
			$ul = $('ul#info');
			$ul.find('a').attr('href','#page5');


		}
		else if($span.text()=='Save'){
			$span.text('Edit');

			$ul = $('ul#info');
			$ul.find('a').attr('href','#');
			//$('div#profile_header').children('a#cencil_btn').remove();
		}


	});




})()