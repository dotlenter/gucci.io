setInterval(function(){ getUsers(); }, 5000);

function getUsers()
{
	$.ajax({
		url: 'getActiveUsers.php',
		type: 'post',
		success: function(data) {
			$('.container-box-friends').html(data);
		}
	});
}