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
 * contentinum mcwork form contact
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Contact extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetName">' . $translation->translate('Contact') . '</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetContact">' . $translation->translate('Contact data') . '</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetBild">Bild</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetDescription">' . $translation->translate('Description') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetAddress">' . $translation->translate('Adresse') . '</a></dd>';// tab3
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
                    'name' => 'accounts',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Select Account',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('accounts', array(
                            'value' => 'id',
                            'label' => 'organisation'
                        )),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'accounts',
                        'class' => 'chosen-select'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'salutation',
                    'required' => true,
                    'options' => array(
                        'label' => 'Salutation',
                        'value_options' => array(
                            'ms' => 'Frau',
                            'mr' => 'Herr',
                            'ressource' => 'Ressource',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'salutation'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'title',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'Title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'title'
                    )
                )
            ),            
         

            array(
                'spec' => array(
                    'name' => 'firstName',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'First name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'firstName'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'lastName',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'Last name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),                       
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'lastName'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'objectName',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Ressource',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'objectName'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'businessTitle',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'Business title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'businessTitle'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'justSign',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Kurzzeichen',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'justSign'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'contactEmail',
                    'options' => array(
                        'label' => 'Email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),    
                                          
                    ),
                    
                    'type' => 'Email',
                    'attributes' => array(
                        'id' => 'contactEmail'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'internet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Internet',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Contact',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetName'// tab1
                            )
                        ) 
                         
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '2',
                        'id' => 'internet',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'alternateEmail',
                    'required' => false,
                    'options' => array(
                        'label' => 'Alternate Email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),

                    ),
            
                    'type' => 'Email',
                    'attributes' => array(
                        'id' => 'alternateEmail'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'phoneWork',
                    
                    'options' => array(
                        'label' => 'Phone (work)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'attributes' => array(
                        'type' => 'tel',
                        'id' => 'phoneWork'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'phoneMobile',
            
                    'options' => array(
                        'label' => 'Phone (mobile)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'attributes' => array(
                        'type' => 'tel',
                        'id' => 'phoneMobile'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'phoneFax',
            
                    'options' => array(
                        'label' => 'Fax',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),                        
                    ),
            
                    'attributes' => array(
                        'type' => 'tel',
                        'id' => 'phoneFax'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'phoneHome',
            
                    'options' => array(
                        'label' => 'Phone (home)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'attributes' => array(
                        'type' => 'tel',
                        'id' => 'phoneHome'
                    )
                )
            ),    

            array(
                'spec' => array(
                    'name' => 'contactChat',
            
                    'options' => array(
                        'label' => 'Chat',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'contactChat'
                    )
                )
            ),    

            
            array(
                'spec' => array(
                    'name' => 'facebook',
            
                    'options' => array(
                        'label' => 'Facebook',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'facebook',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'twitter',
            
                    'options' => array(
                        'label' => 'Twitter',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'twitter'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'instagram',
            
                    'options' => array(
                        'label' => 'Instagram',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'instagram'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'pinterest',
            
                    'options' => array(
                        'label' => 'Pinterest',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Contact',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetContact'// tab1
                            )
                        )                        
                    ),
            
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'pinterest'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'contactImgSource',
                    'required' => false,
                    'options' => array(
                        'label' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Bild',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetBild'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'contactImgSource',
                        'class' => 'chosen-select'
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
                            'legend' => 'Description',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetDescription'// tab1
                            )
                        )                        
                         
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '8',
                        'id' => 'description',
                        'class' => 'contactdescription',
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'contactAddress',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Street',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'contactAddress'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'contactZipcode',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Zipcode',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'contactZipcode'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'contactCity',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'City',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Adresse',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetAddress'// tab1
                            )
                        )                        
                         
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'contactCity'
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
            
            'firstName' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'lastName' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'contactEmail' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'alternateEmail' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),            
            'phoneWork' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            )
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