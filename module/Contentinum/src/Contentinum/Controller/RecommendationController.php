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
class RecommendationController extends AbstractFrontendController
{
    /**
     * 
     * @var unknown
     */
    private $formAttributtes = array(
        'id' => 'recommendForm',
        'class' => 'form-recommend',
        'accept-charset' => 'UTF-8'
    );    

    /**
     * Application action display page content
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $page, $defaultRole, $acl)
    {
        $viewHelperManager = $this->getServiceLocator()->get('viewHelperManager');
        $dateFormat = $viewHelperManager->get('dateFormat');
        $dateFormat->setTimezone("Europa/Berlin")->setLocale("de_DE");
    
        $variables['host'] = $pageOptions->getHost();
        $variables['templateKey'] = $pageOptions->htmlstructure;
        $variables['htmlassets'] = $this->getServiceLocator()->get('Contentinum\Htmlassets');
        $variables['htmllayouts'] = $this->getServiceLocator()->get('Contentinum\Htmllayouts');
        $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
        $variables['xmlHttpRequest'] = $this->getXmlHttpRequest();

        $entry = $this->worker->getContribution( $pageOptions->getArticle());
    
        $formFactory = $this->getServiceLocator()->get('Recommendation\Forms');   

        
        $form = $formFactory->getForm();
        
        $form->setAttribute('action', '/emailrecom/'.$pageOptions->getArticle());
        $form->setAttribute('method', 'POST');
        
        $form->populateValues(array('headline' => $entry['headline'] ));

        foreach ($this->formAttributtes as $attribute => $value){
            $form->setAttribute($attribute,$value);
        }        
        
        $variables['form'] = $form;
        
        return $this->buildView($variables,$pageOptions->template);
    }
    
    /**
     * @todo translation
     * 
     * Process action processed a request form
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     * @return \Zend\View\Model\ViewModel
     */
    public function process($pageOptions, $page, $defaultRole, $acl)
    {
        
        $variables['host'] = $pageOptions->getHost();
        $variables['templateKey'] = $pageOptions->htmlstructure;
        $variables['htmllayouts'] = $this->getServiceLocator()->get('Contentinum\Htmllayouts');
        $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');        
        $datas = $this->getRequest()->getPost();
        $entry = $this->worker->fetchContributionLink( $pageOptions->getArticle());
        $formFactory = $this->getServiceLocator()->get('Recommendation\Forms');   
      

        $form = $formFactory->getForm();
        $form->setInputFilter($form->getInputFilter());
        $form->setData($datas);
        if ($form->isValid()) {
            $configuration = $this->getConfiguration();
            /**
             * @var \Contentinum\Model\Sendmail $mail
            */
            $mail = $this->getServiceLocator()->get('Contentinum\Sendmail');
            $mail->setFormDatas($form->getData());
            $mail->setConfigure($configuration->default->support_mail);
            $mail->sendRecommendation($datas, $entry, $variables['host']);
            $variables['success'] = 'success';
            $jsonVar['success'] = 'Ihre Empfehlung wurde erfolgreich versandt.';
        } else {
            $variables['error'] = array('fields' => $form->getMessages());
            $jsonVar['error'] = array('fields' => $form->getMessages());
        }
        if ($this->getXmlHttpRequest()){ 
            echo json_encode($jsonVar);
            exit;
        }
        return $this->buildView($variables,$pageOptions->template);
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