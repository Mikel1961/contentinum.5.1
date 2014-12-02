<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Contentinum',
                        'action' => 'index'
                    )
                )
            )
            ,
            'page_app' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/:pages[/:article][/:category]',
                    'constraints' => array(
                        'pages' => '[a-zA-Z0-9._-]+',
                        'article' => '[a-zA-Z0-9_-]+',
                        'category' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Contentinum',
                        'action' => 'index'
                    )
                )
            )
        )
        
    ),
    'service_manager' => array(
        'invokables' => array(
            'contributions' => 'Contentinum\Mapper\Contributions',
        ),        
        'factories' => array(
            'Contentinum\Acl' => 'Contentinum\Service\Acl\SettingsServiceFactory',
            'Contentinum\Acl\Acl' => 'Contentinum\Service\AclServiceFactory',
            'Contentinum\AuthService' => 'Contentinum\Service\Domains\AuthServiceFactory',
            
            'Contentinum\Configure' => 'Contentinum\Service\ConfigurationServiceFactory',
            
            'Contentinum\Cache\PublicContent' => function ($sm)
            {
                $cache = Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'ttl' => 3600,
                        'options' => array(
                            'namespace' => 'content',
                            'cache_dir' => CON_ROOT_PATH . '/data/cache/frontend'
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

            'Contentinum\Cache\StrutureContent' => function ($sm)
            {
                $cache = Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'ttl' => 14400,
                        'options' => array(
                            'namespace' => 'structure',
                            'cache_dir' => CON_ROOT_PATH . '/data/cache/frontend'
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
            // controller factory
            'Contentinum\PageConfiguration' => 'Contentinum\Service\Pages\ConfigureServiceFactory',
            'Contentinum\PageOptions'  => 'Contentinum\Factory\PageOptionsFactory',
            'Contentinum\Preference' => 'Contentinum\Service\Domains\PreferenceServiceFactory',
            'Contentinum\PublicPages' => 'Contentinum\Service\Pages\PublicServiceFactory',
            'Contentinum\AttributePages' => 'Contentinum\Service\Pages\AttributeServiceFactory',
            
            // controller abstract
            'Contentinum\Acl\DefaultRole' => 'Contentinum\Service\Acl\DefaultRoleServiceFactory',
            
            
            // controller
            'Contentinum\Modul' => 'Contentinum\Factory\Mapper\ModulFactory',
            'Contentinum\Htmllayouts' => 'Contentinum\Service\Templates\HtmllayoutsServiceFactory',
            'Contentinum\Widgets' => 'Contentinum\Service\Templates\WidgetsStylesServiceFactory',
            'Contentinum\GroupStyles' => 'Contentinum\Service\Templates\GroupStylesServiceFactory',            
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator'
        ), 
    ),
    'translator' => array(
        'locale' => 'de_DE',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
             'Contentinum' => 'Contentinum\Factory\Controller\ApplicationControllerFactory',
        ),        
    ),    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'contentinum/layout' =>  __DIR__ . '/../../../data/locale/etc/module/app/layout/application.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/foundation.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    
    'doctrine' => array(
        'driver' => array(
            'contentinum_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Contentinum/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Contentinum\Entity' => 'contentinum_driver'
                )
            )
        )
    ),
    
    'contentinum_config' => array(
        'templates_files' => array(
            'templates_htmllayouts' => __DIR__ . '/../../../data/locale/etc/templates/htmllayouts.library.xml',

        ),
        'etc_cfg_files' => array(
            'app_pages' => __DIR__ . '/../../../data/locale/etc/module/app/pages.php',
            'content_widgets_styles' => __DIR__ . '/../../../data/locale/etc/module/app/templates/widgets.php',
            'content_group_styles' => __DIR__ . '/../../../data/locale/etc/module/app/templates/styles.php',            
        ),
        'db_cache_keys' => array(
            'contentinum_domain_preference' => array(
                'cache' => 'contentinum_domain_preference',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPreferences',
                'sortby' => 'host',
                'savecache' => false,
            ), 
            'contentinum_public_pages' => array(
                'cache' => 'contentinum_public_pages',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'findBy' => array('onlylink' => '0', 'publish' => 'yes'),
                'savecache' => false,
            ), 
            'contentinum_attribute_pages' => array(
                'cache' => 'contentinum_attribute_pages',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesAttributes',
                'savecache' => false,
            ),                             
        ),
        'log_configure' => array(
            'log_priority' => 6,
            'log_writer' => array(
                'application' => __DIR__ . '/../../../data/logs/application.log',
                'error' => __DIR__ . '/../../../data/logs/errors.application.log'
            ),
            'log_filter' => array(
                'application' => array(
                    'priority' => array(
                        'priority' => Zend\Log\Logger::WARN,
                        'operator' => '>='
                    )
                ),
                'error' => array(
                    'priority' => array(
                        'priority' => Zend\Log\Logger::ERR,
                        'operator' => '<='
                    )
                )
            )
        ),
        'contentinum_acl' => array(
            'acl_default_role' => 'guest',
            'acl_settings' => array(
                'roles' => array(
                    'guest',
                    'member',
                    'intranet',
                    'author',
                    'publisher',
                    'manager',
                    'admin',
                    'root'
                ),
                'parent' => array(
                    'member' => 'guest',
                    'intranet' => 'member',
                    'author' => 'intranet',
                    'publisher' => 'author',
                    'manager' => 'publisher',
                    'admin' => 'manager',
                    'root' => 'admin'
                ),
                
                'resources' => array(
                    'index',
                    'error',
                    'medias',
                    'memberresource',
                    'intranetresource',
                    'authorresource',
                    'publisherresource',
                    'managerresource',
                    'adminresource',
                    'rootresource'
                ),
                
                'rules' => array(
                    'allow' => array(
                        'guest' => array(
                            'index' => 'all',
                            'error' => 'all',
                            'medias' => 'all'
                        ),
                        'member' => array(
                            'memberresource' => 'all'
                        ),
                        'intranet' => array(
                            'intranetresource' => 'all'
                        ),
                        'author' => array(
                            'authorresource' => 'all'
                        ),
                        'publisher' => array(
                            'publisherresource' => 'all'
                        ),
                        'manager' => array(
                            'managerresource' => 'all'
                        ),
                        'admin' => array(
                            'adminresource' => 'all'
                        ),
                        'root' => array(
                            'rootresource' => 'all'
                        )
                    )
                )
            )
        )
    ),
    'assetic_configuration' => array(
        'debug' => true,
        'buildOnRequest' => true,
        'combine' => true,
        'webPath' => realpath('public/assets/app'),
        'basePath' => 'assets/app',
        'cachePath' => 'data/cache/app/assets',
        'cacheEnabled' => false,
        
        'controllers' => array(
            'Contentinum\Controller\Index' => array(
                '@foundation',
                '@head_foundation',
                '@scriptsfoundation'
            ),
            'Contentinum' => array(
                '@foundation',
                '@head_foundation',
                '@scriptsfoundation'
            ),
            'Mcuser' => array(
                '@login',
                '@head_foundation',
                '@scriptslogin'            
            ),
        ),
        
        'modules' => array(
            'contentinum' => array(
                'root_path' => __DIR__ . '/../assets',
                
                'collections' => array(
                    'foundation' => array(
                        'assets' => array(
                            'foundation/css/font-awesome.css',
                            'foundation/css/normalize.css',
                            'foundation/css/foundation.min.css'
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
                    'login' => array(
                        'assets' => array(
                            'foundation/css/font-awesome.css',
                            'foundation/css/normalize.css',
                            'foundation/css/foundation.min.css',
                            'login/css/login.css'
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
                    'head_foundation' => array(
                        'assets' => array(
                            'foundation/js/vendor/modernizr.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    )
                    ,
                    'scriptsfoundation' => array(
                        'assets' => array(
                            'foundation/js/vendor/jquery.js',
                            'foundation/js/foundation.min.js',
                            'foundation/js/init.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    ),
                    'scriptslogin' => array(
                        'assets' => array(
                            'foundation/js/vendor/jquery.js',
                            'foundation/js/foundation.min.js',
                            'foundation/js/std.js',
                            'login/js/login.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    ),                    
                    'core' => array(
                        'assets' => array(
                            'default/css/normalize.css',
                            'default/css/main.css'
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
                    'head_modernizr' => array(
                        'assets' => array(
                            'default/js/vendor/modernizr-2.6.2.min.js'
                        ),
                        'filters' => array(
                            '?JSMinFilter' => array(
                                'name' => 'Assetic\Filter\JSMinFilter'
                            )
                        )
                    )
                    ,
                    'scripts' => array(
                        'assets' => array(
                            'default/js/vendor/jquery-1.11.1.min.js',
                            'default/js/plugins.js'
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