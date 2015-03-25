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
namespace Mcwork\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Http\PhpEnvironment\Request as HttpRequest;


class DeleteControllerFactory implements FactoryInterface
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
         * @var $pageOptions Mcwork\Options\PageOptions
         */
        $pageOptions = $sl->get('Mcwork\PageOptions');
        $request = new HttpRequest();
        $pageOptions->setHost($request->getUri()->getHost());
        $pageOptions->setQuery($request->getUri()->getPath());        
        $customer = $sl->get('Contentinum\Customer');
        $uri = $pageOptions->split($pageOptions->getQuery(),4);
        $pages = $sl->get('Mcwork\Pages');  
        $pages = (is_array($pages)) ? $pages : $pages->toArray();
        
        if (isset($pages[$uri])){
            $pageOptions->addPageOptions($pages, $uri);
            $em = $sl->get($pageOptions->getAppOption('entitymanager'));            
            $workerName = $pageOptions->getAppOption('worker');
            $worker = new $workerName($em);
            $entityName = $pageOptions->getAppOption('entity');
            $worker->setEntity(new $entityName());
            if ( method_exists($worker, 'setSl') ){
                $worker->setSl($sl);
            }            
            
            if (false !== ($targetEntities = $pageOptions->getAppOption('targetentities'))){
                if (is_array($targetEntities) && ! empty($targetEntities)) {
                    foreach ($targetEntities as $key => $tEntity) {
                        $worker->addTargetEntities($key, $tEntity);
                    }
                }
            }            
            
            if (false !== ($relatedEntries = $pageOptions->getAppOption('hasEntries'))){
                $worker->setRelatedEntries($relatedEntries);
            }
            
            
            
            $controllerName = $pageOptions->getAppOption('controller');
            $controller = new $controllerName($pageOptions, $uri);
            $controller->setConfiguration($customer);
            $controller->setWorker($worker);
            if (false !== ($services = $pageOptions->getAppOption('services'))){
                $controller->setServices($services);
            }
            return $controller;            
        } else {
            print '<h2>not found :-(</h2>';
            exit('<p><a href="/mcwork/dashboard">Dashboard</a></p>');
        }
    }
}