( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {

			bindInfoWindow : function(marker, map, infoWindow, html) {
				google.maps.event.addListener(marker, 'mouseover', function() {
					infoWindow.setContent(html);
					infoWindow.open(map, marker);
				});
			},

			fensterInfoHtml : function(location) {
				var str = '<div id="content"><div id="siteNotice"></div><div id="bodyContent">';
				if (location.image.length > 2) {
					str = str + '<p><img src="' + location.image + '" alt="' + location.name + '" /></p>';
				}
				str = str + '<p><strong>' + location.name + '</strong><br />' + location.street + '<br />' + location.city + '</p>';
				if (location.description.length > 2) {
					str = str + '<p>' + location.description + '</p>';
				}
				str = str + '</div></div>';
				return str;
			},

			setMarkers : function(map, locations) {
				var infoWindow = new google.maps.InfoWindow;

				$(locations).each(function(index, location) {
					var thisLatLng = new google.maps.LatLng(location.latitude, location.longitude);
					if (location.mapmarker.length > 2) {
						var marker = new google.maps.Marker({
							position : thisLatLng,
							map : map,
							icon : location.mapmarker,
							title : location.name,
							zIndex : location.zindex
						});
					} else {
						var marker = new google.maps.Marker({
							position : thisLatLng,
							map : map,
							title : location.name,
							zIndex : location.zindex
						});
					}
					$().bindInfoWindow(marker, map, infoWindow, $().fensterInfoHtml(location));
				});
			},

			InitializeMap : function(centerLatitude, centerLongitude, startZoom, mapMarkerDatas) {
				var mapMarker = mapMarkerDatas;
				var latlng = new google.maps.LatLng(centerLatitude, centerLongitude);
				var myOptions = {
					zoom : startZoom,
					center : latlng,
					mapTypeId : google.maps.MapTypeId.ROADMAP,
					streetViewControl : true
				};
				var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				this.setMarkers(map, mapMarker);
			},
		});
	})); 