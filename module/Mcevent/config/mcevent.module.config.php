<?php
namespace Mcevent;

return array(
    'navigation' => array(
        'appsmenu' => array(
            array(
                'label' => 'Termine',
                'uri' => '/mcevent/eventdate',
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    array(
                        'label' => 'Kalender',
                        'uri' => '/mcevent/calendar',
                        'resource' => 'publisherresource'
                    ),
                    array(
                        'label' => 'Kalender Gruppen',
                        'uri' => '/mcevent/calendargroup',
                        'resource' => 'publisherresource'
                    )
                )
            )
        )
    ),
    'router' => array(
        'routes' => array(
            'mcevent' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/mcevent',
                    'defaults' => array(
                        'controller' => 'Mcevent'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'mcevent_app' => array(
                        'type' => 'Zend\Mvc\Router\Http\Segment',
                        'options' => array(
                            'route' => '/:mceventpage',
                            'constraints' => array(
                                'mceventpage' => '[a-zA-Z0-9._-]+'
                            ),
                            'defaults' => array(
                                'controller' => 'Mcevent'
                            )
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'mcevent_app_category' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/category[/][:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcevent'
                                    )
                                )
                            ),
                            'mcevent_app_add' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/add[/][:cat]',
                                    'constraints' => array(
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcevent\Form'
                                    )
                                )
                            ),
                            'mcevent_app_edit' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/edit[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcevent\Form'
                                    )
                                )
                            ),
                            'mcevent_app_delete' => array(
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => array(
                                    'route' => '/delete[/][:id][/][:cat]',
                                    'constraints' => array(
                                        'id' => '[0-9]+',
                                        'cat' => '[0-9]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Mcevent\Form'
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
            'Mcevent\PageOptions' => 'Mcevent\Factory\PageOptionsFactory',
            'Mcevent\Pages' => 'Mcevent\Service\Pages\DefaultServiceFactory',
            'Mcevent\StandardForms' => 'Mcevent\Factory\Form\MceventFormFactory',
            'Mcevent\Dates' => 'Mcevent\Factory\Mapper\ModulDatesFactory',
            'Mcevent\ActualDates' => 'Mcevent\Factory\Mapper\ModulActualDatesFactory',
            'Mcevent\ActualGroupDates' => 'Mcevent\Factory\Mapper\ModulActualGroupDatesFactory',
            'Mcevent\ModulCalcAnnuallyFactory' => 'Mcevent\Factory\Mapper\ModulCalcAnnuallyFactory',
            'Mcevent\Locations' => 'Mcevent\Service\Accounts\LocationServiceFactory'
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Mcevent' => 'Mcevent\Factory\Controller\MceventControllerFactory',
            'Mcevent\Form' => 'Mcevent\Factory\Controller\MceventControllerFactory'
        )
    ),
    'contentinum_config' => array(
        'etc_cfg_files' => array(
            'mcevent_pages' => __DIR__ . '/../../../data/locale/etc/module/mcevent/pages.php'
        ),        
        'db_cache_keys' => array(
            'mcevent_location' => array(
                'cache' => 'mcevent_location',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\Accounts',
                'savecache' => false
            )
        ),       
        'key_plugins' => array(
            'eventdates' => 'Mcevent\Dates',
            'actualdates' => 'Mcevent\ActualDates',
            'actualgroupdates' => 'Mcevent\ActualGroupDates',
            'eventyeararchive' => 'Mcevent\ModulCalcAnnuallyFactory',
        ),        
        'viewhelper_plugins' => array(
            'eventdates' => 'eventdates',
            'actualdates' => 'eventdates',
            'actualgroupdates' => 'eventdates',
            'eventyeararchive' => 'eventyeararchive',
        ),        
        'default_plugins' => array(            
            'actualgroupdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalender Gruppe (Aktuelle Termine)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventGroup',
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
            'eventdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalender',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                                'label' => 'Ansicht',
                                'value_options' => array(
                                    'std' => 'Standard',
                                    'displaymonthname' => 'Anzeige Monatsüberschrift',
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
            'actualdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalender (Aktuelle Termine)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
            ) ,           
       
        'eventyeararchive' => array(
            'resource' => 'intranet',
            'name' => 'Kalender Archiv jaehrlich',
            'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/valueoptions',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                            'label' => 'Seite',
                            'deco-row' => 'text'
                        ),
                        'type' => 'text',
        
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
        ),        
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),    
    'view_manager' => array(
        'template_path_stack' => array(
            'mcevent' => __DIR__ . '/../view'
        )
    ),
    'assetic_configuration' => array(
        'controllers' => array(
            'Mcevent' => array(
                '@mcworktable',
                '@head_custom',
                '@tablescripts'
            ),
            'Mcevent\Form' => array(
                '@mcworkform',
                '@head_custom',
                '@formscripts'
            )
        )
    )
);