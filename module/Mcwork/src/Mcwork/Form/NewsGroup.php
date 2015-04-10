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
class NewsGroup extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetBasedata">Basiskonfiguration</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetExtendet">Erweiterte Konfiguration</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetPdf">PDF Dokument</a></dd>';// tab3
        $html .= '<dd><a href="#fieldsetPdfConf">PDF Konfiguration</a></dd>';// tab3
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
                    'name' => 'contentGroupPage',
                    'required' => true,                    
                    'options' => array(
                        'label' => 'Assign to a page',
                        'empty_option' => 'Please select',
                        'value_options' => array(),                        
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                            ), array('main.scope != :scope' => array(':scope', '_default'),
                                 'andWhere' => 'main.onlylink = \'0\''                            
                            )
                            ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'contentGroupPage',
                        //'class' => 'chosen-select'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'name',
                    'required' => true,
                    'options' => array(
                        'label' => 'Name Nachrichten',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),                    
                    'type' => 'Text',
                    'attributes' => array(

                        'required' => 'required',
                        'id' => 'name'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'headlineGroup',
                    'required' => false,
                    'options' => array(
                        'label' => 'Überschrift dieser Nachrichten',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'headlineGroup'
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'publishAuthor',
                    'required' => false,
                    'options' => array(
                        'label' => 'Publish Author',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'publishAuthor'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'authorEmail',
                    'required' => false,
                    'options' => array(
                        'label' => 'Author Email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'authorEmail'
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'numberCharacterTeaser',
                    'required' => false,
                    'options' => array(
                        'label' => 'Number characters',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'numberCharacterTeaser',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'labelReadMore',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link label',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Basiskonfiguration',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetBasedata'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'labelReadMore',
                        'value' => 'Lesen Sie mehr',
                    )
                )
            ),            
            
            
            
            

            
            array(
                'spec' => array(
                    'name' => 'headlineImages',
                    'required' => false,
                    'options' => array(
                        'label' => 'Bild',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Ein Themenbild oder ein Logo zu diesen Nachrichten',
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'headlineImages',
                        'class' => 'chosen-select'
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'imageStyles',
                    'required' => false,
                    'options' => array(
                        'label' => 'Bild Formatierung',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Templates\Contribution'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'imageStyles'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'numbernews',
                    'required' => false,
                    'options' => array(
                        'label' => 'Anzahl Artikel',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Anzahl der Beiträge auf der Startseite des Nachrichtenstreams',
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'numbernews',
                        'value' => '10',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'htmlwidgets',
                    'required' => true,
                    'options' => array(
                        'label' => 'Choose a contribution widget',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Templates\PageContent'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'htmlwidgets'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'tplAssign',
                    'required' => true,
                    'options' => array(
                        'label' => 'Template variable',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Templates\Assign'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Erweiterte Konfiguration',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetExtendet'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'tplAssign'
                    )
                )
            ),
 

            array(
                'spec' => array(
                    'name' => 'pdfLogo',
                    'required' => false,
                    'options' => array(
                        'label' => 'Logo PDF',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Logo im PDF Dokumentenkopf',
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'pdfLogo',
                        'class' => 'chosen-select'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'pdfSubtitle',
                    'required' => false,
                    'options' => array(
                        'label' => 'PDF Dokument Subtitle',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'pdfSubtitle',
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'pdfSignatur',
                    'options' => array(
                        'label' => 'PDF Dokumentsignatur',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Hinterlegung von Impressumsdaten im PDF Dokument',
                        'fieldset' => array(
                            'legend' => 'PDF Dokument',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPdf'// tab1
                            )
                        )                        

                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '3',
                        'id' => 'pdfSignatur',
                    )
                )
            ),

           

            
            
            array(
                'spec' => array(
                    'name' => 'pageFormat',
                    'required' => false,
                    'options' => array(
                        'label' => 'Seitenformat',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'A3' => 'A3',
                            'A4' => 'A4',
                            'A5' => 'A5',
                        ),                        
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'pageFormat',
                        'value' => 'A4',
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'pageLayout',
                    'required' => false,
                    'options' => array(
                        'label' => 'Seitenlayout',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'P' => 'Hochformat',
                            'L' => 'Querformat',
                        ),                        
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'pageLayout',
                        'value' => 'P',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'pageFont',
                    'required' => false,
                    'options' => array(
                        'label' => 'Schriftart',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'courier' => 'Courier',
                            'helvetica' => 'Helvetica',
                            'times' => 'Times',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'pageFont',
                        'value' => 'helvetica',
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'pageFontsize',
                    'required' => false,
                    'options' => array(
                        'label' => 'Schriftgröße Dokument',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13', 
                            '14' => '14',
                            '15' => '15',                                                       
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'pageFontsize',
                        'value' => '10',
                    )
                )
            ),            

            
            array(
                'spec' => array(
                    'name' => 'marginHeader',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokumentenkopf',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginHeader',
                        'value' => '15',
                    )
                )
            ),   

            array(
                'spec' => array(
                    'name' => 'marginFoot',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokumentenfuß',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginFoot',
                        'value' => '15',
                    )
                )
            ), 

            
            array(
                'spec' => array(
                    'name' => 'marginTop',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokument oben',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginTop',
                        'value' => '30',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'marginRight',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokument rechts',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginRight',
                        'value' => '15',
                    )
                )
            ),  

            
            array(
                'spec' => array(
                    'name' => 'marginBottom',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokument unten',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginBottom',
                        'value' => '25',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'marginLeft',
                    'required' => false,
                    'options' => array(
                        'label' => 'Außenabstand Dokument links',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'PDF Konfiguration',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPdfConf'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'marginLeft',
                        'value' => '15',
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
            'headlineImages' => array(
                'required' => false,
            ),
            'imageStyles' => array(
                'required' => false,
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