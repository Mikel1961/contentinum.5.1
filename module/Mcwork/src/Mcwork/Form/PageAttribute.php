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
 * contentinum mcwork form preferences
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PageAttribute extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';
        $html .= '<dd class="active"><a href="#fieldsetBasedata">' . $translation->translate('Basedata') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetMetadata">' . $translation->translate('Layout') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetPagePublished">' . $translation->translate('Page publication') . '</a></dd>';
        $html .= '<dd><a href="#fieldsetJsExpert">' . $translation->translate('Javascript instructions') .'</a></dd></dl>';
        $html .= '<div class="tabs-content">';
        
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
                        'value' => $this->tabHeader()
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'webPages',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Page',
                        'empty_option' => 'Select a page',
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                        ), array('main.onlylink != :onlylink' => array(':onlylink', '1')),
                            null, false, array(), array('main.label' => 'ASC')
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
                    'name' => 'charset',
                    'required' => true,
                    'options' => array(
                        'label' => 'Set Charset',
                        'empty_option' => '-- Charset --',
                        'value_options' => $this->getOptions('Attribute\Charset'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'charset'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'metaViewport',
                    'options' => array(
                        'label' => 'Viewport',
                        'description' => 'Overrides the global default values',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'metaViewport'
                    )
                )
            ),            

            
            array(
                'spec' => array(
                    'name' => 'htmlstructure',
                    'required' => false,
                    'options' => array(
                        'label' => 'Choose a layout',
                        'empty_option' => 'Please Select',
                        'value_options' => $this->getOptions('Contentinum\Htmllayouts'),
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
                    'name' => 'htmlwidgets',
                    'required' => false,
                    'options' => array(
                        'label' => 'Basic format',
                        'empty_option' => 'Please Select',
                        'value_options' => $this->getOptions('Templates\Htmlwidgets'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Metas',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetBasedata'
                            )
                        )                        
                         
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'htmlwidgets'
                    )
                )
            ),

            
            array(
                'spec' => array(
                    'name' => 'headStyle',
                    'options' => array(
                        'label' => 'Style instruction',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '3',
                        'id' => 'headStyle'
                    )
                )
            ),          
            
            array(
                'spec' => array(
                    'name' => 'bodyId',
                    'options' => array(
                        'label' => 'Html body tag id',
                        'description' => 'Html body tag id attribute value',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'bodyId'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'bodyClass',
                    'options' => array(
                        'label' => 'Html body tag class attribute value',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Metas',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetMetadata'
                            )
                        )                        
                    )
                    ,
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'bodyClass'
                    )
                )
            ),

            
            
            array(
                'spec' => array(
                    'name' => 'publishUp',
                    'options' => array(
                        'label' => 'Published beginning',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'publishUp'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'publishDown',
                    'options' => array(
                        'label' => 'Published ending',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Page publications',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPagePublished'
                            )
                        )                        
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'publishDown'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'headScript',
                    'options' => array(
                        'label' => 'Header javascript instructions',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                       
                    ),
                    
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '3',
                        'id' => 'headScript'
                    )
                )          
            ),
            array(
                'spec' => array(
                    'name' => 'inlineScript',
                    'options' => array(
                        'label' => 'Footer inline javascript instructions',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Javascript and stylesheets instruction block',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetJsExpert'
                            )
                        )                         
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'inlineScript'
                    )
                )
            ),            
            array(
                'spec' => array(
                    'name' => 'formpreftabend',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formpreftabend',
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
            'htmlstructure' => array(
                'required' => false,
             ),
            'htmlwidgets' => array(
                'required' => false
            ),

            'metaViewport' => array(
                'required' => false
            ),            
            'bodyId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'bodyClass' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            
            'publishUp' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'publishDown' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'headScript' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'headStyle' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),            
            'inlineScript' => array(
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