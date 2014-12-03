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
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcuser\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mcuser\Form\LoginFrom;

class LoginFormFactory implements FactoryInterface
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        /**
         * @var $pageOptions Contentinum\Options\PageOptions
         */
        $pageOptions = $sl->get('User\PageOptions');
        
        $em = $sl->get($pageOptions->getAppOption('entitymanager'));
        $workerName = $pageOptions->getAppOption('worker');
        $worker = new $workerName($em);        
        
        $formFactory = new LoginFrom($worker);
        $decorators = $sl->get('User\FormDecorators');
        $decorators = $decorators->default->toArray();  

        if (false != ($formAttribs = $pageOptions->getAppOption('formattributes'))) {
            $decorators['deco-form']['form-attributtes'] = array_merge($decorators['deco-form']['form-attributtes'], $formAttribs);
        }
        $formFactory->setDecorators($decorators);
        $formFactory->setServiceLocator($sl);   

        $form = $formFactory->getForm();
        $form->setAttribute('action', $pageOptions->getAppOption('formaction'));
        $form->setAttribute('method', 'POST');        
        
        if (true == ($deco = $formFactory->getDecorators($formFactory::DECO_FORM)) ){
            if ( isset($deco['form-attributtes']) && is_array($deco['form-attributtes']) ){
                foreach ($deco['form-attributtes'] as $attribute => $value){
                    $form->setAttribute($attribute,$value);
                }
            }
        }
        unset($formFactory);        
        return $form;
        
    }

    
}