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
namespace Contentinum\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Contentinum\Controller\ApplicationController;
use Zend\Http\PhpEnvironment\Request as HttpRequest;
use Contentinum\Controller\SearchController;


/**
 * Application bootstrap factory
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *
 */
class ApplicationControllerFactory implements FactoryInterface
{

    /**
     * Create controller
     *
     * @param ControllerManager $serviceLocator
     * @return Contentinum\Controller\ApplicationController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $sl = $controllerManager->getServiceLocator();
        /**
         *
         * @var Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
         */
        $pageOptions = $sl->get('Contentinum\PageOptions');
        $defaultPages = $sl->get('Contentinum\PageConfiguration');  
        $request = new HttpRequest();
        $pageOptions->setHost($request->getUri()->getHost());
        $pageOptions->setQuery($request->getUri()->getPath());
        $pageOptions->setProtocol(null);
        $preferences = $sl->get('Contentinum\Preference');
        $pageOptions->addPageOptions($preferences);
        $pageOptions->addPageOptions($preferences, $pageOptions->getHost());
        $pages = $sl->get('Contentinum\PublicPages');
        $pages = (is_array($pages)) ? $pages : $pages->toArray();
        $pages = (isset($pages[$pageOptions->getStdParams()])) ? $pages[$pageOptions->getStdParams()] : array();
        $attribute = $sl->get('Contentinum\AttributePages');
        $attribute = (is_array($attribute)) ? $attribute : $attribute->toArray();
        $url = $pageOptions->split($pageOptions->getQuery(),1);
        $pageHeaders = $sl->get('Contentinum\PageHeaders');

        if (strlen($url) == 0){
            $url = 'index';
        }    
        
        if (isset($pages[$url])){
            $page = $pages[$url];
            ( isset( $attribute[$page['parentPage']] ) ) ? $pageOptions->addPageOptions($attribute, $page['parentPage']) : false;
            ( isset( $attribute[$page['id']] ) ) ? $pageOptions->addPageOptions($attribute, $page['id']) : false;   
            ( isset( $pageHeaders[$page['parentPage']] ) ) ? $pageOptions->addPageHeaders($pageHeaders[$page['parentPage']]) : false;
            ( isset( $pageHeaders[$page['id']] ) ) ? $pageOptions->addPageHeaders($pageHeaders[$page['id']]) : false;
            $pageOptions->addPageOptions($pages, $url);
            $em = $sl->get($pageOptions->getAppOption('entitymanager'));
            $workerName = $pageOptions->getAppOption('worker');
            $worker = new $workerName($em);
            $entityName = $pageOptions->getAppOption('entity');
            $worker->setEntity(new $entityName());
            switch ($url){
                case 'suche' :
                    $controller = new SearchController($pageOptions, $page);
                    break;
                default:
                    $controller = new ApplicationController($pageOptions, $page);
                    break;
            }
            
            $controller->setWorker($worker);
            return $controller;            
        } elseif ($defaultPages[$url]){
            $page = $defaultPages[$url];
            $page = $page->toArray();
            $pageOptions->addPageOptions($attribute, $pages['index']['parentPage']);
            $pageOptions->addPageOptions($defaultPages->toArray(), $url);
            $em = $sl->get($pageOptions->getAppOption('entitymanager'));
            $workerName = $pageOptions->getAppOption('worker');
            $worker = new $workerName($em);
            $entityName = $pageOptions->getAppOption('entity');
            $worker->setEntity(new $entityName());            
            $controllerName = $pageOptions->getAppOption('controller');
            $controller = new $controllerName($pageOptions, $page);
            $controller->setWorker($worker);
            return $controller;                
        } else {
            $ctrl = new \Contentinum\Controller\ErrorController();
            $ctrl->setMessage('The desired page is not available!');
            return $ctrl;  

        }        
    }
}