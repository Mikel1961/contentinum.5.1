<?php
return array(
    
    '_default' => array(
        'splitQuery' => 1,
        'layout' => 'contentinum/layout',
        'template' => 'contentinum/application',
        'app' => array(
            'controller' => 'Contentinum\Controller\ApplicationController',
            'worker' => 'Contentinum\Mapper\Queries\Content',
            'entity' => 'Contentinum\Entity\WebContent',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),
    'newsaspdf' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'pdf/news',
        'app' => array(
            'controller' => 'Contentinum\Controller\PDFController',
            'worker' => 'Contentinum\Mapper\Pdf\News',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),
    'emailrecom' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'email/recommendation',
        'app' => array(
            'controller' => 'Contentinum\Controller\RecommendationController',
            'worker' => 'Contentinum\Mapper\Queries\Contributions',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),
    'sitemap.xml' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'contentinum/sitemap',
        'app' => array(
            'controller' => 'Contentinum\Controller\SitemapController',
            'worker' => 'Contentinum\Mapper\Sitemap',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),
    'feed' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'contentinum/feeds',
        'app' => array(
            'controller' => 'Contentinum\Controller\FeedController',
            'worker' => 'Contentinum\Mapper\Feeds\ContributionGroups',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),
    'api' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'api/response',
        'app' => array(
            'controller' => 'Contentinum\Controller\ApiController',
            'worker' => 'Contentinum\Mapper\Queries\Api',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    )                    
);