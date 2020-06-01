	function sendMessage(){
		if(message_form.message.value == ''){
			alert("patay");
			return;
		}
		var message = message_form.message.value;
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('messages_section').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('get', 'sendMessage.php?message='+message, true);
		xmlhttp.send();
	}
