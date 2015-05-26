

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


McworkDropzone = (function(options){
	
	function getMaxFileSize()
	{
		var result = Mcwork.Server.request({url : '/mcwork/services/application/configure', data : { service : 'mcwork_upload_max_file_size' }});
		if (result.hasOwnProperty('maxfilesize')){
			return result['maxfilesize'];
		} else if (result.hasOwnProperty('inivalue')){
			return result['inivalue'];
		} else {
			return 2;
		}
	}
	
	function getAllowedUploads()
	{
		var result = Mcwork.Server.request({url : '/mcwork/services/application/configure', data : { service : 'mcwork_allowed_upload_files' }});
		if (result.hasOwnProperty('files')){
			return result['files'].join();
		} else {
			return 'jpg';
		}
	}	
	
	return {
		execute : function(){
					
			$('#currentuploadpath').val( $('#currentpath').val() );		
			var mcworkDropzone = new Dropzone("form#contentinumUpload", {
				url : '/mcwork/files/multipleupload',
				dictDefaultMessage : "Datei auswaehlen",	
				maxFilesize : getMaxFileSize(),
				//acceptedFiles : getAllowedUploads(),	
				addRemoveLinks : true,
				uploadMultiple : true,
				data : {'test' : 'testvalue'},
				init : function() {	
					
					this.on("processingmultiple", function(files, message, xhr) {
						$('#server-process').html(   Mcwork.Icons.getprocess()   );
						Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.SUCCESS );
						$('#modalhead').addClass( Mcwork.Colors.WARN );
						Mcwork.Parameter.hasRemoveClass('#cancel-button', 'success');
						$('#cancel-button').addClass('disabled');
					}), this.on("errormultiple", function(files, message, xhr) {
						$('#server-process').html( Mcwork.Icons.getwarn() ) ;
					}), this.on("successmultiple", function(files, response) {
						response = jQuery.parseJSON(response);
						if (response.servererror) {
							$('#server-process').html( Mcwork.Icons.getwarn() ) ;
							$().html('<p>' + Mcwork.Language.translate('server', response.servererror) + '</p>');
						} else {
							$.each(files, function(index, file) {
								var uploaded = {};
								if (response.hasOwnProperty(file.name)) {
									uploaded.name = response[file.name].filename;
									uploaded.size = file.size;
									uploaded.label = Mcwork.Icons.geticon(Mcwork.Icons.UPLOAD); // + ' ' + uploaded.name;
									$(".table > tbody").prepend('<tr><td>' + uploaded.label + '</td><td>' + uploaded.name + '</td><td>' + Math.ceil(uploaded.size / 1024)  + ' KB</td><td colspan="2">&nbsp;</td>');
								}
							});
							$('#server-process').html( Mcwork.Icons.getsuccess() );
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.WARN);
							$('#modalhead').addClass(Mcwork.Colors.SUCCESS);
							Mcwork.Parameter.hasRemoveClass('#cancel-button', 'disabled');
							$('#cancel-button').addClass('success');
						}
					});					
					
				},					
			});
		}
	};	
})(this.document);

(function($) {

	$.fn.MakeDirectory = function(elm) {
		
		var error = false;
		if ('' == $('#new-folder').val()) {
			error = true;
			var msg =  Mcwork.Language.translate('usr', 'requiredentry');
		} else if ($('#new-folder').val().search($('#new-folder').attr('pattern'))) {
			error = true;
			var msg = Mcwork.Language.translate('val', 'newdir');
		} else {
			error = false;
		}

		if (true === error) {
			Mcwork.Modals.buildError(msg);
		} else {
			var newFolder = $('#new-folder').val();
			var currentPath = $('#new-folder').attr('data-currentpath');
			var url = '/mcwork/files/makedir/' + encodeURI(newFolder);
			if (currentPath.length > 1  ){
				url += '/' + currentPath;
			}
		    window.location.href = url;
        } 
		$(document.body).on('click', '#cancel-button', function(ev) {
			$(Mcwork.std_modal).foundation('reveal', 'close');
		});

	};

})(jQuery);

