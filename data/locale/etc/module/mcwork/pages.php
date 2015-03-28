<?php
return array(
    '_default' => array(
        'splitQuery' => 4,
        'resource' => 'index',
        'title' => 'contentinum5',
        'bodyTagAttribs' => '',
        'headline' => '',
        'columnright' => '',
        'subheadline' => '<i class="fa fa-recorder"></i>',
        'content' => '',
        'footer' => '',
        'template' => '',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => '',
        'tableedit' => '',
        'templateWidget' => '<div class="row"><div class="large-6 columns">	{TEMPLATE_HEADER} </div><div class="large-6 columns"> {TEMPLATE_TOOLBAR} </div></div><div id="mcworkcontent" role="main"><div class="large-12 columns"> {TEMPLATE_CONTENT} </div></div>',
        'bodyScriptFiles' => '',
        'app' => array(
            'controller' => '',
            'worker' => '',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
            'entity' => ''
        )
    ),
    
    '/mcwork/dashboard' => array(
        'resource' => 'authorresource',
        'title' => 'Dashboard',
        'bodyTagAttribs' => array(
            'attr' => array(
                'id' => 'mcworkdashboard'
            )
        ),
        'headline' => 'Dashboard',
        'template' => 'content/list/dashboard',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Dashboard',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        )
    ),
    
    '/mcwork/importdata' => array(
        'resource' => 'authorresource',
        'title' => 'Dashboard',
        'bodyTagAttribs' => array(
            'attr' => array(
                'id' => 'importdata'
            )
        ),
        'headline' => 'Import data',
        'template' => 'content/list/importdata',
        'app' => array(
            'controller' => 'Mcwork\Controller\ImportController',
            'worker' => 'Mcwork\Mapper\Dashboard',
            'entity' => 'Contentinum\Entity\WebPagesContent',           
        )
    ),    
    
    '/mcwork/services/application' => array(
        'resource' => 'authorresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\ClientController',
            'worker' => 'ContentinumComponents\Mapper\Worker'
        )
    ),
    
    
    '/mcwork/pages' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Pages',
        'headline' => 'Pages',
        'template' => 'content/list/pages',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages',
            'entity' => 'Contentinum\Entity\WebPagesParameter'
        )
    ),
    
    
    
    '/mcwork/pages/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Pages',
        'headline' => 'add_Pages',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Page',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Page',
            'formaction' => '/mcwork/pages/add',
            'formattributes' => array(
                'data-rules' => 'pages',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webPreferences' => '1',
                'robots' => 'index,follow',
                'language' => 'de',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/pages'
        )
    ),
    
    '/mcwork/pages/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Pages',
        'headline' => 'edit_Pages',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Page',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageEdit',
            'formaction' => '/mcwork/pages/edit',
            'formattributes' => array(
                'data-rules' => 'pages',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pages'
        )
    ),
    
    '/mcwork/pages/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'hasEntries' => array(
                'webPages' => array(
                    'tablename' => 'Contentinum\Entity\WebPagesContent',
                    'column' => 'webPages'
                ),

                'webPages2' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webPages'
                )
            ),                        
    
            'settoroute' => '/mcwork/pages'
        )
    ),    
    
    
    
    
    '/mcwork/links' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Links',
        'headline' => 'Links',
        'template' => 'content/list/links',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Links',
            'entity' => 'Contentinum\Entity\WebPagesParameter'
        )
    ),
    
    
    
    '/mcwork/links/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Links',
        'headline' => 'add_Links',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Links',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Links',
            'formaction' => '/mcwork/links/add',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webPreferences' => '1',
                'robots' => 'index,follow',
                'htmlwidgets' => 'content',
                'language' => 'de',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/links'
        )
    ),
    
    '/mcwork/links/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Links',
        'headline' => 'edit_Links',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Links',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Links',
            'formaction' => '/mcwork/links/edit',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/links'
        )
    ),
    
    '/mcwork/links/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            
            'hasEntries' => array(
            
                'webPages' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webPages'
                )
            ),            
    
            'settoroute' => '/mcwork/links'
        )
    ),    
    
    
    
    '/mcwork/pageattribute' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'PageAttribute',
        'headline' => 'PageAttribute',
        'template' => 'content/list/pageattributes',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pageattributes',
            'entity' => 'Contentinum\Entity\WebPagesAttributes'
        )
    ),
    
    
    
    '/mcwork/pageattribute/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_PageAttribute',
        'headline' => 'add_PageAttribute',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Pageattribute',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageAttribute',
            'formaction' => '/mcwork/pageattribute/add',
            'formattributes' => array(
                'data-rules' => 'pageattribute',
                'data-process' => 'add',
            ),
            'populate' => array(
                'charset' => 'utf-8',
                'metaViewport' => 'width=device-width, initial-scale=1.0',
            ),
            'settoroute' => '/mcwork/pageattribute'
        )
    ),
    
    '/mcwork/pageattribute/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_PageAttribute',
        'headline' => 'edit_PageAttribute',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Pageattribute',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageAttribute',
            'formaction' => '/mcwork/pageattribute/edit',
            'formattributes' => array(
                'data-rules' => 'pageattribute',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pageattribute'
        )
    ),
    
    '/mcwork/pageattribute/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',    
            'settoroute' => '/mcwork/pageattribute'
        )
    ),    
    
    
    '/mcwork/pageheader' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Seiten Header Links',
        'headline' => 'Seiten Header Links',
        'template' => 'content/list/pageheaders',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\PagesHeadlinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks'
        )
    ),
    
    
    
    '/mcwork/pageheader/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Seiten Header Link einfügen',
        'headline' => 'Seiten Header Link einfügen',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\PageHeadlinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageHeadMetas',
            'formaction' => '/mcwork/pageheader/add',
            'formattributes' => array(
                'data-rules' => 'pageheader',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/pageheader'
        )
    ),
    
    '/mcwork/pageheader/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Seiten Header Link bearbeiten',
        'headline' => 'Seiten Header Link bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageHeadMetas',
            'formaction' => '/mcwork/pageheader/edit',
            'formattributes' => array(
                'data-rules' => 'pageheader',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pageheader'
        )
    ),
    
    '/mcwork/pageheader/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'settoroute' => '/mcwork/pageheader'
        )
    ),    
    
    
    '/mcwork/pagecontent' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'contributionProperties',
        'headline' => 'contributionProperties',
        'template' => 'content/list/pagecontents',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pagecontent',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        )
    ),
    
    
    '/mcwork/pagecontent/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'contributionProperties',
        'headline' => 'contributionProperties',
        'template' => 'content/list/pagecategories',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\PageCategories',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        )
    ),    
    
    
    '/mcwork/pagecontent/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_ContributionProperties',
        'headline' => 'edit_ContributionProperties',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\ContributionGroup',
            'entity' => 'Contentinum\Entity\WebPagesContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageContent',
            'formaction' => '/mcwork/pagecontent/edit',
            'formattributes' => array(
                'data-rules' => 'pagecontent',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pagecontent'
        )
    ),
    
    '/mcwork/contentgroup/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Contentgroup',
        'headline' => 'Contentgroup',    
        'template' => 'content/list/contentgroupcategories',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\ContentGroupCategories',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        )        
    
    ),
    

    '/mcwork/contentgroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Contentgroup',
        'headline' => 'edit_Contentgroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\ContentGroups',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\PageContentGroup',
            'formaction' => '/mcwork/contentgroup/edit',
            'formattributes' => array(
                'data-rules' => 'contentgroup',
                'data-process' => 'edit',
            ),
    
    
            'settoroute' => '/mcwork/pagecontent'
        )
    ),    
    
    
    '/mcwork/contentgroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\DissolveGroup',
            'entity' => 'Contentinum\Entity\WebContentGroups',
    
            'settoroute' => '/mcwork/pagecontent'
        )
    ), 

    
    '/mcwork/namegroup' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Name Nachrichten Gruppe',
        'headline' => 'Name Nachrichten Gruppe',
        'template' => 'content/list/namenewsgroup',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\NameNewsGroup',
            'entity' => 'Contentinum\Entity\WebContentNameGroup'
        )
    ),
    
    '/mcwork/namegroup/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Nachrichten Gruppe erstellen',
        'headline' => 'Nachrichten Gruppe erstellen',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContentNameGroup',
            'formaction' => '/mcwork/namegroup/add',
            'settoroute' => '/mcwork/namegroup'
        )
    ),
    
    '/mcwork/namegroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Nachrichten Gruppe bearbeiten',
        'headline' => 'Nachrichten Gruppe bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContentNameGroup',
            'formaction' => '/mcwork/namegroup/edit',
            'settoroute' => '/mcwork/namegroup'
        )
    ),
    
    '/mcwork/namegroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
    
            'hasEntries' => array(
                'namegroup' => array(
                    'tablename' => 'Contentinum\Entity\WebContentIndexgroup',
                    'column' => 'groups'
                ),
            ),
    
            'settoroute' => '/mcwork/namegroup'
        )
    ),
    
    '/mcwork/namegroupindex/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Nachrichten in Gruppen',
        'headline' => 'Nachrichten in Gruppen',
        'template' => 'content/list/namenewsgroupindex',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\NameNewsGroupIndex',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup'
        )
    ),
    
    '/mcwork/namegroupindex/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Nachrichten in Gruppe einbinden',
        'headline' =>  'Nachrichten in Gruppe einbinden',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup',
            'targetentities' => array(
                'groups' => 'Contentinum\Entity\WebContentNameGroup',
                'indexgroup' => 'Contentinum\Entity\WebContentGroups',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContentNameGroupIndex',
            'formaction' => '/mcwork/namegroupindex/add',
            'settoroute' => '/mcwork/namegroupindex',
    
            'populateFromRoute' => array('cat' => 'groups'),
        )
    ),
    
    '/mcwork/namegroupindex/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Nachrichten in Gruppe bearbeiten',
        'headline' => 'Nachrichten in Gruppe bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup',
            'targetentities' => array(
                'groups' => 'Contentinum\Entity\WebContentNameGroup',
                'indexgroup' => 'Contentinum\Entity\WebContentGroups',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContentNameGroupIndex',
            'formaction' => '/mcwork/namegroupindex/edit',
            'settoroute' => '/mcwork/namegroupindex',
        )
    ),    
    
    
    
    
    
    '/mcwork/contribution' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Contribution',
        'headline' => 'Contribution',
        'template' => 'content/list/contributions',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Contributions',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        )
    ),
    
    '/mcwork/contribution/trashcontent' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Contribution',
        'headline' => 'Contribution',
        'template' => 'content/trash/contribution',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Trash',
            'entity' => 'Contentinum\Entity\WebContent'
        )
    ),    
    
    
    
    '/mcwork/contribution/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Contribution',
        'headline' => 'add_Contribution',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/contribution.js',
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Contribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Contribution',
            'formaction' => '/mcwork/contribution/add',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webMediasId' => '1',
                'htmlwidgets' => 'content',
                'adjustments' => 'CONTENT',
                'mediaStyle' => 'media-image',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/contribution'
        )
    ),
    
    '/mcwork/contribution/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Contribution',
        'headline' => 'edit_Contribution',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/contribution.js',
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Contribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContributionEdit',
            'formaction' => '/mcwork/contribution/edit',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/contribution'
        )
    ),
    
    
    '/mcwork/contribution/recycle' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'recycle_Contribution',
        'headline' => 'recycle_Contribution',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array( 
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/contribution.js',
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Recycle\Contribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContributionRecycle',
            'formaction' => '/mcwork/contribution/recycle',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'recycle',
            ),
            'settoroute' => '/mcwork/contribution/trashcontent'
        )
    ),    
    
    
    '/mcwork/contribution/trash' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Contribution',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/contribution'
        )
    ), 

    
    '/mcwork/contribution/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Force',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/contribution'
        )
    ),    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    '/mcwork/contributiongroup' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'newsGroup',
        'headline' => 'newsGroup',
        'template' => 'content/list/contributiongroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Newsgroup',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        )
    ),
    
    
    
    '/mcwork/contributiongroup/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_NewsGroup',
        'headline' => 'add_NewsGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\NewsGroup',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webContent' => 'Contentinum\Entity\WebContent',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\NewsGroup',
            'formaction' => '/mcwork/contributiongroup/add',
            'formattributes' => array(
                'data-rules' => 'contributiongroup',
                'data-process' => 'add',
            ),
            'populate' => array(
                'numberCharacterTeaser' => '250',
                'htmlwidgets' => 'content',
                'tplAssign' => 'allcontent',
                
            ),
            'settoroute' => '/mcwork/contributiongroup'
        )
    ),
    
    '/mcwork/contributiongroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_NewsGroup',
        'headline' => 'edit_NewsGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\NewsGroup',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webContent' => 'Contentinum\Entity\WebContent',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\NewsGroupEdit',
            'formaction' => '/mcwork/contributiongroup/edit',
            'formattributes' => array(
                'data-rules' => 'contributiongroup',
                'data-process' => 'edit',
            ),
            'populateSerializeFields' => array('groupParams'),
                     
            'populateentity' => array(
                'webContentgroup' => array(
                    'entity' => 'Contentinum\Entity\WebPagesContent',
                    'columns' => array('webPages'),
                ),
            ),
            
            
            'settoroute' => '/mcwork/contributiongroup'
        )
    ),
    
    '/mcwork/contributiongroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Trash',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/contributiongroup'
        )
    ),    
    
    
    
    '/mcwork/news' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'News',
        'headline' => 'News',
        'template' => 'content/list/news',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\News',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        )
    ),
    
    
    
    '/mcwork/news/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_News',
        'headline' => 'add_News',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/news.js',
                '/assets/app/tinymce/mcwork/newsgrp.js'
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\News',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),            
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\News',
            'formaction' => '/mcwork/news/add',
            'formattributes' => array(
                'data-rules' => 'news',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
				'webMediasId' => '1',
				'htmlwidgets' => 'content',
				'mediaStyle' => 'media-image',
				'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/news'
        )
    ),
    
    '/mcwork/news/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_News',
        'headline' => 'edit_News',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/news.js',
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\News',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),            
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\News',
            'formaction' => '/mcwork/news/edit',
            'formattributes' => array(
                'data-rules' => 'news',
                'data-process' => 'edit',
            ),
            
            'populateentity' => array(
                'webContent' => array(
                    'entity' => 'Contentinum\Entity\WebContentGroups',
                    'columns' => array('webContentgroup'),
                ),
            ),         
            'settoroute' => '/mcwork/news'
        )
    ),
    
    '/mcwork/news/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\News',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/news'
        )
    ),

    // ------------------------
    
    
    '/mcwork/navigation' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Navigation structure',
        'headline' => 'Navigation structure',
        'template' => 'content/list/navigations',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Navigations',
            'entity' => 'Contentinum\Entity\WebNavigations'
        )
    ),
    
    
    
    '/mcwork/navigation/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Navigation',
        'headline' => 'add_Navigation',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Navigation',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Navigation',
            'formaction' => '/mcwork/navigation/add',
            'formattributes' => array(
                'data-rules' => 'navigation',
                'data-process' => 'add',
            ),
            'populate' => array(
                'menue' => 'helper',
            ),
            'settoroute' => '/mcwork/navigation'
        )
    ),
    
    '/mcwork/navigation/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Navigation',
        'headline' => 'edit_Navigation',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Navigation',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\NavigationEdit',
            'formaction' => '/mcwork/navigation/edit',
            'formattributes' => array(
                'data-rules' => 'navigation',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/navigation'
        )
    ),
    
    '/mcwork/navigation/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'hasEntries' => array(
                'webNavigations' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webNavigations'
                ),
            ),
    
            'settoroute' => '/mcwork/navigation'
        )
    ),
    
    '/mcwork/menue/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Menue',
        'headline' => 'Menue',
        'template' => 'content/list/navigationmenues',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\NavigationMenues',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
        ),
    ),
    
    
    
    '/mcwork/menue/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Menue',
        'headline' => 'add_Menue',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\NavigationMenue',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\NavigationMenue',
            'formaction' => '/mcwork/menue/add',
            'formattributes' => array(
                'data-rules' => 'navigationcategories',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/menue',
            'populate' => array(
                'resource' => 'index',
                'publish' => 'yes',
            ),
            'populateFromRoute' => array('cat' => 'webNavigations'),
        )
    ),
    
    '/mcwork/menue/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Menue',
        'headline' => 'edit_Menue',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\NavigationMenue',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\NavigationMenue',
            'formaction' => '/mcwork/menue/edit',
            'formattributes' => array(
                'data-rules' => 'navigationcategories',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/menue'
        )
    ),
    
    '/mcwork/menue/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\NavigationMenue',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'settoroute' => '/mcwork/menue/category',
        )
    ),

    // ----------------------------
    
    
    '/mcwork/form' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Form',
        'headline' => 'Form',
        'template' => 'content/list/forms',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Forms',
            'entity' => 'Contentinum\Entity\WebForms'
        )
    ),
    
    
    
    '/mcwork/form/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Form',
        'headline' => 'add_Form',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Form',
            'entity' => 'Contentinum\Entity\WebForms',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Designing',
            'formaction' => '/mcwork/form/add',
            'formattributes' => array(
                'data-rules' => 'form',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'htmlwidgets' => 'content',
            ),
            'settoroute' => '/mcwork/form'
        )
    ),
    
    '/mcwork/form/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Form',
        'headline' => 'edit_Form',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Form',
            'entity' => 'Contentinum\Entity\WebForms',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Designing',
            'formaction' => '/mcwork/form/edit',
            'formattributes' => array(
                'data-rules' => 'form',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/form'
        )
    ),
    
    '/mcwork/form/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebForms',
            'hasEntries' => array(
                'webForms' => array(
                    'tablename' => 'Contentinum\Entity\WebFormsField',
                    'column' => 'webForms'
                ),
            ),
    
            'settoroute' => '/mcwork/form'
        )
    ),
    
    '/mcwork/formfields/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Formfields',
        'headline' => 'Formfields',
        'template' => 'content/list/formfields',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Formfields',
            'entity' => 'Contentinum\Entity\WebFormsField',
        ),
    ),
    
    
    
    '/mcwork/formfields/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Formfields',
        'headline' => 'add_Formfields',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Formfield',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'targetentities' => array(
                'webForms' => 'Contentinum\Entity\WebForms',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\DesigningFields',
            'formaction' => '/mcwork/formfields/add',
            'formattributes' => array(
                'data-rules' => 'formfields',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/formfields',
            'populate' => array(
                'publish' => 'yes',
                'fieldRequired' => 'no',
                'resource' => 'index',
                'webMedias' => '1'
            ),
            'populateFromRoute' => array('cat' => 'webForms'),
        )
    ),
    
    '/mcwork/formfields/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Formfields',
        'headline' => 'edit_Formfields',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Formfield',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'targetentities' => array(
                'webForms' => 'Contentinum\Entity\WebForms',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\DesigningFields',
            'formaction' => '/mcwork/formfields/edit',
            'formattributes' => array(
                'data-rules' => 'formfields',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/formfields'
        )
    ),
    
    '/mcwork/formfields/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'settoroute' => '/mcwork/formfields',
            'hasEntries' => array(
                'formField' => array(
                    'tablename' => 'Contentinum\Entity\WebFieldOptions',
                    'column' => 'formField'
                ),
            ),            
        )
    ),
    
    
    '/mcwork/fieldsoption/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Fieldoptions',
        'headline' => 'Fieldoptions',
        'template' => 'content/list/formfieldoptions',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Formfieldoptions',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
        ),
    ),
    
    
    
    '/mcwork/fieldsoption/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Fieldoptions',
        'headline' => 'add_Fieldoptions',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Formfieldoption',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'targetentities' => array(
                'formField' => 'Contentinum\Entity\WebFormsField',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\DesigningFieldOptions',
            'formaction' => '/mcwork/fieldsoption/add',
            'formattributes' => array(
                'data-rules' => 'fieldsoption',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/fieldsoption',
            'populateFromRoute' => array('cat' => 'formField'),
        )
    ),
    
    '/mcwork/fieldsoption/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Fieldoptions',
        'headline' => 'edit_Fieldoptions',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Formfieldoption',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'targetentities' => array(
                'formField' => 'Contentinum\Entity\WebFormsField',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\DesigningFieldOptions',
            'formaction' => '/mcwork/fieldsoption/edit',
            'formattributes' => array(
                'data-rules' => 'fieldsoption',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/fieldsoption'
        )
    ),
    
    '/mcwork/fieldsoption/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'settoroute' => '/mcwork/fieldsoption',
        )
    ),    

    // ----------------------------
    
    
    '/mcwork/maps' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Maps',
        'headline' => 'Maps',
        'template' => 'content/list/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Maps',
            'entity' => 'Contentinum\Entity\WebMaps'
        )
    ),    
    
    
    
    '/mcwork/maps/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Maps',
        'headline' => 'add_Maps',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/maps.js'
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Maps',
            'entity' => 'Contentinum\Entity\WebMaps',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Maps',
            'formaction' => '/mcwork/maps/add',
            'formattributes' => array(
                'data-rules' => 'maps',
                'data-process' => 'add',
            ),  
            'populate' => array(
                'centerlatitude' => '51.165691',
                'centerlongitude' => '10.451526000000058',
                'startzoom' => '6',
            ),                      
            'settoroute' => '/mcwork/maps'
        )
    ),
    
    '/mcwork/maps/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Maps',
        'headline' => 'edit_Maps',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/maps.js'
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Maps',
            'entity' => 'Contentinum\Entity\WebMaps',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Maps',
            'formaction' => '/mcwork/maps/edit',
            'formattributes' => array(
                'data-rules' => 'maps',
                'data-process' => 'add',
            ),                       
            'settoroute' => '/mcwork/maps'
        )
    ),
    
    '/mcwork/maps/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebMaps',
            'hasEntries' => array(
                'webMaps' => array(
                    'tablename' => 'Contentinum\Entity\WebMapsData',
                    'column' => 'webMaps'
                ),
            ),            
            
            'settoroute' => '/mcwork/maps'
        )
    ),    
    
    '/mcwork/mapmarker/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Mapdata',
        'headline' => 'Mapdata',
        'template' => 'content/list/mapmarker',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Mapmarker',
            'entity' => 'Contentinum\Entity\WebMapsData',
        ),
        'populateFromRoute' => array('cat' => 'webMaps'),
    ),
    
    
    
    '/mcwork/mapmarker/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Mapdata',
        'headline' => 'add_Mapdata',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/mapmarker.js'
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Marker',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'targetentities' => array(
                'webMaps' => 'Contentinum\Entity\WebMaps',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Mapmarker',
            'formaction' => '/mcwork/mapmarker/add',
            'formattributes' => array(
                'data-rules' => 'mapmarker',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/mapmarker',
            'populate' => array(
                'webMedias' => '1',
                'latitude' => '51.165691',
                'longitude' => '10.451526000000058'
            ),
            'populateFromRoute' => array('cat' => 'webMaps'),            
        )
    ),
    
    '/mcwork/mapmarker/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Mapdata',
        'headline' => 'edit_Mapdata',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/mapmarker.js'
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Marker',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'targetentities' => array(
                'webMaps' => 'Contentinum\Entity\WebMaps',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Mapmarker',
            'formaction' => '/mcwork/mapmarker/edit',
            'formattributes' => array(
                'data-rules' => 'mapmarker',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/mapmarker'
        )
    ),
    
    '/mcwork/mapmarker/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'settoroute' => '/mcwork/mapmarker'
        )
    ),    
    
    '/mcwork/medias/public' => array(
        'splitQuery' => 4,
        'resource' => 'publisherresource',
        'headTitle' => 'Medias',
        'headline' => 'Medias',
        'template' => 'content/list/medias',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsPublic',
            'services' => array(
                'medias' => 'Mcwork\Media',
                'assigntags' => 'Media\Tags\Assign',
                'mediapath' => 'Media\Path',
            )
        )
    ),

    
    
    
    '/mcwork/files/denied' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'NoPublicFiles',
        'headline' => 'Files',
        'template' => 'content/list/files',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsDenied',
            'services' => array(
                'medias' => 'Mcwork\Media',
                'assigntags' => 'File\Tags\Assign',
            )
        )
    ),
    
    '/mcwork/files/upload' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'NoPublicFiles',
        'headline' => 'Files',
        'template' => 'content/response/upload',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\FsUploadController',
            'worker' => 'Mcwork\Model\FileSystem\Upload',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsDenied'
        )
    ),
    
    '/mcwork/files/multipleupload' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'PublicFiles',
        'headline' => 'Files',
        'template' => 'content/response/json',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\FsMultipleUploadController',
            'worker' => 'Mcwork\Model\FileSystem\MultipleUpload',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsPublic'
        )
    ),    
    
    '/mcwork/files/delete' => array(
        'resource' => 'publisherresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Medias',
            'entitymanager' => '',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/files/denied',
            
            'targetentities' => array(
                'webMediasId' => 'Contentinum\Entity\WebMedias'
            )
        )
    ),
    
    '/mcwork/medias/delete' => array(
        'resource' => 'publisherresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Files',
            'entitymanager' => '',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/medias/public',
    
            'targetentities' => array(
                'webMediasId' => 'Contentinum\Entity\WebMedias'
            )
        )
    ), 

    '/mcwork/medias/download' => array(
    
        'resource' => 'memberresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\DownloadController',
            'worker' => 'Mcwork\Mapper\Media',
            'entity' => 'Contentinum\Entity\WebMedias',
            //'settoroute' => '/mcwork/medias/public',
        )
    ),    
    
    '/mcwork/files/download' => array(
        
        'resource' => 'index',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\DownloadController',
            'worker' => 'Mcwork\Mapper\Media',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/files/denied',
        )
    ),
    
    '/mcwork/files/makedir' => array(
    
        'resource' => 'publisherresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FsController',
            'worker' => 'Mcwork\Model\FileSystem\Directory',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsPublic',
            'settoroute' => '/mcwork/medias/public',
        )
    ),

    '/mcwork/files/rmdir' => array(
    
        'resource' => 'publisherresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FsController',
            'worker' => 'Mcwork\Model\FileSystem\Remove',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\FsPublic',
            'settoroute' => '/mcwork/medias/public',
        )
    ),  

    
    '/mcwork/medias/metas' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Metas',
        'headline' => 'Metas',
        'template' => 'content/list/mediametas',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\MediaMetas',
            'entity' => 'Contentinum\Entity\WebMedias'
        )
    ),
    
    
    
    '/mcwork/mediagroup' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'MediaGroup',
        'headline' => 'MediaGroup',
        'template' => 'content/list/mediagroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\MediaGroups',
            'entity' => 'Contentinum\Entity\WebMediaGroup'
        )
    ),
    
    
    
    '/mcwork/mediagroup/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_MediaGroup',
        'headline' => 'add_MediaGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\MediaGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\MediaGroup',
            'formaction' => '/mcwork/mediagroup/add',
            'formattributes' => array(
                'data-rules' => 'mediagroup',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webPreferences' => '1',
                'robots' => 'index,follow',
                'language' => 'de',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/mediagroup'
        )
    ),
    
    '/mcwork/mediagroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_MediaGroup',
        'headline' => 'edit_MediaGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\MediaGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\MediaGroup',
            'formaction' => '/mcwork/mediagroup/edit',
            'formattributes' => array(
                'data-rules' => 'mediagroup',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/mediagroup'
        )
    ),
    
    '/mcwork/mediagroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Medias',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'hasEntries' => array(
                'webMediagroupId' => array(
                    'tablename' => 'Contentinum\Entity\WebMediaCategories',
                    'column' => 'webMediagroupId'
                ),
            ),
    
            'settoroute' => '/mcwork/mediagroup'
        )
    ),    
    
    
    
    '/mcwork/mediacategories/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'MediaCategories',
        'headline' => 'MediaCategories',
        'template' => 'content/list/mediacategories',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\MediaCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
        ),
        'populateFromRoute' => array('cat' => 'webMediagroupId'),
    ),
    
    
    
    '/mcwork/mediacategories/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_MediaCategories',
        'headline' => 'add_MediaCategories',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\MediaCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\MediaCategories',
            'formaction' => '/mcwork/mediacategories/add',
            'formattributes' => array(
                'data-rules' => 'mediacategories',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/mediacategories',
            'populate' => array(
                'resource' => 'index',

            ),
            'populateFromRoute' => array('cat' => 'webMediagroupId'),
        )
    ),
    
    '/mcwork/mediacategories/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_MediaCategories',
        'headline' => 'edit_MediaCategories',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\MediaCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\MediaCategories',
            'formaction' => '/mcwork/mediacategories/edit',
            'formattributes' => array(
                'data-rules' => 'mediacategories',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/mediacategories'
        )
    ),
    
    '/mcwork/mediacategories/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\MediaCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'settoroute' => '/mcwork/mediacategories/category'
        )
    ),

    // -----------------------------
    
    
    
    '/mcwork/preferences' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Preferences',
        'headline' => 'Preferences',
        'template' => 'content/list/preferences',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Preferences',
            'entity' => 'Contentinum\Entity\WebPreferences'
        )
    ),
    
    '/mcwork/preferences/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Preferences',
        'headline' => 'add_Preferences',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Preferences',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Preferences',
            'formaction' => '/mcwork/preferences/add',
            'formattributes' => array(
                'data-rules' => 'preferences',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/preferences',
            'populate' => array(
            'standardDomain' => 'no',
            'hostId' => '_default',
            'locale' => 'de_DE' 
            )
        )
    ),
    
    '/mcwork/preferences/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Preferences',
        'headline' => 'edit_Preferences',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Preferences',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Preferences',
            'formaction' => '/mcwork/preferences/edit',
            'formattributes' => array(
                'data-rules' => 'preferences',
                'data-process' => 'edit',
            ),            
            'settoroute' => '/mcwork/preferences'
        )
    ),
    
    '/mcwork/preferences/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'hasEntries' => array(
                'webPagesId' => array(
                    'tablename' => 'Contentinum\Entity\WebPagesParameter',
                    'column' => 'webPagesId'
                ),
            ),
            'settoroute' => '/mcwork/preferences'
        )
    ),    
    
    
    
    '/mcwork/redirects' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Redirects',
        'headline' => 'Redirects',
        'template' => 'content/list/redirects',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Redirects',
            'entity' => 'Contentinum\Entity\WebRedirect'
        )
    ),
    
    '/mcwork/redirects/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Redirects',
        'headline' => 'add_Redirects',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Redirect',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Redirect',
            'formaction' => '/mcwork/redirects/add',
            'settoroute' => '/mcwork/redirects'
        )
    ),
    
    '/mcwork/redirects/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Redirects',
        'headline' => 'edit_Redirects',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Redirect',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Redirect',
            'formaction' => '/mcwork/redirects/edit',
            'settoroute' => '/mcwork/redirects'
        )
    ),
    
    '/mcwork/redirects/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'settoroute' => '/mcwork/redirects'
        )
    ),    
    
    '/mcwork/fieldtypes' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Fieldtypes',
        'headline' => 'Fieldtypes',
        'template' => 'content/list/fieldtypes',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Fieldtypes',
            'entity' => 'Contentinum\Entity\FieldTypes'
        )
    ),
    
    '/mcwork/fieldtypes/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Fieldtypes',
        'headline' => 'add_Fieldtypes',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\FieldTypes',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Fieldtypes',
            'formaction' => '/mcwork/fieldtypes/add',
            'settoroute' => '/mcwork/fieldtypes'
        )
    ),
    
    '/mcwork/fieldtypes/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Fieldtypes',
        'headline' => 'edit_Fieldtypes',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Contentinum\Entity\FieldTypes',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Fieldtypes',
            'formaction' => '/mcwork/fieldtypes/edit',
            'settoroute' => '/mcwork/fieldtypes'
        )
    ),
    
    '/mcwork/fieldtypes/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\FieldTypes',          
            'hasEntries' => array(
                'groups' => array(
                    'tablename' => 'Contentinum\Entity\IndexGroups',
                    'column' => 'fieldTypes'
                ),
                'accounts' => array(
                    'tablename' => 'Contentinum\Entity\Accounts',
                    'column' => 'fieldtypes'
                )
            ),
            'settoroute' => '/mcwork/fieldtypes'
        )
    ),
    
    '/mcwork/indexgroup' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Fieldgroups',
        'headline' => 'Fieldgroups',
        'template' => 'content/list/fieldgroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Fieldgroups',
            'entity' => 'Contentinum\Entity\IndexGroups'
        )
    ),
    
    '/mcwork/indexgroup/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Fieldgroups',
        'headline' => 'add_Fieldgroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Fieldgroup',
            'entity' => 'Contentinum\Entity\IndexGroups',
            'targetentities' => array(
                'accounts' => 'Contentinum\Entity\Accounts'
            ),
            
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Fieldgroups',
            'formaction' => '/mcwork/indexgroup/add',
            'settoroute' => '/mcwork/indexgroup'
        )
    ),
    
    '/mcwork/indexgroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Fieldgroups',
        'headline' => 'edit_Fieldgroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Fieldgroup',
            'entity' => 'Contentinum\Entity\IndexGroups',
            'targetentities' => array(
                'fieldTypes' => 'Contentinum\Entity\FieldTypes'
            ),
            'setexclude' => array(
                'field' => 'id'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Fieldgroups',
            'formaction' => '/mcwork/indexgroup/edit',
            'settoroute' => '/mcwork/indexgroup'
        )
    ),
    
    '/mcwork/indexgroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\IndexGroups',
            'targetentities' => array(
                'fieldTypes' => 'Contentinum\Entity\FieldTypes'
            ),
            
            'hasEntries' => array(
                'indexGroups' => array(
                    'tablename' => 'Contentinum\Entity\IndexCategorie',
                    'column' => 'indexGroups'
                )
            ),
            'settoroute' => '/mcwork/indexgroup'
        )
    ),
    
    '/mcwork/accounts' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Directories',
        'headline' => 'Directories',
        'template' => 'content/list/accounts',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Accounts',
            'entity' => 'Contentinum\Entity\Accounts'
        )
    ),
    
    '/mcwork/accounts/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Directories',
        'headline' => 'add_Directories',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/account.js'
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Accounts',
            'entity' => 'Contentinum\Entity\Accounts',
            'targetentities' => array(
                'fieldtypes' => 'Contentinum\Entity\FieldTypes'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Account',
            'formaction' => '/mcwork/accounts/add',
            'settoroute' => '/mcwork/accounts'
        )
    ),
    
    '/mcwork/accounts/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Directories',
        'headline' => 'edit_Directories',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'prepend' => array(
                'http://maps.google.com/maps/api/js?sensor=false&libraries=places'
            ),
            'append' => array(
                '/assets/app/maps/account.js'
            )
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Accounts',
            'entity' => 'Contentinum\Entity\Accounts',
            'targetentities' => array(
                'fieldtypes' => 'Contentinum\Entity\FieldTypes'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Account',
            'formaction' => '/mcwork/accounts/edit',
            'settoroute' => '/mcwork/accounts'
        )
    ),
    
    '/mcwork/accounts/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\FieldTypes',
            
            'hasEntries' => array(
                'accounts' => array(
                    'tablename' => 'Contentinum\Entity\Contacts',
                    'column' => 'accounts'
                )
            ),
            'settoroute' => '/mcwork/accounts'
        )
    ),
    
    '/mcwork/contacts' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Contacts',
        'headline' => 'Contacts',
        'template' => 'content/list/contacts',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Contacts',
            'entity' => 'Contentinum\Entity\Contacts'
        )
    ),
    
    '/mcwork/contacts/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Contacts',
        'headline' => 'add_Contacts',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/contacts.js',
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Contacts',
            'entity' => 'Contentinum\Entity\Contacts',
            'targetentities' => array(
                'accounts' => 'Contentinum\Entity\Accounts'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Contact',
            'formaction' => '/mcwork/contacts/add',
            'settoroute' => '/mcwork/contacts'
        )
    ),
    
    '/mcwork/contacts/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Contacts',
        'headline' => 'edit_Contacts',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyScriptFiles' => array(
            'append' => array(
                '/assets/app/tinymce/tinymce.min.js',
                '/assets/app/tinymce/mcwork/contacts.js',
            )
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Contacts',
            'entity' => 'Contentinum\Entity\Contacts',
            'targetentities' => array(
                'accounts' => 'Contentinum\Entity\Accounts'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Contact',
            'formaction' => '/mcwork/contacts/edit',
            'settoroute' => '/mcwork/contacts'
        )
    ),
    
    '/mcwork/contacts/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\Contacts',
            'hasEntries' => array(
                'contacts' => array(
                    'tablename' => 'Contentinum\Entity\Users5',
                    'column' => 'contacts'
                )
            ),
            'settoroute' => '/mcwork/contacts'
        )
    ),
    
    
    '/mcwork/contactgroups/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'ContactGroup',
        'headline' => 'ContactGroup',
        'template' => 'content/list/contactgroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\ContactGroups',
            'entity' => 'Contentinum\Entity\IndexContacts',
        ),
    ),
    
    
    
    '/mcwork/contactgroups/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_ContactGroup',
        'headline' => 'add_ContactGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\ContactGroup',
            'entity' => 'Contentinum\Entity\IndexContacts',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\IndexGroups',
               'contacts' => 'Contentinum\Entity\Contacts',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContactGroup',
            'formaction' => '/mcwork/contactgroups/add',
            'formattributes' => array(
                'data-rules' => 'contactcategories',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/contactgroups',
            'populate' => array(
                'publish' => 'yes',
            ),
            'populateFromRoute' => array('cat' => 'indexGroup'),
        )
    ),
    
    '/mcwork/contactgroups/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_ContactGroup',
        'headline' => 'edit_ContactGroup',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\ContactGroup',
            'entity' => 'Contentinum\Entity\IndexContacts',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\IndexGroups',
               'contacts' => 'Contentinum\Entity\Contacts',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\ContactGroup',
            'formaction' => '/mcwork/contactgroups/edit',
            'formattributes' => array(
                'data-rules' => 'contactcategories',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/contactgroups',
        )
    ),
    
    '/mcwork/contactgroups/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\NavigationMenue',
            'entity' => 'Contentinum\Entity\IndexContacts',
            'settoroute' => '/mcwork/contactgroups/category',
        )
    ),    
    
    
    
    
    '/mcwork/users' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Users',
        'headline' => 'Users',
        'template' => 'content/list/users',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Users',
            'entity' => 'Contentinum\Entity\Users5'
        )
    ),
    
    '/mcwork/users/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Users',
        'headline' => 'add_Users',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Users',
            'entity' => 'Contentinum\Entity\Users5',
            'targetentities' => array(
                'userRoles' => 'Contentinum\Entity\UserRoles',
                'contacts' => 'Contentinum\Entity\Contacts',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\UserAdd',
            'formaction' => '/mcwork/users/add',
            'settoroute' => '/mcwork/users'
        )
    ),
    
    '/mcwork/users/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Users',
        'headline' => 'edit_Users',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Users',
            'entity' => 'Contentinum\Entity\Users5',
            'targetentities' => array(
                'userRoles' => 'Contentinum\Entity\UserRoles',
                'contacts' => 'Contentinum\Entity\Contacts',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\User',
            'formaction' => '/mcwork/users/edit',
            'settoroute' => '/mcwork/users',
            'setexclude' => array(
                'field' => array(
                    'id'
                )
            ),
            'notpopulate' => array(
                'loginPassword'
            )
        )
    ),
    
    '/mcwork/users/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\User',
            'entity' => 'Contentinum\Entity\Users5',           
            'hasEntries' => array(
                'users' => array(
                    'tablename' => 'Contentinum\Entity\UserAclIndex',
                    'column' => 'users'
                )
            ),            
            'settoroute' => '/mcwork/users'
        )
    ),
    
    '/mcwork/usrgrp' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Usergroups',
        'headline' => 'Usergroups',
        'template' => 'content/list/usergroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Usergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups'
        )
    ),
    
    '/mcwork/usrgrp/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Usergroups',
        'headline' => 'add_Usergroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Usergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Usergroup',
            'formaction' => '/mcwork/usrgrp/add',
            'settoroute' => '/mcwork/usrgrp'
        )
    ),
    
    '/mcwork/usrgrp/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Usergroups',
        'headline' => 'edit_Usergroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Usergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Usergroup',
            'formaction' => '/mcwork/usrgrp/edit',
            'settoroute' => '/mcwork/usrgrp'
        )
    ),
    
    '/mcwork/usrgrp/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\UserAclGroups',            
            'hasEntries' => array(
                'aclGroup' => array(
                    'tablename' => 'Contentinum\Entity\UserAclIndex',
                    'column' => 'aclGroup'
                )
            ),         
            'settoroute' => '/mcwork/usrgrp'
        )
    ),
    
    '/mcwork/usringrp' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Useringroups',
        'headline' => 'Useringroups',
        'template' => 'content/list/useringroups',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Useringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex'
        )
    ),
    
    '/mcwork/usringrp/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Useringroups',
        'headline' => 'add_Useringroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Save\Useringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',
            'targetentities' => array(
                'users' => 'Contentinum\Entity\Users5',
                'aclGroup' => 'Contentinum\Entity\UserAclGroups'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Useringroup',
            'formaction' => '/mcwork/usringrp/add',
            'settoroute' => '/mcwork/usringrp'
        )
    ),
    
    '/mcwork/usringrp/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'edit_Useringroups',
        'headline' => 'edit_Useringroups',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Save\Useringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',
            'targetentities' => array(
                'users' => 'Contentinum\Entity\Users5',
                'aclGroup' => 'Contentinum\Entity\UserAclGroups'
            ),
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\Useringroup',
            'formaction' => '/mcwork/usringrp/edit',
            'settoroute' => '/mcwork/usringrp'
        )
    ),
    
    '/mcwork/usringrp/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Useringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',
            'settoroute' => '/mcwork/usringrp'
        )
    ),
    
    
    '/mcwork/emailtemplates' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Emailtemplates',
        'headline' => 'Emailtemplates',
        'template' => 'content/list/emailtemplates',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailTemplates',
        )    
    
    ),
    
    '/mcwork/emailtemplates/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Emailtemplates',
        'headline' => 'add_Emailtemplates',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileSystem\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailTemplates',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\TemplateFiles',
            'formaction' => '/mcwork/emailtemplates/add',
            'settoroute' => '/mcwork/emailtemplates'
        )
    ),  

    '/mcwork/emailtemplates/write' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Emailtemplates',
        'headline' => 'add_Emailtemplates',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\FsFileEditController',
            'worker' => 'Mcwork\Model\FileSystem\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailTemplates',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\TemplateFiles',
            'formaction' => '/mcwork/emailtemplates/write',
            'settoroute' => '/mcwork/emailtemplates'
        )
    ),    
    
    
    '/mcwork/emailsignatures' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Emailsignatures',
        'headline' => 'Emailsignatures',
        'template' => 'content/list/emailsignatures',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailSignatures',
        )
    
    ),
    
    '/mcwork/emailsignatures/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Emailsignatures',
        'headline' => 'add_Emailsignatures',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileSystem\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailSignatures',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\TemplateFiles',
            'formaction' => '/mcwork/emailsignatures/add',
            'settoroute' => '/mcwork/emailsignatures'
        )
    ),
    
    '/mcwork/emailsignatures/write' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'add_Emailsignatures',
        'headline' => 'add_Emailsignatures',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\FsFileEditController',
            'worker' => 'Mcwork\Model\FileSystem\TemplateFiles',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\EmailSignatures',
            'formfactory' => 'Mcwork\StandardForms',
            'form' => 'Mcwork\Form\TemplateFiles',
            'formaction' => '/mcwork/emailtemplates/write',
            'settoroute' => '/mcwork/emailtemplates'
        )
    ),    
    
    '/mcwork/cache' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Cache',
        'headline' => 'Cache',
        'template' => 'content/list/cachecontent',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\CacheContent',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\CacheFiles',
        )
    ), 
    '/mcwork/cache/clear' => array(
        'splitQuery' => 4,
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Cache\Content',
            'entitymanager' => 'Storage\Manager',
            'entity' => 'Mcwork\Entity\CacheFiles',
            'settoroute' => '/mcwork/cache'
        )
    ),
    
)
;