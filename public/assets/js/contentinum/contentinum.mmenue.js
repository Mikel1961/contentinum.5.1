( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			ContentinumMmenue : function() {				
				$('#menu').mmenu({
					extensions: ["theme-dark"]
				});

			},
		});
	}));	