
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
	    'datatables' : 'jquery/jquery.dataTables.min',
	    'datatable.responsive' : 'datatables/dataTables.responsive.min',
	    'datatable.highlight' : 'datatables/dataTables.searchHighlight.min',
	    'contentinum.archiv' : 'contentinum/contentinum.archiv',
	    'contentinum.events' : 'contentinum/contentinum.events',
	    'contentinum.popup' : 'contentinum/contentinum.popup',
	    'contentinum.tooltip' : 'contentinum/contentinum.tooltipster',
	    'contentinum.gallery' : 'contentinum/contentinum.gallery',
	    'contentinum.navigation' : 'contentinum/contentinum.menu',
	    'contentinum.datatables' : 'contentinum/contentinum.datatables',
	    'contentinum.media.popup' : 'contentinum/contentinum.media.popup',
	    'contentinum.mmenue' : 'contentinum/contentinum.mmenue',
	    'ie10viewport' : 'ie/ie10-viewport-bug-workaround',
	    'bootstrap' : 'bootstrap/bootstrap.min',
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
	    'contentinum.navigation' : ['jquery','jquery.cookie'],
	    'contentinum.events' : ['jquery'],
	    'contentinum.archiv' : ['jquery','jquery.cookie'],
	    'contentinum.popup' : ['jquery.popup'],
	    'contentinum.gallery' : ['jquery.popup'],
	    'contentinum.mmenue' : ['jquery.mmenue'],
	    'contentinum.media.popup' : ['jquery.popup'],
	    'contentinum.tooltip' : ['jquery.tooltip'],
	    'datatables' : ['jquery'],
	    'contentinum.datatables' : ['datatables'],
	    'bootstrap' : ['jquery'], 
	    'ie10viewport' : ['jquery'],
	}
	
});

require(['jquery', 'bootstrap', 'ie10viewport'], function($){
	
  	if ( $('.popup-youtube').length) {
  		require(["jquery", "jquery.popup","contentinum.media.popup"], function( $ ) {
  			$().ContentinumVideoPopUp();
  		});
  	}	

});