( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {

			datatablesStyles : {
				'1' : '/assets/js/css/datatables/jquery.dataTables.min.css',
				'2' : '/assets/js/css/datatables/dataTables.foundation.css',
				'3' : '/assets/js/css/datatables/dataTables.searchHighlight.css'
			},

			loadCss : function(url) {
				var link = document.createElement("link");
				link.type = "text/css";
				link.rel = "stylesheet";
				link.href = url;
				document.getElementsByTagName("head")[0].appendChild(link);
			},
			
			ContentinumDatatables : function(appsource) {
				
				$.each(this.datatablesStyles, function(i, url) {
					loadCss(url);
				});				
				

				$('#mcworkTables').dataTable({
					pagingType : 'full_numbers',
					stateSave : true,
					autoWidth : false,
					bSort : false,
					searchHighlight : true,
					ajax : "/api/" + appsource,
					language : {

						"sEmptyTable" : "Keine Daten in der Tabelle vorhanden",
						"sInfo" : "_START_ bis _END_ von _TOTAL_ Einträgen",
						"sInfoEmpty" : "0 bis 0 von 0 Einträgen",
						"sInfoFiltered" : "(gefiltert von _MAX_ Einträgen)",
						"sInfoPostFix" : "",
						"sInfoThousands" : ".",
						"sLengthMenu" : "_MENU_ Einträge anzeigen",
						"sLoadingRecords" : "Wird geladen <i class='fa fa-spinner fa-spin'></i>",
						"sProcessing" : "Bitte warten...",
						"sSearch" : "Suchen",
						"sZeroRecords" : "Keine Einträge vorhanden.",
						"oPaginate" : {
							"sFirst" : "Erste",
							"sPrevious" : "Zurück",
							"sNext" : "Nächste",
							"sLast" : "Letzte"
						},
						"oAria" : {
							"sSortAscending" : ": aktivieren, um Spalte aufsteigend zu sortieren",
							"sSortDescending" : ": aktivieren, um Spalte absteigend zu sortieren"
						}
					},
				});

				$(document).on('click', '.readmoreapp', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();
					var ident = $(this).data('ident');
					$.ajax({
						url : "/" + ident,
						type : 'GET',
						beforeSend : function() {
							$('#readmorecontent').html('<div class="panel"><p class="text-center"><i class="fa fa-spinner fa-spin fa-2x"> </i></p></div>');
						},
						error : function(argument) {
							$('#readmorecontent').html('<div class="panel"><p>Fehler in der Applikation versuchen Sie es bitte nocheinmal</p></div>');
						},
						success : function(data) {
							$('#readmorecontent').html(data);

						},
					});

				});

			},
		});
}));

