(function ($){
	$.fn.McworkViewAndSelectFiles = function(options, app) {
		app.view();
		var domIdent = 'webMediasId';
		var opts = {};
		if (options.hasOwnProperty('domIdent')){
			domIdent = options.domIdent;
		}
		
		console.log(domIdent);
		console.log(options);
		opts.url = '/mcwork/services/application/dirlist';	
		var dirlist = Mcwork.Server.request(opts);
		$('#dir-links').html(dirlist);
		app.setApplication('/mcwork/services/application/explorer');
		app.ls();
		$(document.body).on('click', ".setlink", function(ev) {
			ev.preventDefault();
			ev.stopImmediatePropagation();
			app.setDirectory($(this).attr('data-link'));
			app.ls();
		});	
		$(document.body).on('click', ".thisMediaElement", function(ev) {
			ev.preventDefault();
			ev.stopImmediatePropagation();
			$('#' + domIdent).val($(this).attr('data-ident'));
			$('#' + domIdent).trigger("chosen:updated");
			delete app;
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');		
		});	
		$(document.body).on('click', '#cancel-button', function(ev) {
			delete app;
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});					
	};
})(jQuery);
var McworkFormValidators = {
	
	messages : {},
	
	setmessages : function(key, values){
		McworkFormValidators.messages[key] = {};
		$.each(values, function(index,value) {
			McworkFormValidators.messages[key][index] = value;
		});
	},
	
	mclenght : function(condition, value){
		var valid = true;
		switch(condition.operator){
			case '>':
			if (value.length > condition.min){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.min });
			}
			break;
			case '<':
			if (value.length < condition.max){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.max });
			}			
			break;	
			case '<>':
			if (value.length > condition.min && value.length < condition.max){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.min, '%2' : condition.max });
			}				
			break;	
			case '>=':
			if (value.length >= condition.min){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.min });
			}
			break;
			case '<=':
			if (value.length <= condition.max){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.max });
			}
			break;	
			case '<=>':
			if (value.length >= condition.min && value.length <= condition.max){ 
				valid = true; 
			} else { 
				valid = false; 
				McworkFormValidators.setmessages('mclenght', { 'msg' : condition.error, '%1' : condition.min, '%2' : condition.max });
			}	
			break;									
			default:
			break;
		}		
		return valid;
	},
	
	validate : function(conditions, value){
		var valid = true;
		$.each(conditions, function(validator,condition) {
			if ( McworkFormValidators.hasOwnProperty(validator) ){
				valid = McworkFormValidators[validator](condition, value);
			}
			
			
		});
		return valid;
		
	},
};


