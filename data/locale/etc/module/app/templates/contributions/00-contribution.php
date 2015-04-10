<?php
return array(
    'contribution' => array(
        'content' => array(
            'name' => 'Display content',
        ),
        '_defaultimages' => array(
            'key' => 'defaults',
            'name' => false,
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array('class' => 'imageitem')
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
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 mediagroup-list',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'media-block-grid-element'
                ),
            ),
        
        
        ), 
        
        'mediablocklightgallery' => array(
            'key' => 'mediagroup',
            'name' => 'Mediagallery Blockgrid (1-2-3)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'popup-gallery small-block-grid-1 medium-block-grid-2 large-block-grid-3',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'gallery-block-grid-element'
                ),
            ),
        
        
        ),        

        'filegrouplist' => array(
            'key' => 'filegroup',
            'name' => 'Datei zum downlaod als Liste',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'filegroup-list',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'filegroup-list-element'
                ),
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
                        'role' => 'tooltip',
                    ),
                ),           
           
           ),
        ),
        
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
                'element' => 'section',
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
        'navigation' => array(
            'key' => 'navigation',
            'name' => 'Navigation Standard list',
            'list' => array('attr' => array('class' =>  'navigation-list')),
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
            'list' => array('attr' => array('class' =>  'navigation-list-inline')),
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
            'name' => 'Navigation Standard Inlinelist',
            'list' => array('attr' => array('class' =>  'navigation-list-inline-footer')),
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation-list-footer',
                    'role' => 'navigation'
                )
            )
        ),        
    ),
);