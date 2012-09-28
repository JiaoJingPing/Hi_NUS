function chatConnection(channel_name){
	
    // LISTEN FOR MESSAGES
    PUBNUB.subscribe({
        channel    : channel_name,      // CONNECT TO THIS CHANNEL.
 
        restore    : false,              // STAY CONNECTED, EVEN WHEN BROWSER IS CLOSED
                                         // OR WHEN PAGE CHANGES.
 
        callback   : function(message) { // RECEIVED A MESSAGE.
           
			gotMessage(message);
        },
 
        disconnect : function() {        // LOST CONNECTION.
			$('#chatButton').attr("disabled", true);
			$("#chatButton").prop('value', 'Reconnecting...');
        },
 
        reconnect  : function() {        // CONNECTION RESTORED.
            $("#chatButton").prop('value', 'Go');
			$('#chatButton').removeAttr('disabled');
        },
 
        connect    : function() {        // CONNECTION ESTABLISHED.
			$('#chatButton').removeAttr('disabled');
        }
    })
}

function sendChat(channelName, messageVal)
{
    //console.log(channelName);
	//$('#sendBtn').css({background: white url(‘images/imagebutton.gif’) no-repeat top;});

    var state = getState('member');

    if (!state) {
        logout();
    }
    var loc_id = window.get_loc_id();
    var email = state.user;
    var pw = state.pw;
    $.ajax({
            type : 'POST',
            url : urlConfig.location_msg,
            headers : {
                'Authorization' : 'Basic ' + window.btoa(email + ':' + pw)
            },
            data:{
                'location_id' : loc_id,
                'content' : messageVal
            }
            success : function(response) {
                console.log(response);
                var result = jQuery.parseJSON(response);
                var data = result;
                set_loc_msg(data);
                buildLocationMsgList(data);

            },
            error : function(response) {
                console.log(response);
            }
        });    
    
	messageVal = ($("#self_profile_name").html() + ': ' + messageVal);

	PUBNUB.publish({channel : channelName, message : messageVal});
	//alert('hi');
}