<?php
return array(
    
    'copydefaultpage' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/work',
            'app' => array(
                'targetentities' => array(
                    'webPreferences' => 'Contentinum\Entity\WebPreferences'
                ),
                'worker' => 'Mcwork\Model\Save\Page',
                'method' => 'createDefaultPage',
                'entity' => 'Contentinum\Entity\WebPagesParameter'
            ),        
        ),
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copy_default_page'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
    
                    'options' => array(
                        'getFieldValue' => array('webPages' => 'data-ident', 'webPreferences' => 'data-preference'),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit',
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'label',
                                'required' => true,
                                'options' => array(
                                    'label' => 'default_page_name',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
                
                                'attributes' => array(
                                    'required' => 'required',
                                    'id' => 'label'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'webPages',
                                'required' => false,
                                'options' => array(),
                                'type' => 'Hidden',
                
                                'attributes' => array(
                                    'id' => 'webPages'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'webPreferences',
                                'required' => false,
                                'options' => array(),
                                'type' => 'Hidden',
                
                                'attributes' => array(
                                    'id' => 'webPreferences'
                                )
                            )
                        ),
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    
    
    ),    
    
    
    
    'addsubmenue' => array(
    
        'modal' => array(
        
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'addsubmenue'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
        
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    
                    
                    'options' => array(
                        'getFieldValue' => array('submenueHeadline' => 'data-label'),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'addsubmenueform',
                            )
                        )
                    ),                    
                    
                    'form' => array(
        
                        1 => array(
                            'spec' => array(
                                'name' => 'submenueHeadline',
                                'required' => false,
                                'options' => array(
                                    'label' => 'headline',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
        
                                'attributes' => array(
                                    'id' => 'submenueHeadline',
                                    'row' => '2'
                                )
                            )
                        ),
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'addsub-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )    
    
    
    ),
    'fileattribute' => array(
        
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/work',
            'app' => array(
                'worker' => 'Mcwork\Model\Save\Media',
                'method' => 'saveMetas',
                'entity' => 'Contentinum\Entity\WebMedias'
            ),
        ),        
    
        'modal' => array(
        
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
        
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                   
                    'options' => array(
                        'getFieldValSrv' => array(
                                 
                            'ident' => 'data-ident',
                            'url' => '/mcwork/services/application/fieldvalue',
                            'data' => array(
                                'entity' => 'Contentinum\Entity\WebMedias',
                                'app' => 'fileattribute',
                                'id' => '1'
                            )                            
                            
                        ),
                        
                        'form' => array(
                            'action' => '/mcwork/files/edit',
                            'attributes' => array(
                                'id' => 'appedit',
                            )
                        )
                    ),
                    'form' => array(
        
                        1 => array(
                            'spec' => array(
                                'name' => 'headline',
                                'required' => false,
                                'options' => array(
                                    'label' => 'headline',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
        
                                'attributes' => array(
                                    'id' => 'headline',
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'description',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
        
                                'attributes' => array(
                                    'id' => 'description',
                                    'row' => '2'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'linkname',
                                'required' => false,
                                'options' => array(
                                    'label' => 'linkname',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
        
                                'attributes' => array(
                                    'id' => 'linkname',
                                )
                            )
                        ),
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'close-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )    
    
    
    
    ),
    
    
    'imageattribute' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/work',
            'app' => array(
                'worker' => 'Mcwork\Model\Save\Media',
                'method' => 'saveMetas',
                'entity' => 'Contentinum\Entity\WebMedias'
            ),
        ),
    
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                     
                    'options' => array(
                        'getFieldValSrv' => array(
                             
                            'ident' => 'data-ident',
                            'url' => '/mcwork/services/application/fieldvalue',
                            'data' => array(
                                'entity' => 'Contentinum\Entity\WebMedias',
                                'app' => 'fileattribute',
                                'id' => '1'
                            )
    
                        ),
    
                        'form' => array(
                            'action' => '/mcwork/files/edit',
                            'attributes' => array(
                                'id' => 'appedit',
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'alt',
                                'required' => true,
                                'options' => array(
                                    'label' => 'alt',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'alt',
                                    'required' => 'required',                                    
                                )
                            )
                        ),
                       2 => array(
                            'spec' => array(
                                'name' => 'title',
                                'required' => false,
                                'options' => array(
                                    'label' => 'title',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
                        
                                'attributes' => array(
                                    'id' => 'title',

                                )
                            )
                        ),                        
                        3 => array(
                            'spec' => array(
                                'name' => 'caption',
                                'required' => false,
                                'options' => array(
                                    'label' => 'caption',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'caption',
                                    'row' => '2'
                                )
                            )
                        ),
                        4 => array(
                            'spec' => array(
                                'name' => 'description',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
                        
                                'attributes' => array(
                                    'id' => 'description',
                                    'row' => '2'
                                )
                            )
                        ),  
                        5 => array(
                            'spec' => array(
                                'name' => 'longdescription',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
                        
                                'attributes' => array(
                                    'id' => 'longdescription',
                                    'row' => '3'
                                )
                            )
                        ),                                              

                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'close-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    
    
    
    ),    
    
    
    'infoapp' => array(
        'modal' => array(
            
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'getFieldValue' => array('username' => 'data-username', 'registerDate' => 'data-registerDate','upDate' => 'data-upDate', 'createby' => 'data-createBy','updateBy' => 'data-updateBy'), 
                        'form' => array(
                            'action' => '/mcwork/info/edit',
                            'attributes' => array(
                                'id' => 'data-set-info',
                            )
                        )
                    ),
                    'form' => array(
                        
                        1 => array(
                            'spec' => array(
                                'name' => 'username',
                                'required' => false,
                                'options' => array(
                                    'label' => 'currentuser',
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'username',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'registerDate',
                                'required' => false,
                                'options' => array(
                                    'label' => 'registerDate',
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'registerDate',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'upDate',
                                'required' => false,
                                'options' => array(
                                    'label' => 'upDate',
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'upDate',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),
                        4 => array(
                            'spec' => array(
                                'name' => 'createby',
                                'required' => false,
                                'options' => array(
                                    'label' => 'Owner',
                                    'value_function' => array(
                                        'method' => 'ajax',
                                        'url' => '/mcwork/services/application/valueoptions',
                                        'data' => array(
                                            'entity' => 'Contentinum\Entity\Users5',
                                            'prepare' => 'select',
                                            'value' => 'id',
                                            'label' => 'username'
                                        )
                                    ),                                    
                                ),
                                 'type' => 'Select',
                        
                                'attributes' => array(
                                    'id' => 'createby',
                                )
                            )
                        ),
                        5 => array(
                            'spec' => array(
                                'name' => 'updateBy',
                                'required' => false,
                                'options' => array(
                                    'label' => 'updateBy',
                                    'value_function' => array(
                                        'method' => 'ajax',
                                        'url' => '/mcwork/services/application/valueoptions',
                                        'data' => array(
                                            'entity' => 'Contentinum\Entity\Users5',
                                            'prepare' => 'select',
                                            'value' => 'id',
                                            'label' => 'username'
                                        )
                                    ),                                    
                                ),
                                 'type' => 'Select',
                        
                                'attributes' => array(
                                    'id' => 'updateBy',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),                        
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )            
        )
        
    ),
    
    'dropzoneupload' => array(
    
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'Upload'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'form' => array(
                            'action' => '/mcwork/files/multipleupload',
                            'attributes' => array(
                                'id' => 'contentinumUpload',
                                'enctype' => 'multipart/form-data',
                                'class' => 'dropzone',
                            )
                        )
                    ),
                    'form' => array(                       
                        1 => array(
                            'spec' => array(
                                'name' => 'file',
                                'required' => true,
                                'options' => array(
                                    'deco-row' => 'dropzone'
                                ),
                                'type' => 'File',
    
                                'attributes' => array(
                                    'id' => 'file',
                                    'multiple' => 'multiple',
                                )
                            )
                        ),
                                              
                                             
                        2 => array(
                            'spec' => array(
                                'name' => 'currentuploadpath',
                                'required' => false,
                                'options' => array(),
                                'type' => 'Hidden',
                        
                                'attributes' => array(
                                    'id' => 'currentuploadpath'
                                )
                            )
                        ),                        
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    
    'uploadnonpublicfiles' => array(
        
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'uploadnopublic'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'form' => array(
                            'action' => '/mcwork/files/upload',
                            'attributes' => array(
                                'id' => 'file-ajax-form',
                                'enctype' => 'multipart/form-data'
                            )
                        )
                    ),
                    'form' => array(
                        
                        1 => array(
                            'spec' => array(
                                'name' => 'fileUpload',
                                'required' => true,
                                'options' => array(
                                    'label' => 'uploadfile',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'File',
                                
                                'attributes' => array(
                                    'id' => 'fileUpload'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'uploadprogress',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'uploadprogress',
                                    'value' => '<div class="progress"><span id="percent" class="meter" style="width:0%"> </span></div>'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'formextension',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'formextension',
                                    'value' => '<div id="mediametas"> </div>'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'upload-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'upload'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),

    'dissolvegroup' => array(
        'dataattribute' => array(
            'ident' => 'data-ident'
        ),
    
        'headline' => 'dissolve_group',
        'content' => array(
            'label' => array(
                'html' => 'dissolve_group'
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'button-group right'
                    )
                ),
                'grids' => array(
                    array(
                        'element' => 'li',
                        'grid' => array(
                            'element' => 'a',
                            'label' => array(
                                'btn' => 'confirm'
                            ),
                            'attr' => array(
                                'id' => 'button-app-save',
                                'class' => 'button'
                            )
                        )
                    ),
                    array(
                        'element' => 'li',
                        'grid' => array(
                            'element' => 'a',
                            'label' => array(
                                'btn' => 'cancel'
                            ),
                            'attr' => array(
                                'id' => 'button-app-cancel',
                                'class' => 'button'
                            )
                        )
                    )
                )
            )
    
        ),
        'url' => '/mcwork/contentgroup/dissolve',
         
    ),
    'movesubmenue' => array(
        'form' => array(
    
            1 => array(
                'spec' => array(
                    'name' => 'movesub',
                    'required' => false,
                    'options' => array(
                        'label' => 'Navigation',
                        'empty_option' => 'Navigationsbaum',
                        'value_function' => array(
                            'method' => 'ajax',
                            'url' => '/mcwork/medias/application/module',
                            'data' => array(
                                'entity' => 'Contentinum\Entity\WebNavigationsTree',
                                'prepare' => 'select',
                                'value' => 'id',
                                'label' => array(
                                    'webPages' => 'label',
                                    'webNavigations' => 'title'
                                )
                            )
                        ),
                        'deco-row' => 'text'
                    ),
                    'type' => 'Select',
    
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'movesub'
                    )
                )
            )
        )
    ) ,

    'contactaddresses' => array(
    
    /*
                  array(
                'spec' => array(
                    'name' => 'addresstype',
                    'required' => false,
                    'options' => array(
                        'label' => 'Addresstype',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'article' => 'Home',
                            'footer' => '<footer>',
                            'header' => '<header>',
                            'section' => '<section>'
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'addresstype'
                    )
                )
            ),            

            
            array(
                'spec' => array(
                    'name' => 'street',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Street',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'street'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'zipcode',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Zipcode',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'zipcode'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'city',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'City',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                         
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'city'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'state',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'State or province',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'state'
                    )
                )
            ),
     */
    
    
    
    
    
    ),
);