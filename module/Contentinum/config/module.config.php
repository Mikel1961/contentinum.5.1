<?php
namespace Contentinum;

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
            'appsmenu' => 'Contentinum\Service\App\ContentinumNavigationFactory',
            'Contentinum\Acl' => 'Contentinum\Service\Acl\SettingsServiceFactory',
            'Contentinum\Acl\Acl' => 'Contentinum\Service\AclServiceFactory',
            'Contentinum\AuthService' => 'Contentinum\Service\Domains\AuthServiceFactory',
            'Contentinum\Customer' => 'Contentinum\Service\Opt\CustomerServiceFactory',
            'Contentinum\Configure' => 'Contentinum\Service\ConfigurationServiceFactory',     
            'Contentinum\PluginKeys' => 'Contentinum\Service\Plugins\KeysServiceFactory',            
            // entities
            'Entity\Tags' => 'Contentinum\Factory\Entities\TagsFactory',
            'Entity\Redirect' => 'Contentinum\Factory\Entities\RedirectFactory',
            'Entity\Tree' => 'Contentinum\Factory\Entities\NavigationTreeFactory',
            'Entity\Page' => 'Contentinum\Factory\Entities\PageFactory',
            'Entity\PageContent' => 'Contentinum\Factory\Entities\PageContentFactory',
            'Entity\ContentGroups' => 'Contentinum\Factory\Entities\ContentGroupsFactory',
            'Entity\Content' => 'Contentinum\Factory\Entities\ContentFactory',
            'Entity\Medias' => 'Contentinum\Factory\Entities\MediasFactory',
            'Entity\Name\Tags' => 'Contentinum\Factory\Entities\Names\TagsFactory',
            'Entity\Name\Redirect' => 'Contentinum\Factory\Entities\Names\RedirectFactory',
            'Entity\Name\Tree' => 'Contentinum\Factory\Entities\Names\NavigationTreeFactory',
            'Entity\Name\Page' => 'Contentinum\Factory\Entities\Names\PageFactory',
            'Entity\Name\PageContent' => 'Contentinum\Factory\Entities\Names\PageContentFactory',
            'Entity\Name\ContentGroups' => 'Contentinum\Factory\Entities\Names\ContentGroupsFactory',   
            'Entity\Name\Content' => 'Contentinum\Factory\Entities\Names\ContentFactory',
            'Entity\Name\Medias' => 'Contentinum\Factory\Entities\Names\MediasFactory',
            
            'Contentinum\Cache\PublicContent' => function ($sm)
            {
                $cache = \Zend\Cache\StorageFactory::factory(array(
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
                $cache = \Zend\Cache\StorageFactory::factory(array(
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
            'Contentinum\ContentStyles' => 'Contentinum\Service\Templates\ContentStylesServiceFactory',

            // mappers
            'Contentinum\Navigation' => 'Contentinum\Factory\Mapper\NavigationFactory',
            'Contentinum\Newsarchive' => 'Contentinum\Factory\Mapper\NewsarchiveFactory',
            'Contentinum\NewsArchiveYear' => 'Contentinum\Factory\Mapper\NewsArchiveYearFactory',
            'Contentinum\News' => 'Contentinum\Factory\Mapper\NewsFactory',
            'Contentinum\Mediagroup' => 'Contentinum\Factory\Mapper\MediagroupFactory',   
            'Contentinum\Medias' => 'Contentinum\Factory\Mapper\MediasFactory',  
            'Contentinum\Filegroup' => 'Contentinum\Factory\Mapper\FilegroupFactory',   
            'Contentinum\AccountMembers' => 'Contentinum\Factory\Mapper\AccountMembersFactory',   
            'Contentinum\Maps' => 'Contentinum\Factory\Mapper\MapsFactory', 
            'Contentinum\Forms' => 'Contentinum\Factory\Mapper\FormsFactory', 
            
            
            
            // factory
            'Contentinum\FormFactory' => 'Contentinum\Factory\Form\CustomersFormFactory',
            'Contentinum\FormProcess' => 'Contentinum\Factory\Form\ProcessFormFactory',
            'Contentinum\FormDecorators' => 'Contentinum\Service\Form\DecoratorsServiceFactory',
            'Contentinum\SelectFieldFactory' => 'Contentinum\Factory\Mapper\FormFieldOptionsFactory',
            'Contentinum\Smtp\Transport' => 'Contentinum\Service\Mail\TransportServiceFactory',
            'Contentinum\Sendmail' => 'Contentinum\Service\Mail\SendmailServiceFactory',
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
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )        
    
    ),
    'contentinum_config' => array(
        'templates_files' => array(
            'templates_htmllayouts' => __DIR__ . '/../../../data/locale/etc/templates/layouts',

        ),
        'etc_cfg_files' => array(
            'app_pages' => __DIR__ . '/../../../data/locale/etc/module/app/pages.php',
            'content_widgets_styles' => __DIR__ . '/../../../data/locale/etc/module/app/templates/widgets',
            'content_group_styles' => __DIR__ . '/../../../data/locale/etc/module/app/templates/styles',
            'content_contribution_styles' => __DIR__ . '/../../../data/locale/etc/module/app/templates/contributions',
            'content_form_decorators' => __DIR__ . '/../../../data/locale/etc/module/app/form',
            'opt_customer' => __DIR__ . '/../../../data/locale/etc/opt/customer.config.php',
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
                        'priority' => \Zend\Log\Logger::WARN,
                        'operator' => '>='
                    )
                ),
                'error' => array(
                    'priority' => array(
                        'priority' => \Zend\Log\Logger::ERR,
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
        ),
        
        'key_plugins' => array(
            'topbar' => 'Contentinum\Navigation',
            'newsarchive' => 'Contentinum\Newsarchive',
            'newsyeararchive' => 'Contentinum\NewsArchiveYear',
            'news' => 'Contentinum\News',
            'navigation' => 'Contentinum\Navigation',
            'mediagroup' => 'Contentinum\Mediagroup',
            'filegroup' => 'Contentinum\Filegroup',
            'accountmembers' => 'Contentinum\AccountMembers',
            'maps' => 'Contentinum\Maps',
            'forms' => 'Contentinum\Forms',
        ),        
        
        'default_plugins' => array(
            
            'navigation' => array(
                'resource' => 'intranet',
                'name' => 'Navigation',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Branch depth',
                                'empty_option' => 'Max depth',
                                'value_options' => array(
                                    '1' => 'Level 1',
                                    '2' => 'Level 2',
                                    '3' => 'Level 3'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'empty_option' => 'No style',
                                'value_options' => array(
                                    'navigation' => 'Standard List in nav container',
                                    'navigationlist' => 'Standard List',
                                    'navigationinline' => 'Inline List',
                                    'topbarlist' => 'Topbar'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Set display headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'displayheadline' => 'Display headline',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),
            
            'topbar' => array(
                'resource' => 'intranet',
                'name' => 'Topbar Navigation',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
            
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name link',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
            
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bild als Brandname',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_publicmedia',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
            
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'value_options' => array(
                                    'topbar' => 'Responsive Topbar',
                                    'topbarleft' => 'Responsive Topbar (left)'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            
            ),
            
            'mediagroup' => array(
                'resource' => 'intranet',
                'name' => 'Bildergalerien',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bildergalerien',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMediaGroup',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'groupName'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'empty_option' => 'No style',
                                'value_options' => array(
                                    'imageslider' => 'Slider',
                                    'contentslider' => 'Contentslider'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),
            
            
            'filegroup' => array(
                'resource' => 'intranet',
                'name' => 'Dateigruppen',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Dateigruppen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMediaGroup',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'groupName'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'empty_option' => 'No style',
                                'value_options' => array(
                                    'downloadlist' => 'Downloadliste',
                                    'contentslider' => 'Contentslider'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Set display headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'displayheadline' => 'Display headline',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),
            
            
            'forms' => array(
                'resource' => 'intranet',
                'name' => 'Forms',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Formulare',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebForms',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'headline'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),
            'maps' => array(
                'resource' => 'intranet',
                'name' => 'Maps',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Maps',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMaps',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'headline'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),       
            
            'newsarchive' => array(
                'resource' => 'intranet',
                'name' => 'News Archive',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'News',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/newsarchive',
                                    'data' => array(
                                        'worker' => 'Mcwork\Model\News',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => 'web_contentgroup_id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            
            
            'newsyeararchive' => array(
                'resource' => 'intranet',
                'name' => 'News Archive only years',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'News',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/newsarchive',
                                    'data' => array(
                                        'worker' => 'Mcwork\Model\News',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => 'web_contentgroup_id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            
            'news' => array(
                'resource' => 'intranet',
                'name' => 'News',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'News',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/newsarchive',
                                    'data' => array(
                                        'worker' => 'Mcwork\Model\News',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => 'web_contentgroup_id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
            
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            'accountmembers' => array(
                'resource' => 'intranet',
                'name' => 'Memberlist',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Member group',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\FieldTypes',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format list',
                                'value_options' => array(
                                    'navsearch' => 'Search by letter',
                                    'shufflepictures' => 'Shuffle only images',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                    '11' => 'Display 11',
                                    '12' => 'Display 12',
                                    '13' => 'Display 13',
                                    '14' => 'Display 14',
                                    '15' => 'Display 15',
                                    '16' => 'Display 16',
                                    '17' => 'Display 17',
                                    '18' => 'Display 18',
                                    '19' => 'Display 19',
                                    '20' => 'Display 20',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),            
            
        ),
    ),
    'assetic_configuration' => array(
        'debug' => true,
        'buildOnRequest' => true,
        'combine' => true,
        'webPath' => realpath('public/assets/app'),
        'basePath' => 'assets/app',
        'cachePath' => 'data/cache/app/assets',
        'cacheEnabled' => false,

        
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
                            'foundation/js/init.js',
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