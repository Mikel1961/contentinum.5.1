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
 * @category Mcevent
 * @package Form
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Dates extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetEvent">' . $translation->translate('Event') . '</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetDescription">' . $translation->translate('Description and Files') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetAddress">' . $translation->translate('Event address') . '</a></dd>';// tab2        
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
                    'name' => 'calendar',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Calendar',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('calendar'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'calendar'
                    )
                )
            ),            
            array(
                'spec' => array(
                    'name' => 'summary',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Summary',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'summary'
                    )
                )
            ), 
            
          
            
            array(
                'spec' => array(
                    'name' => 'organizer',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Veranstalter',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'organizer'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'location',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Veranstaltungsort',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'location'
                    )
                )
            ),  

                    
            
            array(
                'spec' => array(
                    'name' => 'account',
                    'required' => false,
                    'options' => array(
                        'label' => 'Veranstaltungsort auswählen',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Mcevent\Locations'),
                        'description' => 'Überschreibt Veranstaltungsort',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'account',
                        'class' => 'chosen-select'
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'dateStart',
                    'required' => true,
                    'options' => array(
                        'label' => 'Beginn Veranstaltung',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'dateStart',
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'dateEnd',
                    'required' => false,
                    'options' => array(
                        'label' => 'Ende Veranstaltung',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),  
                        'fieldset' => array(
                            'legend' => 'Event',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetEvent'// tab1
                            )
                        )                                             
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'dateEnd',
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'webMediasId',
                    'required' => false,
                    'options' => array(
                        'label' => 'Add images',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'webMediasId',
                        'class' => 'chosen-select',
                    )
                )
            ),
            

            array(
                'spec' => array(
                    'name' => 'webFilesId',
                    'required' => false,
                    'options' => array(
                        'label' => 'Add a file attachment',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicPdf'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'webFilesId',
                        'class' => 'chosen-select',
                    )
                )
            ),                      
            
            array(
                'spec' => array(
                    'name' => 'description',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Description and Files',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetDescription'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'description',
                        'class' => 'datedescription',
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'locationAddresse',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Veranstaltungsort Straße',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'locationAddresse'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'locationZipcode',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Veranstaltungsort Postleitzahl',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'locationZipcode'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'locationCity',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Veranstaltungsort Stadt',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Event address',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetAddress'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'locationCity'
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
            'account' => array(
                'required' => false,
            ),
            'webFilesId' => array(
                'required' => false,                
            ),
            'webMediasId' => array(
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