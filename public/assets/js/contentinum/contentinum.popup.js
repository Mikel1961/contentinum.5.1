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
			ContentinumPopUp : function() {
				$.each(this.imagepopup, function(i, url) {
					var link = document.createElement("link");
					link.type = "text/css";
					link.rel = "stylesheet";
					link.href = url;
					document.getElementsByTagName("head")[0].appendChild(link);
				});
				$(document).on('click', '.media-popup', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();
					var imgTitle = $(this).children('figcaption').text();
					$.magnificPopup.open({
						items : {
							src : $(this).children().attr('src') ,
						},
						image : {
							titleSrc : function(item) {
								return imgTitle;
							},
						},
						type : 'image'
					});
				});
			},
		});
	}));