var McworkFormValidation = {
	
	
	pattern : {},
	required : {},
	email : {},
	url : {},
	formErrors : {},
	formRules : {},
	monitorErrors : false,
	build : false,
	urlPopulateValues : '/mcwork/services/application/populatevalues',
    entity : false,
    configure : false,
    categories : false,	
	
	setFormRules : function(url, rules) {
		if (typeof rules !== 'undefined'){
			this.formRules = rules;
		}
	},
	
	getFormRules : function(field, rule){
		if ( McworkFormValidation.formRules.hasOwnProperty(field) ){
			if ( McworkFormValidation.formRules[field].hasOwnProperty(rule) ){
				return McworkFormValidation.formRules[field][rule];
			}
			
		}
		return false;
	},

	monitorElements : function(field, monitor) {
		$("input[name=" + field + "]").change(function() {
			var inputvalue = $("input[name=" + field + "]").val();
			var validators = McworkFormValidators;
			if ( true === validators.validate(monitor.conditions, inputvalue) ) {
				Mcwork.Validation.unmarkErrorFields(field);
				McworkFormValidation.monitorErrors = false;
				if ( monitor.hasOwnProperty('remote') && true === Mcwork.Parameter.isset(monitor.remote) ){
					monitor.datas.value = inputvalue;
					$.ajax({
						async : false,
						type : "POST",
						url : monitor.remote,
						data : monitor.datas,
						beforeSend : function() {
							Mcwork.Validation.labelicon(field, Mcwork.Icons.getprocess() );
						},
						success : function(data) {
							if (1 == data) {
								Mcwork.Validation.markValidEntry(field, Mcwork.Language.translate('usr', monitor.messages.success));
							} else {							
								McworkFormValidation.monitorErrors = true;
								Mcwork.Validation.markErrorField(field, Mcwork.Language.translate('usr', monitor.messages.error));
							}
						}
					});
				} else {
					Mcwork.Validation.markValidEntry(field, Mcwork.Language.translate('usr',monitor.success));
				}
			} else {
				McworkFormValidation.monitorErrors = true;
				var str = '';
				var i = 1;
				$.each(validators.messages, function(index, messages){
					if (i > 1){
						str += '<br />';
					}
					var message = Mcwork.Language.translate('usr', messages.msg);
					if ( messages.hasOwnProperty('%1') ){
						message = message.replace('%1',messages['%1']);
					}
					if ( messages.hasOwnProperty('%2') ){
						message = message.replace('%2',messages['%2']);
					}					
					str += message;
					i++;
				});
				Mcwork.Validation.markErrorField(field, str);				
			}
		});
	}, 
	
	emptyform : function(std, form){
        $.each($('select'), function(i){
        	var domIdent = $(this).attr('id');
        	if (std.hasOwnProperty('#' +  domIdent)){
        		if ('_leave' == std['#' +  domIdent]['val']){
        			return;
        		}
        	}
        	$('#' +  domIdent + ' option:selected').prop("selected",false);
			if ( $('#' +  domIdent ).hasClass('chosen-select') ){
				$('#' +  domIdent ).trigger("chosen:updated");
			}  
			if (std.hasOwnProperty('#' +  domIdent)){
				$('#' +  domIdent + " option[value='"+  std['#' +  domIdent]['val']  +"']").prop("selected",true);
				if ( $('#' +  domIdent ).hasClass('chosen-select') ){
					$('#' +  domIdent ).trigger("chosen:updated");
				}  				
			}      	
        	
        });
        
		if ('tinymce' === $(form).attr('data-editor')){
			tinymce.activeEditor.setContent('');
		}        
		
		$.each($(":input:visible:not(:button, :submit, :radio, select)"), function(i) {
			var domIdent = $(this).attr('id');
        	if (std.hasOwnProperty('#' +  domIdent)){
        		if ('_leave' == std['#' +  domIdent]['val']){
        			return;
        		}
        	}	
			if ('checkbox' === $(this).attr('type')) {
				console.log('y');
				if (std.hasOwnProperty('#' +  domIdent) && 'unchecked' === std['#' +  domIdent]['val']){
					$('#' +  domIdent).prop( "checked", false );
				}
				return;
			}        			
			$(this).val('');
			if (std.hasOwnProperty('#' +  domIdent)){
				$(this).val(std['#' +  domIdent]['val']);
			}				
		});
	},
	
	loadform : function(entity,nextident){
		
		$.ajax({
				url : McworkFormValidation.urlPopulateValues,
				type : 'POST',
				data : {'entity' : entity, 'id' : nextident},	
				beforeSend: function(){ },	
				success : function(data) {
					formDatas = jQuery.parseJSON( data );				
					
					$.each($(":input:visible:not(:button, :submit, :radio, select)"), function(i) {
						var formElementName = $(this).attr('name');
						var domIdent = $(this).attr('id');
						if (formDatas.hasOwnProperty( formElementName ) ){
							$('#' +  domIdent ).val(formDatas[formElementName]);
						}		
					});
					
			        $.each($('select'), function(i){
			        	var domIdent = $(this).attr('id');

						if (formDatas.hasOwnProperty(domIdent)){
							$('#' +  domIdent + " option[value='" +  formDatas[domIdent]  + "']").prop("selected",true);
							if ( $('#' +  domIdent ).hasClass('chosen-select') ){
								$('#' +  domIdent ).trigger("chosen:updated");
							}  				
						}      	
			        	
			        });					
		
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}	
		});		
	},	
	
	submitform : function(opts, form){
		if (false === opts.xhr){
			$(form).submit();
		} else {
			
			if ('tinymce' === $(form).attr('data-editor')){
				tinyMCE.triggerSave();
			}
						
			var formData = $(form).serialize();
			var action = $(form).attr('action');
			
			$.ajax({
				url : action,
				type : opts.method,
				data : formData,
				beforeSend: function(){ 					
					Mcwork.Modals.buildProcess(false);
				} ,							
				success : function(data) {
					if (1 == data) {
						if (false !== opts.entity && true === opts.savenext && false !== opts.nextident){
							McworkFormValidation.loadform(opts.entity, opts.nextident);
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
							$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  
							$('#modalhead').html(Mcwork.Language.translate('heads', 'saveplussuccess') + ' ' + Mcwork.Icons.getsuccess() );
							$('#modalcontent').html( Mcwork.HTML.block('p', {'translate': {'key': 'messages', 'txt':'savenextsuccess' }} ) );
							$('#footercontent').html('<p class="modal-buttons right">' +  Mcwork.HTML.block('button', {'translate': {'key': 'btn', 'txt':'close'}}  ,{'id': 'cancel-button', 'class': 'button'})  + '</p>');
						} else {
							McworkFormValidation.emptyform(opts.std, form);
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
							$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  
							$('#modalhead').html(Mcwork.Language.translate('heads', 'saveplussuccess') + ' ' + Mcwork.Icons.getsuccess() );
							$('#modalcontent').html( Mcwork.HTML.block('p', {'translate': {'key': 'messages', 'txt':'saveplussuccess'  }} ) );
							$('#footercontent').html('<p class="modal-buttons right">' +  Mcwork.HTML.block('button', {'translate': {'key': 'btn', 'txt':'close'}}  ,{'id': 'cancel-button', 'class': 'button'})  + '</p>');
						}
						
					} else {
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						return false;
						
						Mcwork.xhrErrorMessages(data);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
						$('#modalcontent').html( Mcwork.HTML.block('p', {'txt':  msg } ) );
						$('#footercontent').html('<p class="modal-buttons right">' +  Mcwork.HTML.block('button', {'translate': {'key': 'btn', 'txt':'close'}}  ,{'id': 'cancel-button', 'class': 'button'})  + '</p>');
				}				
			});			
			
			
		}
	},


	validation : function(opts, form) {

		var error = false;

		$.each(McworkFormValidation.required, function(key, value) {
			Mcwork.Validation.unmarkErrorFields($(this).attr('name'));

			if (($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
				//McworkFormValidation.formErrors.push($(this));
				error = true;
				Mcwork.Validation.markErrorField($(this).attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));
			}

			if (value == undefined) {
				return true;
			}

			switch( $(this).attr('type') ) {
				case 'checkbox':
					if (!$("input:checkbox[name=" + $(this).attr('name') + "]:checked").val()) {
						//McworkFormValidation.formErrors.push($(this));
						error = true;
						Mcwork.Validation.markErrorField($(this).attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));
					}
					break;
				default:
					break;
			}	

		});
		
		if (true === error) {
			return false;
		}

		$.each(McworkFormValidation.pattern, function(key, value) {
			Mcwork.Validation.unmarkErrorFields($(this).attr('name'));

			if (value == undefined) {
				return true;
			}
			if (($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
				return true;
			}
			if ($(this).val().search($(this).attr('pattern'))) {
				//McworkFormValidation.formError.push($(this));
				error = true;
				Mcwork.Validation.markErrorField($(this).attr('name'), Mcwork.Language.translate('usr', 'patternfield')); // + ': ' + $(this).attr('title'));

			}
		});
		$.each(McworkFormValidation.email, function(key, value) {
			Mcwork.Validation.unmarkErrorFields($(this).attr('name'));
			
			if (value == undefined) {
				return true;
			}
			if (($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
				return true;
			}
			if($(this).val().search(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/i)) {
				error = true;
				Mcwork.Validation.markErrorField($(this).attr('name'), Mcwork.Language.translate('usr', 'emailfield')); 
			}			
			
		});
		$.each(McworkFormValidation.url, function(key, value) {
			Mcwork.Validation.unmarkErrorFields($(this).attr('name'));
			
			if (value == undefined) {
				return true;
			}
			if (($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
				return true;
			}
			if($(this).val().search(/^(https?|ftp|file|ssh):\/\/(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i)) {
				error = true;
				Mcwork.Validation.markErrorField($(this).attr('name'), Mcwork.Language.translate('usr', 'urlfield')); 
			}			
			
		});		
		if (true === error) {
			return false;
		}
		
		if (false === error && true === opts.send){
			McworkFormValidation.submitform(opts,form);
		}

	},

	build : function(opts, form){
		var elms = 1;
		$.each($(":input:visible:not(:button, :submit, :radio, select)"), function(i) {
			var monitor = {};
			if (false !== (monitor = McworkFormValidation.getFormRules($(this).attr('name'), 'monitor' ))){
				McworkFormValidation.monitorElements($(this).attr('name'), monitor);
			}
			
			if (this.getAttribute('pattern') != null) {
				McworkFormValidation.pattern[elms] = $(this);
			}

			//Make array of pattern inputs
			if (this.getAttribute('required') != null) {
				McworkFormValidation.required[elms] = $(this);
			}

			//Make array of Email inputs
			if (this.getAttribute('type') == 'email') {
				McworkFormValidation.email[elms] = $(this);
			}	
			
			if (this.getAttribute('type') == 'url') {
				McworkFormValidation.url[elms] = $(this);
			}						
			
			elms++;
		});
		
		$.each($('select'), function(i){
			if ($(this).attr('required')){
				McworkFormValidation.required[elms] = $(this);
			}
			elms++;
		});
		
		return true;
	},
	
	
};


var McworkGroups = {
	
	options : {},
	
	fetchCategories : function(datas){
		    return '';
			$.ajax({
				url : McworkGroups.options.url,
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					$(McworkGroups.options.dom).html( '<figure class="group-element">' + Mcwork.iconprocess(Mcwork.icon_gear + ' ' + Mcwork.icon_sizes.s2) + '</figure>' );	
				} ,							
				success : function(data) {
					var jsonData = jQuery.parseJSON( data );
					$(McworkGroups.options.dom).html(  McworkGroups.view(jsonData)  );
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});			
		
		
	},	
	
	view : function(datas){
		var content = '';
		var figident = 1;
		var count = 1;
		var dataPrevious = false;
		$.each( datas, function( index, element ) {
			var str = '';
			var elmActive = '';
			if (count > 1){
				dataPrevious = 'figident' + (figident - 1);
			}
			
			if (  element.itemId == $(McworkGroups.options.active_element).val() ){
				elmActive = ' activecategory';
			}
			
			if ( element.hasOwnProperty('src') ){
				str += Mcwork.HTML.inline('img', { 'src' : element.src, 'alt' : element.itemName } );
			} else if ( element.hasOwnProperty('icon') ){
				str += Mcwork.Icons.geticon(element.icon + ' ' + Mcwork.icon_sizes.s5); 
			}
			if ('media' ==  McworkGroups.options.category){
				str += Mcwork.HTML.block('figcaption',{ 'txt' : element.itemName}, {'class': 'category-desc'});				
				str = Mcwork.HTML.block('a', { 'txt' : str}, { 'href' : '#',  'class': 'saveandnext', 'data-ident' : element.id, 'data-previous' : dataPrevious });
				content += Mcwork.HTML.block('figure', { 'txt' : str}, {'id': 'figident' + figident, 'class': 'group-element' + elmActive});
			}
			count++;
			figident++;
		});
	    return content;		
	},	
	
};


(function($) {
	$.fn.mcworkCategories = function(options, type) {
		
		var defaults = {
			dom : '#specifiedGroup',
		};
		
		if (options.hasOwnProperty('categories')){
			options = options.categories;
		} else {
			return false;
		}

		var opts = $.extend({}, defaults, options);
		
		
		if (this){
			var app = McworkGroups;
			app.options = opts;
			if ($(opts.element).val() > 0){
				app.fetchCategories({'categoryname': opts.categoryname, 'id' :  $(opts.element).val() });
			} 

			$(document.body).on('change', opts.element, function(ev) {
				ev.preventDefault();
				ev.stopImmediatePropagation();
				app.fetchCategories({'categoryname': opts.categoryname, 'id' :  $(opts.element).val() });
			});
			
		} else {
			return false;
		}
	};
})(jQuery);

(function ($){
	$.fn.McworkSelectModules = function(options) {
		var emptyForm = {
			1 : {
				'spec' : {
					'name' : 'modulParams',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulParams'
	                }
	            }
	         },
			2 : {
				'spec' : {
					'name' : 'modulDisplay',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulDisplay'
	                }
	            }
	         },
			3 : {
				'spec' : {
					'name' : 'modulConfig',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulConfig'
	                }
	            }
	         },
			4 : {
				'spec' : {
					'name' : 'modulLink',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulLink'
	                }
	            }
	         },
			5 : {
				'spec' : {
					'name' : 'modulFormat',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulFormat'
	                }
	            }
	         },	
		};
		var value = $(this).val();
		var fields = new Array('modulParams','modulDisplay','modulConfig','modulLink','modulFormat');
		var opts = {};
		opts.url = '/mcwork/services/application/configure';
		opts.data = {service : $(this).attr('data-service')};
		datas = Mcwork.Server.request(opts);
		if (value > '0'){
			var modul = datas[$(this).val()];
			var populate = {};
			$.each(fields, function( index, value ) {
				populate[value] = $('#' + value).val();
			});		
			$('#pluginForm').html(Mcwork.Forms.init({ populateValues : populate, formtag : false }, modul.form ));
		}
		$(this).change(function(){
			var value = $(this).val();
			if (value > '0'){
				var modul = datas[$(this).val()];
				$('#pluginForm').html(Mcwork.Forms.init({ formtag : false }, modul.form ));
			} else {
				$('#pluginForm').html(Mcwork.Forms.init({ formtag : false }, emptyForm));
			}
		});
		
	};
})(jQuery);	

