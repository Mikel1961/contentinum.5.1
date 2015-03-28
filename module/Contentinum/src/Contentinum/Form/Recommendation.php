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
 * @category contentinum
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Recommendation extends AbstractForms
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
                    'name' => 'noteheadline',
                    'options' => array(
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'noteheadline',
                        'value' => '<h2>Artikel empfehlen</h2><p>Einen Artikel als Link empfehlen.</p><div id="form-container"><div class="server-process"> </div>',
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'headline',
                    'required' => false,
            
                    'options' => array(
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'readonly' => 'readonly',
                        'id' => 'headline'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'name',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Ihr Name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'name'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'sender',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Ihre E-Mail Adresse',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Email',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'sender'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'namereceiver',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Name Empfänger',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'namereceiver'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'receiver',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'E-Mail Adresse Empfänger',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Email',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'receiver'
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'note',
                    'options' => array(
                        'label' => 'Nachricht',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'content',
                    )
                )
            ), 
            array(
                'spec' => array(
                    'name' => 'send',
                    'type' => 'Submit',
                    'attributes' => array(
                        'class' => 'button expand',
                        'value' => 'Absenden',
                        'id' => 'sendbutton'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'noteend',
                    'options' => array(
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'noteend',
                        'value' => '</div>',
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
            'name' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'shortname' => array(
                'required' => false,
            ),
            'pdffile' => array(
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