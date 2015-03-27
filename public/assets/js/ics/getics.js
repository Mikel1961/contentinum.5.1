$(document).ready(function() {
	$(document.body).on('click', ".getics", function(){
		var summary = $(this).attr('data-summary');
		var attendee = $(this).attr('data-attendee');
		var description = $(this).attr('data-description');
		var location = $(this).attr('data-location');
		var dstart = $(this).attr('data-dstart');
		var dend = $(this).attr('data-dend');
		if(typeof description == "undefined"){
			var description = summary;
		}		
		downloadIcs('Diesen-Termin-speichern',attendee , summary, description, location, dstart, dend, '.ics');
		return false;
	});
});