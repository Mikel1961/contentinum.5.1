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
class ContributionRecycle extends AbstractForms
{
    
    protected function translation($str)
    {
        $translation = $this->getServiceLocator()->get('translator');
        return $translation->translate($str);
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
                    'name' => 'formRowStart',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStart',
                        'value' => '<div class="row">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'title',
                    'required' => true,
                    'options' => array(
                        'label' => 'Title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'title'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'content',
                    'options' => array(
                        'label' => 'Contribution',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Contribution',
                            'attributes' => array(
                                'class' => 'large-8 columns',
                                'id' => 'fieldsetContribution'
                            )
                        )
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '8',
                        'id' => 'content',
                        'class' => 'contributioncontent',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formAccordionStart',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionPanelPublish',
                        'value' => '<dl class="accordion" data-accordion><dd><a href="#panelMetas">'.$this->translation('Properties').'</a><div id="panelMetas" class="content active">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'webPages',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Assign to a page',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webPages', array(
                            'value' => 'id',
                            'label' => 'label'
                        ), array('main.onlylink != :onlylink' => array(':onlylink', '1'))
                        ),                        
                        
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webPages',
                        'class' => 'chosen-select'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'webContentgroup',
                    'required' => false,
                    'options' => array(
                        'label' => 'Assign in contribution group',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Content\Groups'),                                                                 
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Insert contribution to a defined contribution group'
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'webContentgroup'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'adjustments',
                    'required' => true,
                    'options' => array(
                        'label' => 'Content type',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Templates\Types'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'adjustments'
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
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
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
                    'name' => 'overwrite',
                    'required' => false,
                    'options' => array(
                        'label' => 'Overwrite this contribution',
                        'value_options' => array(
                            '0' => 'not overwrite',
                            '1' => 'overwrite',
                        ),
                        'description' => 'Only effective in default pages',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'overwrite'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'id',
                    'required' => false,
                    'options' => array(
                        'label' => 'Contribution ident',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'id',
                        'readonly' => 'readonly',
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'replaceDefault',
                    'required' => false,
                    'options' => array(
                        'label' => 'Replace this contribution',
                        'description' => 'Only effective in default pages',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'replaceDefault'
                    )
                )
            ),          
            
            array(
                'spec' => array(
                    'name' => 'formAccordionMedia',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionPanelMedia',
                        'value' => '</div></dd><dd><a href="#panelMedia">'.$this->translation('Contribution media attachment').'</a><div id="panelMedia" class="content">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'webMediasId',
                    'required' => true,
                    'options' => array(
                        'label' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMediasId',
                        'class' => 'chosen-select'
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
                        'value' => '<a id="viewSelectFile" class="button tiny" href="#"><i class="fa fa-file-image-o"></i></a><figure id="selectedMedia"> </figure>'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'mediaStyle',
                    'required' => false,
                    'options' => array(
                        'label' => 'Media style',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'mediaStyle',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'htmlwidgets',
                    'required' => false,
                    'options' => array(
                        'label' => 'Choose a contribution widget',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Templates\Contribution'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'htmlwidgets'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'mediaLinkUrl',
                    'required' => false,
                    'options' => array(
                        'label' => 'Media Link',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'mediaLinkUrl'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'mediaLinkPage',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Link to a page or set an external link',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Content\LinksAndPages'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'mediaLinkPage',
                        'class' => 'chosen-select'
                    )
                )
            ),     

            
            array(
                'spec' => array(
                    'name' => 'addLinkPage',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'addLinkPage',
                        'value' => '<a class="button tiny editorlink" data-ref="mediaLinkPage" data-link="org" href="#">Link setzen</a>'
                    )
                )
            ),
            
             
            array(
                'spec' => array(
                    'name' => 'setpublicpdf',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Medias',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicPdf'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'setpublicpdf',
                        'class' => 'chosen-select'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'addpdf',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'addpdf',
                        'value' => '<a class="button tiny editorlink" data-ref="setpublicpdf" data-link="mcwork/files/download" href="#">Download Link setzen</a>'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'setnonpublic',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'NoPublicFiles',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\NonPublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'setnonpublic',
                        'class' => 'chosen-select'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'addnonpublic',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'addnonpublic',
                        'value' => '<a class="button tiny editorlink" data-ref="setnonpublic" data-link="mcwork/files/download" href="#">Download Link setzen</a>'
                    )
                )
            ),            
            

            
            array(
                'spec' => array(
                    'name' => 'formAccordionStyles',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionPanelStyles',
                        'value' => '</div></dd><dd><a href="#panelStyles">'.$this->translation('Contribution Styles').'</a><div id="panelStyles" class="content">'
                    )
                )
            ),
            

            
            array(
                'spec' => array(
                    'name' => 'element',
                    'required' => false,
                    'options' => array(
                        'label' => 'Contribution element',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'article' => '<article>',
                            'footer' => '<footer>',
                            'header' => '<header>',
                            'section' => '<section>'
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'element'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'elementAttribute',
                    'required' => false,
                    'options' => array(
                        'label' => 'Contribution attributte',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '2',
                        'id' => 'elementAttribute'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formAccordionAuthor',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionPanelAuthor',
                        'value' => '</div></dd><dd><a href="#panelAuthor">'.$this->translation('Forming published author').'</a><div id="panelAuthor" class="content">'
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
                    'name' => 'formAccordionPlugin',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionPanelPlugin',
                        'value' => '</div></dd><dd><a href="#panelPlugin">'.$this->translation('Contribution plugin attachment').'</a><div id="panelPlugin" class="content">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modul',
                    'required' => false,
                    'options' => array(
                        'label' => 'Plugins',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('Mcwork\Plugins'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'modul',
                        'data-service' => 'Mcwork\Plugins'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formPlugin',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formPlugin',
                        'value' => '<div id="pluginForm">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modulParams',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulParams'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modulDisplay',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulDisplay'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modulConfig',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulConfig'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modulLink',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulLink'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'modulFormat',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulFormat'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formPluginEnd',
                    'options' => array(),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formPluginEnd',
                        'value' => '</div>'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formAccordionEnd',
                    'options' => array(
                        'fieldset' => array(
                            'legend' => 'Eigenschaften',
                            'attributes' => array(
                                'class' => 'large-4 columns',
                                'id' => 'fieldsetConfiguration'
                            )
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formAccordionEnd',
                        'value' => '</div></dd></dl>'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formRowEnd',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumnEnd',
                        'value' => '</div>'
                    )
                )
            )
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
            'title' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'content' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'webContentgroup' => array(
                'required' => false
            ),
            'replaceDefault' => array(
                'required' => false
            ),            
            'modul' => array(
                'required' => false
            ),
            'mediaStyle' => array(
                'required' => false
            ),
            'mediaLinkUrl' => array(
                'required' => false
            ),
            'mediaLinkPage' => array(
                'required' => false            
            ),
            'setpublicpdf' => array(
                'required' => false
            ),
            'setnonpublic' => array(
                'required' => false
            ),            
            'htmlwidgets' => array(
                'required' => false
            ), 
            'element' => array(
                'required' => false
            ),
            'elementAttribute' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'modulParams' => array(
                'required' => false
            ),
            
            'modulDisplay' => array(
                'required' => false
            ),
            
            'modulConfig' => array(
                'required' => false
            ),
            
            'modulLink' => array(
                'required' => false
            ),
            
            'modulFormat' => array(
                'required' => false
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