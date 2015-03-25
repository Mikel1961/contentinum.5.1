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
class Links extends AbstractForms
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
                    'name' => 'webPreferences',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Domain refer',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webPreferences', array(
                            'value' => 'id',
                            'label' => 'host'
                        )),
                        'description' => 'Wenn Sie mehrere Webseiten / Domains pflegen, treffen Sie hier eine Auswahl',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webPreferences'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'label',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Linkname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Der Linkname wird in der Navigation der Webseite angezeigt oder als Label in der Linkliste',
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
                    'name' => 'url',
                    'required' => true,
                    'options' => array(
                        'label' => 'Url',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'F&uuml;r externe Links bitte die vollst&auml;ndige Url angeben (http:// oder https://). F&uuml;r nicht-verlinkte &Uuml;berschriften in der Navigation setzen Sie eine Raute (#).',
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'url'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'title',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link title (is displayed as a tooltip)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Der Link Title wird als Tooltip angezeigt, wenn der Link mit der Maus ber&uuml;hrt wird',
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'title'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'metaDescription',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Die Beschreibung wir unter dem Link in einer Linkliste angezeigt',
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
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Set access rights to that resource',
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
            'metaDescription' => array(
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