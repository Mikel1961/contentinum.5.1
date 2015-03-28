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
        'headline' => '<h2>Benutzer Login</h2>',
        'scope' => 'login',
        'resource' => 'index',
        'label' => 'Login',
        'url' => 'login',
        'metaTitle' => 'Login',
        'metaDescription' => '',
        'robots' => 'index,follow',
        'language' => 'de',
        'content' => '<p>Loggen Sie sich Bitte mit Ihrem Benutzernamen und Passwort ein.</p>',

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