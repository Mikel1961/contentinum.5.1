<?php
return array(
    
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Mcwork_Controller_User',
                'uri' => '#',
                'id' => 'usr_id',
                'order' => 99,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    /*
                    array(
                        'label' => 'Profil',
                        'route' => 'mcuser_profil',
                        'resource' => 'memberresource'
                    ),
                    array(
                        'label' => 'Avatar',
                        'route' => 'mcuser_avatar',
                        'resource' => 'memberresource'
                    ),*/
                    array(
                        'label' => 'Logout',
                        'route' => 'mcuser_logout',
                        'resource' => 'memberresource'
                    )
                )
            )
        )
        
    ),
    'router' => array(
        'routes' => array(
            'mcuser' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'controller' => 'Mcuser',
                    )
                )
            ),
            
            'mcuser_login' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/login[/][:id]',
                    'constraints' => array(
                        'id' => '[a-z]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Mcuser',
                    )
                )
            ),
            
            'mcuser_profil' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user-profil',
                    'defaults' => array(
                        'controller' => 'Mcuser',
                    )
                )
            ),
            'mcuser_avatar' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/avatar',
                    'defaults' => array(
                        'controller' => 'Mcuser',
                    )
                )
            ),
            'mcuser_logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'Mcuser\Logout'
                    )
                )
            )
        )
        
    ),
    'service_manager' => array(
        'invokables' => array(
            'user_auth_adapter' => 'Mcuser\Authentication\Adapter\Database',
        ),
        'factories' => array(
            'User\PageOptions' => 'Mcuser\Factory\PageOptionsFactory',
            'User\Pages' => 'Mcuser\Service\Pages\DefaultsServiceFactory',
            'User\FormDecorators' => 'Mcuser\Service\Form\DecoratorsServiceFactory',
            'User\FormLogin' => 'Mcuser\Factory\Form\LoginFormFactory',
            'User\Identity'   => 'Mcuser\Factory\IdentityFactory',
            'User\Authentication'   => 'Mcuser\Factory\AuthenticationServiceFactory',            
            'User\Authentication\Adapter'   => 'Mcuser\Authentication\Factory\AdapterServiceFactory',
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Mcuser' => 'Mcuser\Factory\Controller\McuserControllerFactory',
            'Mcuser\Logout' => 'Mcuser\Factory\Controller\LogoutControllerFactory',
        ),
    ),       
    'view_manager' => array(
        'template_map' => array(
            'user/layout' => __DIR__ . '/../../../data/locale/etc/module/user/layout/login.phtml'
        ),
        'template_path_stack' => array(
            'mcuser' => __DIR__ . '/../view'
        )
    ),
    'contentinum_config' => array(
        'etc_cfg_files' => array(
            'user_pages' => __DIR__ . '/../../../data/locale/etc/module/user/pages.php',
            'user_form_decorators' => __DIR__ . '/../../../data/locale/etc/module/user/form/decorators.php',
        )
    )
);