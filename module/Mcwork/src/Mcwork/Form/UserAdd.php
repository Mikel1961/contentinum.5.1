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
 * contentinum mcwork form user add
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class UserAdd extends AbstractForms
{
    
    /*
     * (non-PHPdoc) @see \Contentinum\Forms\AbstractForms::elements()
     */
    public function elements()
    {
        return array(
            
            array(
                'spec' => array(
                    'name' => 'contacts',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Contacts',
                        'empty_option' => 'Select a contact',
                        'value_options' => $this->getSelectOptions('contacts', array(
                            'value' => 'id',
                            'label' => array('objectName', 'firstName', 'lastName')
                        )),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'contacts',
                        'class' => 'chosen-select'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'userRoles',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'User roles',
                        'empty_option' => 'Assign the user to a role',
                        'value_options' => $this->getSelectOptions('userRoles',
                            array('value' => 'id', 'label' => 'name'), 
                            array('main.id != :id' => array(':id', '1'))
                            
                         ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'userRoles'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'username',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Username',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'username'
                    )
                )
            ),  

            array(
                'spec' => array(
                    'name' => 'loginHomedir',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Login Homedirectory',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'loginHomedir'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'loginPassword',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Password',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'loginPassword'
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
            'username' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'ContentinumComponents\Validator\Doctrine\NoRecordExists',
                        'options' => array(
                            'storage' => $this->getStorage(),
                            'entity' => 'Contentinum\Entity\Users5',
                            'field' => 'username',
                            'exclude' => $this->getExclude()
                        )
                    )
                )                            
            ),
            'loginHomedir' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                ),
            ),            
            'loginPassword' => array(
                'required' => true,
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