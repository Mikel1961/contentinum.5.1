<?php
return array(
    'foundation' => array(
        'content' => array(
            'name' => 'Display content',
        ),
        '_defaultimages' => array(
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
        'medialeft' => array(
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
            'name' => false,
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
            'name' => false,
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
            'name' => false,
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation',
                    'role' => 'navigation'
                )
            )
        ),
        'navigationinline' => array(
            'name' => false,
            'list' => array('attr' => array('class' =>  'navigation-list-inline')),
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation-list',
                    'role' => 'navigation'
                )
            )
        ),
    ),
);