(function ($){
	
	var rules = false;
	
	
	$.fn.Mcworkhtml5FormValidate = function(options, app) {
		
		var defaults = {
			xhr : false,
			async : true,
			labels : true,
			method : $(this).attr('method'),
			action : $(this).attr('action'),
			rules : $(this).attr('data-rules'),
			build : true,
			validation : false,
			send : false,
			formRules : false,
			configure : false,
			savenext : false,
			nextident : false,
			entity : false,
		};

		var opts = $.extend({}, defaults, options);	
		
		if (false === rules){
			var formrules = Mcwork.Server.request({url : '/mcwork/services/application/configure', data : {'service':'mcwork_form_rules'}});
			
			if ( typeof opts.rules !== 'undefined' ){
				if ( formrules.hasOwnProperty(opts.rules)){
					rules = formrules[opts.rules];
				}
			}
		}	
		if (false !== rules){
			if (rules.hasOwnProperty('entity')){
				opts.entity = rules['entity'];
			}
			if (rules.hasOwnProperty('elements')){
				opts.formRules = rules['elements'];
			}
			if (rules.hasOwnProperty('configure')){
				opts.configure = rules['configure'];
			}
			if (rules.hasOwnProperty('categories')){
				opts.categories = rules['categories'];
			}
			opts.std = rules['std'];	
		}	
		
		
		
		if (true === opts.build){
			app.setFormRules(null,opts.formRules);
			opts.formRules = {};
			app.build(opts,this);
		}

		

		
		if (true === opts.validation){
			app.validation(opts, this);
		} else {
			$('#specifiedGroup').mcworkCategories(opts);
		}
		

		
		if (opts.configure.hasOwnProperty('url_back')){
			var back = opts.configure.url_back;

			$(document.body).on('click', '.form-button-cancel', function(ev) {
				ev.preventDefault();
				ev.stopImmediatePropagation();
				
				if (opts.configure.hasOwnProperty('url_placeholder')){
					if (false === Mcwork.isset($(opts.configure.url_source_element).val())){
						var cat = opts.configure.url_source_std;
					} else {
						var cat = $(opts.configure.url_source_element).val();
					}
					back = back.replace(opts.configure.url_placeholder, cat);
				}
				window.location.href = back;
			});			
			
		} else {
			$('.form-button-cancel').click(function(ev){
				ev.preventDefault();
				window.location.href = $(this).attr('data-back');
			});			
		}
		
		
		$(document.body).on('click', '#cancel-button', function(ev) {
			delete app;
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});			

	};
})(jQuery);	

