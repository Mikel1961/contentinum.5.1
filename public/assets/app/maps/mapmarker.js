$(document).ready(function() {
	if ($('#map_canvas').length) {
		var startzoom = 6; // parseInt($('#startzoom').val());// + 1;
		var centerlatitude = parseFloat($('#latitude').val()); // 51.165691;
		var centerlongitude = parseFloat($('#longitude').val()); // 10.451526000000058;
		$('#map_canvas').locationpicker({
			location : {
				latitude : centerlatitude,
				longitude : centerlongitude
			},
			zoom : startzoom,
			radius : false,
			inputBinding : {
				latitudeInput : $('#latitude'),
				longitudeInput : $('#longitude'),
				locationNameInput : $('#location')
			},
			enableAutocomplete : true,
		});
	}
});