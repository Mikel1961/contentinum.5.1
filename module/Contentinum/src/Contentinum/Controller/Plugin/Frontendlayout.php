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
namespace Contentinum\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use ContentinumComponents\Html\HtmlAttribute;

/**
 * Layout configuration and page attributtes
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Frontendlayout extends AbstractPlugin
{

    /**
     * Header meta names
     *
     * @var array
     */
    protected $headMetas = array(
        'metaViewport' => 'viewport',
        'metaDescription' => 'description',
        'metaKeywords' => 'keywords',
        'author' => 'author',
        'robots' => 'robots'
    );

    /**
     * Html tag attributes
     *
     * @var array
     */
    protected $htmlAttributes = array(
        'htmlId' => 'id',
        'htmlClass' => 'class',
        'language' => 'lang'
    );

    /**
     * Body tag attributes
     *
     * @var array
     */
    protected $bodyAttributes = array(
        'bodyId' => 'id',
        'bodyClass' => 'class',
        //'dataAttribute' => 'data'
    );

    /**
     * Set layout script
     * Set page meta attribute
     * Set page header scripts and styles
     * Set page inline scripts
     * Set page title
     * Set further attributes: charset
     *
     * @param array $preference
     * @param array $defaults
     * @param array $page
     * @param string $role
     * @param array $acl
     * @param Zend\View\Model\ViewModel $layout
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    public function __invoke($pageOptions, $role = null, $acl = null, $layout, $viewHelperManager = null)
    {
        $this->setHeadStyle($pageOptions, $viewHelperManager);
        $this->setScripts($pageOptions, $viewHelperManager, 'inlineScript');
        $this->setScripts($pageOptions, $viewHelperManager, 'headScript');
        $this->setBodyAttribute($pageOptions, $layout);
        $this->setHeadMetas($pageOptions, $viewHelperManager);
        $this->setTitle($pageOptions, $viewHelperManager);
        $this->setHtmlAttribute($pageOptions, $layout);
        $this->setAttribute($pageOptions, $viewHelperManager, $layout);
        $this->layoutFile($pageOptions, $layout);
        $this->setAppLocale($pageOptions, $viewHelperManager);
    }

    /**
     * Set style instructions
     *
     * @param array $defaults
     * @param array $page
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setHeadStyle($pageOptions, $viewHelperManager)
    {
        if (false !== ($value = $this->getPageAttribute($pageOptions, 'headStyle'))) {
            $styles = $viewHelperManager->get('headStyle');
            $styles->appendStyle($value);
        }
    }

    /**
     * Set javascript instructions in header or footer inline scripts
     *
     * @param array $defaults
     * @param array $page
     * @param Zend\View\HelperPluginManager $viewHelperManager
     * @param string $type
     */
    protected function setScripts($pageOptions, $viewHelperManager, $type)
    {
        if (false !== ($value = $this->getPageAttribute($pageOptions, $type))) {
            $script = $viewHelperManager->get($type);
            $script->appendScript($value);
        }
    }

    /**
     * Set page meta values
     *
     * @param array $preference
     * @param array $defaults
     * @param array $page
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setHeadMetas($pageOptions, $viewHelperManager)
    {
        $headMetas = $viewHelperManager->get('headMeta');
        foreach ($this->headMetas as $column => $name) {
            $value = $this->getPageAttribute($pageOptions, $column, false);
            if (false !== $value) {
                $headMetas->appendName($name, $value);
            }
        }
    }

    /**
     * Set page title
     *
     * @param array $preference
     * @param array $page
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setTitle($pageOptions, $viewHelperManager)
    {
        $seperator = ' - ';
        $title = $pageOptions->label;
        if (strlen($pageOptions->metaTitle) > 1) {
            $title = $pageOptions->metaTitle;
        }
        $headTitleHelper = $viewHelperManager->get('headTitle');
        $headTitleHelper->setSeparator($seperator);
        $headTitleHelper->append($pageOptions->title);
        $headTitleHelper->prepend($title);
    }

    /**
     * Set body tag attributte
     *
     * @param array $preference
     * @param array $page
     * @param Zend\View\Model\ViewModel $layout
     */
    protected function setBodyAttribute($pageOptions, $layout)
    {
        $attribute = '';
        foreach ($this->bodyAttributes as $column => $attr) {
            $value = $this->getPageAttribute($pageOptions, $column);
            if (false !== $value) {
                $attribute .= HtmlAttribute::attributeString($attr, $value, true);
            }
        }
        if (strlen($attribute) > 0) {
            $layout->bodyTagAttribs = $attribute;
        }
    }

    /**
     * Set html tag attributte
     *
     * @param array $defaults
     * @param array $page
     * @param Zend\View\Model\ViewModel $layout
     */
    protected function setHtmlAttribute($pageOptions, $layout)
    {
        $attribute = '';
        foreach ($this->htmlAttributes as $column => $attr) {
            $value = $this->getPageAttribute($pageOptions, $column);
            if (false !== $value) {
                $attribute .= HtmlAttribute::attributeString($attr, $value, true);
            }
        }
        if (strlen($attribute) > 0) {
            $layout->htmlTagAttribs = $attribute;
        }
    }

    /**
     * Set layout script
     *
     * @param array $preference
     * @param array $defaults
     * @param Zend\View\Model\ViewModel $layout
     */
    protected function layoutFile($pageOptions, $layout)
    {
        $layout->setTemplate($pageOptions->layout);
    }

    /**
     * Set further attributtes:
     * charset
     *
     * @param array $defaults
     * @param array $page
     * @param Zend\View\HelperPluginManager $viewHelperManager
     * @param Zend\View\Model\ViewModel $layout
     */
    protected function setAttribute($pageOptions, $viewHelperManager, $layout)
    {
        if ($pageOptions->charset) {
            $layout->charset = $pageOptions->charset;
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

    /**
     * Get page attribute in in the following stages:
     * if $page attribute values available overwrite $defaults values
     * if $defaults attribute values available overwrite $preference values
     * if $prefrence attribute values available return this otherwise false
     * 
     * @param array $defaults
     * @param array $page
     * @param array $column
     * @param string $std
     * @param array $preference
     * @return false|string
     */
    protected function getPageAttribute($pageOptions, $column, $std = false)
    {
        if ( isset($pageOptions->{$column}) ){
            $std = $pageOptions->{$column};
        }
        return $std;
    }
}