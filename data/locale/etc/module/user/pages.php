<?php
return array(
    '_default' => array(
        'layout' => 'user/layout',
        'template' => 'content/login',
        'title' => 'Login',
        'app' => array(
            'controller' => 'Mcuser\Controller\McuserController',
            'worker' => 'Mcuser\Model\Auth\User',
            'entity' => 'Contentinum\Entity\Users5',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
            'form' => 'Mcuser\Form\LoginFrom',
            'formaction' => '/login'
        )
    ),    
    'login' => array(
        'headline' => 'User Login',
        'scope' => 'login',
        'resource' => 'index',
        'label' => 'Login',
        'url' => 'login',
        'metaTitle' => 'Login',
        'metaDescription' => '',
        'robots' => 'index,follow',
        'language' => 'de',
        'content' => '',

    ),
    'logout' => array(
        'title' => 'Logout',
        'headline' => 'Logout',
        'scope' => 'logout',
        'resource' => 'index',
        'label' => 'Logout',
        'url' => 'logout',
        'metaTitle' => 'Logout',
        'metaDescription' => '',
        'robots' => 'index,follow',
        'language' => 'de',
        'content' => '',
    )    
);