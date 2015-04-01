<?php
return array(
    
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Mcwork_Controller_Index',
                'uri' => '/mcwork/dashboard',
                'order' => 1
            ),
            array(
                'label' => 'Files',
                'uri' => '#',
                'order' => 2,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    
                    array(
                        'label' => 'Medias',
                        'uri' => '/mcwork/medias/public',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'MediaMetas',
                                'uri' => '/mcwork/medias/metas',
                                'resource' => 'authorresource'
                            )
                        )// end sub medias
                    ), // end medias
                    array(
                        'label' => 'NoPublicFiles',
                        'uri' => '/mcwork/files/denied',
                        'resource' => 'authorresource'
                    ),
                    array(
                        'label' => 'MediaGroup',
                        'uri' => '/mcwork/mediagroup',
                        'resource' => 'authorresource'
                    )                    
                )
            ),
            array(
                
                'label' => 'mcContent',
                'uri' => '#',
                'order' => 3,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    
                    array(
                        'label' => 'Pages',
                        'uri' => '/mcwork/pages',
                        'resource' => 'publisherresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            
                            array(
                                'label' => 'PageAttribute',
                                'uri' => '/mcwork/pageattribute',
                                'resource' => 'publisherresource'
                            ),
                            array(
                                'label' => 'Links',
                                'uri' => '/mcwork/links',
                                'resource' => 'publisherresource'
                            ),
                            array(
                                'label' => 'Haeder Links',
                                'uri' => '/mcwork/pageheader',
                                'resource' => 'publisherresource'
                            )
                        )
                    ), // end pages
                    
                    array(
                        'label' => 'Contribution',
                        'uri' => '/mcwork/contribution',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'contributionProperties',
                                'uri' => '/mcwork/pagecontent',
                                'resource' => 'authorresource'
                            )
                        )
                        
                    ),
                    array(
                        'label' => 'News',
                        'uri' => '/mcwork/news',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            
                            array(
                                'label' => 'Konfiguration',
                                'uri' => '/mcwork/contributiongroup',
                                'resource' => 'publisherresource'
                            ),
                            array(
                                'label' => 'Nachrichten Gruppen',
                                'uri' => '/mcwork/namegroup',
                                'resource' => 'publisherresource'
                            )                            
                        )
                    ),
                    array(
                        'label' => 'Navigation',
                        'uri' => '/mcwork/navigation',
                        'resource' => 'publisherresource'
                    ), // end navigation
                    
                    array(
                        'label' => 'Forms',
                        'uri' => '/mcwork/form',
                        'resource' => 'publisherresource'
                    ),
                    
                    array(
                        'label' => 'Maps',
                        'uri' => '/mcwork/maps',
                        'resource' => 'publisherresource'
                    ),
                    
                    array(
                        'label' => 'Directories',
                        'uri' => '/mcwork/accounts', // directory
                        'resource' => 'publisherresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Contacts',
                                'uri' => '/mcwork/contacts',
                                'resource' => 'publisherresource'
                            )                         
                        ) // end sub directories
                    )// end directories

                ) // end sub content

                
            ) , // end content
            array(
                'label' => 'Administration',
                'uri' => '#',
                'order' => 4,
                'resource' => 'publisherresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(              
                    array(
                        'label' => 'Users',
                        'uri' => '/mcwork/users',
                        'resource' => 'managerresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Usergroups',
                                'uri' => '/mcwork/usrgrp',
                                'resource' => 'managerresource'
                            ),
                            array(
                                'label' => 'User in groups',
                                'uri' => '/mcwork/usringrp',
                                'resource' => 'managerresource'
                            )
                        )
                        
                    ),
                    array(
                        'label' => 'Logs',
                        'uri' => '/mcwork/logs',
                        'resource' => 'managerresource'
                    ),
                    array(
                        'label' => 'Cache',
                        'uri' => '/mcwork/cache',
                        'resource' => 'managerresource'
                    ),
                    array(
                        'label' => 'Preferences',
                        'uri' => '/mcwork/preferences',
                        'resource' => 'adminresource'
                    ),
                    array(
                        'label' => 'Redirects',
                        'uri' => '/mcwork/redirects',
                        'resource' => 'adminresource'
                    ),
                    
                    array(
                        'label' => 'Email Templates',
                        'uri' => '/mcwork/emailtemplates',
                        'resource' => 'publisherresource'
                    ), 

                    array(
                        'label' => 'Email Signaturen',
                        'uri' => '/mcwork/emailsignatures',
                        'resource' => 'publisherresource'
                    ),                    
                    
                    array(
                        'label' => 'Fieldtypes',
                        'uri' => '/mcwork/fieldtypes',
                        'resource' => 'adminresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Fieldgroups',
                                'uri' => '/mcwork/indexgroup',
                                'resource' => 'adminresource'
                            )
                        )// end sub fieldtypes
                    ) // end fieldtypes

                ) // end sub administration

            ) , // end administration
            array(
                'label' => 'Mcwork_Controller_Apps',
                'uri' => '#',
                'order' => 5,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown'
            )// end apps
        ), // end subkey default
        'appsmenu' => array(),
    ) , // end mainkey navigation

    
    'router' => array(
        'routes' => array(
            'mcwork' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/mcwork',
                    'defaults' => array(
                        'controller' => 'Mcwork'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'mcwork_app' => array(
                        'type' => 'Zend\Mvc\Router\Http\Segment',
                        'options' => array(
                            'route' => '/:mcworkpages',
                            'constraints' => array(
                                'mcworkpages' => '[a-zA-Z0-9._-]+'
                            ),
                            'defaults' => array(
                                'controller' => 'Mcwork'
                            )
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'mcwork_app_metas' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/metas[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Metas'
                                    )
                                )
                            ), 
                            'mcwork_app_fileswookmark' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/wookmark[/][:callback][/][:page]',
                                    'constraints' => array(
                                        'callback' => '[a-zA-Z0-9._-]+',
                                        'page' => '[a-zA-Z0-9._-]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Files'
                                    )
                                )
                            ),                                                       
                            'mcwork_app_display' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/display[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork'
                                    )
                                )
                            ),
                            'mcwork_app_application' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/application[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[a-zA-Z0-9._-]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Application'
                                    )
                                )
                            ),                            
                            'mcwork_app_trashcontent' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/trashcontent[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[a-zA-Z0-9._-]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork'
                                    )
                                )
                            ),                            
                            'mcwork_app_filesdenied' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/denied[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Files'
                                    )
                                )
                            ),

                            'mcwork_app_filespublic' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/public[/][:id]',
                                    'constraints' => array(
                                        'id' => '[a-zA-Z0-9._-]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Dropzone'
                                    )
                                )
                            ),                            

                            'mcwork_app_filesupload' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/upload[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Files'
                                    )
                                )
                            ),     
                            'mcwork_app_multipleupload' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/multipleupload[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Files'
                                    )
                                )
                            ),                            
                            'mcwork_app_filesdown' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/download[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            ),
                            'mcwork_app_makedir' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/makedir[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[a-zA-Z0-9._-]+'
                                    ),                                    
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            ),  
                            'mcwork_app_rmdir' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/rmdir[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[a-zA-Z0-9._-]+',
                                        'cat' => '[a-zA-Z0-9._-]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            ),                                                      
                            'mcwork_app_category' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/category[/][:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork'
                                    )
                                )
                            ),
                            
                            'mcwork_app_add' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/add[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Form'
                                    )
                                )
                            ),
                            'mcwork_app_edit' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/edit[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Form'
                                    )
                                )
                            ),
                            'mcwork_app_recycle' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/recycle[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Form'
                                    )
                                )
                            ),                            
                            'mcwork_app_write' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/write[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[a-zA-Z._-]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Form'
                                    )
                                )
                            ),                            
                            'mcwork_app_trash' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/trash[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            ),                            
                            'mcwork_app_delete' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/delete[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            ),                            
                            'mcwork_app_clear' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/clear[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[a-zA-Z0-9._-]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Delete'
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'invokables' => array(),
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            
            'backend_client_app' => 'Mcwork\Service\Client\AppServiceFactory',
            'mcwork_form_rules' => 'Mcwork\Service\Form\RulesServiceFactory',
            
            'mcwork_clientapp_publicmedia' => 'Mcwork\Factory\Service\PublicImagesFactory',
            
            'file_tags' => 'Mcwork\Factory\Model\FsTagsFilesFactory',
            'media_tags' => 'Mcwork\Factory\Model\FsTagsMediasFactory',
            
            'mcwork_upload_max_file_size' =>  'Mcwork\Factory\Service\FsUploadMaxSizeFactory',
            'mcwork_allowed_upload_files' => 'Mcwork\Factory\Service\FsUploadAllowedFactory',
            
            
            'Mcwork\Cache\Data' => function ($sm)
            {
                $cache = Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'ttl' => 28800,
                        'options' => array(
                            'namespace' => 'mcworkdata',
                            'cache_dir' => CON_ROOT_PATH . '/data/cache/mcwork'
                        )
                    ),
                    'plugins' => array(
                        
                        // Don't throw exceptions on cache errors
                        'exception_handler' => array(
                            'throw_exceptions' => true
                        ),
                        'serializer'
                    )
                ));
                return $cache;
            },
            
            'Mcwork\Cache\Structures' => function ($sm)
            {
                $cache = Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'ttl' => 3600,
                        'options' => array(
                            'namespace' => 'mcworkstructur',
                            'cache_dir' => CON_ROOT_PATH . '/data/cache/mcwork'
                        )
                    ),
                    'plugins' => array(
                        
                        // Don't throw exceptions on cache errors
                        'exception_handler' => array(
                            'throw_exceptions' => true
                        ),
                        'serializer'
                    )
                ));
                return $cache;
            },
            
            'Acl\Resource' => 'Mcwork\Service\Acl\ResourceServiceFactory',
  
            'Attribute\Charset' => 'Mcwork\Service\Attribute\CharsetServiceFactory',
            'Attribute\Httpstatuscode' => 'Mcwork\Service\Attribute\HttpstatuscodeServiceFactory',
            'Attribute\LinkAttrRel' => 'Mcwork\Service\Attribute\LinkRelServiceFactory',
            'Attribute\LinkAttrTarget' => 'Mcwork\Service\Attribute\LinkTargetServiceFactory',
            'Attribute\Publish' => 'Mcwork\Service\Attribute\PublishServiceFactory',
            'Attribute\Robots' => 'Mcwork\Service\Attribute\RobotsServiceFactory',   
            
            'Content\LinksAndPages' => 'Mcwork\Service\Content\PagesLinksServiceFactory',
            'Content\Groups' => 'Mcwork\Service\Content\ContentGroupsServiceFactory',
            
            'Templates\Htmlwidgets' => 'Mcwork\Service\Templates\HtmlwidgetsServiceFactory',
            'Templates\Contribution' => 'Mcwork\Service\Templates\ContributionServiceFactory',
            'Templates\PageContent' => 'Mcwork\Service\Templates\PagecontentServiceFactory',  
            'Templates\Styles' => 'Mcwork\Service\Templates\StylesServiceFactory',
            'Templates\Assign' => 'Mcwork\Service\Templates\AssignsServiceFactory',
            'Templates\Types' => 'Mcwork\Service\Templates\TypesServiceFactory',

            'Locale\Language' => 'Mcwork\Service\Locale\LanguageServiceFactory',
            'Locale\i18n' => 'Mcwork\Service\Locale\i18nServiceFactory',
            
            'Storage\Manager' => 'Mcwork\Factory\StorageManagerFactory',
            'Mcwork\FormDecorators' => 'Mcwork\Service\Form\DecoratorsServiceFactory',
            'Mcwork\StandardForms' => 'Mcwork\Factory\Form\McworkFormFactory',
            
            // plugins
            'Mcwork\Plugins' => 'Mcwork\Service\Plugins\DefaultServiceFactory',
            
            // datas
            'Mcwork\Media' => 'Mcwork\Service\Media\TableServiceFactory',
            'File\Tags\Assign' => 'Mcwork\Factory\Model\FsAssignFileTagsFactory',
            'Media\Tags\Assign' => 'Mcwork\Factory\Model\FsAssignMediaTagsFactory',
            'Media\Path' => 'Mcwork\Factory\Model\FsPathMediaFactory',
            'Accounts' => 'Mcwork\Service\Directory\AccountServiceFactory',
            
            'Mcwork\PublicMedia' => 'Mcwork\Factory\Service\PublicImagesFactory',
            'Mcwork\PublicPdf' => 'Mcwork\Factory\Service\PublicPdfFactory',
            'Mcwork\NonPublicMedia' => 'Mcwork\Factory\Service\DeniedFileFactory',
            
            'Mcwork\Cachekeys' => 'Mcwork\Service\Cache\RegisterServiceFactory',
   
            
            
            
            // backend elements
            'Mcwork\Buttons' => 'Mcwork\Service\Elements\ButtonsServiceFactory',
            'Mcwork\Tableedit' => 'Mcwork\Service\Elements\TableeditServiceFactory',
            'Mcwork\Toolbar' => 'Mcwork\Service\Elements\ToolbarServiceFactory',
            
            // factory controller
            'Mcwork\PageOptions' => 'Mcwork\Factory\PageOptionsFactory',
            'Mcwork\Pages' => 'Mcwork\Service\Pages\McworkServiceFactory',
            
            // controller
            'Mcwork\Groups\User' => 'Mcwork\Service\User\GroupsServiceFactory',
            
            // model
            'Mcwork\SaveUpload' => 'Mcwork\Factory\Model\FsUploadDataSaveFactory',
        )
        
    ),
    
    'controllers' => array(
        'factories' => array(
            'Mcwork' => 'Mcwork\Factory\Controller\McworkControllerFactory',
            'Mcwork\Files' => 'Mcwork\Factory\Controller\McworkControllerFactory',
            'Mcwork\Dropzone' => 'Mcwork\Factory\Controller\McworkControllerFactory',
            'Mcwork\Form' => 'Mcwork\Factory\Controller\McworkControllerFactory',
            'Mcwork\Delete' => 'Mcwork\Factory\Controller\DeleteControllerFactory',
            'Mcwork\Application' => 'Mcwork\Factory\Controller\ApplicationControllerFactory',
            'Mcwork\Metas' => 'Mcwork\Factory\Controller\McworkControllerFactory',
        )
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'mcwork/layout/admin' => __DIR__ . '/../view/layout/admin.phtml'
        ),
        'template_path_stack' => array(
            'mcwork' => __DIR__ . '/../view'
        )
    ),
    'contentinum_config' => array(
        
        'templates_files' => array(
            'acl_resource' => __DIR__ . '/../../../data/locale/etc/acl/resource.data.xml',
            
            'attribute_charset' => __DIR__ . '/../../../data/locale/etc/attribute/charset.data.xml',
            'attribute_httpstatuscode' => __DIR__ . '/../../../data/locale/etc/attribute/httpstatuscode.data.xml',
            'attribute_link_rel' =>  __DIR__ . '/../../../data/locale/etc/attribute/link_rel.data.xml',
            'attribute_link_target' =>  __DIR__ . '/../../../data/locale/etc/attribute/link_target.data.xml',
            'attribute_publish' => __DIR__ . '/../../../data/locale/etc/attribute/publish.data.xml',
            'attribute_robots' => __DIR__ . '/../../../data/locale/etc/attribute/robots.data.xml',
            
            'templates_htmlwidgets' => __DIR__ . '/../../../data/locale/etc/templates/htmlwidgets.library.xml',
            'template_contributions' => __DIR__ . '/../../../data/locale/etc/templates/contribution.data.xml',
            'template_pagecontent' => __DIR__ . '/../../../data/locale/etc/templates/pagecontent.data.xml', 
            'template_assigns' => __DIR__ . '/../../../data/locale/etc/templates/template_assigns.data.xml',
            'template_styles' => __DIR__ . '/../../../data/locale/etc/templates/template_styles.data.xml',
            'template_types' => __DIR__ . '/../../../data/locale/etc/templates/template_contenttype.data.xml',
            
            'locale_i18n' => __DIR__ . '/../../../data/locale/etc/locale/i18n.data.xml',
            'locale_language' => __DIR__ . '/../../../data/locale/etc/locale/language.data.xml',            
         ),        
        
        'etc_cfg_files' => array(
            'mcwork_pages' => __DIR__ . '/../../../data/locale/etc/module/mcwork/pages.php',
            'mcwork_client_apps' => __DIR__ . '/../../../data/locale/etc/module/mcwork/app/client.php',
            'mcwork_form_decorators' => __DIR__ . '/../../../data/locale/etc/module/mcwork/form/decorators.php',
            'mcwork_form_rules' => __DIR__ . '/../../../data/locale/etc/module/mcwork/form/rules.php',
            'mcwork_elements_toolbar' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/toolbar.php',
            'mcwork_elements_buttons' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/buttons.php',
            'mcwork_elements_tableedit' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/tableedit.php',
            
            'mcwork_plugins' => __DIR__ . '/../../../data/locale/etc/module/mcwork/plugins/defaults.php',
            'mcwork_cache_register' => __DIR__ . '/../../../data/locale/etc/module/mcwork/cache/register.php',
        ),
        'db_cache_keys' => array(
            'mcwork_media' => array(
                'cache' => 'mcwork_media',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebMedias',
                'sortby' => 'media_source',
                'savecache' => false,
            ),  
            'mcwork_user_groups' => array(
                'cache' => 'mcwork_user_groups',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\UserAclIndex',
                'savecache' => false
            ),
            'mcwork_directory_accounts' => array(
                'cache' => 'mcwork_directory_accounts',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\Accounts',
                'savecache' => false,
            ),
            'content_pages_links' => array(
                'cache' => 'content_pages_links',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'orderBy' => array('main.label ASC'),
                'savecache' => false,
            ), 
            'content_groups' => array(
                'cache' => 'content_groups',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebContentGroups',
                'savecache' => false,
            ),            
        )
    ),
    'assetic_configuration' => array(
        'controllers' => array(
            
            'Mcwork' => array(
                '@mcworktable',
                '@head_custom',
                '@tablescripts'
            ),
            'Mcwork\Form' => array(
                '@mcworkform',
                '@head_custom',
                '@formscripts'                
            ),
            'Mcwork\Files' => array(
                '@mcworkfiles',
                '@head_custom',
                '@filesscripts'                        
            ),
            'Mcwork\Metas' => array(
                '@mcworkwookmark',
                '@head_custom',
                '@filewookmark'            
            ), 
            'Mcwork\Dropzone' => array(
                '@mcworkdropzone',
                '@head_custom',
                '@filedropzone'            
            ),
        ),
        'modules' => array(
            
            'mcwork' => array(
                'root_path' => __DIR__ . '/../assets',
                
                'collections' => array(
                    
                    'mcworkcore' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/mcwork.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ),
                    
                    'mcworktable' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/vendor/datatables/jquery.dataTables.min.css',
                            'backend/css/vendor/datatables/dataTables.foundation.css',
                            'backend/css/mcwork.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ),
                    
                    'mcworkfiles' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/vendor/tagging/tag-basic-style.css',
                            'backend/css/vendor/jquery-ui-autocomplete.css',                            
                            'backend/css/vendor/datatables/jquery.dataTables.min.css',
                            'backend/css/vendor/datatables/dataTables.foundation.css',
                            'backend/css/mcwork.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ), 
                    
                    'mcworkwookmark' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/vendor/tagging/tag-basic-style.css',
                            'backend/css/vendor/jquery-ui-autocomplete.css',
                            'backend/css/mcwork.css',
                            'backend/css/mcwork.dyngrid.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ),                    

                    'mcworkdropzone' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/vendor/upload/dropzone.4.0.min.css',
                            'backend/css/vendor/tagging/tag-basic-style.css',
                            'backend/css/vendor/jquery-ui-autocomplete.css',
                            'backend/css/vendor/datatables/jquery.dataTables.min.css',
                            'backend/css/vendor/datatables/dataTables.foundation.css',
                            'backend/css/mcwork.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ),                    
                    
                    'mcworkform' => array(
                        'assets' => array(
                            'backend/css/font-awesome.css',
                            'backend/css/foundation.min.css',
                            'backend/css/vendor/chosen/chosen.forms.css',
                            'backend/css/vendor/jquery.datetimepicker.css',
                            'backend/css/mcwork.css'
                        ),
                        'filters' => array(
                            '?CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                            '?CssMinFilter' => array(
                                'name' => 'Assetic\Filter\CssMinFilter'
                            )
                        )
                    ),                    
                    
                    'head_custom' => array(
                        'assets' => array(
                            'backend/js/vendor/modernizr.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    ),
                    'tablescripts' => array(
                        
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/vendor/datatables/jquery.dataTables.min.js',
                            'backend/js/vendor/datatables/dataTables.foundation.js',
                            'backend/js/vendor/chosen/chosen.jquery.min.js',
                            'backend/js/mcwork.js',
                            'backend/js/mcwork.table.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    ),
                    
                    'formscripts' => array(
                    
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/vendor/map/locationpicker.jquery.js',
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/vendor/chosen/chosen.jquery.js',
                            'backend/js/vendor/jquery.datetimepicker.js',                            
                            'backend/js/mcwork.js',
                            'backend/js/mcwork.form.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    ),                    
                    
                    'filesscripts' => array(
                    
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/vendor/jquery-ui-autocomplete.js',
                            'backend/js/vendor/upload/jquery.file-ajax.js',
                            'backend/js/vendor/tagging/tagging.min.js',
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/vendor/datatables/jquery.dataTables.min.js',
                            'backend/js/vendor/datatables/dataTables.foundation.js',
                            'backend/js/vendor/chosen/chosen.jquery.min.js',
                            'backend/js/mcwork.js',
                            'backend/js/mcwork.upload.js',
                            'backend/js/mcwork.table.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    
                    
                    ),  
                    
                    'filewookmark' => array(
                    
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/vendor/jquery-ui-autocomplete.js',
                            'backend/js/vendor/tagging/tagging.min.js', 
                            'backend/js/vendor/wookmark/imagesloaded.pkgd.min.js',
                            'backend/js/vendor/wookmark/wookmark.min.js',
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/mcwork.js',
                            'backend/js/mcwork.wookmarkserver.js',
                            'backend/js/mcwork.table.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    
                    
                    ),                    

                    'filedropzone' => array(
                    
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/vendor/upload/dropzone.4.0.min.js',                                                       
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/vendor/datatables/jquery.dataTables.min.js',
                            'backend/js/vendor/datatables/dataTables.foundation.js',
                            'backend/js/vendor/chosen/chosen.jquery.min.js', 
                            'backend/js/mcwork.js',
                            'backend/js/mcwork.upload.js',
                            'backend/js/mcwork.table.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    
                    
                    ),                    
                    
                    'mcworkcorescripts' => array(
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.2.min.js',
                            'backend/js/vendor/jquery.cookie.js',
                            'backend/js/mcwork.language.js',
                            'backend/js/foundation.min.js',
                            'backend/js/mcwork.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    )
                )
                
            )
            
        )
        
    )
);