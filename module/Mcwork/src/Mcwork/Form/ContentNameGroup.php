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
class ContentNameGroup extends AbstractForms
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
                    'name' => 'name',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Nachrichtengruppe',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Name Nachrichtengruppe (Nur Intern)',
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
                    'name' => 'feedTitle',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Feed Titel',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'feedTitle'
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'feedAuthor',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Feed Author',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'feedAuthor'
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'feedAuthoremail',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Feed Authoremail',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Email',
                    'attributes' => array(
                        'id' => 'feedAuthoremail'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'feedAuthorinternet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Feed Author Internet',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Url',
                    'attributes' => array(
                        'id' => 'feedAuthorinternet',
                        //'placeholder' => 'http://'
                    )
                )
            ),            

            array(
                'spec' => array(
                    'name' => 'feedCount',
                    'required' => false,
                    'options' => array(
                        'label' => 'Anzahl Feedeinträge',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            '0' => 'Kein Feed',
                            '1' => 'Display 1',
                            '2' => 'Display 2',
                            '3' => 'Display 3',
                            '4' => 'Display 4',
                            '5' => 'Display 5',
                            '6' => 'Display 6',
                            '7' => 'Display 7',
                            '8' => 'Display 8',
                            '9' => 'Display 9',
                            '10' => 'Display 10',
                            '11' => 'Display 11',
                            '12' => 'Display 12',
                            '13' => 'Display 13',
                            '14' => 'Display 14',
                            '15' => 'Display 15',
                            '16' => 'Display 16',
                            '17' => 'Display 17',
                            '18' => 'Display 18',
                            '19' => 'Display 19',
                            '20' => 'Display 20',
                            '21' => 'Display 21',
                            '22' => 'Display 22',
                            '23' => 'Display 23',
                            '24' => 'Display 24',
                            '25' => 'Display 25',
                            '26' => 'Display 26',
                            '27' => 'Display 27',
                            '28' => 'Display 28',
                            '29' => 'Display 29',
                            '30' => 'Display 30',
                            '31' => 'Display 31',
                            '32' => 'Display 32',
                            '33' => 'Display 33',
                            '34' => 'Display 34',
                            '35' => 'Display 35',
                            '36' => 'Display 36',
                            '37' => 'Display 37',
                            '38' => 'Display 38',
                            '39' => 'Display 39',
                            '40' => 'Display 40',                                                        
                            '41' => 'Display 41',
                            '42' => 'Display 42',
                            '43' => 'Display 43',
                            '44' => 'Display 44',
                            '45' => 'Display 45',
                            '46' => 'Display 46',
                            '47' => 'Display 47',
                            '48' => 'Display 48',
                            '49' => 'Display 49',
                            '50' => 'Display 50',                            
                            '9999' => '&infin;'
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Aktivierung und Anzahl der Feedeinträge'
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'feedCount',
                        'value' => '0'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'feedUrl',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Feed Url',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'feedUrl'
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
            'feedAuthoremail' => array(
                'required' => false,
            ),            
            'feedAuthorinternet' => array(
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