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
 * @package Controller Plugin
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use ContentinumComponents\Html\HtmlAttribute;

/**
 * Set layout configuration
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Backendlayout extends AbstractPlugin
{
    public function __invoke($pageOptions, $identity, $role, $acl, $layout, $viewHelperManager)
    {
        if (null !== $role) {
            $layout->role = $role;
        }
        if (null !== $acl) {
            $layout->acl = $acl;
        }
        if (null !== $identity){
            $layout->identity = $identity;
        }
        $this->setTitle($pageOptions, $viewHelperManager);
        $this->setColumnRight($pageOptions, $layout);
        $this->setHeadline($pageOptions, $layout);
        $this->bodyAttributes($pageOptions, $layout);
        $this->setAppLocale($pageOptions, $viewHelperManager);
        $this->templateFile($pageOptions, $layout);
    }
    
    
    protected function setTitle($pageConfigure, $viewHelperManager)
    {
        $headTitleHelper = $viewHelperManager->get('headTitle');
        $headTitleHelper->setSeparator(' - ');
    
        if (isset($pageConfigure->title) && strlen($pageConfigure->title) > 0) {
            $headTitleHelper->append($pageConfigure->title);
        }
    
        if (isset($pageConfigure->headTitle) && strlen($pageConfigure->headTitle) > 0) {
            $headTitleHelper->prepend($pageConfigure->headTitle);
        } else {
            $headTitleHelper->prepend('Unknown title');
        }
    }    
    
    
    protected function setColumnRight($pageConfigure, $layout)
    {
        if (isset($pageConfigure->columnright) && strlen($pageConfigure->columnright) > 0) {
            $layout->columnright = $pageConfigure->columnright;
        } else {
            $layout->columnright = null;
        }
    }    
    
    
    protected function setHeadline($pageOptions, $layout)
    {
        if (isset($pageOptions->headline) && strlen($pageOptions->headline) > 0) {
            $layout->headline = $pageOptions->headline;
        } else {
            $layout->headline = $pageOptions->title;
        }
    }    
    
    protected function bodyAttributes($pageOptions, $layout)
    {
        $bodyTagAttribs = '';
        if (isset($pageOptions->bodyTagAttribs) && isset($pageOptions->bodyTagAttribs['attr'])) {
            $layout->bodyAttributes = HtmlAttribute::attributeArray($pageOptions->bodyTagAttribs['attr']);
        }
    } 

    /**
     *
     * @param unknown $pageOptions
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setAppLocale($pageOptions, $viewHelperManager)
    {
        $dateFormat = $viewHelperManager->get('dateFormat');
        $dateFormat->setTimezone("Europa/Berlin")->setLocale("de_DE");
    }    
    
    protected function templateFile($pageOptions, $layout)
    {
        $layout->setTemplate($pageOptions->layout);
    }    
}