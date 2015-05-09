$(document).ready(function() {
		tinymce.init({
		    selector: "textarea#description",
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
		        "paste"
		    ],	    
		    menubar: "file insert edit tools",  
		    toolbar: "insertfile undo redo | styleselect | bold italic"
		});
});