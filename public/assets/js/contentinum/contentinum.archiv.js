( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			ContentinumArchiv : function() {
				var archiv = $.cookie("archive");
				if(typeof archiv !== typeof undefined){
					$("#" + archiv).slideToggle("fast");
				}
				$(document).on('click', '.element-toogle', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();
					var ident = $(this).data('ident'); 
					$(".news-archive-sublist").hide();				
					$.cookie("archive", ident, { path: '/' });
					$("#" + ident).slideToggle("fast");
				});
				$(document).on('click', '.news-archive-list-link', function(ev){
					ev.stopPropagation();
					ev.preventDefault();					
					$.cookie("backlinkarchiv", $(this).attr('href'), { path: '/' } );
					window.location = $(this).attr('href');
				});
				$(document).on('click', '.unsetBacklink', function(ev){
					ev.stopPropagation();
					ev.preventDefault();	
					$.removeCookie("backlinkarchiv", { path: '/' });					
					window.location = $(this).attr('href');
				});
				$(document).on('click', '.setBacklink', function(ev){
					ev.stopPropagation();
					ev.preventDefault();	
					$.cookie("backlinkarchiv", $(this).data('backlink'), { path: '/' } );					
					window.location = $(this).attr('href');
				});				
			},
		});
	}));