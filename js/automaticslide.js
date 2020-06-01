 var images = [
 'url("resources/sq.jpg")', 
 'url\(\"resources/rickandmorty.jpg\"\)', 
 'url("resources/sublime.jpg")'
 ];
 var num = 0;

 setInterval(function() {
 	next()
 }, 6500);

 function next() {
 	
 	num++;
 	if(num >= images.length) {
 		num = 0;
 	}
 	document.body.style.backgroundImage = images[num];
 	
 }