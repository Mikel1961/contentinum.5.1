<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category contentinum backend
 * @package Forms
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form page
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Page extends AbstractForms
{

   /**
    * User friendly function for tab header 
    * @return string
    */
   protected function tabHeader()
   {
       $translation = $this->getServiceLocator()->get('translator');
       $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
       $html .= '<dd class="active"><a href="#fieldsetPagebasedata">' . $translation->translate('Page Standard') . '</a></dd>';// tab1
       $html .= '<dd><a href="#fieldsetPageMetadata">' . $translation->translate('Page metadatas (SEO)') . '</a></dd>';// tab2
       $html .= '<dd><a href="#fieldsetPagePublished">' . $translation->translate('Page publication') . '</a></dd>';// tab3
       $html .= '</dl><div class="tabs-content">';// finish and start tab content area
       return $html;
   }
    
    
    /**
     * form field elements
     *
     * @see \ContentinumComponents\Forms\AbstractForms::elements()
     */
    public function elements()
    {
        return array(
            
            array(
                'spec' => array(
                    'name' => 'formpreftab',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formpreftab',
                        'value' => $this->tabHeader(),
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'webPreferences',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Assign page to a domain',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webPreferences', array(
                            'value' => 'id',
                            'label' => 'host'
                        )),
                        'description' => 'Wenn Sie mehrere Webseiten / Domains pflegen, treffen Sie hier eine Auswahl',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webPreferences'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'label',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Linkname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Der Linkname wird in der Navigation der Webseite angezeigt',
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'label'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'url',
                    'options' => array(
                        'label' => 'Page Id',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Die Seiten ID wird in der URL an den Domainnamen angeh&auml;ngt',
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'url'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'webNavigations',
                    'options' => array(
                        'label' => 'Add this page in a navigation',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webNavigations', array(
                            'value' => 'id',
                            'label' => 'title'
                        )),
                        'description' => 'W&auml;hlen Sie aus, in welcher Navigation oder Subnavigation diese Seite angezeigt werden soll',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                         
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'webNavigations'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'parentPage',
                    'required' => true,
                    'options' => array(
                        'label' => 'Standard Einstellungen ausw&auml;hlen',
                        'empty_option' => 'Please select',                        
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                        ), array('main.scope = :scope' => array(':scope', '_default'))
                        ),                        
                        'description' => 'Hier legen Sie die Grundeinstellungen dieser Seite fest z.B.: Grundlayout, Webseitentitel, Metadaten usw.',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'parentPage',
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'htmlstructure',
                    'required' => false,
                    'options' => array(
                        'label' => 'Abweichendes Seitenlayout setzen',
                        'empty_option' => 'Please Select',
                        'value_options' => $this->getOptions('Contentinum\Htmllayouts', array(), null, array('assets')),
                        'description' => 'Hier erg&auml;nzen Sie zus&auml;tzliche Layouteinstellungen z.B.: F&uuml;r ein 2-spaltiges Layout',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                         
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'htmlstructure'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Set access rights to that resource',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Acl\Resource'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Page standard datas',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetPagebasedata'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'resource'
                    )
                )
            ),
                        
            array(
                'spec' => array(
                    'name' => 'linkTitle',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link title',
                        'description' => 'Der Link Title wird als Tooltip angezeigt, wenn der Link mit der Maus ber&uuml;hrt wird',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'linkTitle'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'metaTitle',
                    'required' => false,
                    'options' => array(
                        'label' => 'Page title',
                        'description' => 'Der Seiten Title wird im Browser angezeigt sowie in den Trefferlisten der Suchmaschine. Wenn das Feld leer bleibt wird automatisch der Linkname genutzt.',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'metaTitle'
                    )
                )
            ),          
            
            array(
                'spec' => array(
                    'name' => 'robots',
                    'required' => false,
                    'options' => array(
                        'label' => 'Set meta value robots',                       
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Attribute\Robots', array(), 'value'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'robots'
                    )
                )
            ),
            
         
            
            
            array(
                'spec' => array(
                    'name' => 'metaDescription',
                    'required' => false,
                    'options' => array(
                        'label' => 'Meta value description',
                        'description' => '&Uuml;berschreibt die globalen Einstellungen, jede Seite sollte eine individuelle Seitenbeschreibung erhalten (ca. 150 Zeichen).',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'deco-desc' => $this->getDecorators(self::DECO_DESC),
                       
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'metaDescription'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'metaKeywords',
                    'required' => false,
                    'options' => array(
                        'label' => 'Meta value keywords',
                        'description' => '&Uuml;berschreibt die globalen Einstellungen, jede Seite sollte individuelle Keywords erhalten.',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                     
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '2',
                        'id' => 'metaKeywords'
                    )
                )
            ),       

            array(
                'spec' => array(
                    'name' => 'changefreq',
                    'required' => false,
                    'options' => array(
                        'label' => 'Sitemap Parameter Besuchsfrequenz',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'always' => 'ALWAYS: Stock market data, social bookmarking categories',
                            'hourly' => 'HOURLY: Major news site, weather information, forum',
                            'daily' => 'DAILY: Blog entry index, classifieds, small message board',
                            'weekly' => 'WEEKLY: Product info pages, website directories',
                            'monthly' => 'MONTHLY: FAQs, instructions, occasionally updated articles',
                            'yearly' => 'YEARLY: Contact, “About Us”, login, registration pages',
                            'never' => 'NEVER: Old news stories, press releases, etc',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'changefreq',
                        'value' => 'monthly'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'priority',
                    'required' => false,
                    'options' => array(
                        'label' => 'Sitemap Parameter Page priority',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            '0' => '0: Nicht in der Sitemap anzeigen ',
                            '0.0' => '0.0: Outdated news, info that has become irrelevant',
                            '0.1' => '0.1: Outdated news, info that has become irrelevant',
                            '0.2' => '0.2: Outdated news, info that has become irrelevant',
                            '0.3' => '0.3: Outdated news, info that has become irrelevant',
            
                            '0.4' => '0.4: Articles and blog entries, category pages, FAQs',
                            '0.5' => '0.5: Articles and blog entries, category pages, FAQs',
                            '0.6' => '0.6: Articles and blog entries, category pages, FAQs',
                            '0.7' => '0.7: Articles and blog entries, category pages, FAQs',
                            '0.8' => '0.8: Homepage, subdomains, product info, major features',
                            '0.9' => '0.9: Homepage, subdomains, product info, major features',
                            '1.0' => '1.0: Homepage, subdomains, product info, major features',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Page meta specified',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPageMetadata'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'priority',
                        'value' => '0.8',
                    )
                )
            ),            
               
            
            array(
                'spec' => array(
                    'name' => 'publish',
                    'required' => false,
                    'options' => array(
                        'label' => 'Publish',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Attribute\Publish'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),                       
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'publish'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'language',
                    'required' => false,
                    'options' => array(
                        'label' => 'Language',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Locale\Language'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'language'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'languageParent',
                    'required' => false,
                    'options' => array(
                        'label' => 'Language parent page',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                        ), array('main.onlylink = :onlylink' => array(':onlylink', '0'))
                        ), 
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Hier verkn&uuml;pfen Sie die fremdsprachige Seite mit der entsprechenden Seite in der Hauptsprache',
                        'fieldset' => array(
                            'legend' => 'Page publications',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPagePublished'
                            )
                        )
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'languageParent',
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'formtabend',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formtabend',
                        'value' => '</div>'
                    )
                )
            ),
            
        );
    }

    /**
     * form input filter and validation
     *
     * @see \ContentinumComponents\Forms\AbstractForms::filter()
     */
    public function filter()
    {
        return array(
            
            'label' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'url' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'webNavigations' => array(
                'required' => false,
            ),
            'linkTitle' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'metaTitle' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'htmlstructure' => array(
                'required' => false
            ),            
            'robots' => array(
                'required' => false
            ),
            'metaDescription' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'metaKeywords' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),            
            'publish' => array(
                'required' => false
            ),
            'language' => array(
                'required' => false
            ),
            'languageParent' => array(
                'required' => false
            ),                        
        );
    }

    /**
     * initiation and get form
     *
     * @see \ContentinumComponents\Forms\AbstractForms::getForm()
     */
    public function getForm()
    {
        return $this->factory->createForm(array(
            'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
            'elements' => $this->elements(),
            'input_filter' => $this->filter()
        ));
    }
}