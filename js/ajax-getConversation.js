function getConvo()
{
	$.ajax({
		url: 'getConversation.php',
		type: 'post',
		success: function(data) {
			$('#messages-section').html(data);
		}
	});
}