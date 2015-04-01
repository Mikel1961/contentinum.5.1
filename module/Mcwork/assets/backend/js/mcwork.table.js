

McworkDataSet = (function(options){
	return {
		execute : function(){
			$('#save-button').click(function(ev) {
				ev.preventDefault();
				window.location.reload(true);
			});
			
			
		}
	};
})(this.document);

McworkAppEdit = (function(){
	
	var opts = {};
	
	function setOptions(options){
		opts = options;
	}
	
	function getOptions(){
		return opts;
	}
	
	function getOption(key){
		if ( opts.hasOwnProperty(key) ){
			return opts[key];
		} else {
			return false;
		}
	}
	
	return {
		execute : function(appoptions){
			setOptions(appoptions);
			$('#save-button').click(function(ev) {
				ev.preventDefault();
				var error = false;
				var someForm = $('#appedit');
				var formDatas = {};
				$.each(someForm[0].elements, function(index, elm){		
					formDatas[$(elm).attr('name')] = $(elm).val();		 
					Mcwork.Validation.unmarkErrorFields($(elm).attr('name'));
					if (elm.getAttribute('required') !== null && ($(elm).val() == '')) {
						error = true;
						Mcwork.Validation.markErrorField($(elm).attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));
					}				  
				});
				formDatas['ident'] = appoptions.ident;
				if (false === error){
					if ( 'ajax' === getOption('method') ){
						var senddata = {};
						senddata.data = formDatas;
						senddata.app = getOption('app'); 
						$.ajax({
								url :  getOption('url'), 
								type : 'POST',
								data : senddata,	
								beforeSend: function(){ 
									$('#server-process').html( Mcwork.Icons.getprocess() );	
								},	
								success : function(data) {
									var obj = jQuery.parseJSON(data);
									if (obj.error) {
										$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
										$('#modalcontent').html( Mcwork.HTML.build('p', {'txt':  obj.error } ) );	
									} else {
										$('#save-button').hide();
										Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
										$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
										$('#server-process').html( Mcwork.Icons.getsuccess() );
										$('#modalcontent').html( '<p>' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>' );
									}				
							
						
								},
								error: function (xhr, ajaxOptions, thrownError) {									
										var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
										$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
										$('#modalcontent').html( Mcwork.HTML.build('p', {'txt':  msg } ) );
								}	
						});					
					}
				}
			});
		}
	};
})(this.document);


(function($) {
	$.fn.McworkRemoveSubmenue = function(elm){
		var opts = {
			ident : $(elm).attr('data-ident'),
			parent : $(elm).attr('data-parent'),
		};
		var btn = {
			ident : $(elm).attr('data-ident'),
			label : $(elm).attr('data-label'),
			scope : $(elm).attr('data-scope'),
			page : $(elm).attr('data-pageident'),
		};		
		
		var parent = $(elm).parent();		
		var ul = $(parent).parent();

			
			$.ajax({
					url :  '/mcwork/services/application/removesubmenue',
					type : 'POST',
					data : opts,	
					beforeSend: function(){ 
						$(elm).html( Mcwork.Icons.getprocess() );
					},	
					success : function(data) {
						var obj = jQuery.parseJSON(data);
						if (obj.error) {
							Mcwork.Modals.buildError(obj.error);
							$(elm).html('<i class="fa fa-minus"> </i>');
							
							
						    $('#cancel-button').click(function(ev) {
						    	$(Mcwork.std_modal).foundation('reveal', 'close');
							});	
							
							
						} else {
							var str = '<li><a class="button tiny addsubmenue" data-pageident="'+ btn.page +'" data-scope="'+ btn.scope +'" data-ident="'+ btn.ident +'" data-label="'+ btn.label +'" href="#">';
							str += '<i class="fa fa-plus"> </i></a></li>';
							$(ul).html(str);
						}				
				
			
					},
					error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
					}	
			});	
			
						
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			window.location.reload(true);
		});				

	};
})(jQuery);


(function($) {
$.fn.McworkAddSubmenue = function(options, elm){
	
	var opts = options;
	var element = elm;
	
	function getOption(key){
		if (false === key){
			return opts;
		}
		if (opts.hasOwnProperty(key)){
			return opts[key];
		}
	}
	
	function getElement(){
		return element;
	}
	
	return {
		execute : function(){
			var option = getOption(false);
			var elm = getElement();
			$('#addsub-button').click(function(ev) {
				ev.preventDefault();
				option.headline = $('#submenueHeadline').val();
				
				$.ajax({
						url :  '/mcwork/services/application/addsubmenue',
						type : 'POST',
						data : opts,	
						beforeSend: function(){ 
							$('#server-process').html( Mcwork.Icons.getprocess() );	
						},	
						success : function(data) {
							var obj = jQuery.parseJSON(data);
							if (obj.error) {
								$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
								$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  obj.error } ) );	
							} else {
								$('#addsub-button').hide();
								Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
								$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
								$('#server-process').html( Mcwork.Icons.getsuccess() );
								$('#modalcontent').html( '<p>' + Mcwork.Language.translate('server', 'addsubmenuesuccess') + '</p>' );
								$(parent).html('<a class="button tiny success" role="button" href="/mcwork/menue/category/'+ obj.cat +'"><i class="fa fa-pencil"> </i></a>');
							}				
					
				
						},
						error: function (xhr, ajaxOptions, thrownError) {									
								var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
								$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
								$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  msg } ) );
						}	
				});					
				
				
			});
			
			
		}
	};
	};
})(jQuery);


