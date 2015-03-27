$(document).ready(function() {
	if ($('#map_canvas').length) {
		var startzoom = parseInt($('#startzoom').val());// + 1;
		var centerlatitude = parseFloat($('#centerlatitude').val());
		var centerlongitude = parseFloat($('#centerlongitude').val());
		$('#map_canvas').locationpicker({
			location : {
				latitude : centerlatitude,
				longitude : centerlongitude
			},
			zoom : startzoom,
			radius : false,
			inputBinding : {
				latitudeInput : $('#centerlatitude'),
				longitudeInput : $('#centerlongitude'),
				locationNameInput : $('#location')
			},
			enableAutocomplete : true,
		});
	}
});