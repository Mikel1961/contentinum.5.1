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


class NavigationMenue extends AbstractForms
{

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
                    'name' => 'webPages',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Page or link to this item',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                            ), array('main.scope != :scope' => array(':scope', '_default'))
                            ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webPages',
                        'class' => 'chosen-select',
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'alternateLabelname',
                    'required' => false,
                    'options' => array(
                        'label' => 'Seitenname überschreiben',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                   'type' => 'Textarea',
                    'attributes' => array(
                        'id' => 'alternateLabelname'
                    )
                )
            ),            
           
            array(
                'spec' => array(
                    'name' => 'webNavigations',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Navigation',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webNavigations', array(
                            'value' => 'id',
                            'label' => 'title'                            
                        )),                   
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webNavigations'
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
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'publish'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Access rights',
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
                    'name' => 'relLink',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link rel attribute',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Attribute\LinkAttrRel'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'relLink'
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'targetLink',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link target attribute (deprecated, use caution when)',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Attribute\LinkAttrTarget'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'targetLink'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'classLink',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link class selectoren',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'classLink'
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'dataLink',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link data attribute',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'dataLink'
                    )
                )
            ),            
            

            array(
                'spec' => array(
                    'name' => 'domId',
                    'required' => false,
                    'options' => array(
                        'label' => 'Element ID selector',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'domId'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'styleClass',
                    'required' => false,
                    'options' => array(
                        'label' => 'Element CLASS selector',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'styleClass'
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
            'relLink' => array(
                'required' => false,
                'filters' => array()
            ),
            'targetLink' => array(
                'required' => false,
                'filters' => array()
            ), 
            'domId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),                                   
            'styleClass' => array(
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