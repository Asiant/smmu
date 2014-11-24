var sendReq = getXmlHttpRequestObject();
var receiveReq = getXmlHttpRequestObject();
var lastMessage = 0;
var mTimer;

//Gets the browser specific XmlHttpRequest Object
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		document.getElementById('p_status').innerHTML = 
		'Status: Cound not create XmlHttpRequest Object.' +
		'Consider upgrading your browser.';
	}
}

//Gets the current messages from the server
function getChatText() {
	if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
		receiveReq.open("GET", 'getChat.php?chat=1&last=' + lastMessage, true);
		receiveReq.onreadystatechange = handleReceiveChat; 
		receiveReq.send(null);
	}			
} 


function handleReceiveChat() {
	if (receiveReq.readyState == 4 && receiveReq.status==200) {
		//Get a reference to our chat container div for easy access
		var chat_div = document.getElementById('div_chat');
		//Get the AJAX response and run the JavaScript evaluation function
		//on it to turn it into a usable object.  Notice since we are passing
		//in the JSON value as a string we need to wrap it in parentheses
		var response = eval("(" + receiveReq.responseText + ")");
		for(i=0;i < response.messages.message.length; i++) {
			chat_div.innerHTML += response.messages.message[i].user;
			chat_div.innerHTML += '&nbsp;&nbsp;<font class="chat_time">' +  response.messages.message[i].time + '</font><br />';
			chat_div.innerHTML += response.messages.message[i].text + '<br />';
			chat_div.scrollTop = chat_div.scrollHeight;
			chat_div.scrollTop = chat_div.scrollHeight;
			lastMessage = response.messages.message[i].id;
		}
		mTimer = setTimeout('getChatText();',2000); //Refresh our chat in 2 seconds
	}
}


//Add a message to the chat server.
function sendChatText() {
	if (sendReq.readyState == 4 || sendReq.readyState == 0) {
		sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat; 
		var param = 'message=' + document.getElementById('txt_message').value;
		param += '&name='+document.getElementById('userName').value;
		param += '&chat=1';
		sendReq.send(param);
		document.getElementById('txt_message').value = '';
	}							
} 


//When our message has been sent, update our page.
function handleSendChat() {
	//Clear out the existing timer so we don't have 
	//multiple timer instances running.
	clearInterval(mTimer);
	getChatText();
}

//This cleans out the database so we can start a new chat session.
function resetChat() {
	if (sendReq.readyState == 4 || sendReq.readyState == 0) {
		sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleResetChat; 
		var param = 'action=reset';
		sendReq.send(param);
		document.getElementById('txt_message').value = '';
	}							
}

//This functions handles when the user presses enter.  Instead of submitting the form, we
//send a new message to the server and return false.
function blockSubmit() {
	sendChatText();
	return false;
}

//Function for initializating the page.
function startChat() {
	//Set the focus to the Message Box.
	document.getElementById('txt_message').focus();
	//Start Recieving Messages.
	getChatText();
}