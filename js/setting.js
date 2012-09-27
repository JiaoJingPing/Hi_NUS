(function() {

	$('#logout').click(function() {
		deleteState('member');
		window.location = window.location.origin + '/index.php/rest';
	});

	function logout() {
		deleteState('member');
		window.location = window.location.origin + '/index.php/rest';
	}


	$('.page').live('pageshow', function() {
		var msgHitory = getUserMsgHistory();
	});

	var listId = 'history-content';
	
	
	function convertTimeStamp(str){
		var timestamp = Date.parse(str);
		var date=new Date(timestamp);
		return date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+' '+(date.getHours()+1)+':'+(date.getMinutes()+1)+':'+(date.getSeconds()+1);
	}
	function buildLocationMsgList(data) {
		$.each(data, function(index, value) {
			console.log(value);
			
		var timestamp=value.timestamp;
		var location_name=value.location_name;
		var content=value.content;
		var time=convertTimeStamp(timestamp);
	     var info='\
	     <ul data-role="listview" data-theme="d" data-divider-theme="d" class="ui-listview">\
			<li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-bar-d ui-li-has-count">\
				'+time+'<span class="ui-li-count ui-btn-up-c ui-btn-corner-all"></span>\
			</li>\
			<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="d" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d">\
				<div class="ui-btn-inner ui-li">\
					<div class="ui-btn-text">\
						<a href="index.html" class="ui-link-inherit">\
						<p class="ui-li-aside ui-li-desc">\
							<strong>6:24</strong>PM\
						</p> <h3 class="ui-li-heading">Stephen Weber</h3>\
						<p class="ui-li-desc">\
							<strong>You have been invited to a meeting at Filament Group in Boston, MA</strong>\
						</p>\
						<p class="ui-li-desc">\
							Hey Stephen, if you are available at 10am tomorrow, we have got a meeting with the jQuery team.\
						</p> </a>\
					</div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>\
				</div>\
			</li>\
		</ul>';
		$('#history-list').append(info);
		});
	} 
	function buildUserMsgList(data) {
		$.each(data, function(index, value) {
			console.log(value);
			
		var timestamp=value.timestamp;
		var location_name=value.location_name;
		var content=value.content;
	
	     var info='\
	     <ul data-role="listview" data-theme="d" data-divider-theme="d" class="ui-listview">\
			<li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-bar-d ui-li-has-count">\
				Friday, October 8, 2010 <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"></span>\
			</li>\
			<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="d" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d">\
				<div class="ui-btn-inner ui-li">\
					<div class="ui-btn-text">\
						<a href="index.html" class="ui-link-inherit">\
						<p class="ui-li-aside ui-li-desc">\
							<strong>6:24</strong>PM\
						</p> <h3 class="ui-li-heading">Stephen Weber</h3>\
						<p class="ui-li-desc">\
							<strong>You have been invited to a meeting at Filament Group in Boston, MA</strong>\
						</p>\
						<p class="ui-li-desc">\
							Hey Stephen, if you are available at 10am tomorrow, we have got a meeting with the jQuery team.\
						</p> </a>\
					</div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>\
				</div>\
			</li>\
		</ul>';
		$('#history-list').append(info);
		});
	} 
	function getUserMsgHistory() {
		var state = getState('member');

		if (!state) {
			logout();
		}

		var email = state.user;
		var pw = state.pw;

		$.ajax({
			type : 'GET',
			url : urlConfig.location_msg,
			headers : {
				'Authorization' : 'Basic ' + window.btoa(email + ':' + pw)
			},
			success : function(response) {
				var result = jQuery.parseJSON(response);
				var data = result;
				buildLocationMsgList(data);
			},
			error : function(response) {
				console.log(response);
			}
		});
	}

})()