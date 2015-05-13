( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			cssfiles : {
				'1' : '/assets/js/css/tooltipster/tooltipster.css'
			},
			ContentinumTooltip : function() {
				$.each(this.cssfiles, function(i, url) {
					var link = document.createElement("link");
					link.type = "text/css";
					link.rel = "stylesheet";
					link.href = url;
					document.getElementsByTagName("head")[0].appendChild(link);
				});

				$('.tooltipster').tooltipster({

					content : 'Loading ... ',
					contentAsHTML : true,
					position : 'right',
					

					functionBefore : function(origin, continueTooltip) {

						var api = $(origin).data('api');
						var getContent = false;
						console.log(origin);

						switch(api) {
						case 'contacts':
							var datas = {
								'name' : $(origin).data('name'),
								'content' : 'contacts', 
							};
							getContent = true;
							break;
						case 'ressource':
							var datas = {
								'name' : $(origin).data('name'),
								'content' : 'ressource', 
							};
							getContent = true;
							break;							
						default:
							getContent = false;
							break;
						}

						continueTooltip();
                        if (true === getContent){
							$.ajax({
								type : 'POST',
								url : '/api',
								data : datas,
								success : function(data) {
									// update our tooltip content with our returned data and cache it
									origin.tooltipster('content', data); //.data('ajax', 'cached');
								}
							});
                        } else {
                        	origin.tooltipster('content', 'Nicht gefunden');
                        }
					}
				});
			},
		});
	})); 