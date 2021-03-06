
requirejs.config({
	baseUrl: "/assets/js",
	paths: {
	    'async' : 'plugins/async',
	    'font' : 'plugins/font',
	    'goog' : 'plugins/goog',		
	    'jquery': 'jquery/jquery',
	    'jquery.cookie': 'jquery/jquery.cookie',
	    'jquery.validate': 'jquery/jquery.validate',
	    'jquery.mcworkform' : 'jquery/jquery.mcworkform',
	    'jquery.mcworkmap' : 'jquery/jquery.mcworkmap',
	    'jquery.customer' : 'jquery/jquery.customer',
	    'jquery.highlight' : 'jquery/jquery.highlight',
	    'jquery.popup' : 'jquery/jquery.magnific-popup.min',
	    'jquery.mmenue' : 'jquery/jquery.mmenu.umd.all',
	    'jquery.tooltip' : 'jquery/jquery.tooltipster.min',
	    'jquery.vegas' : 'jquery/vegas.min',
	    'jquery.stellar' : 'jquery/jquery.stellar.min',
	    'datatables' : 'jquery/jquery.dataTables.min',
	    'datatable.responsive' : 'datatables/dataTables.responsive.min',
	    'datatable.highlight' : 'datatables/dataTables.searchHighlight.min',
	    'contentinum.archiv' : 'contentinum/contentinum.archiv.r2',
	    'contentinum.events' : 'contentinum/contentinum.events',
	    'contentinum.popup' : 'contentinum/contentinum.popup',
	    'contentinum.tooltip' : 'contentinum/contentinum.tooltipster',
	    'contentinum.gallery' : 'contentinum/contentinum.gallery',
	    'contentinum.navigation' : 'contentinum/contentinum.menu',
	    'contentinum.datatables' : 'contentinum/contentinum.datatables',
	    'contentinum.media.popup' : 'contentinum/contentinum.media.popup',
	    'contentinum.mmenue' : 'contentinum/contentinum.mmenue',
	    'contentinum.stellar' : 'contentinum/contentinum.stellar',
	    'camera.migrate' : 'jquery/jquery-migrate-1.2.1.min',
	    'camera.easing' : 'camera/jquery.easing.1.3',
	    'camera.camera' : 'camera/camera.min',
	    'camera.ini' : 'camera/camera.init',
	    'caroufredsel' : 'caroufredsel/jquery.carouFredSel-6.2.1-packed',
	    'caroufredsel.init' : 'caroufredsel/carousel.init',
	    'caroufredsel.plugin.touchswipe' : 'caroufredsel/plugins/jquery.touchSwipe.min',
	    'ie10viewport' : 'ie/ie10-viewport-bug-workaround',
	    'bootstrap' : 'bootstrap/bootstrap.min',
	    'bootstrap.collapse' : 'bootstrap/collapse',	    
	    'wow' : 'wow/wow.min',
	    'wow.init' : 'wow/wow.init',
	    'device' : 'device/device.min',
	    'ics.libs': 'ics/ics-libs',
	    'ics.get': 'ics/getics',		
	},
	shim : {
	    'jquery.cookie': ['jquery'],
	    'jquery.validate' :  ['jquery'],
	    'jquery.mcworkform' :  ['jquery'],
	    'jquery.mcworkmap' :  ['jquery'],
	    'jquery.popup' : ['jquery'],
	    'jquery.mmenue': ['jquery'],
	    'jquery.tooltip' : ['jquery'],
	    'jquery.vegas' : ['jquery'],
	    'jquery.stellar' : ['jquery'],
	    'contentinum.navigation' : ['jquery','jquery.cookie'],
	    'contentinum.events' : ['jquery'],
	    'contentinum.archiv' : ['jquery','jquery.cookie'],
	    'contentinum.popup' : ['jquery.popup'],
	    'contentinum.gallery' : ['jquery.popup'],
	    'contentinum.mmenue' : ['jquery.mmenue'],
	    'contentinum.media.popup' : ['jquery.popup'],
	    'contentinum.tooltip' : ['jquery.tooltip'],
	    'contentinum.stellar' : ['jquery'],
	    'camera.ini' : ['jquery','camera.migrate','camera.easing','camera.camera'],
	    'caroufredsel' : ['jquery', 'caroufredsel.plugin.touchswipe', 'caroufredsel.init'],
	    'datatables' : ['jquery'],
	    'contentinum.datatables' : ['datatables'],
	    'bootstrap' : ['jquery'], 
	    'bootstrap.collapse' : ['bootstrap'], 
	    'ie10viewport' : ['jquery'],
	    'ics.get': ['jquery','ics.libs'],
	    'wow' : ['jquery'],
	}
	
});

