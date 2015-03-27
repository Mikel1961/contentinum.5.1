$(document).ready(function() {
	if ( $(".contributioncontent").length) {
		tinymce.init({
		    selector: "textarea#content",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 500,
		    convert_urls: false,
		    extended_valid_elements : "i[class],span[itemprop|itemscope|itemtype|class]",
		    link_list: "/mcwork/services/application/linklist",
		    link_class_list: [
		                      {title: 'None', value: ''},
		                      {title: 'Button', value: 'button'},
		                      {title: 'Button expand', value: 'button expand'}
		    ],	
		    style_formats: [
		                    {title: "Headers", items: [
		                        {title: "Header 1", format: "h1"},
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
    	  	        "advlist autolink lists hr link charmap print anchor",
    	  	        "searchreplace code",
    	  	        "media table contextmenu paste template"
    	  	],	
		    menubar: "file insert edit view table tools",    	  	    
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link unlink | template",
		    templates : [
		                 {
		                     title: "Downloadliste",
		                     url: "/assets/app/template/filelist.htm",
		                     description: "Downloadliste"
		                 },
		             ]
		});		
	}	
});