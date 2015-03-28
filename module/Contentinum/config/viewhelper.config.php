<?php
return array(
    'invokables' => array(
        
        
        
        'renderForm' => 'ContentinumComponents\Forms\View\Helper\FormBuild',
        'formelement' => 'ContentinumComponents\Forms\View\Helper\FormElement',
        'formNote' => 'ContentinumComponents\Forms\View\Helper\FormNote',        
        
        'navigationcontentinum' => 'Contentinum\View\Helper\Navigation\Contentinum',
        'navigationbuild' => 'Contentinum\View\Helper\Navigation\Build',
        'navigationtopbar'  => 'Contentinum\View\Helper\Navigation\Topbar',
        
        'contribution' => 'Contentinum\View\Helper\Contribution',
        'images' => 'Contentinum\View\Helper\Medias\Images',
        'contentelement' => 'Contentinum\View\Helper\Element',
        
        
        'contentrow' => 'Contentinum\View\Helper\Styles\Row',
        'contentgrid' => 'Contentinum\View\Helper\Styles\Grid',     
        'contentblockgrid' => 'Contentinum\View\Helper\Styles\BlockGrid',
        'contenttabs' => 'Contentinum\View\Helper\Styles\Tabs',
        'contentaccordion' => 'Contentinum\View\Helper\Styles\Accordion',
        'contenttoolbar' => 'Contentinum\View\Helper\Styles\Toolbar',
        
        
        
        'news' => 'Contentinum\View\Helper\News\App',
        'newsactual' => 'Contentinum\View\Helper\News\Actual',
        
        'wanted' => 'Contentinum\View\Helper\Wanted\Single',
        'wantedgroup' => 'Contentinum\View\Helper\Wanted\Group',        

        
        'newsarchivelist' => 'Contentinum\View\Helper\News\Archive\Monthly',
        'newsarchiveyearlist' => 'Contentinum\View\Helper\News\Archive\Annually',
        'mediagroup' => 'Contentinum\View\Helper\Medias\Group',
        'filegroup' => 'Contentinum\View\Helper\Medias\FilesGroup',
        
        
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