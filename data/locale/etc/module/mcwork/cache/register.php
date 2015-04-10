<?php
return array(
    
    'acl_resource' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Zugriffsliste auf Ressourcen (ACL)',
        'metas' => null
    ),
    
    'attribute_charset' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Zeichensätze',
        'metas' => null
    ),
    
    'attribute_httpstatuscode' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste HTTP Status Codes',
        'metas' => null
    ),
    
    'attribute_link_rel' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Link (rel) Attribute',
        'metas' => null
    ),
    
    'attribute_link_target' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Link (target) Attribute',
        'metas' => null
    ),
    
    'attribute_publish' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Publish) Attribute',
        'metas' => null
    ),
    
    'attribute_robots' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Robots) Attribute',
        'metas' => null
    ),
    
    
    'mcwork_client_apps' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Client Applikation-Konfigurationdaten',
        'metas' => null    
    ),
    
    
    'mcwork_elements_buttons' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Formular Buttons',
        'metas' => null        
    ),
    
    'mcwork_elements_tableedit' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Toolbar Tabellenreihe',
        'metas' => null
    ), 

    'mcwork_elements_toolbar' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Toolbar Tabellenkopf',
        'metas' => null    
    ),
    
    
    'mcwork_form_decorators' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Formular Decorators',
        'metas' => null
    ),  

    'mcwork_form_rules' => array(
        'cache' => 'Mcwork\Cache\Data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Formular Regeln',
        'metas' => null
    ), 

    'locale_i18n' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Locale) Attribute',
        'metas' => null
    ),  

    'locale_language' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Sprachen',
        'metas' => null
    ),    
    
    
    
    'content_groups' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Daten Inhaltsgruppen',
        'metas' => null    
    ),
    
    
    'content_pages_links' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Liste Seiten und Links',
        'metas' => null
    ),
    
    'mcwork_directory_accounts' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Lists Directory Daten',
        'metas' => null    
    ),
    'mcwork_media' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Liste aller Medien',
        'metas' => null    
    
    ),
    
    
    'mcwork_pages' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Configuration',
        'label' => 'Backend Seiten Konfiguration und Inhalte',
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
        'label' => 'Zuordnungen Templates',
        'metas' => null    
    ),
    
    'templates_htmlwidgets' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Layout',
        'label' => 'HTML Widgets',
        'metas' => null
    ),
    
    'template_types' => array(
        'cache' => 'Mcwork\Cache\Structures',
        'groupkey' => 'backend',
        'group' => 'Layout',
        'label' => 'Template Typen',
        'metas' => null    
    
    ),
    
    
    'app_pages' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Frontend Konfiguration Applikation',
        'metas' => null
    ),    
    
    'contentinum_domain_preference' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Domain Konfiguration',
        'metas' => null    
    ),
    
    'contentinum_attribute_pages' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Frontend Seiten Attribute',
        'metas' => null    
    ),
    
    'contentinum_public_pages' => array(
        'cache' => 'Contentinum\Cache\PublicContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Frontend Seiten',
        'metas' => null    
    ),
    
    'content_contribution_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Beitrags Templatekonfiguration',
        'metas' => null    
    ),  

    'content_group_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Beitragsgruppen Templatekonfiguration',
        'metas' => null
    ), 
    
    'content_widgets_styles' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Seitenbeiträge Templatekonfiguration',
        'metas' => null    
    ),

    'templates_htmllayouts' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Template configuration',
        'label' => 'Layout Templatekonfiguration',
        'metas' => null        
    ),
    
    'content_form_decorators' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Frontend Formular Decorators',
        'metas' => null    
    ),
    
    'opt_customer' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Kundenkonfiguration',
        'metas' => null        
    ),
    
    'user_form_decorators' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'Login Formular Decorators',
        'metas' => null
    ),  

    'user_pages' => array(
        'cache' => 'Contentinum\Cache\StrutureContent',
        'groupkey' => 'frontend',
        'group' => 'Configuration',
        'label' => 'User Standardseiten Konfiguration und Inhalte',
        'metas' => null
    ),      

);