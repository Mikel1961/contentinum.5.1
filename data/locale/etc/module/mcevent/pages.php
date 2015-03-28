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
    
    '/mcevent/calendar' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender',
        'headline' => 'Kalender',
        'template' => 'content/list/calendar',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Calendar',
            'entity' => 'Mcevent\Entity\MceventTypes'
        )
    ),
    
    '/mcevent/calendar/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender hinzufügen',
        'headline' => 'Kalender hinzufügen',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventTypes',
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\Calendar',
            'formaction' => '/mcevent/calendar/add',
            'settoroute' => '/mcevent/calendar'
        )
    ),
    
    '/mcevent/calendar/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender bearbeiten',
        'headline' => 'Kalender bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventTypes',
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\Calendar',
            'formaction' => '/mcevent/calendar/edit',
            'settoroute' => '/mcevent/calendar'
        )
    ),
    
    '/mcevent/calendar/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Mcevent\Entity\MceventTypes',
            
            'hasEntries' => array(
                'calendar' => array(
                    'tablename' => 'Mcevent\Entity\MceventDates',
                    'column' => 'calendar'
                ),
            ),            
            
            'settoroute' => '/mcevent/calendar'
        )
    ),    
    
    '/mcevent/eventdate' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Termine',
        'headline' => 'Termine',
        'template' => 'content/list/eventdate',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Eventdate',
            'entity' => 'Mcevent\Entity\MceventDates'
        )
    ),
    
    '/mcevent/eventdate/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Termin erstellen',
        'headline' => 'Termin erstellen',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,     
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Save\Dates',
            'entity' => 'Mcevent\Entity\MceventDates',
            'targetentities' => array(
                'calendar' => 'Mcevent\Entity\MceventTypes',
                'account' => 'Contentinum\Entity\Accounts',
            ),            
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\Dates',
            'formaction' => '/mcevent/eventdate/add',
            'populate' => array(
                'account' => '1',
                'organizerId' => '1',
            ),            
            'settoroute' => '/mcevent/eventdate'
        )
    ),
    
    '/mcevent/eventdate/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Termin bearbeiten',
        'headline' => 'Termin bearbeiten',
        'template' => 'forms/maps',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,       
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Save\Dates',
            'entity' => 'Mcevent\Entity\MceventDates',
            'targetentities' => array(
                'calendar' => 'Mcevent\Entity\MceventTypes',
                'account' => 'Contentinum\Entity\Accounts',
            ),            
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\Dates',
            'formaction' => '/mcevent/eventdate/edit',
            'settoroute' => '/mcevent/eventdate'
        )
    ),
    
    '/mcevent/eventdate/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Pending',
            'entity' => 'Mcevent\Entity\MceventDates',
            'settoroute' => '/mcwork/eventdate'
        )
    ), 

    
    '/mcevent/calendargroup' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender Gruppen',
        'headline' => 'Kalender Gruppen',
        'template' => 'content/list/group',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Group',
            'entity' => 'Mcevent\Entity\MceventGroup'
        )
    ),
    
    '/mcevent/calendargroup/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalendergruppe anlegen',
        'headline' => 'Kalendergruppe anlegen',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventGroup',
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\CalendarGroup',
            'formaction' => '/mcevent/calendargroup/add',
            'settoroute' => '/mcevent/calendargroup'
        )
    ),
    
    '/mcevent/calendargroup/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalendergruppe bearbeiten',
        'headline' => 'Kalendergruppe bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventGroup',
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\CalendarGroup',
            'formaction' => '/mcevent/calendargroup/edit',
            'settoroute' => '/mcevent/calendargroup'
        )
    ),
    
    '/mcevent/calendargroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Mcevent\Entity\MceventGroup',
    
            'hasEntries' => array(
                'calendargroup' => array(
                    'tablename' => 'Mcevent\Entity\MceventIndex',
                    'column' => 'groupsId'
                ),
            ),
    
            'settoroute' => '/mcevent/calendargroup'
        )
    ),

    '/mcevent/calgroups/category' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender in Gruppen',
        'headline' => 'Kalender in Gruppen',
        'template' => 'content/list/calendergroup',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\CalenderGroup',
            'entity' => 'Mcevent\Entity\MceventIndex'
        )
    ), 

    '/mcevent/calgroups/add' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender in eine Gruppe einfügen',
        'headline' => 'Kalender in eine Gruppe einfügen',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventIndex',
            'targetentities' => array(
                'groups' => 'Mcevent\Entity\MceventGroup',
                'calendar' => 'Mcevent\Entity\MceventTypes',
            ),            
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\GroupIndex',
            'formaction' => '/mcevent/calgroups/add',
            'settoroute' => '/mcevent/calgroups',
            
            'populateFromRoute' => array('cat' => 'groups'),
        )
    ),
    
    '/mcevent/calgroups/edit' => array(
        'resource' => 'publisherresource',
        'headTitle' => 'Kalender in einer Gruppe bearbeiten',
        'headline' => 'Kalender in einer Gruppe bearbeiten',
        'template' => 'forms/standard',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'ContentinumComponents\Mapper\Process',
            'entity' => 'Mcevent\Entity\MceventIndex',
            'targetentities' => array(
                'groups' => 'Mcevent\Entity\MceventGroup',
                'calendar' => 'Mcevent\Entity\MceventTypes',
            ),            
            'formfactory' => 'Mcevent\StandardForms',
            'form' => 'Mcevent\Form\GroupIndex',
            'formaction' => '/mcevent/calgroups/edit',
            'settoroute' => '/mcevent/calgroups',
        )
    ),    
    
);