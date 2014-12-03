<?php
return array(
    '_default' => array(
        'resource' => 'index',
        'title' => 'contentinum5',
        'bodyTagAttribs' => '',
        'headline' => '',
        'columnright' => '',
        'subheadline' => '<i class="fa fa-recorder"></i>',
        'content' => '',
        'footer' => '',
        'template' => '',
        'layout' => '',
        'toolbar' => '',
        'tableedit' => '',
        'templateWidget' => '<div class="row"><div class="large-6 columns">	{TEMPLATE_HEADER} </div><div class="large-6 columns"> {TEMPLATE_TOOLBAR} </div></div><div id="mcworkcontent" role="main"><div class="large-12 columns"> {TEMPLATE_CONTENT} </div></div>',
        'app' => array(
            'controller' => '',
            'worker' => '',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
            'entity' => ''
        )
    ),
    
    '/mcwork/dashboard' => array(
        'title' => 'Dashboard',
        'bodyTagAttribs' => array('attr' => array('id' => 'mcworkdashboard')),
        'headline' => 'Dashboard',
        'template' => 'content/list/dashboard',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Dahboard',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        )        
    ),
    
    '/mcwork/files/denied' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'NoPublicFiles',
        'bodyTagAttribs' => '',
        'headline' => 'Files',
        'columnright' => '',
        'subheadline' => '',
        'content' => '',
        'footer' => '',
        'template' => 'content/listfiles',
        
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FilesController',
            'worker' => 'Mcwork\Mapper\Files',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsDenied',
            'services' => array(
                'medias' => 'Backend\Media'
            ),
        )
    ),
    
    '/mcwork/files/xyzdownload' => array(
    
        'resource' => 'publisherresource',
        'headTitle' => 'NoPublicFiles',
        'bodyTagAttribs' => '',
        'headline' => 'Files',
        'columnright' => '',
        'subheadline' => '',
        'content' => '',
        'footer' => '',
        'template' => 'files/download',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FilesController',
            'worker' => 'Mcwork\Mapper\Media',
            'entity' => 'Mcwork\Entity\FsDenied',
        )    
    
    
    ),
    
    '/mcwork/files/mediaupload' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'NoPublicFiles',
        'bodyTagAttribs' => '',
        'headline' => 'Files',
        'columnright' => '',
        'subheadline' => '',
        'content' => '',
        'footer' => '',
        'template' => 'content/listfiles',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FilesController',
            'worker' => 'Mcwork\Model\FileSystem\Upload',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsDenied'
        )
    ),    

    
);