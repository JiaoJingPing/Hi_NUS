function chatConnection(channel_name){
	
    // LISTEN FOR MESSAGES
    PUBNUB.subscribe({
        channel    : channel_name,      // CONNECT TO THIS CHANNEL.
 
        restore    : false,              // STAY CONNECTED, EVEN WHEN BROWSER IS CLOSED
                                         // OR WHEN PAGE CHANGES.
 
        callback   : function(message) { // RECEIVED A MESSAGE.
            
			$('#recvBox').val($('#recvBox').val() + '\n' + message);
			
        },
 
        disconnect : function() {        // LOST CONNECTION.
			$('#enterButton').attr("disabled", true);
			$("#enterButton").prop('value', 'Reconnecting...');
        },
 
        reconnect  : function() {        // CONNECTION RESTORED.
            $("#enterButton").prop('value', 'Send');
			$('#enterButton').removeAttr('disabled');
        },
 
        connect    : function() {        // CONNECTION ESTABLISHED.
			$('#enterButton').removeAttr('disabled');
        }
    })
}

function sendChat(channelName, messageVal)
{
    console.log(channelName);
	PUBNUB.publish({channel : channelName, message : messageVal});
}