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

/**
 * Mcwork backend application controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class McworkController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $this->backendlayout($pageOptions, $this->getIdentity(), $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        $services = array();
        $params = array(
            'id' => $this->params()->fromRoute('id', 0)
        );
        if (null !== ($getServices = $this->getServices())) {
            foreach ($getServices as $key => $service) {
                $services[$key] = $this->getServiceLocator()->get($service);
            }
        }
        
        return $this->buildView(array(
            'page' => $pageOptions->headTitle,
            'pagecontent' => $pageOptions,
            'entries' => $this->worker->fetchContent($params),
            'services' => $services,
            'acl' => $acl,
            'role' => $defaultRole,
            'host' => $pageOptions->getHost(),
            'protocol' => 'http',
            'usrgrps' => '',
            'resource' => $this->getServiceLocator()->get('Acl\Resource'), 
            'category' => $this->params()->fromRoute('id', 0),
            'identity' => $this->getIdentity()
        ), $pageOptions);
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
        
        $view->setVariable('messages', $this->flashMessenger()
            ->setNamespace('mcwork-controller')
            ->getMessages());
        
        $view->setVariable('usergroups', $this->getServiceLocator()
            ->get('Mcwork\Groups\User'));
        
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
        
        // var_dump($pageOptions->template);
        // exit;
        $view->setTemplate($pageOptions->template);
        return $view;
    }
}