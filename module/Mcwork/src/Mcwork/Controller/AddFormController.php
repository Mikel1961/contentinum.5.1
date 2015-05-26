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
 * @category contentinum mcevent
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Controller;

use ContentinumComponents\Controller\AbstractMcworkController;
use Zend\View\Model\ViewModel;

class AddFormController extends AbstractMcworkController
{
        
	public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $this->backendlayout($pageOptions, $this->getIdentity(), $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        
        $services = array();
        
        $form = $this->getServiceLocator()->get($this->getFormfactory());
        

        if (false !== ($cat = $this->params()->fromRoute('cat', false))){
            $cat = '/'  . $cat;
            $form->setAttribute('action', $pageOptions->getAppOption('formaction') .  $cat);
        }
        
        
        $this->populate($form,$pageOptions);
        
        return $this->buildView(array(
            'page' => $pageOptions->headTitle,
            'bodyScriptFiles' => $pageOptions->bodyScriptFiles,
            'pagecontent' => $pageOptions,
            'form' => $form,
            'services' => $services,
            'acl' => $acl,
            'role' => $defaultRole,
            'host' => $pageOptions->getHost(),
            'protocol' => 'http',
            'category' => $this->params()->fromRoute('cat', false),
            'usrgrps' => '',
            'identity' => $this->getIdentity()
        ), $pageOptions);
    }

    public function process($pageOptions, $defaultRole, $acl)
    {
        $form = $this->getServiceLocator()->get($this->getFormfactory());
        $cat = '';
        if (false !== ($cat = $this->params()->fromRoute('cat', false))){
            $cat = '/category/'  . $cat;
        }        
        $form->setInputFilter($form->getInputFilter());
        $form->setData($this->getRequest()
            ->getPost());
        if ($form->isValid()) {
            $formDatas = $form->getData();
            try {
                $msg = $this->worker->save($form->getData(), $this->worker->getEntity());               
                return $this->redirect()->toUrl($pageOptions->getAppOption('settoroute').$cat);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
        } else {
            $this->backendlayout($pageOptions, $this->getIdentity(), $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
                ->get('viewHelperManager'));
            $services = array();
            
            
            return $this->buildView(array(
                'page' => $pageOptions->headTitle,
                'bodyScriptFiles' => $pageOptions->bodyScriptFiles,
                'pagecontent' => $pageOptions,
                'form' => $form,
                'services' => $services,
                'acl' => $acl,
                'role' => $defaultRole,
                'host' => $pageOptions->getHost(),
                'protocol' => 'http',
                'category' => $this->params()->fromRoute('cat', false),
                'usrgrps' => '',
                'identity' => $this->getIdentity()
            ), $pageOptions);
        }
    }

    /**
     * View settings
     *
     * @param array $variables            
     * @return \Zend\View\Model\ViewModel
     */
    protected function buildView(array $variables, $pageOptions)
    {
        $view = new ViewModel($variables);
        
        $view->setVariable('customconfig', $this->getConfiguration());
        $view->setVariable('usergroups', $this->getServiceLocator()
            ->get('Mcwork\Groups\User'));
        
        if (false !== ($toRoute = $pageOptions->getAppOption('settoroute'))) {
            $view->setVariable('abortation', $toRoute);
        }        
        
        if (false !== ($formbuttons = $pageOptions->getAppOption('formbuttons'))){
            $view->setVariable('btnconfiguration', $formbuttons);
        }  
        
        $view->setVariable('formbuttons', $this->getServiceLocator()
            ->get('Mcwork\Buttons'));
        
        if (isset($pageOptions->templateWidget) && strlen($pageOptions->templateWidget) >= 3) {
            $view->setVariable('widget', $pageOptions->templateWidget);
        }
        
        if (isset($pageOptions->toolbar) && 1 === $pageOptions->toolbar) {
            $view->setVariable('toolbarcontent', $this->getServiceLocator()
                ->get('Mcwork\Toolbar'));
        }
        if (isset($pageOptions->tableedit) && 1 === $pageOptions->tableedit) {
            $view->setVariable('tableeditcontent', $this->getServiceLocator()
                ->get('Mcwork\Tableedit'));
        }
        
        $view->setTemplate($pageOptions->template);
        return $view;
    }
    
    /**
     * Populate entries in form fields from configuration file
     */
    protected function populate($form, $pageOptions)
    {
        $populate = false;
        if (false != ($populateFromRoute = $pageOptions->getAppOption('populateFromRoute'))) {
            foreach ($populateFromRoute as $formRoute => $key) {
                $populate[$key] = $this->params()->fromRoute($formRoute);
            }
        }
        if (false !== ($populateAdd = $pageOptions->getAppOption('populate'))) {
            if (false !== $populate) {
                $populate = array_merge($populateAdd, $populate);
            } else {
                $populate = $populateAdd;
            }
        }
        if (false !== $populate) {
            $form->populateValues($populate);
        }
    }    
}