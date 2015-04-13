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

use ContentinumComponents\Controller\AbstractContentinumController;
use Zend\View\Model\ViewModel;
use Contentinum\Mapper\Error;
use Contentinum\Entity\WebPagesParameter;
use Contentinum\Mapper\Queries\Content;

/**
 * Index controller
 *
 * @todo draft status
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ErrorController extends AbstractContentinumController
{

    /**
     * Error message
     * 
     * @var string
     */
    protected $message;

    /**
     * HTTP status code
     * 
     * @var int
     */
    protected $statusCode = 404;

    /**
     *
     * @return the $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     *
     * @param string $message            
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     *
     * @return the $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     *
     * @param number $statusCode            
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $errModul = new Error($this->serviceLocator->get('doctrine.entitymanager.orm_default'));
        $errModul->setEntity(new WebPagesParameter());
        $entries = $errModul->fetchContent();
        
        $customError = false;
        foreach ($entries as $entry) {
            $viewHelperManager = $this->getServiceLocator()->get('viewHelperManager');
            $headTitleHelper = $viewHelperManager->get('headTitle');
            $headTitleHelper->setSeparator(' - ');
            $headTitleHelper->prepend($entry->label);
            $headTitleHelper->append($entry->webPreferences->title);           
            $content = new Content($this->serviceLocator->get('doctrine.entitymanager.orm_default'));
            $variables['entries'] = $content->fetchErrorContent($entry->id);
            $variables['htmllayouts'] = $this->getServiceLocator()->get('Contentinum\Htmllayouts');
            $variables['htmlwidgets'] = $this->getServiceLocator()->get('Contentinum\Widgets');
            $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
            $variables['contentstyles'] = $this->getServiceLocator()->get('Contentinum\ContentStyles');
            $variables['templateKey'] = $entry->htmlstructure;
            $variables['customError'] = true;
            
            $customError = true;
            
            break;
        }
        
        $this->getResponse()->setStatusCode($this->statusCode);
        
        if (true === $customError) {
            $view = new ViewModel($variables);
            $view->setTemplate('error/404');
            
            //var_dump('?');exit;
            
        } else {
            $view = new ViewModel();
            if ($this->message) {
                $view->setVariable('message', $this->message);
            }
            if (404 == $this->statusCode) {
                $view->setTemplate('error/404');
            } else {
                $view->setTemplate('error/index');
            }
        }
        return $view;
    }
}