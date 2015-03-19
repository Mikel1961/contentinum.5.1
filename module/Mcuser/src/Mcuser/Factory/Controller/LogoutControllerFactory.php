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
namespace Mcuser\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Http\PhpEnvironment\Request as HttpRequest;
use Mcuser\Controller\LogoutController;

class LogoutControllerFactory implements FactoryInterface
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
        $pageOptions = $sl->get('User\PageOptions');
        $request = new HttpRequest();
        $pageOptions->setHost($request->getUri()->getHost());
        $pageOptions->setQuery($request->getUri()->getPath());
        $preferences = $sl->get('Contentinum\Preference');
        $pageOptions->addPageOptions($preferences);
        $pageOptions->addPageOptions($preferences, $pageOptions->getHost());
        $pages = $sl->get('Contentinum\PublicPages');
        $pages = (is_array($pages)) ? $pages : $pages->toArray();
        $pages = (isset($pages[$pageOptions->getStdParams()])) ? $pages[$pageOptions->getStdParams()] : array();
        $attribute = $sl->get('Contentinum\AttributePages');
        $attribute = (is_array($attribute)) ? $attribute : $attribute->toArray();
        
        $url = $pageOptions->split($pageOptions->getQuery(),3);
        if (strlen($url) == 0){
            $url = 'index';
        }        
        
        if (isset($pages[$url])){
            $pageOptions->addPageOptions($pages, $url);
            $page = $pages[$url];
        } else {
            $defaultPages = $sl->get('User\Pages');
            $defaultPages = (is_array($defaultPages)) ? $defaultPages : $defaultPages->toArray();

            if ( isset($defaultPages[$url]) ){
                $pageOptions->addPageOptions($defaultPages, $url);
                $page = $defaultPages[$url];
                $page['parentPage'] = 0;
                $page['id'] = 0;
            } else {
                
                $ctrl = new \Contentinum\Controller\ErrorController();
                $ctrl->setMessage('The desired page is not available!');
                return $ctrl;
                  
            }
        
        }        
        
        ( isset( $attribute[$page['parentPage']] ) ) ? $pageOptions->addPageOptions($attribute, $page['parentPage']) : false;
        ( isset( $attribute[$page['id']] ) ) ? $pageOptions->addPageOptions($attribute, $page['id']) : false;    

        $em = $sl->get($pageOptions->getAppOption('entitymanager'));
        $workerName = $pageOptions->getAppOption('worker');
        $worker = new $workerName($em);
        $entityName = $pageOptions->getAppOption('entity');
        $worker->setEntity(new $entityName());
        
        $controller = new LogoutController($pageOptions, $page);
        $controller->setWorker($worker);
        return $controller;
    }
}