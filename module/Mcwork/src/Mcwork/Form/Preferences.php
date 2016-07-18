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
class Preferences extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $translation = $this->getServiceLocator()->get('translator');
        $html = '<dl class="tabs" data-tab="data-tab">';
        $html .= '<dd class="active"><a href="#fieldsetBasedata">' . $translation->translate('Basedata') .'</a></dd>';
        $html .= '<dd><a href="#fieldsetMetadata">' . $translation->translate('Page metadatas (SEO)') . '</a></dd>';
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
                    'name' => 'host',
                    'required' => true,
                    'options' => array(
                        'label' => 'Hostname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'host',
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'hostId',
                    'required' => true,
                    'options' => array(
                        'label' => 'Alias domain from',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions(null, array(
                            'value' => 'hostId',
                            'label' => 'host'
                        ), array(
                            
                            'main.standardDomain = :std' => array(':std', 'yes')
                            

                        ), 'Contentinum\Entity\WebPreferences', true, array(
                            'createnewhost' => 'Add a new Domain'
                        )), //
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'hostId'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'title',
                    'options' => array(
                        'label' => 'Website title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'title'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'locale',
                    'required' => true,
                    'options' => array(
                        'label' => 'Location parameters',
                        'empty_option' => 'Set locale value',
                        'value_options' => $this->getOptions('Locale\i18n'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'locale'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'author',
                    'required' => true,
                    'options' => array(
                        'label' => 'Author',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Metas',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetBasedata'
                            )
                        )
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'author'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'metaDescription',
                    'options' => array(
                        'label' => 'Meta value description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
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
                        'description' => 'Overrides the global default values',
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
                    'name' => 'siteverification',
                    'options' => array(
                        'label' => 'Google site verification',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Metas',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetMetadata'
                            )
                        )                        
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'siteverification'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'headScript',
                    'options' => array(
                        'label' => 'Javascript block head tag',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'headScript'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'bodyFooterScript',
                    'options' => array(
                        'label' => 'Javascript block body end tag',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Embed javascript instruction block',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetJsExpert'
                            )
                        )                        
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'bodyFooterScript'
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
            'host' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'title' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'author' => array(
                'required' => true,
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
            'metaDescription' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'siteverification' => array(
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
            'bodyFooterScript' => array(
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