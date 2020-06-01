$(document).click(function(e) { 
	if (e.button == 0) {
		$.ajax({
			url: 'onClick-updateLastSeen.inc.php',
			type: 'post',
			success: function(data) {
			}
		});
	}
});