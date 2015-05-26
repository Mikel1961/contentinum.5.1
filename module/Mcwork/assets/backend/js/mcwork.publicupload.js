

McworkUploadLight = (function(options){
	
	
	var imagesForm = {
		
		1 : {
			'spec' : {
				'name' : 'newname',
				'required' : false,
				'options' : {
					'label' : 'rename',
					'deco-row' : 'collapse',
				},
				'type' : 'Text',
				'attributes' : {
					'id' : 'newname',
					'crypt' : 'crypt',
				}

			}

		},		
		
		2 : {
			'spec' : {
				'name' : 'alt',
				'required' : true,
				'options' : {
					'label' : 'alt',
					'deco-row' : 'text',
				},
				'type' : 'Text',
				'attributes' : {
					'required' : 'required',
					'id' : 'alt'
				}
	
			}
	
		},
		3 : {
			'spec' : {
				'name' : 'title',
				'required' : false,
				'options' : {
					'label' : 'title',
					'deco-row' : 'text',
				},
				'type' : 'Text',
				'attributes' : {
					'id' : 'title'
				}
	
			}
	
		},	
		4 : {
			'spec' : {
				'name' : 'caption',
				'required' : false,
				'options' : {
					'label' : 'caption',
					'deco-row' : 'text',
				},
				'type' : 'Text',
				'attributes' : {
					'id' : 'caption'
				}
	
			}
	
		},	
		5 : {
			'spec' : {
				'name' : 'description',
				'required' : false,
				'options' : {
					'label' : 'description',
					'deco-row' : 'text',
				},
				'type' : 'Textarea',
				'attributes' : {
					'id' : 'description',
					'row' : '2',
				}
	
			}
	
		},
		6 : {
			'spec' : {
				'name' : 'longdescription',
				'required' : false,
				'options' : {
					'label' : 'longdescription',
					'deco-row' : 'text',
				},
				'type' : 'Textarea',
				'attributes' : {
					'id' : 'longdescription',
					'row' : '3',
				}
	
			}
	
		},
		7 : {
			'spec' : {
				'name' : 'fileresource',
				'options' : {
					'deco-row' : 'text',
				},
				'type' : 'Hidden',
				'attributes' : {
					'id' : 'fileresource',
					'value' : 'index',
				}
	
			}
	
		},											
		
	};
	
	
	var fileForm = {
		
		1 : {
			'spec' : {
				'name' : 'newname',
				'required' : false,
				'options' : {
					'label' : 'rename',
					'deco-row' : 'collapse',
				},
				'type' : 'Text',
				'attributes' : {
					'id' : 'newname',
					'crypt' : 'crypt',
				}

			}

		},			
		
		2 : {
			'spec' : {
				'name' : 'headline',
				'required' : false,
				'options' : {
					'label' : 'headline',
					'deco-row' : 'text',
				},
				'type' : 'Text',
				'attributes' : {
					'id' : 'headline'
				}
	
			}
	
		},
		3 : {
			'spec' : {
				'name' : 'description',
				'required' : false,
				'options' : {
					'label' : 'description',
					'deco-row' : 'text',
				},
				'type' : 'Textarea',
				'attributes' : {
					'id' : 'description',
					'row' : '2',
				}
	
			}
	
		},	
		4 : {
			'spec' : {
				'name' : 'linkname',
				'required' : true,
				'options' : {
					'label' : 'linkname',
					'deco-row' : 'text',
				},
				'type' : 'Text',
				'attributes' : {
					'required' : 'required',
					'id' : 'linkname'
				}
	
			}
	
		},	
		5 : {
			'spec' : {
				'name' : 'fileresource',
				'options' : {
					'deco-row' : 'text',
				},
				'type' : 'Hidden',
				'attributes' : {
					'id' : 'fileresource',
					'value' : 'index',
				}
	
			}
	
		},					
		
	};		
	
	
	function fileextension(fname){
		return fname.substr((~-fname.lastIndexOf(".") >>> 0) + 2);
	}	
	
	return {
		execute : function(){
			
			var totalSize = 0;
			var originalname = '';
			var filetype = '';
			var fileext = '';
			
			
			$("#fileUpload").change(function(){
				$('#mediametas').html('');
				$('#percent').attr('style', 'width:0%;');
				totalSize =  $("#fileUpload")[0].files[0].size;
				originalname = $("#fileUpload")[0].files[0].name;
				filetype = $("#fileUpload")[0].files[0].type;	
				fileext = fileextension(originalname);	
				filename = originalname.replace( '.' + fileext, '');
				
				if (filetype.match(/image\//)) {
					$('#mediametas').html(Mcwork.Forms.init({collapseContent : {'newname' :   fileext}, formtag : false, populateValues : {newname : filename, alt : filename }  }, imagesForm ));
				} else {
					$('#mediametas').html(Mcwork.Forms.init({collapseContent : {'newname' :   fileext}, formtag : false, populateValues : {newname : filename, alt : filename }  }, fileForm ));
				}		
			});
			
			
			
			
			$('#upload-button').click(function(ev) {
				ev.preventDefault();
				var error = false;
	
				Mcwork.Validation.unmarkErrorFields('fileUpload');
				if (false === Mcwork.Parameter.isset( $("input[name='fileUpload']").val() )){
					Mcwork.Validation.markErrorField('fileUpload', Mcwork.Language.translate('usr', 'requiredentry') );
					error = true;
				}			
				
				if (filetype.match(/image\//)) {
					Mcwork.Validation.unmarkErrorFields('alt');
					if (false === Mcwork.Parameter.isset( $("input[name='alt']").val() )){
						Mcwork.Validation.markErrorField('alt', Mcwork.Language.translate('usr', 'requiredentry') );
						error = true;
					}
				} else {
					Mcwork.Validation.unmarkErrorFields('linkname');
					if (false === Mcwork.Parameter.isset( $("input[name='linkname']").val() )){
						Mcwork.Validation.markErrorField('linkname', Mcwork.Language.translate('usr', 'requiredentry') );
						error = true;
					}				
				}
				
				if (false !== Mcwork.Parameter.isset( $("input[name='newname']").val() )){
					$("input[name='newname']").val($("input[name='newname']").val() + '.' + fileext);
				}
				if (false === error){
					$('#file-ajax-form').submit();
				}
	
			});	
			
			 $('#file-ajax-form').fileAjax(function () {
	                return {
	                    // url is optional, defaults to form's action attribute
	                    // url: 'respond.php',
	                    dataType: 'json',
	                    // data is optional. It will default to the forms inputs that
	                    // have name attributes.
	                    // If data is supplied, fileAjax will still obtain
	                    // file inputs from the form, but will ignore other inputs.
	                    // data: {
	                    //     array: ['a', 'b'],
	                    //     object: { a: 1, b: [9, 10] }
	                    // },
	                    validate: function () {
	                        return true;
	                    },
	                    onprogress: function (e) {
	                        if(e.lengthComputable) {                       
	                        	$('#percent').attr('style', 'width:' + (e.loaded / totalSize) * 100 + '%;');                        	
	                        }
	                    },
	                    beforeSend: function () {
	                    	$('#server-process').html( Mcwork.Icons.getprocess() );
	                    },
	                    success: function (response, metaData) {
	                    	 this.clear();
	                    },
	                    error: function (response, metaData) {
	                    	$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.WARN) );
		    				$('#server-process').html( Mcwork.Icons.getwarn() );
	                    },
	                    complete: function (response, metaData) {
	                    	if (response.error){
		                    	$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.WARN) );
		                    	$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + '<span id="server-process"> </span>');
			    				$('#server-process').html( Mcwork.Icons.getwarn() );	                    		
	                    		
	                    		$('#modalcontent').html('<p class="'+ Mcwork.Colors.WARN +'">' + Mcwork.Icons.getwarn()  + ' ' +  Mcwork.Language.translate('server', response.error) + '</p>' );
	                    	} else {   
	                    		Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));         
		                    	$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));   
		                    	$('#server-process').html( Mcwork.Icons.getsuccess() );	                    	
		                    }                       
	                    }
	                };
	        }); //true for force iframe (meant for debugging).			
						
		}
	};

	
})(this.document);

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
	$('#upload-files').click(function(ev){
		ev.preventDefault();
		console.log('click');
		$().McworkClientApplication({}, this, McworkUploadLight);
	});	
});