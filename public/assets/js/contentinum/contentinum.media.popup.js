( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			imagepopup : {
				'1' : '/assets/js/css/popup/magnific-popup.css'
			},
			ContentinumVideoPopUp : function() {
				$.each(this.imagepopup, function(i, url) {
					var link = document.createElement("link");
					link.type = "text/css";
					link.rel = "stylesheet";
					link.href = url;
					document.getElementsByTagName("head")[0].appendChild(link);
				});
				$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
					disableOn: 700,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
			
					fixedContentPos: false
				});
			},
		});
	}));