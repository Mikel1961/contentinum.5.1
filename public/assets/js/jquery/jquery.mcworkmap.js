
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {
	
	
	$.extend($.fn, {
		
		
		InitializeMap : function(centerLatitude, centerLongitude,startZoom,mapMarker){
			var latlng = new google.maps.LatLng(centerLatitude, centerLongitude);
		    var myOptions = {
		        zoom: startZoom,
		        center: latlng,
		        mapTypeId: google.maps.MapTypeId.ROADMAP,
		        streetViewControl: true
		        };
		    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		    $(mapMarker).each(function(index, marker) {
		    	 $().setMarkers(map, marker);
		    });			
		},
		setMarkers : function(map, locations){
			  var infoWindow = new google.maps.InfoWindow;
			  for (var i = 0; i < locations.length; i++) {
			    var location = locations[i];
			    var thisLatLng = new google.maps.LatLng(location[1], location[2]);
			    var marker = new google.maps.Marker({
			        position: thisLatLng,
			        map: map,
			        title: location[0],
			        zIndex: location[3]
			    });
			    $().bindInfoWindow(marker, map, infoWindow, $().fensterInfoHtml(location));
			  }			
		},
		bindInfoWindow : function(marker, map, infoWindow, html) { 
			google.maps.event.addListener(marker, 'mouseover', function() {  infoWindow.setContent(html);  infoWindow.open(map, marker);   });
		},
		
		fensterInfoHtml : function(location){
			var str = '<div id="content"><div id="siteNotice"></div><div id="bodyContent">';
			if (location[4] && location[4].length > 2 ){
				str = str + '<p><img src="/img/mapbilder/' + location[4] + '" /></p>';
			}	
			str = str + '<p><strong>' + location[0] + '</strong><br />' + location[5] + '<br />' + location[6] + '</p>';
			if (location[7] && location[7].length > 2){	
				str = str + '<p>' + location[7] + '</p>';
			} 
			str = str + '</div></div>';	
			return str;
		},
		
		
	});
	
	
}));