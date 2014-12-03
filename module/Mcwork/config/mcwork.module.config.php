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
                        'uri' => '/mcwork/medias/file',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'MediaMetas',
                                'uri' => '/mcwork/medias/metadatas',
                                'resource' => 'authorresource'
                            ),
                            array(
                                'label' => 'MediaGroup',
                                'uri' => '/mcwork/mediagroup',
                                'resource' => 'authorresource'
                            )
                        )
                    ) // end sub medias

                    , // end medias
                    array(
                        'label' => 'NoPublicFiles',
                        'uri' => '/mcwork/files',
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
                                'resource' => 'authorresource'
                            ),
                            array(
                                'label' => 'Links',
                                'uri' => '/mcwork/links',
                                'resource' => 'authorresource'
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
                                'label' => 'newsGroup',
                                'uri' => '/mcwork/contributiongroup',
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
                        'resource' => 'authorresource'
                    ),
                    
                    array(
                        'label' => 'Maps',
                        'uri' => '/mcwork/maps',
                        'resource' => 'authorresource'
                    ),
                    
                    array(
                        'label' => 'Directories',
                        'uri' => '/mcwork/accounts', // directory
                        'resource' => 'adminresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Contacts',
                                'uri' => '/mcwork/contacts',
                                'resource' => 'adminresource'
                            )
                        )
                    ) // end sub directories

                ) // end directories

                
            ) // end sub content
, // end content
            
            array(
                'label' => 'Administration',
                'uri' => '#',
                'order' => 4,
                'resource' => 'adminresource',
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
                        )
                    ) // end sub fieldtypes

                ) // end fieldtypes

            ) // end sub administration
, // end administration
            
            array(
                'label' => 'Mcwork_Controller_Apps',
                'uri' => '#',
                'order' => 5,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown'
            )
        ) // end apps

    ) // end subkey default
, // end mainkey navigation
    
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
                            'mcwork_app_delete' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/delete[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcwork\Form'
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
            
            // backend elements
            'Mcwork\Buttons' => 'Mcwork\Service\Elements\ButtonsServiceFactory',
            'Mcwork\Tableedit' => 'Mcwork\Service\Elements\TableeditServiceFactory',
            'Mcwork\Toolbar' => 'Mcwork\Service\Elements\ToolbarServiceFactory',
            
            // factory controller
            'Mcwork\PageOptions' => 'Mcwork\Factory\PageOptionsFactory',
            'Mcwork\Pages' => 'Mcwork\Service\Pages\McworkServiceFactory',
            
            // controller
            'Mcwork\Groups\User' => 'Mcwork\Service\User\GroupsServiceFactory'
        )
        
    ),
    
    'controllers' => array(
        'factories' => array(
            'Mcwork' => 'Mcwork\Factory\Controller\McworkControllerFactory',
            'Mcwork\Form' => 'Mcwork\Factory\Controller\McworkControllerFactory'
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
        'etc_cfg_files' => array(
            'mcwork_pages' => __DIR__ . '/../../../data/locale/etc/_module/mcwork/pages.php',
            'mcwork_elements_toolbar' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/toolbar.php',
            'mcwork_elements_buttons' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/buttons.php',
            'mcwork_elements_tableedit' => __DIR__ . '/../../../data/locale/etc/module/mcwork/elements/tableedit.php'
        ),
        'db_cache_keys' => array(
            'mcwork_user_groups' => array(
                'cache' => 'mcwork_user_groups',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\UserAclIndex',
                'savecache' => false
            )
        )
    ),
    'assetic_configuration' => array(
        'controllers' => array(
            
            'Mcwork' => array(
                '@mcworktable',
                '@head_custom',
                '@tablescripts'
            )
        ),
        
        'routes' => array(
            'mcwork(.*)' => array(
                '@mcworkcore',
                '@head_custom',
                '@mcworkcorescripts'
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
                            'backend/js/vendor/jquery-1.11.1.min.js',
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
                    )
                    ,
                    'mcworkcorescripts' => array(
                        'assets' => array(
                            'backend/js/vendor/jquery-1.11.1.min.js',
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