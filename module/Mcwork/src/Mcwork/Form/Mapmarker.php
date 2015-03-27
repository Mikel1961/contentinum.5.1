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


class Mapmarker extends AbstractForms
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
                    'name' => 'webMaps',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Maps',
                        'empty_option' => 'Assign to a map',
                        'value_options' => $this->getSelectOptions('webMaps', array(
                            'value' => 'id',
                            'label' => 'headline'                            
                        )),               
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMaps',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'location',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Search location',
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
                    'name' => 'latitude',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Latitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'latitude'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'longitude',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Longitude',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'longitude'
                    )
                )
            ),   

            array(
                'spec' => array(
                    'name' => 'webMedias',
                    'required' => true,
                    'options' => array(
                        'label' => 'Media item',
                        'empty_option' => 'Please select a media',
                        'value_options' => $this->getSelectOptions('webMedias', array(
                            'value' => 'id',
                            'label' => 'mediaName',
                        ), array(),
                            null, false, array(), array('main.mediaName' => 'ASC')
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMedias',
                        'class' => 'chosen-select',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'Name',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
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
                    'name' => 'street',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Street and number',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'street'
                    )
                )
            ),

            array(
                'spec' => array(
                    'name' => 'city',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Zipcode and city',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'city'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'description',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Markerdatas',
                            'attributes' => array(
                                'class' => 'large-6 columns',
                                'id' => 'fieldset'
                            )
                        )                        
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
                    'name' => 'mapcontainer',
                    'options' => array(
            
                        'fieldset' => array(
                            'legend' => 'Marker',
                            'attributes' => array(
                                'class' => 'large-6 columns',
                                'id' => 'fieldset'
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