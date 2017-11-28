$(document).ready(function(){
	var canvas = document.getElementById('map');
	var ctx = canvas.getContext("2d");
	var ruta = $('#ruta').text();
	var ruta2 = $('#ruta2').text();
	var img = new Image();
	var mark = new Image();
	mark.src = "/images/marker.ico";
	img.src = "/images/ITMplano.jpg";
	var X = 18, Y = 10;

	var coordenadas = {1:"215-100", 2:"320-20", 3:"325-80", 4:"275-160", 5:"465-150", 
						6:"195-190", 7:"270-240", 8:"100-225", 9:"180-300", 10:"270-325", 11:"10.360", 12:"395-130", 
						13:"110-370", 14:"220-380", 15:"455-340", 16:"340-330", 17:"320-400", 18:"550.380", 19:"450-40", 20:"350-230"};
	
	img.onload = function(){
		var s = getComputedStyle(canvas);
		var w = s.width;
		var h = s.height;
		canvas.width = w.split('px')[0];
		canvas.height = h.split('px')[0];
		ctx.drawImage(img, 0, 0, 650, 550);
		ctx.lineWidth = 1;
		ctx.lineJoin="round";
		ctx.strokeStyle = "#8C183A";
		
		for (i=0; i<ruta.split(",").length; i++) {
	  		ctx.drawImage(mark, coordenadas[ruta.split(",")[i]].split("-")[0], coordenadas[ruta.split(",")[i]].split("-")[1], 35,35);
	  		if (i == 0) {
	  			ctx.beginPath();
	  			ctx.moveTo(parseInt(coordenadas[ruta.split(",")[i]].split("-")[0]) + X, parseInt(coordenadas[ruta.split(",")[i]].split("-")[1]) + Y);

	  		} else {
	  			ctx.lineTo(parseInt(coordenadas[ruta.split(",")[i]].split("-")[0]) + X, parseInt(coordenadas[ruta.split(",")[i]].split("-")[1]) + Y);
	  		}
		}
		ctx.stroke();

		ctx.lineWidth = 3;
		ctx.lineJoin="round";
		ctx.strokeStyle = "#0C4987";
		
		for (i=0; i<ruta2.split(",").length; i++) {
	  		if (i == 0) {
	  			try {
	  				ctx.beginPath();
	  			ctx.moveTo(parseInt(coordenadas[ruta2.split(",")[i]].split("-")[0]) + X, parseInt(coordenadas[ruta2.split(",")[i]].split("-")[1]) + Y);
	
	  			} catch (err) {
	  				console.log("No hay ruta que mostrar");
	  			}
	  		} else {
	  			ctx.lineTo(parseInt(coordenadas[ruta2.split(",")[i]].split("-")[0]) + X, parseInt(coordenadas[ruta2.split(",")[i]].split("-")[1]) + Y);
	  		}
		}
		ctx.stroke();
	}
});
