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
 * contentinum mcwork form accounts
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Account extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetAccount">' . $translation->translate('Account') . '</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetContact">' . $translation->translate('Contact data') . '</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetAddress">' . $translation->translate('Address') . '</a></dd>';// tab3
        $html .= '<dd><a href="#fieldsetDescription">Bild und Beschreibung</a></dd>'; //tab4
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
                    'name' => 'fieldtypes',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Select field meta',
                        'empty_option' => 'Please select a field meta',
                        'value_options' => $this->getSelectOptions('fieldtypes'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'fieldtypes'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'parentId',
                    'required' => false,
                    'options' => array(
                        'label' => 'Parent organisation',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Accounts'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'parentId',
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'organisation',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Organisation',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'organisation'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'eventLocation',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Als Veranstaltungsort auflisten',
                        'label_attributes' => array('for' => 'eventLocation'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'eventLocation',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'organisationExt',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Weitere Bezeichnung',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Account',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetAccount'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'organisationExt',
                    )
                )
            ), 
            

            array(
                'spec' => array(
                    'name' => 'accountPhone',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Phone',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountPhone'
                    )
                )
            ), 

            
            array(
                'spec' => array(
                    'name' => 'accountFax',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Fax',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountFax'
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'accountEmail',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountEmail'
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
                                'class' => 'content',
                                'id' => 'fieldsetContact'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'internet'
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'formRowStart',
                    'options' => array(

                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStart',
                        'value' => '<div class="row"><div class="large-6 columns">'
                    )
                )
            ),    

            
            array(
                'spec' => array(
                    'name' => 'formRowStartStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartStreet',
                        'value' => '<div class="row"><div class="large-9 columns">'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'accountStreet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Street',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountStreet'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddleStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formRowMiddleStreet',
                        'value' => '</div><div class="large-3 columns">',
                    )
                )
            ) ,  

            array(
                'spec' => array(
                    'name' => 'accountStreetNumber',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Number',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountStreetNumber'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'formRowEndStreet',
                    'options' => array(

                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumnEndStreet',
                        'value' => '</div></div>'
                    )
                )
            ) ,            
            
            
            array(
                'spec' => array(
                    'name' => 'accountZipcode',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Zipcode',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountZipcode'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'accountCity',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'City',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                       
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountCity'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'accountState',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'State or province',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountState'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'accountCountry',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Country',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                         
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'accountCountry'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'longitude',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Longitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'longitude'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'latitude',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Latitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'latitude'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'formRowMiddle',
                    'options' => array(

                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formRowMiddle',
                        'value' => '</div><div class="large-6 columns">',
                    )
                )
            ) ,    

            array(
                'spec' => array(
                    'name' => 'location',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Map section (location)',
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
                    'name' => 'formMap',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formMap',
                        'value' => '<div id="map_canvas"> </div>'
                    )
                )
            ) ,            

            
            array(
                'spec' => array(
                    'name' => 'formRowEnd',
                    'options' => array(
                        'fieldset' => array(
                            'legend' => 'Address',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetAddress'// tab1
                            )
                        ) 
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumnEnd',
                        'value' => '</div></div>'
                    )
                )
            ) ,

            array(
                'spec' => array(
                    'name' => 'imgSource',
                    'required' => false,
                    'options' => array(
                        'label' => 'Bild',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'imgSource',
                        'class' => 'chosen-select',
                        'value' => 1
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'selectfile',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'selectfile',
                        'value' => '<a id="viewSelectFile" data-mediafield="imgSource" class="button tiny" href="#"><i class="fa fa-file-image-o"></i></a><figure id="selectedMedia"> </figure>'
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
                            'legend' => 'Contact',
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
                        'class' => 'contactdescription smalleditor',
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
            'parentId' => array(
                'required' => false,
            ),
            'organisation' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'organisationExt' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )                
            ), 
            'accountPhone' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'accountFax' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'accountEmail' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'internet' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'street' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'postalcode' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'city' => array(
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