var rideTheLightening = function() {
	var color = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
	var complement = $c.complement(color);
	document.documentElement.style.backgroundColor = color;
	[].forEach.call(document.querySelectorAll('.link'), function(a) {
		a.style.color = complement;
	});
};

setInterval(rideTheLightening, 1000 / 60);