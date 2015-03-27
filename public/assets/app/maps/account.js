$(document).ready(function() {
	if ($('#map_canvas').length) {
		var centerlatitude = 51.165691;
		var centerlongitude = 10.451526000000058;
		var startzoom = 8;// + 1;
		if ($('#latitude').val() == '') {
			centerlatitude = 51.165691;
		} else {
			centerlatitude = parseFloat($('#latitude').val());
		}
		if ($('#longitude').val() == '') {
			centerlongitude = 10.451526000000058;
		} else {
			centerlongitude = parseFloat($('#longitude').val());
		}
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