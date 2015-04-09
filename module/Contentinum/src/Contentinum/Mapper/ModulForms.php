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
namespace Contentinum\Mapper;

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulForms extends AbstractModuls
{
    const ENTITY_NAME = 'Contentinum\Entity\WebFormsField';
    
    const TABLE_NAME = 'web_forms_field';
    
    /**
     * ContentinumComponents\Forms\AbstractForms
     * @var ContentinumComponents\Forms\AbstractForms $formFactory
     */
    private $formFactory;
    
    /**
     * 
     * @var array
     */
    private $formFields;

	/**
     * @return the $formFactory
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

	/**
     * @param \Contentinum\Mapper\ContentinumComponents\Forms\AbstractForms $formFactory
     */
    public function setFormFactory($formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @return the $formFields
     */
    public function getFormFields()
    {
        return $this->formFields;
    }
    
    /**
     * @param multitype: $formFields
     */
    public function addFormFields($name, $key, $value)
    {
        $this->formFields[$name][$key] = $value;
    }    

	/**
     * @param multitype: $formFields
     */
    public function setFormFields($formFields)
    {
        $this->formFields = $formFields;
    }

    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModul::fetchContent()
     */
	public function fetchContent(array $params = null)
    {
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * Form content
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $result = array();
        foreach ($entries as $entry){
            $id = $entry->webForms->id;
            $subheadline = $entry->webForms->subheadline;
            $description = $entry->webForms->description;
            $responsetext = $entry->webForms->responsetext;
            $fieldElements[] = $this->buildFieldArray($entry); 
        }
        $fieldElements[] = $this->createButton();
        $this->formFactory->setFieldElements($fieldElements);
        $form = $this->formFactory->getForm();

        $form->setAttribute('action', '/'. $this->getUrl());
        $form->setAttribute('method', 'POST'); 
        $form->setAttribute('data-formident', $id); 

        if (true == ($deco = $this->formFactory->getDecorators('deco-form')) ){
            if ( isset($deco['form-attributtes']) && is_array($deco['form-attributtes']) ){
                foreach ($deco['form-attributtes'] as $attribute => $value){
                    $form->setAttribute($attribute,$value);
                }
            }
        }
        
        $result['subheadline'] = $subheadline;
        $result['description'] = $description;
        $result['responsetext'] = $responsetext;
        $result['form'] = $form;
        return $result;
    }
    
    /**
     * Build format form filed content array for zend/form factory
     * @param object $entry
     * @return multitype:Ambigous <string, multitype:multitype: boolean string NULL >
     */
    private function buildFieldArray($entry)
    {
        $field = array();
        $field['attributes'] = array();        
        $field['options'] = array();        
        $field['name'] = $entry->fieldName;
        if ('yes' === $entry->fieldRequired){
            $field['required'] = true;
            $field['attributes']['required'] = 'required';
        } else {
            $field['required'] = false;
        }
        if (strlen($entry->label) > 1 ){
            $field['options']['label'] = $entry->label;
            $this->addFormFields($entry->fieldName, 'label', $entry->label);
        }
        switch ($entry->fieldTyp){
            case 'Select':
                $field['type'] = 'Select';
                $field['options']['empty_option'] = 'Please select';
                $field['options']['value_options'] = $this->valueOptions($entry->id);
                $field['options']['deco-row'] = $this->formFactory->getDecorators('deco-element-row');
                break;                
            case 'Text':
                $field['type'] = 'Text';
                $field['options']['deco-row'] = $this->formFactory->getDecorators('deco-element-row');
                break;  
            case 'Tel':
                $field['type'] = 'ContentinumComponents\Forms\Elements\Tel';
                $field['options']['deco-row'] = $this->formFactory->getDecorators('deco-element-row');
                break;                 
            case 'Email':
                $field['type'] = 'Email';
                $field['options']['deco-row'] = $this->formFactory->getDecorators('deco-element-row');
                break;                
            case 'Textarea':
                $field['type'] = 'Textarea';
                $field['options']['deco-row'] = $this->formFactory->getDecorators('deco-element-row');
                $field['attributes']['rows'] = '4';
                break;                             
            default:
                break;
        }
        
        if ( strlen($entry->description) > 1 ){
            $field['options']['description'] = $entry->description;
            $this->addFormFields($entry->fieldName, 'description', $entry->description);
        }
        
        if ( strlen($entry->fieldDomid) > 1 ){
            $field['attributes']['id'] = $entry->fieldDomid;
        } else {
            $field['attributes']['id'] = $entry->fieldName;
        }
        
        if ( strlen($entry->fieldclass) > 1 ){
            $field['attributes']['class'] = $entry->fieldclass;
        }        
        
        return array('spec' => $field);
    }
    
    /**
     * Form query
     * @param unknown $id
     */
    private function query($id)
    {
        return $this->getStorage()->getRepository( self::ENTITY_NAME )->findBy(array('webForms' => $id, 'publish' => 'yes'), array('itemRang' => 'ASC'));
    }
    
    
    /**
     * Form select options
     * @param unknown $formField
     */
    private function valueOptions($formField)
    {
        /**
         * @var $mapper \Contentinum\Mapper\FormFieldOptions
         */
        $mapper = $this->getSl()->get('Contentinum\SelectFieldFactory');
        return $mapper->getSelectOptions($formField);
    }

    /**
     * Form button
     * @return multitype:multitype:string multitype:string
     */
    private function createButton()
    {
        return array(
            'spec' => array(
                'name' => 'send',
                'type' => 'Submit',
                'attributes' => array(
                    'class' => 'button expand',
                    'value' => 'Absenden'
                )
            )
        );
    }
}