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
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */


class DesigningFields extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetField">' . $translation->translate('field_basedata') . '</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetFieldextend">' . $translation->translate('field_extended') . '</a></dd>';// tab2
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
                    'name' => 'webForms',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Form',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webForms', array(
                            'value' => 'id',
                            'label' => 'headline'                            
                        )),               
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webForms',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'fieldRequired',
                    'required' => true,
                    'options' => array(
                        'label' => 'Required field',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'yes' => 'Required field',
                            'no' => 'Not required',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'fieldRequired',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'label',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Label',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
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
                    'name' => 'fieldTyp',
                    'required' => true,
                    'options' => array(
                        'label' => 'Form element',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'Text' => 'Input field',
                            'Email' => 'Input field email',
                            'Tel' => 'Phone',
                            'Url' => 'Input field url',
                            'Textarea' => 'Text field',
                            'Select' => 'Select field',
                            
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW),
                        'fieldset' => array(
                            'legend' => 'field_basedata',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetField'// tab1
                            )
                        )                        
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'fieldTyp',
                    )
                )
            ),   

            array(
                'spec' => array(
                    'name' => 'fieldValue',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Field value',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'fieldValue'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'fieldName',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Field name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'fieldName'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'fieldDomid',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Element ID selector',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'fieldDomid'
                    )
                )
            ),    

            array(
                'spec' => array(
                    'name' => 'fieldclass',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Element CLASS selector',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'fieldclass'
                    )
                )
            ),            

            
            
            array(
                'spec' => array(
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Access resources',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Acl\Resource'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
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
                    'name' => 'webMedias',
                    'required' => true,
                    'options' => array(
                        'label' => 'Media item',
                        'empty_option' => 'Please select a media',
                        'value_options' => $this->getSelectOptions('webMedias', array(
                            'value' => 'id',
                            'label' => 'mediaName',
                        ), array(),
                            null, false, array(), array('main.mediaName' => 'ASC')
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'field_extended',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetFieldextend'
                            )
                        )                        
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMedias',
                        'class' => 'chosen-select',
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
            'fieldValue' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'fieldName' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'fieldDomid' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )            
            ),
            'fieldclass' => array(
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