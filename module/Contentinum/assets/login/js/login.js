

(function($) {
	$.fn.LoginForm = function(options) {

		$(this).each(function() {

			//default configuration properties
			var defaults = {
				async : true,
				method : $(this).attr('method'),
				responseDiv : null,
				labels : 'show',
				colorOn : '#000000',
				colorOff : '#a1a1a1',
				selectColor : '#C7C7C7',
				selectedColor : '#CC0000', 
				beforeSendClass : 'important',
				action : $(this).attr('action'),
				messages : false,
				emptyMessage : false,
				emailMessage : false,
				allBrowsers : true,
				newagent : false,
			};
			var opts = $.extend({}, defaults, options);




            var language = false;
			//Private properties
			var form = $(this);
			var required = new Array();
			var pattern = new Array();
			var email = new Array();

			//Setup color & placeholder function
			function fillInput(input) {
				if(input.attr('placeholder') && input.attr('type') != 'password') {
					if(!input.val() != '') {
						input.val(input.attr('placeholder'));
						input.css('color', opts.colorOff);
					}
				} else {
					if(!input.data('value')) {
						if(input.val() != '') {
							input.data('value', input.val());
						}
					} else {
						input.val(input.data('value'));
					}
					input.css('color', opts.colorOn);
				}
			}

			function markErrorField(fieldname, messages) {
				$('#field' + fieldname).addClass("error");
				$('#field' + fieldname).append('<span role="alert" id="err' + fieldname + '" class="validation-error">' + messages + '</span>');
			}

			function unmarkErrorFields(fieldname) {
				$("#field" + fieldname).removeClass("error");
				$("#err" + fieldname).remove();
			}
			
			function serverProcess(messages){
				return '<div role="alert" class="'+ opts.beforeSendClass +' box-position"><p>'+ messages +'</p></div>';
			}
			
			//Label hiding (if required)
			if(opts.labels == 'hide') {
				$(this).find('label').hide();
			}

			//Select event handler (just colors)
			$.each($('select', this), function() {
				$(this).css('color', opts.selectColor);
				$(this).change(function() {
					$(this).css('color', opts.selectedColor);
				});
			});
			//For each textarea & visible input excluding button, submit, radio, checkbox and select
			$.each($(':input:visible:not(:button, :submit, :radio, :checkbox)', form), function(i) {

				//Setting color & placeholder
				if(!opts.newagent) {
					fillInput($(this));
				}
				//Make array of required inputs
				if(this.getAttribute('pattern') != null) {
					pattern[i] = $(this);
				}
				
				//Make array of pattern inputs
				if(this.getAttribute('required') != null) {
					required[i] = $(this);
				}				

				//Make array of Email inputs
				if(this.getAttribute('type') == 'email') {
					email[i] = $(this);
				}

				//FOCUS event attach
				//If input value == placeholder attribute will clear the field
				//If input type == url will not
				//In both cases will change the color with colorOn property
				$(this).bind('focus', function(ev) {
					ev.preventDefault();
					if(this.value == $(this).attr('placeholder')) {
						if(this.getAttribute('type') != 'url') {
							$(this).attr('value', '');
						}
					}
					$(this).css('color', opts.colorOn);
				});
				//BLUR event attach
				//If input value == empty calls fillInput fn
				//if input type == url and value == placeholder attribute calls fn too
				$(this).bind('blur', function(ev) {
					ev.preventDefault();
					if(this.value == '') {
						fillInput($(this));
					} else {
						if((this.getAttribute('type') == 'url') && ($(this).val() == $(this).attr('placeholder'))) {
							fillInput($(this));
						}
					}
				});
				//Limits content typing to TEXTAREA type fields according to attribute maxlength
				$('textarea').filter(this).each(function() {
					if($(this).attr('maxlength') > 0) {
						$(this).keypress(function(ev) {
							var cc = ev.charCode || ev.keyCode;
							if(cc == 37 || cc == 39) {
								return true;
							}
							if(cc == 8 || cc == 46) {
								return true;
							}
							if(this.value.length >= $(this).attr('maxlength')) {
								return false;
							} else {
								return true;
							}
						});
					}
				});
			});
			$.each($('input:submit, input:image, input:button', this), function() {
				$(this).bind('click', function(ev) {
                    var inputError = null;
					var patternError = null;
					
					var formError = null;

					var input = $(':input:visible:not(:button, :submit, :radio, :checkbox)', form);//select

                    
					$(required).each(function(key, value) {
						unmarkErrorFields($(this).attr('name'));
						if(value == undefined) {
							return true;
						}
						if(($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
							formError = $(this);
							markErrorField($(this).attr('name'), 'Das Feld muss einen Wert enthalten');

						}
						return formError;
					});
					//Search for empty fields & value same as placeholder
					//returns first input founded
					//Add messages for multiple languages
					if ( ! formError ){
					$(pattern).each(function(key, value) {
						unmarkErrorFields($(this).attr('name'));

						if(value == undefined) {
							return true;
						}
						if(($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
							return true;
						}						
						if($(this).val().search($(this).attr('pattern'))) {
							formError = $(this);
							markErrorField($(this).attr('name'), 'Der Wert ist im falschen Format: ' + $(this).attr('title'));
							//return false;

						}
						return formError;
					});			
					
					}	

					//Submit form ONLY if emptyInput & emailError are null
					//if async property is set to false, skip ajax
					if(!formError) {

						//Clear all empty value fields before Submit
						$(input).each(function() {
							if($(this).val() == $(this).attr('placeholder')) {
								$(this).val('');
							}
						});
						//Submit data by Ajax
						if(opts.async) {
							$(form).submit();
						} else {
							$(form).submit();
						}
					}
					return false;
				});
			});
		});
	};
})(jQuery);


$(document).ready(function() {
	
	$('#loginForm').LoginForm({allBrowsers : false,async : false });	
	
	
	
	
});
