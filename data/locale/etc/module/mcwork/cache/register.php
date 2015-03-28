<?php
return array(
    
    'acl_resource' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Recources access values list',
        'metas' => null
    ),
    
    'attribute_charset' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Charset list',
        'metas' => null
    ),
    
    'attribute_httpstatuscode' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'List of HTTP Status codes',
        'metas' => null
    ),
    
    'attribute_link_rel' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Link relationship attribute values',
        'metas' => null
    ),
    
    'attribute_link_target' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Link target attribute values',
        'metas' => null
    ),
    
    'attribute_publish' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Publish values list',
        'metas' => null
    ),
    
    'attribute_robots' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Robots values list',
        'metas' => null
    ),
    
    
    'mcwork_client_apps' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Client app runtime datas',
        'metas' => null    
    ),
    
    
    'mcwork_elements_buttons' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend form buttons',
        'metas' => null        
    ),
    
    'mcwork_elements_tableedit' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend table row toolbar',
        'metas' => null
    ), 

    'mcwork_elements_toolbar' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend table header toolbar',
        'metas' => null    
    ),
    
    
    'mcwork_form_decorators' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend form decorators',
        'metas' => null
    ),  

    'mcwork_form_rules' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend form rules',
        'metas' => null
    ), 

    'locale_i18n' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Locale list',
        'metas' => null
    ),  

    'locale_language' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Language list',
        'metas' => null
    ),    
    
    
    
    'content_groups' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Client app runtime datas',
        'metas' => null    
    ),
    
    
    'content_pages_links' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'List of pages and links',
        'metas' => null
    ),
    
    'mcwork_directory_accounts' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'List of directory accounts',
        'metas' => null    
    ),
    'mcwork_media' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'List of all medias',
        'metas' => null    
    
    ),
    
    
    'mcwork_pages' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Configuration',
        'label' => 'Backend pages configuration and content',
        'metas' => null
    ),    
    
    
    'mcwork_plugins' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'backend',
        'group' => 'Configuration',
        'label' => 'Buttons',
        'metas' => null
    ),   

    'template_assigns' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Configuration',
        'label' => 'Template assigns',
        'metas' => null    
    ),
    
    'templates_htmlwidgets' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Layout',
        'label' => 'Template Widgets',
        'metas' => null
    ),
    
    'template_types' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Layout',
        'label' => 'Template types',
        'metas' => null    
    
    ),
    
    
    'app_pages' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Public application configuration',
        'metas' => null
    ),    
    
    'contentinum_domain_preference' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Domain configuration',
        'metas' => null    
    ),
    
    'contentinum_attribute_pages' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Public page attributtes',
        'metas' => null    
    ),
    
    'contentinum_public_pages' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Public page datas',
        'metas' => null    
    ),
    
    'content_contribution_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Contribution template configuration',
        'metas' => null    
    ),  

    'content_group_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Contribution groups template configuration',
        'metas' => null
    ), 
    
    'content_widgets_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Page contribution template configuration',
        'metas' => null    
    ),

    'templates_htmllayouts' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Layout template configuration',
        'metas' => null        
    ),
    
    'content_form_decorators' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Public form decorators',
        'metas' => null    
    ),
    
    'opt_customer' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Customer configurations',
        'metas' => null        
    ),
    
    'user_form_decorators' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Login form decorators',
        'metas' => null
    ),  

    'user_pages' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'User default pages configuration and content',
        'metas' => null
    ),      

);