$(document).ready(function() {
	
	if ( $("#modul").length) {
		$('#modul').McworkSelectModules({} );
	}	
	
	$(".chosen-select").chosen();
	
	if ($("#menuDate")){
		$("#menuDate").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}	
	
	if ($("#validUntil").length) {
		$("#validUntil").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}
	
	if ($("#dateStart")){
		$("#dateStart").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}
	if($("#dateEnd")){
		$("#dateEnd").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}	

	if ($("#publishUp")){
		$("#publishUp").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}
	if($("#publishDown")){
		$("#publishDown").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}
	
	if ( $("#publishDate").length) {
		$("#publishDate").datetimepicker( Mcwork.Parameter.getDatePicker() );
	}	
	
	if ( $("#mediaLinkPage").length ){
		$("#mediaLinkPage").change(function(ev){
			ev.preventDefault();
			$("#mediaLinkUrl").val(  $("#mediaLinkPage").val()  );
		});
	}
	
	$('#viewSelectFile').click(function(ev){
		ev.preventDefault();
		var options = {};
		var mediafield = $(this).data('mediafield');

		if (typeof mediafield != 'undefined'){
			options.domIdent = mediafield;
		}
		$().McworkViewAndSelectFiles(options,Mcwork.Explorer);
	});	
	
	
	if (  $('#setAccountGroupForm').length ){
		
		var groupForm = {
			1 : {
				'spec' : {
					'name' : 'accountGroup',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Gruppe',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'accountGroup'
	                }
	            }
	         },
	   };
	   
	   if (0 != $('#fieldtypes').val()){	   	
			var datas = {'fieldtypes' : $('#fieldtypes').val()};
			var populate = { 'accountGroup' : $('#accountGroup').val()};
			$.ajax({
				url : '/mcwork/services/application/accountgroups',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					$('#setAccountGroupForm').html('<p><i class="fa fa-spinner fa-pulse"></i></p>');
				} ,							
				success : function(data) {
					groupForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountGroupForm').html(Mcwork.Forms.init({populateValues : populate, formtag : false }, groupForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});		   	
	   	
	   	
	   }
		
		$('#fieldtypes').change(function(ev){
			$('#setAccountGroupForm').html('');
			var datas = {'fieldtypes' : $('#fieldtypes').val()};
			$.ajax({
				url : '/mcwork/services/application/accountgroups',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					
				} ,							
				success : function(data) {
					groupForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountGroupForm').html(Mcwork.Forms.init({ formtag : false }, groupForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});				
			
			
			
		});
	}
	
	if (  $('#setAccountCategoryForm').length ){
		
		var categoryForm = {
			1 : {
				'spec' : {
					'name' : 'accountCategory',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Kategorie',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'accountCategory'
	                }
	            }
	         },
	   };
	   
		
		//$('#accountGroup').change(function(ev){
		$(document.body).on('change', '#accountGroup', function(ev) {	
			$('#setAccountCategoryForm').html('');
			var datas = {'accountGroup' : $('#accountGroup').val()};
			$.ajax({
				url : '/mcwork/services/application/accountcategory',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					$('#setAccountCategoryForm').html('<p><i class="fa fa-spinner fa-pulse"></i></p>');
				} ,							
				success : function(data) {
					categoryForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountCategoryForm').html(Mcwork.Forms.init({ formtag : false }, categoryForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});				
			
			
			
		});
	}	
	
		

	var app = McworkFormValidation;
	$('#mcworkForm').Mcworkhtml5FormValidate({build : true }, app);	
	
	$('.form-button-save').click(function(ev){
		ev.preventDefault();
		$('#mcworkForm').Mcworkhtml5FormValidate({build : false, validation : true, send : true, xhr : false }, app);
	});	
	
	$('.form-button-saveplus').click(function(ev){
		ev.preventDefault();
		$('#mcworkForm').Mcworkhtml5FormValidate({build : false, validation : true, send : true, xhr : true }, app);
		$('#mcworkForm').Mcworkhtml5FormValidate({build : true }, app);
		
	});	
	
	
	$('.form-button-cancel').click(function(ev){
		ev.preventDefault();
		window.location.href = $(this).attr('data-back');
	});		
	
	$('.editorlink').click(function(ev){
		ev.preventDefault();
		var elm = $(this).attr('data-ref');
		var link = $(this).attr('data-link');
		var media = $('#' + elm).val();
		var label = $('#' + elm + ' option:selected').text();
		
		if (media.length > 0) {
			var str = '';
			var selectedText = tinyMCE.activeEditor.selection.getContent({format: 'text'});
			if ('org' === link){
				if (selectedText.length > 0) {
					label = selectedText;
				} else {
					label = label.replace('(internal)','');
					label = label.trim();
				}
				
				str += '<a href="'+ media +'">' + label + '</a>';
			} else {
				if (selectedText.length > 0) {
					label = selectedText;
				} else  {
					label = label.substr(label.indexOf('#') + 1);
				}
				
				str += '<a href="/' + link + '/'+ media +'">' + label + '</a>';				
			}
			
			tinyMCE.activeEditor.insertContent(str);
        	$('#' +  elm + ' option:selected').prop("selected",false);
        	$('#' +  elm ).trigger("chosen:updated");
						
			
		}
		console.log(label);
		console.log( $('#' + elm).val() );
		
	});
	
});