(function ($){
	$.fn.McworkFileCategories = function(options, elm){
		
		
		var TagsTemplate = {
			header : {

				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'filecategories'
					},
					'behind' : ' [<span id="mcfilename"> </span>] <span id="server-process"> </span>'
				}

			},
			body : {


				content : {
					element : 'p',
					'attr' : {
						'class' : 'alizarin-color'
					},
					'txt' : 
						formtags()
					

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
							'id' : 'tag-button',
							'class' : 'button alert'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'save'
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
		
		
		var defaults = {
			url : '/mcwork/services/application/savetags',
			model : false,
			alltags : Mcwork.Server.request({url : '/mcwork/services/application/alltags', data : {'group':'filesdenied'}}),
			elementTags : $(elm).attr('data-tags'),
			mediaName : $(elm).attr('data-filename'),
			ident : $(elm).attr('data-ident'),
		};
		
		var opts = $.extend({}, defaults, options);	
		
		function formtags(){
			
			var html = '<form action="#" method="POST" class="tags well"> <label for="tag" class="control-label">' + Mcwork.Language.translate('labels','adminfilecategories') +'</label>';
			html += '<div data-tags-input-name="taggone" id="tag">';
			html +=  '';
			html += '</div>';
			html += '<p class="help-block">'+  Mcwork.Language.translate('text', 'tagshelpblock')  +'</p>';
			html += '</form>';	
			return html;			
			
		};		
		
		Mcwork.Modals.build(Mcwork.ArrayMerge.recursive( Mcwork.Modals.getBasicModal(), TagsTemplate ));
	    $('#mcfilename').html(opts.mediaName);
		var t = $("#tag").tagging(Mcwork.Parameter.getTagging());
		

		
		$( "#mcautocompletetags" ).autocomplete({
			source: opts.alltags
		});  		
		
		$tagBox = t[0];
		
		if (opts.elementTags.length > 1 ){
			$tagBox.tagging( "add", opts.elementTags.split(',') );
		}
		
		
		$('#tag-button').click(function(ev) {
			ev.preventDefault();
			console.log($tagBox.tagging( "getTags" ));
			var sendData = {};
			sendData.tags = $tagBox.tagging( "getTags" );
			sendData.ident = opts.ident;
			sendData.model = opts.model;
			
			
			$.ajax({
					url :  opts.url, 
					type : 'POST',
					data : sendData,	
					beforeSend: function(){ 
						$('#server-process').html( Mcwork.Icons.getprocess() );	
					},	
					success : function(data) {
						var obj = jQuery.parseJSON(data);
						if (obj.error) {
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
							$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  obj.error } ) );	
						} else {
							$('#tag-button').hide();
							$('#cancel-button').html( Mcwork.Language.translate('btn', 'close') );
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
							$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
							$('#server-process').html( Mcwork.Icons.getsuccess() );
							$('#modalcontent').html( '<p>' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>' );
						}				
				
			
					},
					error: function (xhr, ajaxOptions, thrownError) {									
							var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
							$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  msg } ) );
					}	
			});				
			
			
			
			
			
			
			
			
			
		});
		
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			//$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			window.location.reload(true);
		});			
		
	};
	
	
	
})(jQuery);



$(document).ready(function() {
	
	
	$('.tbl-file-info').click(function(ev) {
		ev.preventDefault();
		console.log('klick');
		//$().McworkClientApplication({}, this);
	});	
	
	$('.tbl-file-download').click(function(ev) {
		ev.preventDefault();
		$().McworkFileDownload({},this);
	});	
	
	$('.filetags').click(function(ev) {
		ev.preventDefault();
		$().McworkFileCategories({model : 'file_tags'},this);
	});	
	
	$('#upload-files').click(function(ev){
		ev.preventDefault();
		$().McworkClientApplication({}, this, McworkUploadLight);
	});	
	
	$('#btnUpload').click(function(ev){
		ev.preventDefault();
		$().McworkClientApplication({}, this, McworkDropzone);
	});		
	
	
	$('#btnNewFolder').click(function(ev) {
		ev.preventDefault();
		var someForm = $('#mkDirForm');
		someForm.submit();
		return false;
	});	

});