require(['jquery', 'bootstrap', 'ie10viewport'], function($){
	
	if ($('#accordion').length){
  		require(["jquery", 'bootstrap','bootstrap.collapse'], function( $ ) {});		
	}
	
  	if ($("#menu").length) {
  		require(["jquery", 'jquery.mmenue','contentinum.mmenue' ], function( $ ) { 
			    $().ContentinumMmenue();			
  		});

  	}
  	if ($(".wow").length) {
  		require(['jquery', 'wow', 'wow.init'], function( $ ) { 
			    $().WowInit();			
  		});   		
  	}
	if ($(".sidemenu-list").length) {
  		require(["jquery", 'contentinum.navigation' ], function( $ ) { 
			    $().ContentinumNavigation();			
  		}); 
	} 
	if ($("#carousel-list").length){
  		require(['jquery', 'caroufredsel', 'caroufredsel.plugin.touchswipe', 'caroufredsel.init'], function( $ ) { 
			    $().CarouselInit();			
  		}); 		
	}
	if ($(".camera_wrap").length){
  		require(['jquery','camera.migrate','camera.easing','camera.camera','camera.ini'], function( $ ) { 
			    $(".camera_wrap").CameraInit();			
  		}); 		
	}	
	if ($(".stellar-section").length) {
  		require(['jquery', 'jquery.stellar', 'contentinum.stellar' ], function( $ ) { 
			    $().ContentinumStellar();			
  		}); 
	} 
  	if ( $('.media-popup').length) {
  		require(["jquery", "jquery.popup","contentinum.popup"], function( $ ) {
  			$().ContentinumPopUp();
  		});
  	}	
  	if ( $('.popup-youtube').length) {
  		require(["jquery", "jquery.popup","contentinum.media.popup"], function( $ ) {
  			$().ContentinumVideoPopUp();
  		});
  	}
  	if ( $('.popup-gallery').length) {
  		require(["jquery", "jquery.popup","contentinum.gallery"], function( $ ) {			
  			$().ContentinumGallery();
  		});  		
  	}
  	if ( $('.pluginarchive').length) {
  		require(["jquery", "contentinum.archiv"], function( $ ) {
  			$().ContentinumArchiv();//'.news-archive-list'
  		});
  	}
	if ($(".form-customer").length) {
  	  		require(["jquery", "jquery.validate", "jquery.mcworkform"], function( $ ) {
			    $(".form-customer").validate({
			    	submitHandler: function(form) {
			    		$().setDefaults({formIdent : 'formident', panel : 'panel panel-default', panelWarn : 'panel panel-warning', panelSucess : 'panel panel-success', panelBootstrap : true });
			    		$().FormHandler(form);
			    	}			 
			    });
			});		
	}   	
	if ($("#searchForm").length) {
		require(["jquery", "jquery.mcworkform"], function( $ ) {
		    $(document).on('click', '#searchbutton', function(ev) {
		    	ev.stopPropagation();
		    	ev.preventDefault();
		    	$().setDefaults({async : false});
		    	$().FormValidation($('#searchForm'));
		    });	
		});			
	}
	if ($('#loginForm').length){
		require(["jquery", "jquery.mcworkform"], function( $ ) {
			$('#username').focus().select();
		    $(document).on('click', '#submitlogin', function(ev) {
		    	ev.stopPropagation();
		    	ev.preventDefault();
		    	$().setDefaults({async : false});
		    	$().FormValidation($('#loginForm'));
		    });			
		});
	}
	if ($("#map_canvas").length) {
		require(['async!http://maps.google.com/maps/api/js?sensor=false!callback', 'jquery', 'contentinum.map'], function(){
			$().InitializeMap(centerLatitude, centerLongitude, startZoom, mapMarkers);
		});
	} 
	if ($('.getics').length){
		require( ["ics.get"]);
  	}
	if ( $('.event-description').length) {
  		require(["jquery", "contentinum.events"], function( $ ) {
  			$().ContentinumEvent();
  		});
  	}  	 	  		

});