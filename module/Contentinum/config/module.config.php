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
            ),
            'page_app' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/:pages[/:article][/:category][/:tag][/:tagvalue]',
                    'constraints' => array(
                        'pages' => '[a-zA-Z0-9._-]+',
                        'article' => '[a-zA-Z0-9._-]+',
                        'category' => '[a-zA-Z0-9,_-]+',
                        'tag' => '[a-zA-Z0-9,_-]+',
                        'tagvalue' => '[a-zA-Z0-9,_-]+',
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
            'Contentinum\PluginViews' => 'Contentinum\Service\Plugins\ViewHelperServiceFactory',
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
            
            'Contentinum\Storage\Manager' => 'Contentinum\Factory\Storage\ManagerFactory',

            // controller factory
            'Contentinum\PageConfiguration' => 'Contentinum\Service\Pages\ConfigureServiceFactory',
            'Contentinum\PageOptions'  => 'Contentinum\Factory\PageOptionsFactory',
            'Contentinum\Preference' => 'Contentinum\Service\Domains\PreferenceServiceFactory',
            'Contentinum\PageHeaders' => 'Contentinum\Service\Domains\PageHeadersServiceFactory',
            'Contentinum\PublicPages' => 'Contentinum\Service\Pages\PublicServiceFactory',
            'Contentinum\AttributePages' => 'Contentinum\Service\Pages\AttributeServiceFactory',
            
            // controller abstract
            'Contentinum\Acl\DefaultRole' => 'Contentinum\Service\Acl\DefaultRoleServiceFactory',

            // controller
            'Contentinum\Modul' => 'Contentinum\Factory\Mapper\ModulFactory',

            'Contentinum\Htmlassets' => 'Contentinum\Service\Templates\HtmlassetsServiceFactory',
            'Contentinum\Htmllayouts' => 'Contentinum\Service\Templates\HtmllayoutsServiceFactory',
            'Contentinum\Widgets' => 'Contentinum\Service\Templates\WidgetsStylesServiceFactory',
            'Contentinum\GroupStyles' => 'Contentinum\Service\Templates\GroupStylesServiceFactory',
            'Contentinum\ContentStyles' => 'Contentinum\Service\Templates\ContentStylesServiceFactory',
            'Contentinum\TemplateAssign' => 'Contentinum\Service\Templates\TemplateAssignServiceFactory',

            'Contentinum\Medias' => 'Contentinum\Factory\Mapper\MediasFactory', 
            // mappers
            'Contentinum\Navigation' => 'Contentinum\Factory\Mapper\ModulNavigationFactory',

            'Contentinum\Blogs' => 'Contentinum\Factory\Mapper\ModulBlogFactory',
            'Contentinum\BlogReversed' => 'Contentinum\Factory\Mapper\ModulBlogReversedFactory',
            'Contentinum\BlogsActual' => 'Contentinum\Factory\Mapper\ModulBlogActualFactory',
            'Contentinum\BlogGroups' => 'Contentinum\Factory\Mapper\ModulBlogGroupsFactory', 
            'Contentinum\BlogsMonthly' => 'Contentinum\Factory\Mapper\ModulBlogsMonthlyFactory',
            'Contentinum\BlogsAnnually' => 'Contentinum\Factory\Mapper\ModulBlogsAnnuallyFactory',
            'Contentinum\SearchNews' => 'Contentinum\Factory\Mapper\ModulBlogSearchFactory',
            
            'Contentinum\MediaGroup' => 'Contentinum\Factory\Mapper\ModulMediaGroupFactory',   
             
            'Contentinum\FileGroup' => 'Contentinum\Factory\Mapper\ModulFileGroupFactory',   
            'Contentinum\AccountMembers' => 'Contentinum\Factory\Mapper\ModulAccountMembersFactory',   
            'Contentinum\Maps' => 'Contentinum\Factory\Mapper\ModulMapsFactory', 
            'Contentinum\Forms' => 'Contentinum\Factory\Mapper\ModulFormsFactory', 
            'Contentinum\Contact' => 'Contentinum\Factory\Mapper\ModulContactFactory',
            'Contentinum\Organisation' => 'Contentinum\Factory\Mapper\ModulOrganisationFactory',
            'Contentinum\ContactGroup' => 'Contentinum\Factory\Mapper\ModulContactGroupFactory',
            'Contentinum\IndexAccounts' => 'Contentinum\Factory\Mapper\ModulIndexAccountsFactory',

            'Contentinum\SearchForms' => 'Contentinum\Factory\Mapper\ModulSearchFormFactory',

            // factory
            'Recommendation\Forms' => 'Contentinum\Factory\Form\RecommendationFormFactory',
            'Search\Forms' => 'Contentinum\Factory\Form\SearchFormFactory',
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
            'Search' => 'Contentinum\Factory\Controller\SearchControllerFactory',
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
            'templates_htmlassets' =>  __DIR__ . '/../../../data/locale/etc/module/app/templates/assets',
            'templates_htmllayouts' => __DIR__ . '/../../../data/locale/etc/module/app/templates/layouts',

        ),
        'etc_cfg_files' => array(
            'app_pages' => __DIR__ . '/../../../data/locale/etc/module/app/pages.php',
            'content_template_assign' => __DIR__ . '/../../../data/locale/etc/module/app/templates/assigns',
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
            'contentinum_page_header' => array(
                'cache' => 'contentinum_page_header',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
                //'sortby' => 'host',
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
            'topnav' => 'Contentinum\Navigation',
            'mmenu' => 'Contentinum\Navigation',
            'multilevel' => 'Contentinum\Navigation',
            'newsarchive' => 'Contentinum\BlogsMonthly',
            'newsyeararchive' => 'Contentinum\BlogsAnnually',
            'blogs' => 'Contentinum\Blogs',
            'blogreversed' => 'Contentinum\BlogReversed',
            'news' => 'Contentinum\BlogsActual',
            'newsgroup' => 'Contentinum\BlogGroups',
            'navigation' => 'Contentinum\Navigation',
            'mediagroup' => 'Contentinum\MediaGroup',
            'filegroup' => 'Contentinum\FileGroup',
            'accountmembers' => 'Contentinum\AccountMembers',
            'maps' => 'Contentinum\Maps',
            'forms' => 'Contentinum\Forms',
            'microdataorganisation' => 'Contentinum\Organisation',
            'microdatagroup' => 'Contentinum\ContactGroup', 
            'microdatacontact' => 'Contentinum\Contact',
            'microdataaccountgroup' => 'Contentinum\IndexAccounts',
            'searchform' => 'Contentinum\SearchForms',
            
        ),    

        'viewhelper_plugins' => array(
            'topbar' => 'navigationtopbar',
            'topnav' => 'navigationtopnav',
            'mmenu' => 'navigationmmenu',
            'multilevel' => 'navigationmultilevel',
            'newsarchive' => 'newsarchivelist',
            'newsyeararchive' => 'newsarchiveyearlist',
            'news' => 'newsactual',
            'newsgroup' => 'newsactual',
            'blogs' => 'news',
            'blogreversed' => 'news',
            'navigation' => 'navigationbuild',
            'mediagroup' => 'mediagroup',
            'filegroup' => 'filegroup',
            'accountmembers' => 'accountmembers',
            'maps' => 'maps',
            'forms' => 'forms',
            'microdataorganisation' => 'microdataorganisation',
            'microdatagroup' =>  'microdataorganisationcontact',
            'microdatacontact' => 'microdatacontact',
            'microdataaccountgroup' => 'microdatacontactorganisation',
            'searchform' => 'searchform',    
        ),
        
        'default_plugins' => array(
            'searchform' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten durchsuchen',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Suchformular anzeigen:',
                                'empty_option' => 'Ergebnisseite',
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
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
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
            
            'microdatacontact' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief (Microdata)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kontakt auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\Contacts',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => array('lastName', 'firstName', 'objectName', 'businessTitle'),
                                        'sortby' => array('lastName' => 'ASC')
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_microdata',
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
                                'label' => 'Format',
                                'empty_option' => 'Please Select',
                                'value_options' => array(
                                    'standard' => 'Alles Anzeigen (Standard)',
                                    'organisation' => 'Organisation über Kontakt Anzeigen',
                                    'templatevalue' => 'Anzeige templateabhängig',
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
            
            
            'microdataorganisation' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief Organisation (Microdata)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Organisation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\Accounts',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => array('organisation', 'organisationExt'),
                                        'sortby' => array('organisation' => 'ASC')
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
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

            
            'microdataaccountgroup' => array(
                'resource' => 'intranet',
                'name' => 'Steckbriefe Organisationgruppe (Microdata)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Organisationgruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\IndexAccountGroups',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_microdata',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
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
                                'label' => 'Format',
                                'empty_option' => 'Please Select',
                                'value_options' => array(
                                    'organisation' => 'Organisation mit Kontakten Anzeigen',
                                    'organisationdirect' => 'Nur Organisation Anzeigen',
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

            
            
            'microdatagroup' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief Kontaktgruppe (Microdata)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kontaktgruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\IndexGroups',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_microdata',
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
                                'label' => 'Format',
                                'empty_option' => 'Please Select',
                                'value_options' => array(
                                    'standard' => 'Alles Anzeigen (Standard)',
                                    'organisation' => 'Organisation über Kontakt Anzeigen',
                                    'contact' => 'Kontakt der Organisation Anzeigen',
                                    'templatevalue' => 'Anzeige templateabhängig',
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
            'mmenu' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (mmenu)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
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
            'navigation' => array(
                'resource' => 'intranet',
                'name' => 'Navigation',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
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
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_navigation',
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

            'multilevel' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Multilevel)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
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
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
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
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'value_options' => array(
                                    'multilevel' => 'Multilevel Navigation',
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
            
            'topnav' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Bootstrap Topnav)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
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
                                    'topnav' => 'Responsive Topnav',
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
            'topbar' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Topbar)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
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
                                'label' => 'Bildergalerien auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMediaGroup',
                                        'sortby' => array('groupName' => 'ASC'),
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
                                
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_mediagroup',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
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
                                'label' => 'Dateigruppe auswählen',
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
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_filegroup',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
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
                'name' => 'Formulare',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Formular auswählen',
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
                            'options' => array(
                                'label' => 'Headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'h1' => 'Level 1',
                                    'h2' => 'Level 2',
                                    'h3' => 'Level 3',
                                    'h4' => 'Level 4',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                    
                            'attributes' => array(
                                'id' => 'modulFormat',
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
                'name' => 'Karten (Google Maps)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Karte auswählen',
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
                            'options' => array(
                                'label' => 'Headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'h1' => 'Level 1',
                                    'h2' => 'Level 2',
                                    'h3' => 'Level 3',
                                    'h4' => 'Level 4',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                    
                            'attributes' => array(
                                'id' => 'modulFormat',
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
                'name' => 'Nachrichten Archiv monatlich',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
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
                            'options' => array(
                                'label' => 'Format',
                                'empty_option' => 'No style',
                                
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_clientapp_newsarchive',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
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
            
            
            'newsyeararchive' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Archiv jährlich',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
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
            
            
            'newsgroup' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Gruppe Aktuell',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten Gruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentNameGroup',
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
            
            
            
            'news' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Aktuell',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
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
            
            'blogs' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
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
                                    '9999' => '&infin;'
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
            
            'blogreversed' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten (Reversed)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
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
                                    '9999' => '&infin;'
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
                            'options' => array(
                                'label' => 'Abgelaufene Nachrichten',
                                'value_options' => array(
                                    'todate' => 'Am Tag ausblenden',
                                    'totime' => 'Zur Uhrzeit ausblenden',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
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
                                    'listdatas' => 'Organisation Steckbriefe',
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
                                    '9999' => '&infin;'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
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
            
            

        )
    )
);