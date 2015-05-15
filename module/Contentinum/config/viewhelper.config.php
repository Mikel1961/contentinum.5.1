<?php
return array(
    'invokables' => array(
        
        
        
        'renderForm' => 'ContentinumComponents\Forms\View\Helper\FormBuild',
        'formelement' => 'ContentinumComponents\Forms\View\Helper\FormElement',
        'formNote' => 'ContentinumComponents\Forms\View\Helper\FormNote',        
        
        'navigationcontentinum' => 'Contentinum\View\Helper\Navigation\Contentinum',
        'buildsmultilevel' => 'Contentinum\View\Helper\Navigation\Builds\Multilevel',
        
        'navigationbuild' => 'Contentinum\View\Helper\Navigation\Build',
        'navigationtopbar'  => 'Contentinum\View\Helper\Navigation\Topbar',
        'navigationtopnav'  => 'Contentinum\View\Helper\Navigation\Topnav',
        'navigationmmenu'  => 'Contentinum\View\Helper\Navigation\Mmenu',
        'navigationmultilevel'  => 'Contentinum\View\Helper\Navigation\Multilevel',
        
        'contribution' => 'Contentinum\View\Helper\Contribution',
        'images' => 'Contentinum\View\Helper\Medias\Images',
        'getmedialink' => 'Contentinum\View\Helper\Medias\ImageLink',
        'contentelement' => 'Contentinum\View\Helper\Element',
        
        
        'contentrow' => 'Contentinum\View\Helper\Styles\Row',
        'contentgrid' => 'Contentinum\View\Helper\Styles\Grid',     
        'contentblockgrid' => 'Contentinum\View\Helper\Styles\BlockGrid',
        'contenttabs' => 'Contentinum\View\Helper\Styles\Tabs',
        'contentaccordion' => 'Contentinum\View\Helper\Styles\Accordion',
        'contenttoolbar' => 'Contentinum\View\Helper\Styles\Toolbar',
        'contentpanel' => 'Contentinum\View\Helper\Styles\Panel',
        
        
        
        
        
        'news' => 'Contentinum\View\Helper\News\App',
        'newsactual' => 'Contentinum\View\Helper\News\Actual',
        
        'overwriteprops' => 'Contentinum\View\Helper\Wanted\Properties',
        'wantedname' => 'Contentinum\View\Helper\Wanted\Name',
        'wanted' => 'Contentinum\View\Helper\Wanted\Single',
        'wantedobject' => 'Contentinum\View\Helper\Wanted\ObjectName',
        'wantedgroup' => 'Contentinum\View\Helper\Wanted\Group',        

        
        'newsarchivelist' => 'Contentinum\View\Helper\News\Archive\Monthly',
        'newsarchiveyearlist' => 'Contentinum\View\Helper\News\Archive\Annually',
        'mediagroup' => 'Contentinum\View\Helper\Medias\Group',
        'lightboxgallery' => 'Contentinum\View\Helper\Medias\LightboxGallery',
        'cameragallery' => 'Contentinum\View\Helper\Medias\CameraGallery',
        'filegroup' => 'Contentinum\View\Helper\Files\Group',
        
        
        'maps' => 'Contentinum\View\Helper\Maps',
        'forms' => 'Contentinum\View\Helper\Forms',
        'searchform' => 'Contentinum\View\Helper\SearchForm',
        
        'searchhighlight' => 'Contentinum\View\Helper\Search\HighlightPhrase',
        
        'filesize' => 'Contentinum\View\Helper\Filesize',
        
        'buildlayout' => 'Contentinum\View\Helper\Buildlayout',
        'layoutassets' => 'Contentinum\View\Helper\Assets',
        
        'accountmembers' => 'Contentinum\View\Helper\Account\Members',
        'accountgroup' => 'Contentinum\View\Helper\Account\Group',
        


    )
);