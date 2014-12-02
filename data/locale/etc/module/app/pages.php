<?php
return array(
    
    '_default' => array(
        'layout' => 'contentinum/layout',
        'template' => 'contentinum/application',
        'app' => array(
            'controller' => 'Contentinum\Controller\ApplicationController',
            'worker' => 'Contentinum\Mapper\Content',
            'entity' => 'Contentinum\Entity\WebContent',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    )
);