function chatConnection(){
 
    // LISTEN FOR MESSAGES
    PUBNUB.subscribe({
        channel    : "hello_world",      // CONNECT TO THIS CHANNEL.
 
        restore    : false,              // STAY CONNECTED, EVEN WHEN BROWSER IS CLOSED
                                         // OR WHEN PAGE CHANGES.
 
        callback   : function(message) { // RECEIVED A MESSAGE.
            //alert(message)
			$('#recvBox').val(message);
        },
 
        disconnect : function() {        // LOST CONNECTION.
            alert(
                "Connection Lost." +
                "Will auto-reconnect when Online."
            )
        },
 
        reconnect  : function() {        // CONNECTION RESTORED.
            alert("And we're Back!")
        },
 
        connect    : function() {        // CONNECTION ESTABLISHED.
			$('#enterButton').removeAttr('disabled');
            
 
        }
    })
 
}

function sendChat(channelName, messageVal)
{
	PUBNUB.publish({channel : channelName, message : messageVal});
}