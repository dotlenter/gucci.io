setInterval(function(){ getOnlineUserNum(); }, 5000);

function getOnlineUserNum()
{
	$.ajax({
		url: 'userCountOnline.php',
		type: 'post',
		success: function(data) {
			$('.buddies-info-container').html(data);
		}
	});
}