<?php
return array(
    'styles' => array(
        'none' => array(
            'name' => 'No style',
        ),
        'grid' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in equally large columns)',
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
        
        'blockgrid' => array(
              'viewhelper' => 'contentblockgrid',
              'name' => 'Blockgrid',
              'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3',
                    ),
              ),
              'grid' => array(
                   'element' => 'li',
                  'attr' => array(
                       'class' => 'block-grid-element'
                  ),
              ),
        
        
        ),
        
        'accordion' => array(
            'viewhelper' => 'contentaccordion',
            'name' => 'Accordion elements',
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
            'viewhelper' => 'contenttabs',
            'name' => 'Tab elements',
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
            'viewhelper' => 'contenttabs',
            'name' => 'Vertical tab elements',
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
        
        'orga' => array(
        
            'files' => array(
        
            ),
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcards'
                    ),
                )
            ),
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope',
                    )
                )
            ),
            
            
            
            'organisation' => array(
            
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name',
                    )
                ),
            
            ),   

            'member' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization-member',
                        'itemtype' => 'http://schema.org/Organization',                        
                        'itemprop' => 'member',
                    )
                ),            
            ),
            
            
            'accountFax' => array(
            
                'row' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> ',
                ),
                
                'grid' => array(
                    'filter' => 'digit',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber',
                    ),
                ),            
            
            ),
            
            'accountPhone' => array(
            
                'row' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> ',
                ),
        
                'grid' => array(
                    'filter' => 'digit', 
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone',
                    ),
                ),           
            
            ),
            
            'accountEmail' => array(
            
            
                'row' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email',
                    ),
                
                    'content:before' => '<i class="fa fa-envelope"></i> '
                ),
                
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'mailto:',
                        'itemprop' => 'email',
                    ),
                ),            
            
            ),
            
            
            'name' => array(
                'grid' => array(
                     
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name',
                    ),
                ),
            ),
        
            'internet' => array(
                'row' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-internet',
                    ),
                    'content:before' => '<i class="fa fa-home"> </i> '
                ),
        
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'http://',
                        'itemprop' => 'url',
                        'target' => '_blank',
                    ),
                ),
            ),
        
            'imgSource' => array(
                'grid' => array(
                     
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'hcard-images right',
                        'itemprop' => 'image',
                    ),
                ),
            ),
            'businessTitle' => array(
                'grid' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle',
                    ),
                ),
            ),
             
            'phoneWork' => array(
        
                'row' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> ',
                ),
        
                'grid' => array(
                    'filter' => 'digit', 
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone',
                    ),
                ),
        
            ),
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> ',
                ),
        
                'grid' => array(
                    'filter' => 'digit',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber',
                    ),
                ),
        
            ),
        
            'contactEmail' => array(
        
                'row' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email',
                    ),
        
                    'content:before' => '<i class="fa fa-envelope"></i> '
                ),
        
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'mailto:',
                        'itemprop' => 'email',
                    ),
                ),
        
            ),
        
        

        
            'address' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    ),
                    'content:before' => '<i class="fa fa-map-marker"></i> ',
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress',
                            ),
                            'content:after' => ', '
                        )
                    ),
        
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode',
                            ),
                        )
                    ),
        
                    'accountCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality',
                            ),
                        )
                    ),
        
                ),
        
            ),
        
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description',
                    )
                ),
        
            ),
        
        ),        
        
        
        'person' => array(
        
            'files' => array(
        
            ),
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcards'
                    ),
                )
            ),
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper panel',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope',
                    )
                )
            ),
            'name' => array(
                'grid' => array(
                     
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name',
                    ),
                ),
            ),
            
            'internet' => array(
                'row' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-internet',
                    ),
                ),                
                
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'http://',
                        'itemprop' => 'url',
                    ),
                ), 
            ),            
            
            'contactImgSource' => array(
                'grid' => array(
                     
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'hcard-images left',
                        'itemprop' => 'image',
                    ),
                ),
            ),
            'businessTitle' => array(
                'grid' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle',
                    ),
                ),            
            ),
            
            'phoneHome' => array(
            
                'row' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> ',
                ),
            
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone',
                    ),
                ),
            
            ),            
            
           
            'phoneWork' => array(
                
                'row' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> ',
                ),                
                
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone',
                    ),
                ),            
            
            ), 
            
            'phoneFax' => array(
            
                'row' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone',
                    ), 
                    'content:before' => '<i class="fa fa-fax"></i> ',
                ),
            
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber',
                    ),
                ),
            
            ), 

            'contactEmail' => array(
            
                'row' => array(
                     
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email',
                    ),
                    
                    'content:before' => '<i class="fa fa-envelope"></i> '                
                ),
            
                'grid' => array(
                     
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'mailto:',
                        'itemprop' => 'email',
                    ),
                ),
            
            ),            
        
        
            'organisation' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                         'class' => 'hcard-memberOf',
                         'itemtype' => 'http://schema.org/Organization',
                         'itemscope' => 'itemscope',
                    ),
                
                ),
                
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name',
                    )
                ),
        
            ),
        
            'address' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    ),
                    'content:before' => '<i class="fa fa-map-marker"></i> ',
                ),
                'grids' => array(
                    'contactAddress' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress',
                            ),
                            'content:after' => ', '
                        )
                    ),
        
                    'contactZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode',
                            ),
                        )
                    ),
        
                    'contactCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality',
                            ),
                        )
                    ),
        
                ),
        
            ),
            
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description',
                    )
                ),            
            
            ),
        
        ),        
        
       
        'events' => array(
        

            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'grid' => array(
                'element' => 'section',
                'attr' => array(
                    'class' => 'events'
                ),
                    )
            ),
        
            'schema' => array(
                'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'event-wrapper panel',
                    'itemtype' => 'http://schema.org/Event',
                    'itemscope' => 'itemscope',
                )
                    )
            ),
            'summary' => array(
                'row' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'event-summary'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'summary',
                        'itemprop' => 'name',
                    ),
                ),
            ),
            'organizer' => array(
                'row' => array(
                    'element' => 'h5',
                    'attr' => array(
                        'class' => 'event-location-organizer'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'attendee',
                        'itemprop' => 'attendee',
                    ),
                ),
            ),
            'dateStart' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-date'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'event-time'
                    ),
                    'content:after' => ' Uhr'
                ),
            ),
             
        
        
            'organisation' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-name',
                        'itemprop' => 'name',
                    )
                ),
        
            ),
        
            'location' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'location',
                        'itemtype' => 'http://schema.org/Place',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'location',
                    )
                ),
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    )
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                        'element' => 'span',
                        'attr' => array(
                            'itemprop' => 'streetAddress',
                        ),
                        'content:after' => ', '
                            )
                    ),
        
                    'accountZipcode' => array(
                        'grid' => array(
                        'element' => 'span',
                        'attr' => array(
                            'itemprop' => 'postalCode',
                        ),
                            )
                    ),
        
                    'accountCity' => array(
                        'grid' => array(
                        'element' => 'span',
                        'attr' => array(
                            'itemprop' => 'addressLocality',
                        ),
                            )
                    ),
        
                ),
        
            ),
        
        ),        
        
        
      
        
        'news' => array(
            'viewhelper' => 'news',
            'name' => 'Standard newsactual',
            'teaserLandscapeSize' => '250',
            'teaserPortraitSize' => '200',
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
            
                     
                ),
                'elements' => array(
                    'sendmail' => array('icon' => '<i class="fa fa-envelope"> </i>', 'href' => '/emailrecom', 'attr' => array('title' => 'Diesen Artikel als Link versenden', 'class' => 'initmodal', 'data-reveal-id' => 'recomendModal')),
                    'pdf' => array('icon' => '<i class="fa fa-download"> </i>', 'href' => '/newsaspdf', 'attr' => array('title' => 'Diesen Artikel als PDF herunterladen', 'target' => '_blank')),
                    'facebook' => array('icon' => '<i class="fa fa-facebook"> </i>', 'href' => 'http://www.facebook.com/share.php', 'attr' => array('title' => 'Diesen Artikel auf Facebook liken')),
                ),
            ),

            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news'
                    )
                )
            ),
            'news' => array(
                'grid' => array(
                    'element' => 'article',
                    'attr' => array(
                        'class' => 'news-article'
                    )
                )
            ),
            'header' => array(
                'grid' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
            
            'headline' => array(
                'grid' => array(
                    'element' => 'h2',
                    'attr' => array(),
                     
                ),
            ),
            
            'publishDate' => array(
                'grid' => array(
                    'format' => array('dateFormat' => array( 'attr' => 'FULL')),
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'news-date'
                    ),
                ),
            ),
            
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-imageitem news-media'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-imagecaption'
                    )
                )
            ),
            
            'mediateaserleft' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
            
            'mediateaserright' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
            
            'footer' => array(
                'grid' => array(
                    'element' => 'footer',
                    'attr' => array(
                        'class' => 'news-article-footer'
                    )
                )
            ),
            'publishAuthor' => array(
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'news-article-author'
                    ),
                    'content:before' => ', '
                                          
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
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            ),
            'backlink' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'news-article-back'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            )                    
        
        
        
        ),
        
        
        'newsactual' => array(
            'viewhelper' => 'newsactual',
            'name' => 'Standard newsactual',
            'teaserLandscapeSize' => '250',
            'teaserPortraitSize' => '200',
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
            
                     
                ),
                'elements' => array(
                    'sendmail' => array('icon' => '<i class="fa fa-envelope"> </i>', 'href' => '/emailrecom', 'attr' => array('class' => 'initmodal', 'data-reveal-id' => 'recomendModal', 'title' => 'Diesen Artikel als Link versenden')),
                    'pdf' => array('icon' => '<i class="fa fa-download"> </i>', 'href' => '/newsaspdf', 'attr' => array('title' => 'Diesen Artikel als PDF herunterladen', 'target' => '_blank')),
                    'facebook' => array('icon' => '<i class="fa fa-facebook"> </i>', 'href' => 'http://www.facebook.com/share.php', 'attr' => array('title' => 'Diesen Artikel auf Facebook liken')),
                ),
            ),

            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news-actual'
                    )
                )
            ),
            'news' => array(
                'grid' => array(
                    'element' => 'article',
                    'attr' => array(
                        'class' => 'news-article-actual'
                    )
                )
            ),
            'header' => array(
                'grid' => array(
                    'element' => 'header',
                    'attr' => array(
                        'class' => 'news-article-header'
                    )
                )
            ),
            
            'headline' => array(
                'grid' => array(
                    'element' => 'h2',
                    'attr' => array(),
                     
                ),
            ),
            
            'publishDate' => array(
                'grid' => array(
                    'format' => array('dateFormat' => array( 'attr' => 'FULL')),
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'news-date'
                    ),
                ),
            ),
            
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-imageitem news-media'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-imagecaption'
                    )
                )
            ),
            
            'mediateaserleft' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
                    )
                )
            ),
            
            'mediateaserright' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'news-article-teaser-imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'news-article-teaser-imagecaption'
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
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'news-article-author'
                    ),
                    'content:before' => ', '
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
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button'
                    )
                )
            )            
            

        ), // end news actual
        
    )  ,
    

);