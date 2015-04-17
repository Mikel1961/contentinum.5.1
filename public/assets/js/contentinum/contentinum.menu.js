( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			ContentinumNavigation : function() {
				var navigation = $.cookie("navigation");
				if(typeof navigation !== typeof undefined){
					$("ul[data-ident='" +navigation+ "']").slideToggle("fast");
				}
				$(document).on('click', '.toogleSubMenu', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();
					var ident = $(this).data('ident'); 
					var navigation = $.cookie("navigation");
					if(typeof navigation !== typeof undefined && ident === navigation){
						$("ul[data-ident='" +navigation+ "']").hide();	
						$.removeCookie("navigation", { path: '/' });
					} else {
						$(".navigation-list-dropdown").hide();	
						$.cookie("navigation", ident, { path: '/' });
						$("ul[data-ident='" +ident+ "']").slideToggle("fast");
					}					
				});			
			},
		});
	}));