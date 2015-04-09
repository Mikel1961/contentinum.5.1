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
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Controller;

use ContentinumComponents\Controller\AbstractFrontendController;
use Zend\View\Model\ViewModel;

/**
 * The application controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ApplicationController extends AbstractFrontendController
{

    /**
     * Application action display page content
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $page, $defaultRole, $acl)
    {
        $this->frontendlayout($pageOptions, $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        
        $this->worker->setArticle($pageOptions->getArticle());
        $this->worker->setCategory($pageOptions->getCategory());
        $entries = $this->worker->fetchContent($page);
        $modul = $this->getServiceLocator()->get('Contentinum\Modul');
        $modul->setPlugins($this->getServiceLocator()->get('Contentinum\PluginKeys'));
        $modul->setArticle($pageOptions->getArticle());
        $modul->setCategory($pageOptions->getCategory());
        $modul->setUrl($page['url']);
        $modul->setModul($this->worker->getModul());

        $cookies = $this->getRequest()->getHeaders()->get('Cookie');
        if (isset($cookies['PHPSESSID'])){
            unset($cookies['PHPSESSID']);
        }
        
        $variables['htmllayouts'] = $this->getServiceLocator()->get('Contentinum\Htmllayouts');
        $variables['htmlwidgets'] = $this->getServiceLocator()->get('Contentinum\Widgets');
        $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
        $variables['contentstyles'] = $this->getServiceLocator()->get('Contentinum\ContentStyles');
        $variables['medias'] = $this->getServiceLocator()->get('Contentinum\Medias');
        $variables['entries'] = $entries;
        $variables['plugins'] = $modul->fetchContent();
        $variables['role'] = $defaultRole;
        $variables['acl'] = $acl;
        $variables['content'] = false;
        $variables['useragent'] = 'desktop';
        $variables['pageurl'] = $page['url'];
        $variables['article'] = $pageOptions->getArticle();
        $variables['cookies'] = $cookies;
        $variables['category'] = $pageOptions->getCategory();
        $variables['templateKey'] = $pageOptions->htmlstructure;
        $variables['host'] = $pageOptions->host;
        $variables['protocol'] = $pageOptions->protocol;
        $variables['pluginViewHelper'] = $this->getServiceLocator()->get('Contentinum\PluginViews');
        
        return $this->buildView($variables,$pageOptions->template);
    }
    
    /**
     * Process action processed a request form
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     * @return \Zend\View\Model\ViewModel
     */
    public function process($pageOptions, $page, $defaultRole, $acl)
    {
        $datas = $this->getRequest()->getPost();
        $formIdent = $datas['formident'];
        $formFactory = $this->getServiceLocator()->get('Contentinum\Forms');
        $formFactory->setConfigure(array('modulParams' => $formIdent));
        unset($datas['formident']);
        $result = $formFactory->fetchContent();
        $form = $result['form'];
        $form->setInputFilter($form->getInputFilter());
        $form->setData($datas);
        if ($form->isValid()) {
            $configuration = $this->getConfiguration();
            $process = $this->getServiceLocator()->get('Contentinum\FormProcess');
            /**
             * @var \Contentinum\Model\Sendmail $mail
             */
            $mail = $this->getServiceLocator()->get('Contentinum\Sendmail');
            $mail->setFormConfigure($process->find($formIdent));
            $mail->setFormFields($formFactory->getFormFields());
            $mail->setFormDatas($form->getData());
            $mail->setConfigure($configuration->default->support_mail);
            $mail->send();
            $response['success'] = $result['responsetext'];
        } else {
            $response['error'] = array('fields' => $form->getMessages());
        }
        $view = new ViewModel(array(
            'data' => $response
        ));
        $view->setTemplate('contentinum/json');
        return $view;
    }

    /**
     * Prepare view renderer
     * @param array $variables
     * @param string $template template script and source
     * @return \Zend\View\Model\ViewModel
     */
    public function buildView($variables, $template = null)
    {
        $view = new ViewModel($variables);
        if (null !== $template) {
            $view->setTemplate($template);
        }
        return $view;
    }
}