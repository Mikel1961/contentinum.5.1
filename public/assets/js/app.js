
requirejs.config({
  baseUrl: "/assets/js",
  paths: {
    'async' : 'plugins/async',
    'font' : 'plugins/font',
    'goog' : 'plugins/goog',
  	'modernizr' : 'modernizr/modernizr',
  	'fastclick' : 'fastclick/fastclick',
    'jquery': 'jquery/jquery',
    'jquery.cookie': 'jquery/jquery.cookie',
    'jquery.validate': 'jquery/jquery.validate',
    'jquery.mcworkform' : 'jquery/jquery.mcworkform',
    'jquery.mcworkmap' : 'jquery/jquery.mcworkmap',
    'jquery.customer' : 'jquery/jquery.customer',
    'jquery.highlight' : 'jquery/jquery.highlight',
    'jquery.popup' : 'jquery/jquery.magnific-popup.min',
    'datatables' : 'jquery/jquery.dataTables.min',
    'datatable.foundation' : 'datatables/dataTables.foundation.min',
    'datatable.responsive' : 'datatables/dataTables.responsive.min',
    'datatable.highlight' : 'datatables/dataTables.searchHighlight.min',
    'contentinum.archiv' : 'contentinum/contentinum.archiv',
    'contentinum.popup' : 'contentinum/contentinum.popup',
    'contentinum.gallery' : 'contentinum/contentinum.gallery',
    'contentinum.datatables' : 'contentinum/contentinum.datatables',
    'foundation': 'foundation/foundation',
    'foundation.abide': 'foundation/foundation.abide',
    'foundation.accordion': 'foundation/foundation.accordion',
    'foundation.alert': 'foundation/foundation.alert',
    'foundation.clearing': 'foundation/foundation.clearing',
    'foundation.dropdown': 'foundation/foundation.dropdown',
    'foundation.equalizer': 'foundation/foundation.equalizer',
    'foundation.interchange': 'foundation/foundation.interchange',
    'foundation.joyride': 'foundation/foundation.joyride',
    'foundation.magellan': 'foundation/foundation.magellan',
    'foundation.offcanvas': 'foundation/foundation.offcanvas',
    'foundation.orbit': 'foundation/foundation.orbit',
    'foundation.reveal': 'foundation/foundation.reveal',
    'foundation.slider': 'foundation/foundation.slider',
    'foundation.tab': 'foundation/foundation.tab',
    'foundation.toolbar': 'foundation/foundation.toolbar',
    'foundation.topbar': 'foundation/foundation.topbar',
    'ics.libs': 'ics/ics-libs',
    'ics.get': 'ics/getics',
    
  },
  shim: {
   'modernizr': {
        exports: 'Modernizr'
    },  
   'fastclick': {
        exports: 'FastClick'
    },        	
    'jquery.cookie': ['jquery'],
    'jquery.validate' :  ['jquery'],
    'jquery.mcworkform' :  ['jquery'],
    'jquery.mcworkmap' :  ['jquery'],
    'jquery.popup' : ['jquery'],
    'contentinum.archiv' : ['jquery','jquery.cookie'],
    'contentinum.popup' : ['jquery.popup'],
    'contentinum.gallery' : ['jquery.popup'],
    'datatables' : ['jquery'],
    'contentinum.datatables' : ['datatables'],
    'foundation': ['jquery'],
    'foundation.abide': ['foundation'],
    'foundation.accordion': ['foundation'],
    'foundation.alert': ['foundation'],
    'foundation.clearing': ['foundation'],
    'foundation.dropdown': ['foundation'],
    'foundation.equalizer': ['foundation'],
    'foundation.interchange': ['foundation'],
    'foundation.joyride': ['foundation', 'jquery.cookie'],
    'foundation.magellan': ['foundation'],
    'foundation.offcanvas': ['foundation'],
    'foundation.orbit': ['foundation'],
    'foundation.reveal': ['foundation'],
    'foundation.slider': ['foundation'],
    'foundation.tab': ['foundation'],
    'foundation.toolbar': ['foundation'],
    'foundation.topbar': ['foundation'],
    'ics.get': ['jquery','ics.libs'],
  }
});


require(['modernizr', 'jquery', 'foundation', 'jquery.customer'], function(Modernizr, $, FastClick) {
  $(document).load(function() {
    $(this).foundation();
  });
  $(document).ready(function() {
  	
  	if ($(".top-bar").length) {
  		require(["jquery", 'foundation', "foundation.topbar"], function( $, foundation ) {
  			$(document).foundation('topbar');
  		});
  	}
  	  	
  	if ( $('.media-popup').length) {
  		require(["jquery", "jquery.popup","contentinum.popup"], function( $ ) {
  			$().ContentinumPopUp();
  		});
  	}
  	
  	if ( $('.popup-gallery').length) {
  		require(["jquery", "jquery.popup","contentinum.gallery"], function( $ ) {			
  			$().ContentinumGallery();
  			
  		});  		
  	}
  	
  	if ( $('.pluginarchive').length) {
  		require(["jquery", "contentinum.archiv"], function( $ ) {
  			$('.news-archive-list').ContentinumArchiv();
  		});
  	}  	
  	
	if ($(".form-customer").length) {
  	  		require(["jquery", "jquery.validate", "jquery.mcworkform"], function( $ ) {
			    $(".form-customer").validate({
			    	submitHandler: function(form) {
			    		$().setDefaults({formIdent : 'formident'});
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
		require(['async!http://maps.google.com/maps/api/js?sensor=false!callback', 'jquery.mcworkmap'], function(){
			$().InitializeMap(centerLatitude, centerLongitude, startZoom, mapMarker);
		});
	}
	if ($('.accordion').length){
		require( ["jquery","foundation.accordion"], function ($, foundation){
			$(document).foundation('accordion');
		});
	}
  	 if ($('.initmodal').length) {
  	 	require( ["foundation.reveal"]);
  	 }
  	  $('.initmodal').click(function(ev) {
  	  	ev.preventDefault();
  	  	switch($(this).attr('data-reveal-id')){
  	  		case 'recomendModal':
  	  		$('body').append('<div id="recomendModal" class="reveal-modal" data-reveal="" data-reveal-ajax="true"> </div>');
  	  		$('#recomendModal').foundation('reveal', 'open', $(this).attr('href'));  	  	
  	  		    require(["jquery", "jquery.mcworkform"], function( $ ) {
			    $(document).on('click', '#sendbutton', function(ev) {
			    	ev.stopPropagation();
			    	ev.preventDefault();
			    	$().setDefaults({formIdent : false});
			    	$().FormValidation($('#recommendForm'));
			    });
           });
  	  		break;
  	  		default:
  	  	}
  	  }); 	  
  	  if ($('.getics').length){
  		require( ["ics.get"]);
  	  }
  });
  if(typeof appmodul !== typeof undefined){
		require(['datatables', 'datatable.foundation','jquery.highlight','datatable.highlight','contentinum.datatables'], function(){
			$().ContentinumDatatables(appsource);
		});		
	} 
});