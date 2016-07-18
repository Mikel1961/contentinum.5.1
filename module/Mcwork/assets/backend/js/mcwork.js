( function(root, factory) {
		root.Mcwork = factory(root, {}, (root.jQuery || root.Zepto || root.ender || root.$));
	}(this, function(root, Mcwork, $) {
		var array = [];
		var push = array.push;
		var slice = array.slice;
		var splice = array.splice;
		Mcwork.VERSION = '1.0.0';
		Mcwork.Locale = 'de_DE';
		var DateTimePickerOptions = {
			lang : 'de',
			format : 'Y-m-d H:i',
			step : 30,
			dayOfWeekStart : 1,
			allowBlank : true
		};
		var TaggingOptions = {
			'case-sensitive' : true,
		};
		var StandardModal = '#modal';
		var StandardTemplate = {
			header : {
				row : {
					element : 'header',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'modalcontent',
					}
				},
				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'error'
					},
					'behind' : '<i class="fa fa-exclamation-triangle"> </i>'
				}
			},
			body : {
				row : {
					element : 'section',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'modalcontent',
					}
				},
				content : {
					element : 'p',
					'attr' : {
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'usr',
						'txt' : 'unkown_app'
					},
				}
			},
			footer : {
				row : {
					element : 'footer',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'modalfooter',
					}
				},
				content : {
					row : {
						element : 'ul',
						'attr' : {
							'class' : 'modal-buttons right'
						}
					},
					'grids' : {
						'1' : {
							'element' : 'li'
						}
					},
					'1' : {
						'element' : 'button',
						'attr' : {
							'id' : 'cancel-button',
							'class' : 'button'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'close'
						}
					}
				}
			}
		};
		var BasicTemplate = {
			header : {
				row : {
					element : 'header',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'headcontent',
					}
				},
			},
			body : {
				row : {
					element : 'section',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'modalcontent',
					}
				},
			},
			footer : {

				row : {
					element : 'footer',
					'attr' : {
						'class' : 'row'
					}
				},
				grid : {
					element : 'div',
					'attr' : {
						'class' : 'large-12 columns',
						'id' : 'footercontent',
					}
				}
			}
		};
		var ErrorTemplate = {
			header : {
				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'error'
					},
					'behind' : '<span id="server-process"> <i class="fa fa-exclamation-triangle"> </i> </span>'
				}
			},
			body : {
				content : {
					element : 'p',
					'attr' : {
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'usr',
						'txt' : 'unkown_app'
					},
				}
			},
			footer : {
				content : {
					row : {
						element : 'ul',
						'attr' : {
							'class' : 'modal-buttons right'
						}
					},
					'grids' : {
						'1' : {
							'element' : 'li'
						}
					},
					'1' : {
						'element' : 'button',
						'attr' : {
							'id' : 'cancel-button',
							'class' : 'button'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'close'
						}
					}
				}
			}
		};
		var ProcessTemplate = {
			header : {
				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'sendform'
					},
					'behind' : '<span id="server-process"> <i class="fa fa-gear fa-spin"> </i> </span>'
				}
			},
			body : {
				content : {
					element : 'p',
					'translate' : {
						'key' : 'messages',
						'txt' : 'serveraction'
					},
				}
			},
			footer : {
				content : {
					element : 'p',
					'translate' : {
						'key' : 'messages',
						'txt' : '...'
					},
				}
			}
		};
		var ConfirmTemplate = {
			header : {
				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
						'class' : 'alizarin-color'
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'confirm'
					},
					'behind' : '<span id="server-process"> <i class="fa fa-exclamation-triangle"> </i> </span>'
				}
			},
			body : {
				content : {
					element : 'p',
					'attr' : {
						'class' : 'alizarin-color'
					},
					'txt' : 'Please confirm action',
				}
			},
			footer : {
				content : {
					row : {
						element : 'ul',
						'attr' : {
							'class' : 'modal-buttons right'
						}
					},
					'grids' : {
						'1' : {
							'element' : 'li'
						},
						'2' : {
							'element' : 'li'
						}
					},
					'1' : {
						'element' : 'button',
						'attr' : {
							'id' : 'confirm-button',
							'class' : 'button alert'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'confirm'
						}
					},
					'2' : {
						'element' : 'button',
						'attr' : {
							'id' : 'cancel-button',
							'class' : 'button'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'cancel'
						}
					}
				}
			}
		};
		var font_color_warn = 'alizarin-color';
		var font_color_success = 'emerald-color';
		var font_color_confirm = 'belize-hole-color';
		var icon_cog = 'fa-cog';
		var icon_warn = 'fa-exclamation-triangle';
		var icon_question = 'fa-question';
		var icon_success = 'fa-check-circle';
		var icon_remove = 'fa-minus';
		var icon_gear = 'fa-gear';
		var icon_file = 'fa-file';
		var icon_upload = 'fa-upload';
		var icon_folder = 'fa-folder';
		var icon_folder_open = 'fa-folder-open';
		var icon_unlock = 'fa-unlock';
		var icon_lock = 'fa-lock';
		var icon_sizes = {
			s2 : 'fa-2x',
			s3 : 'fa-3x',
			s4 : 'fa-4x',
			s5 : 'fa-5x',
			lg : 'fa-lg',
		};
		var Translations;
		var DomElement;
		Mcwork.$ = $;
		var Parameter = Mcwork.Parameter = {
			isset : function(variable) {
				if ( typeof variable === 'undefined') {
					return false;
				} else if (variable.lenght == 0) {
					return false;
				} else {
					return true;
				}
			},
			hasRemoveClass : function(elm, cssclass) {
				if ($(elm).hasClass(cssclass)) {
					$(elm).removeClass(cssclass);
				}
			},
			set : function() {},
			setDomElement : function(elm) {
				DomElement = elm;
			},
			getDomElement : function(elm) {
				return DomElement;
			},
			unsetDomElement : function() {
				DomElement = null;
			},
			getDatePicker : function() {
				return DateTimePickerOptions;
			},
			getTagging : function() {
				return TaggingOptions;
			},
			release : function() {
				return MC.VERSION;
			},
		};
		var ArrayMerge = Mcwork.ArrayMerge = {
			recursive : function() {
				if (arguments.length < 2) {
					throw new Error("ArrayMergeRecursive: Please enter two or more objects to merge!");
				}
				var arr1 = arguments[0];
				for (var i = 0; i <= arguments.length; i++) {
					$.extend(true, arr1, arguments[i]);
				}
				return arr1;
			}
		};
		var Colors = Mcwork.Colors = {
			WARN : font_color_warn,
			SUCCESS : font_color_success,
			CONFIRM : font_color_confirm,
			get : function(color) {
				return color;
			},
		};
		var Icons = Mcwork.Icons = {
			COG : icon_cog,
			WARN : icon_warn,
			QUESTION : icon_question,
			SUCCESS : icon_success,
			REMOVE : icon_remove,
			GEAR : icon_gear,
			FILE : icon_file,
			UPLOAD : icon_upload,
			FOLDER : icon_folder,
			FOLDEROPEN : icon_folder_open,
			USRLOCK : icon_lock,
			USRUNLOCK : icon_unlock,
			get : function(icon) {
				return icon;
			},
			geticon : function(set) {
				return '<i class="fa ' + set + '"> </i>';
			},
			getwarn : function() {
				return Icons.geticon(Icons.WARN + ' ' + font_color_warn);
			},
			getsuccess : function() {
				return Icons.geticon(Icons.SUCCESS + ' ' + font_color_success);
			},
			getprocess : function() {
				return Icons.geticon(Icons.GEAR + ' fa-spin ' + font_color_warn);
			},
			removethisicon : function(elm) {
				$(elm).find('i').remove('i');
			}
		};
		var Server = Mcwork.Server = {
			request : function(options) {
				var defaults = {
					url : false,
					method : 'get',
					type : 'POST',
				};
				var opts = $.extend({}, defaults, options);
				return this.get(opts);
			},
			get : function(opts) {
				var returndatas = {};
				$.ajax({
					async : false,
					cache : false,
					dataType : "json",
					url : opts.url,
					type : opts.type,
					data : opts.data,
					success : function(data) {
						returndatas = data;
					}
				});
				return returndatas;
			},
		};
		var Attributes = Mcwork.Attributes = {
			associative : false,
			setAssociative : function() {
				Attributes.associative = true;
			},
			unsetAssociative : function() {
				Attributes.associative = false;
			},
			dom : function(elm, attrib, value) {
				if (false === value) {
					return $(elm).attr(attrib);
				} else {
					$(elm).attr(attrib, value);
				}
			},
			set : function(attribs, elm) {
				$.each(attribs, function(attrib, value) {
					Attributes.dom(elm, attrib, value);
				});
			},
			get : function(attribs, elm) {
				var dataValues = {};
				$.each(attribs, function(index, attrib) {
					if (true === Attributes.associative) {
						index = attrib;
					}
					dataValues[index] = Attributes.dom(elm, attrib, false);
				});
				return dataValues;
			},
			string : function(datas) {
				var attribs = '';
				$.each(datas, function(attrib, value) {
					if (false !== value) {
						attribs += ' ' + attrib + '="' + value + '"';
					}
				});
				return attribs;
			},
		};
		var HTML = Mcwork.HTML = {
			section : {},
			row : {},
			grid : {},
			grids : {},
			content : {},
			block : function(tag, content, attribute) {
				if ( typeof attribute === 'undefined') {
					var attribute = {};
				}
				var str = '';
				if (content.hasOwnProperty('prev')) {
					str += content['prev'];
				}
				if (content.hasOwnProperty('translate')) {
					str += Language.translate(content['translate']['key'], content['translate']['txt']);
				} else {
					str += content['txt'];
				}
				if (content.hasOwnProperty('behind')) {
					str += content['behind'];
				}
				return '<' + tag + Attributes.string(attribute) + '>' + str + '</' + tag + '>';
			},
			inline : function(tag, attribute) {
				if ( typeof attribute === 'undefined') {
					var attribute = {};
				}
				return '<' + tag + Attributes.string(attribute) + ' />';
			},
			set : function(template) {
				if (template.hasOwnProperty('section')) {
					HTML.section = template['section'];
				}
				if (template.hasOwnProperty('row')) {
					HTML.row = template['row'];
				}
				if (template.hasOwnProperty('grid')) {
					HTML.grid = template['grid'];
				}
				if (template.hasOwnProperty('grids')) {
					HTML.grids = template['grids'];
				}
				if (template.hasOwnProperty('content')) {
					HTML.content = template['content'];
				}
			},
			empty : function() {
				HTML.section = {};
				HTML.row = {};
				HTML.grid = {};
				HTML.grids = {};
				HTML.content = {};
			},
			workoff : function(htmldata, content) {
				if (htmldata.hasOwnProperty('attr')) {
					var attribute = htmldata['attr'];
				} else {
					var attribute = {};
				}
				return HTML.block(htmldata['element'], content, attribute);
			},
			workgrids : function(htmldata) {
				var htmlgrids = '';
				$.each(htmldata['grids'], function(index, values) {
					htmlgrids += HTML.workoff(values, {
						'txt' : HTML.workoff(htmldata[index], htmldata[index])
					});
				});
				if (htmldata.hasOwnProperty('row')) {
					htmlgrids = HTML.workoff(htmldata['row'], {
						'txt' : htmlgrids
					});
				}
				return htmlgrids;
			},
			viewscript : function(template) {
				HTML.set(template);
				var returnHtml = '';
				if (HTML.content.hasOwnProperty('options')) {
					var options = HTML.content['options'];
				} else {
					var options = {};
				}
				if (HTML.content.hasOwnProperty('element')) {
					if (HTML.content.hasOwnProperty('attr')) {
						var attribute = HTML.content['attr'];
					} else {
						var attribute = {};
					}
					returnHtml += HTML.block(HTML.content['element'], HTML.content, attribute);
				} else if (HTML.content.hasOwnProperty('grids')) {
					returnHtml += HTML.workgrids(HTML.content);
				} else if (HTML.content.hasOwnProperty('form')) {
					var formAttribute = {};
					if (options.hasOwnProperty('form')) {
						formAttribute = options['form'];
					}
					if (options.hasOwnProperty('getFieldValue')) {
						formAttribute.populateValues = Attributes.get(options['getFieldValue'], DomElement);
					}
					if (options.hasOwnProperty('getFieldValSrv')) {
						var getFieldValSrv = options['getFieldValSrv'];
						var datas = options['getFieldValSrv']['data'];
						datas.id = $(DomElement).attr(options['getFieldValSrv']['ident']);
						formAttribute.populateValues = Server.get({
							url : options['getFieldValSrv']['url'],
							data : datas
						});
					}
					returnHtml += Forms.init(formAttribute, HTML.content['form']);
				}
				if (HTML.grid.hasOwnProperty('element')) {
					returnHtml = HTML.workoff(HTML.grid, {
						'txt' : returnHtml
					});
				}
				if (HTML.row.hasOwnProperty('element')) {
					returnHtml = HTML.workoff(HTML.row, {
						'txt' : returnHtml
					});
				}
				if (HTML.section.hasOwnProperty('element')) {
					returnHtml = HTML.workoff(HTML.section, {
						'txt' : returnHtml
					});
				}
				HTML.empty();
				return returnHtml;
			},
		};
		var Modals = Mcwork.Modals = {
			build : function(template) {
				var modalContent = '';
				if (template.hasOwnProperty('header')) {
					modalContent += HTML.viewscript(template['header']);
				}
				if (template.hasOwnProperty('body')) {
					modalContent += HTML.viewscript(template['body']);
				}
				if (template.hasOwnProperty('footer')) {
					modalContent += HTML.viewscript(template['footer']);
				}
				$(StandardModal).attr('role', 'dialog');
				$(StandardModal).attr('aria-labelledby', 'modal');
				$(StandardModal).html(modalContent);
				$(StandardModal).foundation('reveal', 'open');
			},
			buildError : function(message) {
				var errTemplate = ArrayMerge.recursive(BasicTemplate, ErrorTemplate);
				if (false !== message) {
					errTemplate.body.content.translate.txt = message;
				}
				Modals.build(errTemplate);
			},
			buildProcess : function(message) {
				var processTemplate = ArrayMerge.recursive(BasicTemplate, ProcessTemplate);
				if (false !== message) {
					processTemplate.body.content.translate.txt = message;
				}
				Modals.build(processTemplate);
			},
			buildConfirm : function(message) {
				var confirmTemplate = ArrayMerge.recursive(BasicTemplate, ConfirmTemplate);
				if (false !== message) {
					confirmTemplate.body.content.txt = message;
				}
				Modals.build(confirmTemplate);
			},
			getStdModal : function() {
				return StandardModal;
			},
			getBasicModal : function() {
				return BasicTemplate;
			},
			getErrModal : function() {
				return ErrorTemplate;
			},
		};
		var Explorer = Mcwork.Explorer = {
			Template : {
				header : {
					content : {
						element : 'h4',
						'attr' : {
							'id' : 'modalhead',
						},
						'translate' : {
							'key' : 'heads',
							'txt' : 'fileexplorer'
						},
						'behind' : ' <span id="server-process"> </span>'
					}
				},
				body : {
					content : {
						element : 'div',
						'attr' : {
							'class' : 'row explorer'
						},
						'txt' : '<div id="dir-links" class="large-3 columns"> </div> <div id="explorerview" class="large-9 columns">  </div>'
					}
				},
				footer : {
					content : {
						row : {
							element : 'ul',
							'attr' : {
								'class' : 'modal-buttons right'
							}
						},
						'grids' : {
							'1' : {
								'element' : 'li'
							},
						},
						'1' : {
							'element' : 'button',
							'attr' : {
								'id' : 'cancel-button',
								'class' : 'button'
							},
							'translate' : {
								'key' : 'btn',
								'txt' : 'close'
							}
						}
					}
				}
			},
			directory : {
				dir : ''
			},
			application : '',
			view : function() {
				return Mcwork.Modals.build(Mcwork.ArrayMerge.recursive(Mcwork.Modals.getBasicModal(), Mcwork.Explorer.Template));
				$(document.body).on('click', '#cancel-button', function(ev) {
					$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
				});
			},
			ls : function() {
				$.ajax({
					url : Explorer.application,
					type : 'POST',
					data : Explorer.directory,
					beforeSend : function() {
						$('#server-process').html(Mcwork.Icons.getprocess());
					},
					success : function(data) {
						var jsonData = jQuery.parseJSON(data);
						$('#server-process').html(Mcwork.Icons.getsuccess());
						$('#explorerview').html(Mcwork.Explorer.buildDirectoryContent(jsonData));
					},
					error : function(xhr, ajaxOptions, thrownError) {
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.modalError(Mcwork.translate('errors', 'server'), Mcwork.translate('text', 'message'), Mcwork.translate('server', msg));
					}
				});
			},
			buildDirectoryContent : function(elements) {
				var content = '';
				$.each(elements, function(filename, element) {
					var str = '';
					if (element.hasOwnProperty('src')) {
						str += '<span class="explorer-item">' + Mcwork.HTML.inline('img', {
							'src' : element.src,
							'alt' : filename,
							'title' : filename,
							'width' : 200
						}) + '</span>';
					} else {
						str += '<span class="explorer-item">' + Mcwork.Icons.geticon(element.icon + ' fa-5x') + '</span>';
					}
					str += Mcwork.HTML.block('figcaption', {
						'txt' : filename
					}, {
						'class' : 'element-desc'
					});
					str = Mcwork.HTML.block('a', {
						'txt' : str
					}, {
						'href' : '#',
						'class' : 'thisMediaElement',
						'data-ident' : element.mediaIdent,
						'title' : filename,
					});
					content += Mcwork.HTML.block('figure', {
						'txt' : str
					}, {
						'class' : 'exlporer-element'
					});
				});
				return content;
			},
			setDirectory : function(path) {
				Explorer.directory.dir = path;
			},
			setApplication : function(url) {
				Explorer.application = url;
			},
		};
		var Validation = Mcwork.Validation = {
			labelicon : function(fieldname, icon) {
				var text = $('#field' + fieldname + ' > label').text();
				$('#field' + fieldname + ' > label').html(text + ' ' + icon);
			},
			unmarkErrorFields : function(fieldname) {
				Icons.removethisicon('#field' + fieldname + ' > label');
				Parameter.hasRemoveClass($("#field" + fieldname), "error");
				Parameter.hasRemoveClass($("#field" + fieldname), 'valid');
				$("#alert" + fieldname).remove();
			},
			markValidEntry : function(fieldname, messages) {
				Validation.labelicon(fieldname, Icons.geticon(Icons.SUCCESS));
				$('#field' + fieldname).addClass("valid");
				$('#field' + fieldname).append('<span role="alert" id="alert' + fieldname + '" class="validation-valid">' + messages + '</span>');
			},
			markErrorField : function(fieldname, messages) {
				Validation.labelicon(fieldname, Icons.geticon(Icons.WARN));
				$('#field' + fieldname).addClass("error");
				$('#field' + fieldname).append('<span role="alert" id="alert' + fieldname + '" class="validation-error">' + messages + '</span>');
			},
		};
		var Forms = Mcwork.Forms = {
			specKeys : {
				name : 'name',
				required : 'required',
				options : 'options',
				type : 'type',
				attributes : 'attributes'
			},
			optionKeys : {
				label : 'label',
				decorow : 'deco-row',
				empty_option : 'empty_option',
				value_function : 'value_function',
				value_option : 'value_options',
				exclude_options : 'exclude_options',
				desc : 'description'
			},
			defaultTypes : ['note', 'text', 'textarea', 'select', 'check', 'radio', 'hidden', 'button'],
			decorators : {
				'collapse' : {
					'template' : 'collapseTemplatePostfix',
					'tag' : 'span',
					'attribs' : {
						'class' : 'postfix'
					}
				},
				'button' : {
					'row' : {
						'tag' : 'ul',
						'attr' : {
							'class' : 'button-group right'
						}
					},
					'grid' : {
						'tag' : 'li'
					}
				},
				'description' : {
					'tag' : 'span',
					'attribs' : {
						'class' : 'desc'
					}
				},
				'text' : {
					'tag' : 'p',
					'attribs' : {
						'class' : 'formElement'
					}
				},
				'dropzone' : {
					'tag' : 'div',
					'attribs' : {
						'class' : 'fallback'
					}
				}
			},
			elements : {},
			populateValues : { },
			collapseContent : { },
			buttons : {},
			buildSelectOptions : function(name, options) {
				var selectOptions = '';
				if (options.hasOwnProperty(Forms.optionKeys.empty_option)) {
					selectOptions += '<option value="">' + options[Forms.optionKeys.empty_option] + '</option>';
				}
				if (options.hasOwnProperty(Forms.optionKeys.value_function)) {
					switch(options.value_function.method) {
					case 'ajax':
						$.ajax({
							async : false,
							cache : false,
							dataType : "json",
							url : options.value_function.url,
							type : 'POST',
							data : options.value_function.data,
							success : function(data) {
								options.value_options = data;
							}
						});
						break;
					default:
						break;
					}
				}
				if (options.hasOwnProperty(Forms.optionKeys.value_option)) {
					var selectedValue = ( Forms.populateValues.hasOwnProperty(name) ) ? Forms.populateValues[name] : '';

					$.each(options[Forms.optionKeys.value_option], function(value, label) {
						if (selectedValue == value) {
							var selected = ' selected="selected"';
						} else {
							var selected = '';
						}
						selectOptions += '<option' + selected + ' value="' + value + '">' + label + '</option>';
					});
				}
				return selectOptions;
			},
			createDecorators : function(content, deco, name) {
				if (Forms.decorators.hasOwnProperty(deco)) {
					var decorator = Forms.decorators[deco];
					if (decorator.hasOwnProperty('template')) {
						if (Mcwork.hasOwnProperty(decorator['template'])) {
							var template = Mcwork[decorator['template']];
							template['content'][1] = content;
							var str = (decorator.hasOwnProperty('attribs')) ? Attributes.string(decorator['attribs']) : '';
							template['content'][2] = '<' + decorator['tag'] + str + '>' + this.collapseContent[name] + '</' + decorator['tag'] + '>';
							return $().setHtml(template, {}, {});
						}
					} else {
						if (decorator.hasOwnProperty('attribs')) {
							decorator['attribs']['id'] = 'field' + name;
							str = Attributes.string(decorator['attribs']);
						} else {
							str = ' id="field' + name + '"';
						}
						return '<' + decorator['tag'] + str + '>' + content + '</' + decorator['tag'] + '>';
					}
				}
				return content;
			},
			createElement : function(type, name, options, fieldAttribute) {
				var field = '';
				type = type.toLowerCase();
				switch(type) {
				case 'hidden':
					var field = '';
					field += '<input type="' + type + '" name="' + name + '" value="';
					field += ( Forms.populateValues.hasOwnProperty(name) ) ? Forms.populateValues[name] : '';
					field += '"';
					field += Attributes.string(fieldAttribute);
					field += ' />';
					break;
				case 'file':
				case 'text':
					var field = Forms.createLabel(options, name);
					field += '<input type="' + type + '" name="' + name + '" value="';
					field += ( Forms.populateValues.hasOwnProperty(name) ) ? Forms.populateValues[name] : '';
					field += '"';
					field += Attributes.string(fieldAttribute);
					field += ' />';
					field += Forms.createDescription(options, name);
					break;
				case 'textarea':
					var field = Forms.createLabel(options, name);
					field += '<textarea name="' + name + '"';
					field += Attributes.string(fieldAttribute);
					field += '>';
					field += ( Forms.populateValues.hasOwnProperty(name) ) ? Forms.populateValues[name] : '';
					field += '</textarea>';
					field += Forms.createDescription(options, name);
					break;
				case 'select':
					var field = Forms.createLabel(options, name);
					field += '<select name="' + name + '"';
					field += Attributes.string(fieldAttribute);
					field += '>';
					field += Forms.buildSelectOptions(name, options);
					field += '</select>';
					break;
				case 'note':
					var field = fieldAttribute.value;
					break;
				case 'button':
					var field = '';
					field += '<button type="' + type + '" name="' + name + '"';
					var btn_label = fieldAttribute.value;
					fieldAttribute.value = false;
					field += Attributes.string(fieldAttribute);
					field += '>';
					field += Language.translate('btn', btn_label);
					field += '</button>';
					Forms.buttons[name] = field;
					field = '';
					break;
				default:
					break;
				}
				return field;
			},
			createLabel : function(options, name) {
				if (options.hasOwnProperty(Forms.optionKeys.label) && options[Forms.optionKeys.label].length > 0) {
					return '<label for="' + name + '">' + Language.translate('labels', options[Forms.optionKeys.label]) + '</label>';
				} else {
					return '';
				}
			},
			createDescription : function(options, name) {
				if (options.hasOwnProperty(Forms.optionKeys.desc) && options[Forms.optionKeys.desc].length > 0) {
					return Forms.createDecorators(options[Forms.optionKeys.desc], Forms.optionKeys.desc);
				} else {
					return '';
				}
			},
			createButtonLine : function() {
				var html = '';
				var btn = '';
				var row = Forms.decorators.button.row;
				var grid = Forms.decorators.button.grid;
				$.each(Forms.buttons, function(index, button) {
					btn += '<' + grid.tag;
					btn += '>';
					btn += button;
					btn += '</' + grid.tag + '>';
				});
				if (btn.length > 1) {
					html += '<' + row.tag;
					html += Attributes.string(row.attr);
					html += '>' + btn;
					html += '</' + row.tag + '>';
				}
				return html;
			},
			addElement : function(type, name, options, fieldAttribute) {
				if (options.hasOwnProperty(Forms.optionKeys.decorow)) {
					Forms.elements[name] = Forms.createDecorators(Forms.createElement(type, name, options, fieldAttribute), options[Forms.optionKeys.decorow], name);
				} else {
					Forms.elements[name] = Forms.createElement(type, name, options, fieldAttribute);
				}
			},
			getElement : function(type, name, options, fieldAttribute) {
				if (Forms.elements.hasOwnProperty(name)) {
					return Forms.elements[name];
				} else {
					return Forms.createElement(type, name, options, fieldAttribute);
				}
			},
			setElements : function(elements) {
				$.each(elements, function(index, element) {
					Forms.addElement(element.spec.type, element.spec.name, element.spec.options, element.spec.attributes);
				});
			},
			build : function(form, elements) {
				Forms.populateValues = form.populateValues;
				Forms.collapseContent = form.collapseContent;
				Forms.lng = form.lng;
				Forms.setElements(elements);
				var html = '';
				if (true === form.formtag) {
					html += '<form action="' + form.action + '" method="' + form.actionmethod + '"';
					html += Attributes.string(form.attributes);
					html += '>';
				}
				$.each(Forms.elements, function(index, element) {
					html += element;
				});
				html += Forms.createButtonLine();
				if (true === form.formtag) {
					html += '</form>';
				}
				Forms.populateValues = {};
				Forms.elements = {};
				return html;
			},
			init : function(formOptions, formElements) {
				var defaults = {
					action : '#',
					actionmethod : 'POST',
					attributes : {},
					populateValues : {},
					collapseContent : {},
					formtag : true,
					lng : false,
				};
				var opts = $.extend({}, defaults, formOptions);
				return Forms.build(opts, formElements);
			}
		};
		var Tables = Mcwork.Tables = {
			init : function(options, elm) {
				var defaults = {
					'pagingType' : 'full_numbers',
					stateSave : true,
				};
				var opts = $.extend({}, defaults, options);
				var dataTables;
				$(this).each(function() {
					var ident = $(this).attr('id');
					if (false !== Parameter.isset(ident)) {
						if ($('#' + ident).hasClass('tblNoSort')) {
							opts.bSort = false;
						}
						$('#' + ident).dataTable(opts);
					}
				});
			},
			isTableRowSelected : function() {
				if ($('td input[type="checkbox"]:checked').is(":empty") == false) {
					Modals.buildError('checkboxselect');
					return false;
				} else {
					return true;
				}
			},
		};
		var Clock = Mcwork.Clock = {
			show : function(obj, time) {
				var parts = time.split(":"),
				    newTime = new Date(),
				    timeDifference = new Date().getTime() - newTime.getTime();
				newTime.setHours(parseInt(parts[0], 10));
				newTime.setMinutes(parseInt(parts[1], 10));
				newTime.setSeconds(parseInt(parts[2], 10));
				var methods = {
					displayTime : function() {
						var now = new Date(new Date().getTime() - timeDifference);
						obj.text([methods.leadZeros(now.getHours(), 2), methods.leadZeros(now.getMinutes(), 2), methods.leadZeros(now.getSeconds(), 2)].join(":"));
						setTimeout(methods.displayTime, 500);
					},
					leadZeros : function(time, width) {
						while (String(time).length < width) {
							time = "0" + time;
						}
						return time;
					}
				};
				methods.displayTime();
			},
		};
		var Language = Mcwork.Language = {
			translate : function(key, str) {
				return this.get(key, str);
			},
			datatable : function(key) {
				Language.init();
				if (Translations.hasOwnProperty(key)) {
					return Translations[key];
				} else {
					return null;
				}
			},
			get : function(key, str) {
				Language.init();
				if (Translations.hasOwnProperty(key)) {
					if (Translations[key][str]) {
						return Translations[key][str];
					}
				} else if (Translations.msg.hasOwnProperty(key)) {
					if (Translations.msg[key][str]) {
						return Translations.msg[key][str];
					}
				}
				return str;
			},
			set : function(options) {
				var defaults = {
					language : false,
					translations : false,
				};
				var opts = $.extend({}, defaults, options);
				if (false === opts.language) {
					opts.language = (navigator.language || navigator.userLanguage);
				}
				if (opts.translations[this.locale(opts.language)]) {
					translation = opts.translations[this.locale(opts.language)];
				} else {
					translation = opts.translations['de_DE'];
				}
				return translation;
			},
			init : function() {
				if (null == Translations) {
					Translations = this.set({
						translations : McworkTranslations
					});
				}
			},
			locale : function(lang) {
				lang = lang.replace(/-/, '_').toLowerCase();
				if (lang.length > 3) {
					lang = lang.substring(0, 3) + lang.substring(3).toUpperCase();
				}
				return lang;
			},
		};
		return Mcwork;
	})
);
$(document).foundation();
