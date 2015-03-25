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
class Designing extends AbstractForms
{
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetForm">' . $translation->translate('form_basedata') . '</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetFormextend">' . $translation->translate('form_extended') . '</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetFormadjustments">' . $translation->translate('form_adjusments') . '</a></dd>';// tab3
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
                    'name' => 'headline',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Name',
                        'description' => 'Only for internal use',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'headline'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'subheadline',
                    'required' => false,
                    'options' => array(
                        'label' => 'Teaser Headline',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '2',
                        'id' => 'subheadline'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'email',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Send form to',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'email'
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'emailname',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Email name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'emailname'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'emailcc',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Send form to CC',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'emailcc'
                    )
                )
            ),           

            array(
                'spec' => array(
                    'name' => 'emailsubject',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Email subject',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'form_basedata',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetForm'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'emailsubject'
                    )
                )
            ),            

            
            
            array(
                'spec' => array(
                    'name' => 'description',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description above the form',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'description',
                        'class' => 'formcontent',
                    )
                )
            ),   

            
            array(
                'spec' => array(
                    'name' => 'responsetext',
                    'required' => false,
                    'options' => array(
                        'label' => 'Response text after send mail success',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'form_extended',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetFormextend'
                            )
                        )                        
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'responsetext',
                        'class' => 'responsecontent',
                    )
                )
            ), 

            
            array(
                'spec' => array(
                    'name' => 'replayemail',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Replay email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'replayemail'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'replayname',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Replayemail name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'replayname'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'emailtext',
                    'required' => false,
                    'options' => array(
                        'label' => 'Response email',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'emailtext',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'htmlwidgets',
                    'required' => true,
                    'options' => array(
                        'label' => 'Choose a content widget',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Templates\Htmlwidgets'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
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
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Access resources',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Acl\Resource'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'form_adjusments',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetFormadjustments'
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
            'headline' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'subheadline' => array(
                'required' => false,
            ),
            'description' => array(
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