( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			ContentinumEvent : function() {
				$(document).on('click', '.toogleEventElement', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();
					var ident = $(this).data('ident'); 
					$("#" + ident).slideToggle("slow");
					if ($(this).children().hasClass('fa-plus')){
						$(this).children().removeClass('fa-plus');
						$(this).children().addClass('fa-minus');
					} else if($(this).children().hasClass('fa-minus')){
						$(this).children().removeClass('fa-minus');
						$(this).children().addClass('fa-plus');
					}					
				});				
			},
		});
	}));