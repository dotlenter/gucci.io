$(window).load(function () {
    $.ajax({
        url: 'getActiveUsers.php',
	    type: 'post',
		success: function(data) {
			$('.container-box-friends').html(data);
		}
    });
});