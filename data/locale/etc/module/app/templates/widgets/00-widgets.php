<?php
return array(
    'foundation' => array(
        'medialeft' => array(
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
        'contentmedialeft' => array(
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
        )
        ,
        
        'contentmediaright' => array(
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
        )
        ,
        
        'contentmediacenter' => array(
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
        'contentblockmedialeft' => array(
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
            
        )
        ,
        
        'contentblockmediaright' => array(
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
            'brand' => '<h1><a href="#">%s1</a></h1>',
            'mobilemenue' => '<a href="#"><span>%s1</span></a>',
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
        'topbarleft' => array(
            'brand' => '<h1><a href="#">%s1</a></h1>',
            'mobilemenue' => '<a href="#"><span>%s1</span></a>',
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
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation',
                    'role' => 'navigation'
                )
            )
        ),
        'navigationinline' => array(
            'list' => array('attr' => array('class' =>  'navigation-list-inline')),
            'row' => array( 
                'element' => 'nav',
                'attr' => array(
                    'class' => 'navigation-list',
                    'role' => 'navigation'
                )
            )        
        ),
        'content' => array(
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ), 
        'section' => array(
            'row' => array(
                'element' => 'section',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        
        'header' => array(
            'row' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'class' => 'row',
                    'role' => 'banner'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'footer' => array(
            'row' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'class' => 'row',
                    'role' => 'contentinfo'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ), 

        'contentgrid' => array(
            'section' => array(
                'element' => 'section',
                'attr' => array(
                    'id' => 'maincontent',
                    'role' => 'main'
                )
            ),            
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
                    
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),        
        
        'headergrid' => array(
            'section' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'role' => 'banner'
                )            
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'footergrid' => array(
            'section' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'role' => 'contentinfo'
                )            
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        '_default' => array(
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        )
    )
);