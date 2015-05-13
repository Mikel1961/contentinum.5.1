<?php
return array(
    'widgets' => array(
        'none' => array(
            'name' => 'Display content',
        ),
        'bootstrapstd' => array(
            'name' => '(Bootstrap) standard container',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'container'
                )
            ),
        ),
        'bootstrapfluid' => array(
            'name' => '(Bootstrap) fluid container',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'container-fluid'
                )
            ),
        ),  
        'bootstrapstdgrid' => array(
            'name' => '(Bootstrap) standard grid',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'col-lg-12 col-md-12 col-sm-12'
                )
            )            
        ),  

        'bootstrapheadergrid' => array(
            'name' => 'Header (Bootstrap) (header>row>grid)',
            'section' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'class' => 'container',
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
                    'class' => 'col-lg-12 col-md-12 col-sm-12'
                )
            )
        ),        
        
        'navcontaingrid' => array(
              'name' => 'Topbar contain to grid',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'contain-to-grid'
                )
            )              
        
        ),
        
        'navcontainstickygrid' => array(
            'name' => 'Standard row + sticky (row>grid>sticky)',
            'section' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
        
                )
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'contain-to-grid sticky'
                )
            )
        ),        
        
        'header' => array(
            'name' => 'Header row',
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
        'content' => array(
            'name' => 'Standard row',
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
        'footer' => array(
            'name' => 'Footer row',
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
        
        'headergrid' => array(
            'name' => 'Header row + header block (header>row>grid)',
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
        
        'contentgrid' => array(
            'name' => 'Standard row + section block (section>row>grid)',
            'section' => array(
                'element' => 'section',
                'attr' => array(
                    'class' => 'content-section',
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
            'name' => 'Footer row + footer block (header>row>grid)',
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