(function($) {
	$.fn.McworkPublish = function(options, publishstatus,elm){
		var defaults = {
			url : '/mcwork/services/application/publishitem',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			categoryname : $(elm).attr('data-categoryname'),
			ident : $(elm).attr('data-ident'),
		};
		var parent = $(elm).parent();
		var link = {
			'class' : publishstatus,
			'data-ident' : datas.ident,
			'data-categoryname' : datas.categoryname,
			'href' : '#',
		};
		if ('unpublish' == publishstatus){
			var linkcontent = '<i class="fa fa-toggle-on fa-2x emerald-color"> </i>';
		} else {
			var linkcontent = '<i class="fa fa-toggle-off fa-2x alizarin-color"> </i>';
		}
		
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				$(parent).html( Mcwork.Icons.getprocess() );
			},				
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				if (obj.error) {
					$(parent).html( Mcwork.Icons.getwarn() );
					Mcwork.Modals.buildError(obj.error);
				} else {
					$(parent).html(  Mcwork.HTML.block('a',{'txt':linkcontent} , link)   );
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
				Mcwork.Modals.buildError(msg);
			}				
		});
	};
})(jQuery);


(function($) {
	$.fn.McworkChangeRang = function(options,move){
		var defaults = {
			url : '/mcwork/services/application/changeitemrang',
			group : 'media',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			newrang : 0,
			group : $(this).attr('data-group'),
			category : $(this).attr('data-category'),
			current : $(this).attr('data-rang'),
			categoryname : $(this).attr('data-categoryname'),
			datamove : $(this).attr('data-move'),
		};
		//console.log(datas);
		if ('jump' == move){
			datas.newrang = $(this).val();
		}
		
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				Mcwork.Modals.buildProcess(Mcwork.Language.translate('messages', 'serveraction'));
			},				
			success : function(data) {
				$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
				window.location.reload(true);
				/*
				$('#setDataTable').html( data );

				$('table').McworkDataTables({
					language : Mcwork.datatablelngstr(),
					stateSave: true,
				});*/
				
			},
			error : function(xhr, ajaxOptions, thrownError) {
				var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
				$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
				$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  msg } ) );
				$('#footercontent').html('<p class="modal-buttons right">' +  Mcwork.HTML.block('button', {'translate': {'key': 'btn', 'txt':'close'}}  ,{'id': 'cancel-button', 'class': 'button'})  + '</p>');				
			}				
		});
	};
})(jQuery);


(function($) {
	$.fn.McworkDataTables = function(options, elm) {
		var defaults = {
			'pagingType' : 'full_numbers',
			stateSave: true,
		};
		var opts = $.extend({}, defaults, options);
		var dataTables;
		$(this).each(function() {
			var ident = $(this).attr('id');
			if (false !== Mcwork.Parameter.isset(ident)) {
				if ($('#' + ident).hasClass('tblNoSort')) {
					opts.bSort = false;
				}
				$('#' + ident).dataTable(opts);
			}
		});	
	};
})(jQuery);



(function ($){
	$.fn.McworkClientApplication = function(options, elm, modul) {
		var opts = {};
		var populate = {};
		var appkey = $(elm).attr('data-appkey');	
		var ident = $(elm).attr('data-ident');
		if (typeof ident !== typeof undefined && ident !== false) {
			ident = $(elm).attr('data-ident');
		} else {
			var ident = '';
		}	
		opts.url = '/mcwork/services/application/configure';
		opts.data = {service : $(elm).attr('data-service')};	
		var configuration = Mcwork.Server.request(opts);	
		if ( configuration.hasOwnProperty(appkey) ){
			
			
			var appFactory = configuration[appkey];
			if (appFactory.hasOwnProperty('modal')){
				Mcwork.Parameter.setDomElement(elm);
				Mcwork.Modals.build(appFactory['modal']);
			}
			var appoptions = {};
			
			if (appFactory.hasOwnProperty('appoptions') ){
				appoptions = appFactory['appoptions'];
			}
			appoptions['ident'] = ident; 
			modul.execute(appoptions);
						
			
			
			//console.log(appFactory);
		} else {
			if (configuration.hasOwnProperty('error')  ){
				Mcwork.Modals.buildError(configuration.error);
			} else {
				Mcwork.Modals.buildError(false);
			}
		}
		
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			delete modul;
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			window.location.reload(true);
		});	
		
		$('#close-button').click(function(ev) { 
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			delete modul;
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');			
		});		

	};
})(jQuery);


