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
class Maps extends AbstractForms
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
                    'name' => 'headline',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Headline',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
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
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
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
                    'name' => 'description',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'description',
                        'class' => 'mapdescription',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'location',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Map section (location)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                         
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'location'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'centerlatitude',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Latitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'centerlatitude'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'centerlongitude',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Longitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'centerlongitude'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'startzoom',
                    'required' => true,
                    'options' => array(
                        'label' => 'Map zoom',
                        'empty_option' => 'Please select',
                        'value_options' => array(
                            1 => 'Zoom 1',
                            2 => 'Zoom 2',
                            3 => 'Zoom 3',
                            4 => 'Zoom 4',
                            5 => 'Zoom 5',
                            6 => 'Zoom 6',
                            7 => 'Zoom 7',
                            8 => 'Zoom 8',
            
                            9 => 'Zoom 9',
                            10 => 'Zoom 10',
                            11 => 'Zoom 11',
                            12 => 'Zoom 12',
                            13 => 'Zoom 13',
                            14 => 'Zoom 14',
                            15 => 'Zoom 15',
                            16 => 'Zoom 16',
            
                            17 => 'Zoom 17',
                            18 => 'Zoom 18',
                            19 => 'Zoom 19',
                            20 => 'Zoom 20',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_TAB_ROW),
                        'fieldset' => array(
                            'legend' => 'Mapdatas',
                            'attributes' => array(
                                'class' => 'large-6 columns',
                                'id' => 'fieldsetmapdatas'
                            )
                        )                        
            
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'startzoom',
                    )
                )
            ),            
            
            

           
            
            
            array(
                'spec' => array(
                    'name' => 'mapcontainer',
                    'options' => array(
                    
                        'fieldset' => array(
                            'legend' => 'Map',
                            'attributes' => array(
                                'class' => 'large-6 columns',
                                'id' => 'fieldsetmap'
                            )
                        )                    
                    
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'mapcontainer',
                        'value' => '<div id="map_canvas"> </div>'
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
            'headline' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'subheadline' => array(
                'required' => false
            ),
            'description' => array(
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