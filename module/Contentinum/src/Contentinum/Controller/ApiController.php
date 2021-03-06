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



class ApiController extends AbstractFrontendController
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
        $variables['host'] = $pageOptions->host;
        $variables['protocol'] = $pageOptions->protocol;  
        $modules = $this->getServiceLocator()->get($pageOptions->getArticle());
        $variables['data'] = array('data' => $modules->fetchContent());
        
        $view = new ViewModel($variables);
        $view->setTemplate($pageOptions->template);
        return $view;
    } 

    
    public function process($pageOptions, $page, $defaultRole, $acl)
    {
        $datas = $this->getRequest()->getPost();
        switch ($datas->content){
            case 'contacts':
                $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
                $variables['result'] = $this->worker->fetchContacts(array('search' => $datas->name));
                $variables['medias'] = $this->getServiceLocator()->get('Contentinum\Medias');
                $template = 'api/contacts';
                break;
            case 'ressource':
                $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
                $variables['result'] = $this->worker->fetchRessource(array('search' => $datas->name));
                $variables['medias'] = $this->getServiceLocator()->get('Contentinum\Medias');
                $template = 'api/contacts';
                break;                
        }
        
        $view = new ViewModel($variables);
        $view->setTemplate($template);
        return $view;
    }
}