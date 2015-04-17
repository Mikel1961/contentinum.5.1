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
			ContentinumGallery : function() {
				$.each(this.imagepopup, function(i, url) {
					var link = document.createElement("link");
					link.type = "text/css";
					link.rel = "stylesheet";
					link.href = url;
					document.getElementsByTagName("head")[0].appendChild(link);
				});
			  	$('.popup-gallery').magnificPopup({
					delegate: 'a',
					type: 'image',
					tLoading: 'Loading image #%curr%...',
					mainClass: 'mfp-img-mobile',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
						preload: [0,1] // Will preload 0 - before current, and 1 after the current image
					},
					image: {
						tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
						titleSrc: function(item) {
							return item.el.attr('title') + '<small>' +  item.el.attr('data-groupname')  +'</small>';
						}
					}
				});
			},
		});
	}));
