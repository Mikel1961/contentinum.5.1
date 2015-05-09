$(document).ready(function() {
	if ( $(".newsteaser").length) {
		tinymce.init({
		    selector: "textarea#contentTeaser",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 100,
		    convert_urls: false,
		    style_formats: [
		                    {title: "Headers", items: [
		                        {title: "Header 2", format: "h2"},
		                        {title: "Header 3", format: "h3"},
		                        {title: "Header 4", format: "h4"},
		                        {title: "Header 5", format: "h5"},
		                        {title: "Header 6", format: "h6"}
		                    ]},
		                    {title: "Inline", items: [
		                        {title: "Bold", icon: "bold", format: "bold"},
		                        {title: "Italic", icon: "italic", format: "italic"},
		                    ]},
		                    {title: "Blocks", items: [
		                        {title: "Paragraph", format: "p"},

		                    ]},
		                    {title: "Alignment", items: [
		                        {title: "Left", icon: "alignleft", format: "alignleft"},
		                        {title: "Center", icon: "aligncenter", format: "aligncenter"},
		                        {title: "Right", icon: "alignright", format: "alignright"},
		                        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
		                    ]}
		                ],			    
		    
		    plugins: [
		        "paste, code"
		    ],	    
		    menubar: "file insert edit tools",  
		    toolbar: "insertfile undo redo | styleselect | bold italic"
		});
    }		
	if ( $(".newscontent").length) {
		tinymce.init({
		    selector: "textarea#content",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 400,
		    content_css : "/assets/app/tinymce/css/content.css" ,
		    convert_urls: false,
		    link_list: "/mcwork/services/application/linklist",
		    link_class_list: [
		                      {title: 'None', value: ''},
		                      {title: 'Button mini (Foundation)', value: 'button tiny'},
		                      {title: 'Button small (Foundation)', value: 'button small'},
		                      {title: 'Button standard (Foundation)', value: 'button'},
		                      {title: 'Button large (Foundation)', value: 'button large'},
		                      {title: 'Button expand (Foundation)', value: 'button expand'},
		                      {title: 'Button secondary mini (Foundation)', value: 'button secondary tiny'},
		                      {title: 'Button secondary small (Foundation)', value: 'button secondary small'},
		                      {title: 'Button secondary standard (Foundation)', value: 'button secondary'},
		                      {title: 'Button secondary large (Foundation)', value: 'button secondary large'},
		                      {title: 'Button secondary expand (Foundation)', value: 'button secondary expand'},
		                      {title: 'Button info mini (Foundation)', value: 'button info tiny'},
		                      {title: 'Button info small (Foundation)', value: 'button info small'},
		                      {title: 'Button info standard (Foundation)', value: 'button info'},
		                      {title: 'Button info large (Foundation)', value: 'button info large'},
		                      {title: 'Button info expand (Foundation)', value: 'button info expand'},	
		                      {title: 'Button success mini (Foundation)', value: 'button success tiny'},
		                      {title: 'Button success small (Foundation)', value: 'button success small'},
		                      {title: 'Button success standard (Foundation)', value: 'button success'},
		                      {title: 'Button success large (Foundation)', value: 'button success large'},
		                      {title: 'Button success expand (Foundation)', value: 'button success expand'},	
		                      {title: 'Button alert mini (Foundation)', value: 'button alert tiny'},
		                      {title: 'Button alert small (Foundation)', value: 'button alert small'},
		                      {title: 'Button alert standard (Foundation)', value: 'button alert'},
		                      {title: 'Button alert large (Foundation)', value: 'button alert large'},
		                      {title: 'Button alert expand (Foundation)', value: 'button alert expand'},			                      
		                      {title: 'Button xs (Bootstrap)', value: 'btn btn-default btn-xs'},
		                      {title: 'Button sm (Bootstrap)', value: 'btn btn-default btn-sm'},  
		                      {title: 'Button (Bootstrap)', value: 'btn btn-default'},
		                      {title: 'Button large (Bootstrap)', value: 'btn btn-default btn-lg'},  		                      		                      
		                      {title: 'Button primary xs (Bootstrap)', value: 'btn btn-primary btn-xs'},
		                      {title: 'Button primary sm (Bootstrap)', value: 'btn btn-primary btn-sm'},  
		                      {title: 'Button primary (Bootstrap)', value: 'btn btn-primary'},
		                      {title: 'Button primary large (Bootstrap)', value: 'btn btn-primary btn-lg'},  
		                      {title: 'Button info xs (Bootstrap)', value: 'btn btn-info btn-xs'},
		                      {title: 'Button info sm (Bootstrap)', value: 'btn btn-info btn-sm'},  
		                      {title: 'Button info (Bootstrap)', value: 'btn btn-info'},
		                      {title: 'Button info large (Bootstrap)', value: 'btn btn-info btn-lg'},  				                      
		                      {title: 'Button warning xs (Bootstrap)', value: 'btn btn-warning btn-xs'},
		                      {title: 'Button warning sm (Bootstrap)', value: 'btn btn-warning btn-sm'},  
		                      {title: 'Button warning (Bootstrap)', value: 'btn btn-warning'},
		                      {title: 'Button warning large (Bootstrap)', value: 'btn btn-warning btn-lg'},  			                      
		                      {title: 'Button alert xs (Bootstrap)', value: 'btn btn-danger btn-xs'},
		                      {title: 'Button alert sm (Bootstrap)', value: 'btn btn-danger btn-sm'},  
		                      {title: 'Button alert (Bootstrap)', value: 'btn btn-danger'},
		                      {title: 'Button alert large (Bootstrap)', value: 'btn btn-danger btn-lg'}, 			                      
		                      {title: 'Button success xs (Bootstrap)', value: 'btn btn-success btn-xs'},
		                      {title: 'Button success sm (Bootstrap)', value: 'btn btn-success btn-sm'},  
		                      {title: 'Button success (Bootstrap)', value: 'btn btn-success'},
		                      {title: 'Button success large (Bootstrap)', value: 'btn btn-success btn-lg'},       
		    ],	
		    style_formats: [
		                    {title: "Headers", items: [
		                        {title: "Header 2", format: "h2"},
		                        {title: "Header 3", format: "h3"},
		                        {title: "Header 4", format: "h4"},
		                        {title: "Header 5", format: "h5"},
		                        {title: "Header 6", format: "h6"}
		                    ]},
		                    {title: "Inline", items: [
		                        {title: "Bold", icon: "bold", format: "bold"},
		                        {title: "Italic", icon: "italic", format: "italic"},
		                        {title: "Superscript", icon: "superscript", format: "superscript"},
		                        {title: "Subscript", icon: "subscript", format: "subscript"},
		                        {title: "Code", icon: "code", format: "code"}
		                    ]},
		                    {title: "Blocks", items: [
		                        {title: "Paragraph", format: "p"},
		                        {title: "Blockquote", format: "blockquote"},
		                        {title: "Div", format: "div"},
		                        {title: "Pre", format: "pre"}
		                    ]},
		                    {title: "Alignment", items: [
		                        {title: "Left", icon: "alignleft", format: "alignleft"},
		                        {title: "Center", icon: "aligncenter", format: "aligncenter"},
		                        {title: "Right", icon: "alignright", format: "alignright"},
		                        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
		                    ]}
		                ],	    
		        	    plugins: [
		        	  	        "advlist autolink lists link charmap print anchor",
		        	  	        "searchreplace code",
		        	  	        "media table contextmenu paste"
		        	  	    ],	
		    menubar: "file insert edit view table tools",    	  	    
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link unlink"
		});		
	}
});