$(document).ready(function() {
	var serverClock = $("#serverClock");
	if (serverClock.length > 0) {
		Mcwork.Clock.show(serverClock, serverClock.text());
	}	

	$('.addsubmenue').click(function(ev) {
		ev.preventDefault();
		var opts = {
			ident : $(this).attr('data-ident'),
			label : $(this).attr('data-label'),
			scope : $(this).attr('data-scope'),
			page : $(this).attr('data-pageident'),
		};	
		$().McworkClientApplication({}, this, $().McworkAddSubmenue(opts, this));	
		
	});	
	
	$(document.body).on('click', '.removesub', function(ev) {	
		ev.preventDefault();
		$().McworkRemoveSubmenue(this);
	});

	
	$(document.body).on('click', '.publish', function(ev) {	
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$().McworkPublish({}, 'unpublish',this);
		
	});
	
	$(document.body).on('click', '.unpublish', function(ev) {		
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$().McworkPublish({}, 'publish',this);
		
	});		
	
	$(document.body).on('change', '.changerang', function(ev) {
		ev.preventDefault();
		$(this).McworkChangeRang({},'jump');
	});
	
	$(document.body).on('click', '.moveitem', function(ev) {
		ev.preventDefault();
		$(this).McworkChangeRang({},'move');
	});	
	
	

	$('.deleteitem').click(function(ev){
		ev.preventDefault();
		var deleteRequest = $(this).attr('href');
		
		var message = Mcwork.Language.translate('usr','confirm_delete');
		Mcwork.Modals.buildConfirm(message.replace('%1',  ' <em>[' + $(this).attr('data-name') + ']</em> '));
		
		$('#confirm-button').click(function(ev) {
			ev.preventDefault();
			window.location.href = deleteRequest;
		});
		
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});	
		
	});
	
	$('.removeitem').click(function(ev){
		ev.preventDefault();
		var deleteRequest = $(this).attr('href');
		
		var message = Mcwork.Language.translate('usr','confirm_remove');
		Mcwork.Modals.buildConfirm(message.replace('%1',  ' <em>[' + $(this).attr('data-name') + ']</em> '));
		
		$('#confirm-button').click(function(ev) {
			ev.preventDefault();
			window.location.href = deleteRequest;
		});
		
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});			
		
	});	
	
	$('#btnTblEdit').click(function(e) {
		e.preventDefault();
		if (Mcwork.Tables.isTableRowSelected() === true) {
			var location = $(this).attr('href');
			var category = $(this).attr('data-category');
			var value = false;
			var table = $('.table');
			var ch = table.find('tbody input:checkbox:checked');
			ch.each(function() {
				value = $(this).val();
				return;
			});
			if (false !== value) {
				if (typeof category !== 'undefined'){
					value += '/' + category;
				}
				window.location.href = location + '/' + value;
			} else {
				Mcwork.Modals.buildError(Mcwork.Language.translate('errors', 'noidentexists'));
				return false;
			}

		}
		$(document.body).on('click', '#cancel-button', function(ev) {
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	});	
	
	//$('.editapp').click(function(ev){
	$(document.body).on('click', '.editapp', function(ev) {		
		ev.preventDefault();
		ev.stopImmediatePropagation();		
		$().McworkClientApplication({}, this, McworkAppEdit);		
	});
	
	$('.tblClients').click(function(ev){
		ev.preventDefault();
		$().McworkClientApplication({}, this, McworkAppEdit);
	});
	
	
	$('.infotip').click(function(ev){
		ev.preventDefault();
		$().McworkClientApplication({}, this, McworkDataSet);
	});
	
	$('.usrblocked').click(function(ev){
		ev.preventDefault();
		var options = {};
		var defaults = {
			url : '/mcwork/services/application/unlockuser',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			ident : $(this).data('ident'),
		};
		var parent = $(this).parent();
		var unlockcontent = '<i class="fa fa-unlock fa-2x emerald-color"> </i>';
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				$(parent).html( Mcwork.Icons.getprocess() );
			},				
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				if (obj.error) {
					$(parent).html( Mcwork.Icons.getwarn() );
					Mcwork.Modals.buildError(obj.error);
				} else {
					$(parent).html(  unlockcontent  );
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
				Mcwork.Modals.buildError(msg);
			}				
		});	
	});	
	
	
	if ($('table')) {
		dataTables = $('table').McworkDataTables({
			language : Mcwork.Language.datatable('datatable'),
			stateSave: true,
		});
			
	}	
	
});