
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
    'datatables' : ['jquery'],
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

var datatablesStyles = {'1':'/assets/js/css/datatables/jquery.dataTables.min.css','2':'/assets/js/css/datatables/dataTables.foundation.css','3':'/assets/js/css/datatables/dataTables.searchHighlight.css'};
var imagepopup = {'1': '/assets/js/css/popup/magnific-popup.css'};
function loadCss(url) {
    var link = document.createElement("link");
    link.type = "text/css";
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName("head")[0].appendChild(link);
}

require(['modernizr', 'jquery', 'foundation', 'jquery.customer'], function(Modernizr, $, FastClick) {
  $(document).load(function() {
    $(this).foundation();
  });
  $(document).ready(function() {
	  if(typeof appmodul !== typeof undefined){
	  
	  }
  	if ($(".top-bar").length) {
  		require(["jquery", 'foundation', "foundation.topbar"], function( $, foundation ) {
  			$(document).foundation('topbar');
  		});
  	}
  	
  	if ( $('.media-popup').length) {
		$.each(imagepopup, function(i, url) {
			loadCss(url);
		});	  		
  		require(["jquery", "jquery.popup"], function( $, foundation ) {
  			$(document).on('click', '.media-popup', function(ev) {
		    	ev.stopPropagation();
		    	ev.preventDefault();
		    	var imgTitle = $(this).children('figcaption').text();	
		    	$.magnificPopup.open({
		    		  items: {
		    		    src: $(this).children().attr('src') ,
		    		  },
	    		     image: {
	    		          titleSrc: function(item) {
	    		        	 
	    		            return imgTitle;
	    		          },		    		  
	    		     },
		    		 type: 'image'
		       });		    	
		    	
		    	
  			});
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
  if(typeof loadscripts !== typeof undefined){
		$.each(datatablesStyles, function(i, url) {
			loadCss(url);
		});	
		require(['datatables', 'datatable.foundation'], function(){
			$('#mcworkTables').dataTable({ 
				pagingType : 'full_numbers',
				stateSave : true,
				autoWidth : false,
				bSort : false,				
				language : {
					
				 	"sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
				    "sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
				    "sInfoEmpty":       "0 bis 0 von 0 Einträgen",
				    "sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
				    "sInfoPostFix":     "",
				    "sInfoThousands":   ".",
				    "sLengthMenu":      "_MENU_ Einträge anzeigen",
				    "sLoadingRecords":  "Wird geladen <i class='fa fa-spinner fa-spin'></i>",
				    "sProcessing":      "Bitte warten...",
				    "sSearch":          "Suchen",
				    "sZeroRecords":     "Keine Einträge vorhanden.",
				    "oPaginate": {
				        "sFirst":       "Erste",
				        "sPrevious":    "Zurück",
				        "sNext":        "Nächste",
				        "sLast":        "Letzte"
				    },
				    "oAria": {
				        "sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
				        "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
				    }
				},
			});			
			
		});		  
  }
  if(typeof appmodul !== typeof undefined){

		$.each(datatablesStyles, function(i, url) {
			loadCss(url);
		});	
		require(['datatables', 'datatable.foundation','jquery.highlight','datatable.highlight'], function(){
			$('#mcworkTables').dataTable({ 
				pagingType : 'full_numbers',
				stateSave : true,
				autoWidth : false,
				bSort : false,	
				searchHighlight: true,
				ajax : "/api/"+appsource,
				language : {
					
				 	"sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
				    "sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
				    "sInfoEmpty":       "0 bis 0 von 0 Einträgen",
				    "sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
				    "sInfoPostFix":     "",
				    "sInfoThousands":   ".",
				    "sLengthMenu":      "_MENU_ Einträge anzeigen",
				    "sLoadingRecords":  "Wird geladen <i class='fa fa-spinner fa-spin'></i>",
				    "sProcessing":      "Bitte warten...",
				    "sSearch":          "Suchen",
				    "sZeroRecords":     "Keine Einträge vorhanden.",
				    "oPaginate": {
				        "sFirst":       "Erste",
				        "sPrevious":    "Zurück",
				        "sNext":        "Nächste",
				        "sLast":        "Letzte"
				    },
				    "oAria": {
				        "sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
				        "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
				    }
				},
			});	

			
			
			  $(document).on('click', '.readmoreapp', function(ev) {
				  	ev.stopPropagation();
				  	ev.preventDefault();
				  	var ident = $(this).data('ident');
				  	$.ajax({
						url : "/"+ ident,
						type : 'GET',
						beforeSend : function(){
							$('#readmorecontent').html('<div class="panel"><p class="text-center"><i class="fa fa-spinner fa-spin fa-2x"> </i></p></div>');					
						},	
						error : function (argument) {
							$('#readmorecontent').html('<div class="panel"><p>Fehler in der Applikation versuchen Sie es bitte nocheinmal</p></div>');
						},		
						success : function(data) {
							$('#readmorecontent').html(data);
							
						},
				  		
				  	});
				  	
				});
		});		
	} 
});