( function(root, factory) {
		root.Mcwork = factory(root, {}, (root.jQuery || root.Zepto || root.ender || root.$));
	}(this, function(root, Mcwork, $) {

		// Initial Setup
		// -------------

		// Save the previous value of the `Mcwork` variable, so that it can be
		// restored later on, if `noConflict` is used.
		//var previousMcwork = root.Mcwork;

		// Create local references to array methods we'll want to use later.
		var array = [];
		var push = array.push;
		var slice = array.slice;
		var splice = array.splice;

		// Current version of the library. Keep in sync with `package.json`.
		Mcwork.VERSION = '0.0.1';

		Mcwork.Locale = 'de_DE';
		
		var StandardModal = '#modal';
		
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
		var icon_sizes = { s2 : 'fa-2x', s3 : 'fa-3x', s4 : 'fa-4x', s5 : 'fa-5x', lg : 'fa-lg',};		

		var Translations;

		// For Mcwork's purposes, jQuery, Zepto, Ender, or My Library (kidding) owns
		// the `$` variable.
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
			
			
			hasRemoveClass : function(elm,cssclass){
				if ( $(elm).hasClass(cssclass) ){
					$(elm).removeClass(cssclass);
				}		
			},			
			
			set : function() {

			},
			release : function() {
				return MC.VERSION;
			},
			
			
		};
		
		var Colors = Mcwork.Colors = {
			WARN : font_color_warn,
			SUCCESS : font_color_success,
			CONFIRM : font_color_confirm,
			get : function(color){
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
			get : function(icon){
				return icon;
			},
			
			geticon : function(set) {
				return '<i class="fa ' + set + '"> </i>';
			},
			
			getwarn : function(){
				return Icons.geticon(Icons.WARN + ' ' + font_color_warn);
			},
			
			getsuccess : function(){
				return Icons.geticon(Icons.SUCCESS + ' ' + font_color_success);
			},
			
			getprocess : function(){
				return Icons.geticon(Icons.GEAR + ' fa-spin ' + font_color_warn);
			},
			
			removethisicon : function(elm){
				$(elm).find('i').remove('i');
			}		
			
		};

		var Server = Mcwork.Server = {
			request : function(options) {
				var defaults = {
					url : false,
					method : 'get',
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
					type : 'POST',
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
			
			setAssociative : function(){
				Attributes.associative = true;
			},
			
			unsetAssociative : function(){
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
					if (true === Attributes.associative){
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
				
				if (content.hasOwnProperty('prev')){
					str += content['prev'];
				}				
				
				if (content.hasOwnProperty('translate')){
					str += Language.translate(content['translate']['key'],content['translate']['txt']);
				} else {
					str += content['txt'];
				}
				
				if (content.hasOwnProperty('behind')){
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
			set : function(template){
				if ( template.hasOwnProperty('section') ){
					HTML.section = template['section'];
				}
				if ( template.hasOwnProperty('row') ){
					HTML.row = template['row'];
				}	
				if ( template.hasOwnProperty('grid') ){
					HTML.grid = template['grid'];
				}
				if ( template.hasOwnProperty('grids') ){
					HTML.grids = template['grids'];
				}				
				if ( template.hasOwnProperty('content') ){
					HTML.content = template['content'];
				}								
			},
			empty : function(){
				HTML.section = {};
				HTML.row = {};
				HTML.grid = {};
				HTML.grids = {};
				HTML.content = {};
			},
			workoff : function(htmldata, content){
				if (htmldata.hasOwnProperty('attr')){
					var attribute = htmldata['attr'];
				} else {
					var attribute = {};
				}
				return HTML.block(htmldata['element'],content, attribute);
			},
			workgrids : function(htmldata){
				console.log(htmldata);

				var htmlgrids = '';
				$.each(htmldata['grids'], function(index, values) {
					htmlgrids += HTML.workoff(values, {'txt' : HTML.workoff(htmldata[index], htmldata[index])});
				});
				if (htmldata.hasOwnProperty('row')){
				    htmlgrids = HTML.workoff(htmldata['row'], {'txt' : htmlgrids});
				}
				return htmlgrids;
			},
			viewscript : function(template){
				HTML.set(template);
				var returnHtml = '';
				
				if (HTML.content.hasOwnProperty('options')){
					var options = HTML.content['options'];
				} else {
					var options = {};
				}				
				
				if (HTML.content.hasOwnProperty('element')){
					if (HTML.content.hasOwnProperty('attr')){
						var attribute = HTML.content['attr'];
					} else {
						var attribute = {};
					}
					returnHtml += HTML.block(HTML.content['element'],HTML.content,attribute);
				} else if (HTML.content.hasOwnProperty('grids')){
					returnHtml += HTML.workgrids(HTML.content);
				} else if (HTML.content.hasOwnProperty('form')){
					if (options.hasOwnProperty('form')){
						var formAttribute = options['form'];
					} else {
						var formAttribute = {};
					}
					returnHtml += Forms.init(formAttribute,HTML.content['form']);
				}
				if (HTML.grid.hasOwnProperty('element')){
					returnHtml = HTML.workoff(HTML.grid, {'txt' : returnHtml});
				}
				if (HTML.row.hasOwnProperty('element')){
					returnHtml = HTML.workoff(HTML.row, {'txt' : returnHtml});
				}	
				if (HTML.section.hasOwnProperty('element')){
					returnHtml = HTML.workoff(HTML.section, {'txt' : returnHtml});
				}							
				HTML.empty();
				return returnHtml;
			},
		};
		
		var Modals = Mcwork.Modals = {
			build : function(template){
				var modalContent = '';
				if (template.hasOwnProperty('header')){
					modalContent += HTML.viewscript(template['header']);
				}
				if (template.hasOwnProperty('body')){
					modalContent += HTML.viewscript(template['body']);
				}
				if (template.hasOwnProperty('footer')){
					modalContent += HTML.viewscript(template['footer']);
				}								
				
				$( StandardModal ).attr('role','dialog');
				$( StandardModal ).attr('aria-labelledby','modal');
				$( StandardModal ).html(modalContent);
				$( StandardModal ).foundation('reveal', 'open');					
			},
			getStdModal : function(){
				return StandardModal;
			}
			
			
		};
		
		var Validation = Mcwork.Validation = {
			
			pattern : {},
			required : {},
			email : {},
			formErrors : {},
			formRules : {},
			monitorErrors : false,
			build : false,
			urlPopulateValues : '/mcwork/medias/application/populatevalues',
		    entity : false,
		    configure : false,
		    categories : false,	
			
			setFormRules : function(url, rules) {
				if (typeof rules !== 'undefined'){
					Validation.formRules = rules;
				}
			},	
			
			getFormRules : function(field, rule){
				if ( Validation.formRules.hasOwnProperty(field) ){
					if ( Validation.formRules[field].hasOwnProperty(rule) ){
						return Validation.formRules[field][rule];
					}
					
				}
				return false;
			},					
					
			labelicon : function(fieldname, icon){
				var text = $('#field' + fieldname + ' > label').text();
				$('#field' + fieldname + ' > label').html(text + ' ' +   icon);		
			},

			unmarkErrorFields : function(fieldname) {
				Icons.removethisicon('#field' + fieldname + ' > label');
				Parameter.hasRemoveClass($("#field" + fieldname),"error");
				Parameter.hasRemoveClass($("#field" + fieldname),'valid');
				$("#alert" + fieldname).remove();
			},
	
			markValidEntry : function(fieldname, messages) {
				Validation.labelicon(fieldname, Icons.geticon(Icons.SUCCESS) );
				$('#field' + fieldname).addClass("valid");
				$('#field' + fieldname).append('<span role="alert" id="alert' + fieldname + '" class="validation-valid">' + messages + '</span>');
			},
		
		
			markErrorField : function(fieldname, messages) {
				Validation.labelicon(fieldname, Icons.geticon(Icons.WARN) ); 
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
			defaultTypes : ['text', 'textarea', 'select', 'check', 'radio', 'hidden', 'button'],
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
					//
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
			
			init : function(formOptions, formElements){
				
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
				return Forms.build(opts,formElements);
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

			}
		};

		var Language = Mcwork.Language = {
			translate : function(key, str) {
				return this.get(key, str);
			},
			
			datatable : function(key){
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
			
			init : function(){
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