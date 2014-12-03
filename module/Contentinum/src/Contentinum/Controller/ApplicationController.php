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
 * @todo draft status
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
        $modul->setModul($this->worker->getModul());
                
        $variables['htmllayouts'] = $this->getServiceLocator()->get('Contentinum\Htmllayouts');
        $variables['htmlwidgets'] = $this->getServiceLocator()->get('Contentinum\Widgets');
        $variables['groupstyles'] = $this->getServiceLocator()->get('Contentinum\GroupStyles');
        $variables['medias'] = array(); //$this->getServiceLocator()->get('Contentinum\Webmedias');
        $variables['entries'] = $entries;
        $variables['plugins'] = $modul->fetchContent();
        $variables['role'] = $defaultRole;
        $variables['acl'] = $acl;
        $variables['content'] = false;
        $variables['useragent'] = 'desktop';
        $variables['pageurl'] = $page['url'];
        $variables['article'] = $pageOptions->getArticle();
        $variables['category'] = $pageOptions->getCategory();
        $variables['layoutKey'] = $pageOptions->htmlstructure;
        
        
        
        return $this->buildView($variables,$pageOptions->template);
    }

    public function buildView($variables, $template = null)
    {
        $view = new ViewModel($variables);
        if (null !== $template) {
            $view->setTemplate($template);
        }
        return $view;
    }
}