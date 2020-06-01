
$(document).mouseup(function (e)
{
	var container = $("#signup-box");
	
	if (!container.is(e.target) && container.has(e.target).length === 0) 
	{
		container.hide();
	}
});
function openSignup(){
	var x = document.getElementById("signup-box");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}