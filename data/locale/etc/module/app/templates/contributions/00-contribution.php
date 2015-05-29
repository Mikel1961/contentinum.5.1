<?php
return array(
    'contribution' => array(
        'content' => array(
            'name' => 'Display content'
        ),
        '_defaultimages' => array(
            'key' => 'defaults',
            'name' => false,
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        
        'mediablockgrid' => array(
            'key' => 'mediagroup',
            'name' => 'Media Blockgrid (1-2-3)',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            'caption' => array(
                'element' => 'figcaption',
                'attr' => array(
                    'class' => 'mediagroup-list-item-figcaption'
                )            
            ),
        ),
        
        'newsarchiv' => array(
            'key' => 'newsarchiv',
            'name' => 'News archiv list',  
            'format' => 'standard',  
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-list pluginarchive'
                    )
                ),            
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-list-link'
                    )
                )
            ), 
            
            'hassub' => array(
                 'attr' => array(
                      'class' => 'element-toogle',
                      'data-ident' => '',
                 ),
            ),

            'subwrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-sublist'
                    )
                ),
            ),
            'subelements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-sublist-link'
                    )
                )
            ),            
        
        ), 
        
        'newsarchivblock' => array(
            'key' => 'newsarchiv',
            'name' => 'News archiv block',
            'format' => 'block',
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news-archive-block-container'
                    )
                ),                
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-block pluginarchive'
                    )
                ),
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-list-link'
                    )
                )
            ),
        
            'hassub' => array(
                'attr' => array(
                    'class' => 'element-toogle',
                    'data-ident' => '',
                ),
            ),
            
            'sublistswrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news-archive-sublistsblock'
                    )
                ),
            ),            
        
            'subwrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-sublist'
                    )
                ),
            ),
            'subelements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-block-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-sublist-link'
                    )
                )
            ),
        
        ),        
        
        'mediablocklightgallery' => array(
            'key' => 'mediagroup',
            'name' => 'Mediagallery Blockgrid (1-2-3)',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'popup-gallery small-block-grid-1 medium-block-grid-2 large-block-grid-3'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            
            'link' => array(
                
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array()
                )
            )
            ,
            
            'caption' => array()
        ),
        
        'cameragallery' => array(
            'key' => 'mediagroup',
            'name' => 'Camera slideshow (Copyright (c) 2012 by Manuel Masia)',
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'slider'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'camera_wrap'
                    )
                )
            ),
            
            'imageitem' => array(
                
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'data-src' => '#'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'camera-caption fadeIn'
                    )
                )
            )
            ,
            
            'title' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'title'
                    )
                )
            ),
            
            'shortdescription' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'description'
                    )
                )
            ),
            
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'dsp'
                    )
                )
            )
        )
        ,
        'caroufredsel' => array(
            'key' => 'mediagroup',
            'name' => 'Carousel Slider (Copyright (c) 2013 Fred Heusschen)',
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'carousel-list-container responsive wow fadeInUp'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'id' => 'carousel-list'
                    )
                )
            ),
            
            'listitem' => array(
                
                'row' => array(
                    'element' => 'li',
                    'attr' => array()
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'carousel-list-thumbnail'
                    )
                )
            )
            ,
            
            'imageitem' => array(
                
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'thumbnail'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(),
                    'content:after:outside' => '<img src="/medias/layout/quote.png" alt="">'
                )
            )
            ,
            
            'title' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'caption'
                    )
                )
            ),
            
            'caption' => array(
                'grid' => array(
                    'element' => 'h4',
                    'attr' => array()
                )
            ),
            
            'description' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array()
                )
            ),
            
            'longdescription' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array()
                )
            ),
            
            'btnrow' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'carousel-btn-row'
                    ),
                    'content:before' => '<a id="prev2" class="prev2" href="#"></a><a id="next2" class="next2" href="#"></a>'
                )
            )
        )
        ,
        
        'filegrouplist' => array(
            'key' => 'filegroup',
            'name' => 'Datei zum downlaod als Liste',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'filegroup-list'
                )
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'filegroup-list-element'
                )
            ),
            
            'files' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(),
                    
                    'content:before' => '<i class="fa fa-file"></i> '
                ),
                
                'grid' => array(
                    
                    'element' => 'a',
                    'attr' => array(
                        'href' => '/mcwork/medias/download/',
                        'class' => 'has-tip tip-top filegroup-list-element-link',
                        'data-tooltip' => 'data-tooltip',
                        'aria-haspopup' => 'true',
                        'role' => 'tooltip'
                    )
                )
            )
        )
        ,
        
        'medialeft' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media left',
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'mediaright' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media right',
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'mediacenter' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media center',
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem center'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'mediabanner' => array(
            'key' => 'contribution',
            'name' => 'Media banner',
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'banner-images'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'banner-images-caption'
                    )
                )
            )
        ),
        'contentblockmedialeft' => array(
            'key' => 'contribution',
            'name' => 'Contribution block with media left',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'block'
                )
            ),
            'grid' => array(
                'element' => 'article',
                'attr' => array(
                    'class' => 'contribution'
                )
            ),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'contentblockmediaright' => array(
            'key' => 'contribution',
            'name' => 'Contribution block with media right',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'block'
                )
            ),
            'grid' => array(
                'element' => 'article',
                'attr' => array(
                    'class' => 'contribution'
                )
            ),
            'media' => array(
                'image' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'media-right'
                    ),
                    'caption' => 'figcaption'
                )
            )
        ),
        'simplelist' => array(
            'key' => false,
            'name' => false,
            'list' => array(
                'element' => 'ul',
                'attr' => array()
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array()
                )
            )
        ),
        
        'multilevel' => array(
            'key' => 'multilevel',
            'ulclass' => 'sidemenu-list',
            'menuattribute' => array(
                'subUlClass' => 'navigation-list-dropdown',
                'listHasDropdown' => 'navigation-list-has-dropdown',
                'linkClassDefault' => 'contentinum-menu-link',
                'linkClassDropdown' => 'toogleSubMenu'
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'role' => 'navigation'
                    )
                )
                
            )
        )
        ,
        
        'topnav' => array(
            'key' => 'topnav',
            'brand' => array(
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'navbar-brand',
                        'href' => '#'
                    )
                )
            ),
            'navbarheader' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'navbar-header'
                    )
                ),
                'grid' => array(
                    'element' => 'button',
                    'attr' => array(
                        'type' => 'button',
                        'class' => 'navbar-toggle collapsed',
                        'data-toggle' => 'collapse',
                        'data-target' => '#navbar',
                        'aria-expanded' => 'false',
                        'aria-controls' => 'navbar'
                    ),
                    'content:before' => '<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>'
                )
            )
            ,
            'ulclass' => 'nav navbar-nav',
            'navbar' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'navbar',
                        'class' => 'navbar-collapse collapse'
                    )
                )
            ),
            
            'wrapper' => array(
                
                'row' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navbar navbar-default navbar-fixed-top',
                        'role' => 'navigation'
                    )
                )
                ,
                
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'container'
                    )
                )
                
            )
        )
        ,
        
        'topbar' => array(
            'key' => 'topbar',
            'name' => 'Topbar right Foundation Framework',
            'brand' => '<h2><a href="#">%s1</a></h2>',
            'mobilemenue' => '<a href="#"><span>Menue</span></a>',
            'direction' => 'right',
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'top-bar',
                    'data-topbar' => 'data-topbar',
                    'role' => 'navigation'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'top-bar-section'
                )
            ),
            'list' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'title-area'
                )
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'name'
                    )
                ),
                '1' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toggle-topbar menu-icon'
                    )
                )
            )
        ),
        'topbarleft' => array(
            'key' => 'topbar',
            'name' => 'Topbar left Foundation Framework',
            'brand' => '<h1><a href="#">%s1</a></h1>',
            'mobilemenue' => '<a href="#"><span>Menue</span></a>',
            'direction' => 'left',
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'top-bar',
                    'data-topbar' => 'data-topbar',
                    'role' => 'navigation'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'top-bar-section'
                )
            ),
            'list' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'title-area'
                )
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'name'
                    )
                ),
                '1' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toggle-topbar menu-icon'
                    )
                )
            )
        ),
        
        'mmenu' => array(
            'key' => 'navigation',
            'name' => 'Navigation seitlich (mmenu)',
            'list' => array(
                'attr' => array(
                    'class' => 'mmenu-list'
                )
            ),
            'row' => array()
        ),
        
        'mmenuplus' => array(
            'key' => 'navigation',
            'name' => 'Navigation seitlich (mmenu)',
            'list' => array(
                'attr' => array(
                    'class' => 'sidemenu-list'
                )
            ),
            'row' => array()
        ),
        
        'navigation' => array(
            'key' => 'navigation',
            'name' => 'Navigation Standard list',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list'
                )
            ),
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation',
                    'role' => 'navigation'
                )
            )
        ),
        'navigationinline' => array(
            'key' => 'navigation',
            'name' => 'Navigation Standard Inlinelist',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline'
                )
            ),
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation-list',
                    'role' => 'navigation'
                )
            )
        ),
        'navigationinlinefooter' => array(
            'key' => 'navigation',
            'name' => 'Navigation Footer Inlinelist',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline-footer'
                )
            ),
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation-list-footer',
                    'role' => 'navigation'
                )
            )
        )
    )
);