<?php
return array(
    'foundation' => array(
        'grid' => array(
            'grids' => 12,
            'auto' => true,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row'
            ),
            'grid' => array(
                0 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'large-12 columns'
                )
            ),
            'content' => array()
        ),
        
        'accordion' => array(
            'body' => array(
                'row' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'accordion',
                        'data-accordion' => 'data-accordion',
                        'role' => 'tablist'
                    )
                ),
                'grid' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'accordion-navigation',
                        'role' => 'presentational'
                    )
                ),
            
            'content' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'content',
                )                
            ),
            ),
        ),        
        
        'tabs' => array(
            'header' => array(
                'row' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'tabs',
                        'data-tab' => 'data-tab',
                        'role' => 'tablist'
                    )
                ),
                'grid' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'tab-title',
                        'role' => 'presentational'
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-content'
                    )
                ),
                'grid' => array(
                    'element' => 'section',
                    'attr' => array(
                        'class' => 'content',
                        'id' => 'panel',
                        'role' => 'tabpanel'
                    )
                )
            )
        ),
        'tabsvertical' => array(
            
            'header' => array(
                'row' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'tabs vertical',
                        'data-tab' => 'data-tab',
                        'role' => 'tablist'
                    )
                ),
                'grid' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'tab-title',
                        'role' => 'presentational'
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-content'
                    )
                ),
                'grid' => array(
                    'element' => 'section',
                    'attr' => array(
                        'class' => 'content',
                        'id' => 'panel',
                        'role' => 'tabpanel'
                    )
                )
            )
        ),
        'news' => array(
            'row' => array(
                'element' => 'section',
                'attr' => array(
                    'class' => 'news'
                )
            ),
            'grid' => array(
                'element' => 'article',
                'attr' => array(
                    'class' => 'news-article'
                )
            ),
            'header' => array(
                'row' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'footer',
                    'attr' => array(
                        'class' => 'news-article-footer'
                    )
                )
            ),
            'publishAuthor' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-author'
                    )
                )
            ),
            
            'labelReadMore' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-readmore'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'button'
                    )
                )
            )
        )
    )   
);