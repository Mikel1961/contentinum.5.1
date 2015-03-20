
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
    'foundation.topbar': 'foundation/foundation.topbar'
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
    'foundation.topbar': ['foundation']
  }
});

require(['modernizr', 'jquery', 'foundation'], function(Modernizr, $, FastClick) {
  $(document).load(function() {
    $(this).foundation();
  });
  $(document).ready(function() {
  	if ($(".top-bar").length) {
  		require(["jquery", 'foundation', "foundation.topbar"], function( $, foundation ) {
  			$(document).foundation('topbar');
  		});
  	}
	if ($(".form-customer").length) {
  	  		require(["jquery", "jquery.validate", "jquery.mcworkform"], function( $ ) {
			    $(".form-customer").validate({
			    	submitHandler: function(form) {
			    		console.log('submit');
			    		$().setDefaults({formIdent : 'formident'});
			    		$().FormHandler(form);
			    	}
			    	
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
  });
});