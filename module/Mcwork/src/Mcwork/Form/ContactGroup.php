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
 * contentinum mcwork form fieldmetas
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ContactGroup extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetName">Kontakt in Gruppe</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetContact">' . $translation->translate('Contact data') . '</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetDescription">' . $translation->translate('Description') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetAddress">' . $translation->translate('Adresse') . '</a></dd>';// tab3
        $html .= '<dd><a href="#fieldsetEnable">Parameter</a></dd>';// tab4
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
                    'name' => 'indexGroup',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Kontaktgruppe',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('indexGroup'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'indexGroup'
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
                            'label' => array('organisation', 'organisationExt'),
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
                    'name' => 'contacts',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Contacts',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('contacts', array(
                            'value' => 'id',
                            'label' => array('lastName', 'firstName')
                        )),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'contacts',
                        'class' => 'chosen-select',
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'businessTitle',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Business title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Kontakt zur Gruppe',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetName'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'businessTitle'
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'contactEmail',
                    'required' => false,
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
                    'name' => 'phoneWork',
                    'required' => false,
                    
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
                    'required' => false,
            
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
                    'required' => false,
            
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
                    'name' => 'contactChat',
                    'required' => false,
            
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
                    'required' => false,
            
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
                    'required' => false,
            
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
                    'name' => 'internet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Internet',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Kontaktdaten überschreiben',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetContact'// tab2
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
                    'name' => 'description',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Beschreibung überschreiben',
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
                        'label_attributes' => array('for' => 'contactCity'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Adresse überschreiben',
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
                    'name' => 'enableTitle',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Titel anzeigen',
                        'label_attributes' => array('for' => 'enableTitle'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableTitle',
                        'value' => 1
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'enableSalutation',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Anrede anzeigen',
                        'label_attributes' => array('for' => 'enableSalutation'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableSalutation',
                        'value' => 1
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'enableFirstName',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Vorname anzeigen ',
                        'label_attributes' => array('for' => 'enableFirstName'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableFirstName',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enableLastName',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Familienname anzeigen ',
                        'label_attributes' => array('for' => 'enableLastName'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableLastName',
                        'value' => 1
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'enableBusinessTitle',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Position anzeigen ',
                        'label_attributes' => array('for' => 'enableBusinessTitle'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableBusinessTitle',
                        'value' => 1
                    )
                )
            ),       

            
            array(
                'spec' => array(
                    'name' => 'enablePhoneHome',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Telefon privat anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneHome'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneHome',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enablePhoneMobile',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Telefon mobil anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneMobile'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneMobile',
                        'value' => 1
                    )
                )
            ), 

            
            array(
                'spec' => array(
                    'name' => 'enablePhoneWork',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Telefon arbeit anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneWork'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneWork',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enablePhoneOther',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Weitere Telefonnummer anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneOther'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneOther',
                        'value' => 1
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'enablePhoneFax',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Fax anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneFax'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneFax',
                        'value' => 1
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'enableContactEmail',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'E-Mail anzeigen ',
                        'label_attributes' => array('for' => 'enableContactEmail'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableContactEmail',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enableInternet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Internet anzeigen ',
                        'label_attributes' => array('for' => 'enableInternet'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableInternet',
                        'value' => 1
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAlternateEmail',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Alternative E-Mailadresse anzeigen ',
                        'label_attributes' => array('for' => 'enableAlternateEmail'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAlternateEmail',
                        'value' => 1
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'enableChat',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Chat anzeigen ',
                        'label_attributes' => array('for' => 'enableChat'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableChat',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enableFacebook',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Facebook anzeigen ',
                        'label_attributes' => array('for' => 'enableFacebook'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableFacebook',
                        'value' => 1
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'enableTwitter',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Twitter anzeigen ',
                        'label_attributes' => array('for' => 'enableTwitter'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableTwitter',
                        'value' => 1
                    )
                )
            ),   

            array(
                'spec' => array(
                    'name' => 'enableInstagram',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Instagram anzeigen ',
                        'label_attributes' => array('for' => 'enableInstagram'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableInstagram',
                        'value' => 1
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'enablePinterest',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Pinterest anzeigen ',
                        'label_attributes' => array('for' => 'enablePinterest'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePinterest',
                        'value' => 1
                    )
                )
            ),   

            array(
                'spec' => array(
                    'name' => 'enableImage',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Bild anzeigen ',
                        'label_attributes' => array('for' => 'enableImage'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableImage',
                        'value' => 1
                    )
                )
            ), 

            
            array(
                'spec' => array(
                    'name' => 'enableAddress',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Adresse anzeigen ',
                        'label_attributes' => array('for' => 'enableAddress'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAddress',
                        'value' => 1
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'enableBirthdate',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Geburtstag anzeigen ',
                        'label_attributes' => array('for' => 'enableBirthdate'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableBirthdate',
                        'value' => 1
                    )
                )
            ),            
            

            array(
                'spec' => array(
                    'name' => 'enableDescription',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Beschreibung anzeigen',
                        'label_attributes' => array('for' => 'enableDescription'),
                        'fieldset' => array(
                            'legend' => 'Parameter ein- oder ausblenden',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetEnable'// tab1
                            )
                        )
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableDescription',
                        'value' => 1
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
            
            'contactEmail' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
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