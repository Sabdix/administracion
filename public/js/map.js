$(document).ready(function(){
	var canvas = document.getElementById('map');
	var ctx = canvas.getContext("2d");
	var img = new Image();
	img.src = "images/ITMplano.jpg";
	
	img.onload = function(){
		var s = getComputedStyle(canvas);
		var w = s.width;
		var h = s.height;
		canvas.width = w.split('px')[0];
		canvas.height = h.split('px')[0];
  		ctx.drawImage(img, 0, 0, 650, 550);
	}
});