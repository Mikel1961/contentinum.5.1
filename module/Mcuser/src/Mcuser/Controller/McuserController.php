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
 * @category contentinum user
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcuser\Controller;

use ContentinumComponents\Controller\AbstractFrontendController;
use Zend\Authentication\Result;
use Zend\View\Model\ViewModel;

/**
 * Mcuser login controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class McuserController extends AbstractFrontendController
{
    /**
     * logout application action
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $page, $defaultRole, $acl)
    {

        $this->frontendlayout($pageOptions, $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        
        $loginForm = $this->getServiceLocator()->get('User\FormLogin');
        
        return $this->buildView(array(
            'htmllayouts' => $this->getServiceLocator()->get('Contentinum\Htmllayouts'),
            'headline' => $pageOptions->headline,
            'content' => $pageOptions->content,
            'form' => $loginForm,
            'messages' => $this->flashMessenger()
                ->setNamespace('contentinum-login')
                ->getMessages()
        ));
    }

    /**
     * Login forms-processing
     * @return Ambigous <\Zend\Http\Response, \Zend\Stdlib\ResponseInterface>
     */
    public function process($pageOptions, $page, $defaultRole, $acl)
    {
        $loginForm = $this->getServiceLocator()->get('User\FormLogin');        
        $loginForm->setInputFilter($loginForm->getInputFilter());
        $loginForm->setData($this->getRequest()
            ->getPost());
        
        if ($loginForm->isValid()) {
            $formDatas = $loginForm->getData();
            try {
                if (false === ($user = $this->worker->userexists($formDatas['username']))) {
                    $this->flashMessenger()
                        ->setNamespace('contentinum-login')
                        ->addMessage('Unknown user or incorrect input');
                    return $this->redirect()->toUrl('/login');
                }                
                $authService = $this->getServiceLocator()->get('User\Authentication');               
                /* @var $authAdapter Database */
                $authAdapter = $this->getServiceLocator()->get('User\Authentication\Adapter');                
                $authAdapter->setLoginDatas($formDatas['username'], $formDatas['loginPassword'], $this->worker, $user);
                $authAdapter->setSalt($user['verify_string']);
                $authService->setAdapter($authAdapter);                
                $result = $authService->authenticate();
                if (! $result->isValid()) {
                    switch ($result->getCode()) {
                        case Result::FAILURE_CREDENTIAL_INVALID:
                            $this->worker->updateCountLogin($user);
                            $message = $result->getMessages();
                            break;
                        default:
                            $message = $result->getMessages();
                            break;
                    }
                    $this->flashMessenger()
                        ->setNamespace('contentinum-login')
                        ->addMessage($message);
                    return $this->redirect()->toUrl('/login');
                } else {                 
                    if (false !== ($identity = $authAdapter->getIdentityResult($this->getServiceLocator()))){
                        $identity->usergroups = $this->worker->usergroups($user['id']);
                        $authService->getStorage()->write($identity);             
                        $location = '/';
                        if (isset($user['login_homedir']) && strlen($user['login_homedir']) > 0) {
                            $location = $user['login_homedir'];
                        }
                        $this->worker->updateLogin($user);
                        return $this->redirect()->toUrl($location);
                    } else {
                        $this->flashMessenger()
                        ->setNamespace('contentinum-login')
                        ->addMessage('Your user entries are not correct');
                        return $this->redirect()->toUrl('/login');                        
                    }
                }
            } catch (\Exception $e) {}
        } else {
            $this->flashMessenger()
                ->setNamespace('contentinum-login')
                ->addMessage('Your user entries are not correct');
            return $this->redirect()->toUrl('/login');
        }
    }

    /**
     * View settings
     * @param array $variables
     * @return \Zend\View\Model\ViewModel
     */
    protected function buildView(array $variables)
    {
        $view = new ViewModel($variables);
        $view->setTemplate('content/login');
        return $view;
    }
}