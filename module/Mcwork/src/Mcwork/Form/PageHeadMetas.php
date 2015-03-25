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
class PageHeadMetas extends AbstractForms
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
                    'name' => 'webMedias',
                    'required' => false,
                    'options' => array(
                        'label' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('Mcwork\PublicMedia'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'webMedias',
                        'class' => 'chosen-select'
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'name',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Name, Beschreibung',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Name oder kurze Beschreibung des Links (Nur Intern)',
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'name'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'metaRel',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link Rel',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                           'alternate' => 'Alternate',
                            'icon' => 'Icon',
                            'apple-touch-icon' => 'Apple touch icon',
                            'author' => 'Author',
                            'start' => 'Sart',
                            'search' => 'Search',
                            'contents' => 'Contents',
                            'copyright' => 'Copyright',
                            'help' => 'Help',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'metaRel'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'metaType',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link type',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            'application/rss+xml' => 'RSS Feed',
                            'image/png' => 'PNG Icon',
                            'image/jpg' => 'JPG Icon',
                            'image/gif' => 'GIF Icon',
                            'text/css' => 'Stylsheet Dokument',
                            'text/javascript' => 'Javascript Dokument',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'metaType'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'metaTitle',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Link meta title',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'metaTitle'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'metaLink',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Dokumentenlink',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Link zum Dokument oder zur Datei',
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'metaLink'
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
        return array();
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