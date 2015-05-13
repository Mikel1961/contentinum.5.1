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
 * @category Contentinum
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Navigation;

use Contentinum\View\Helper\AbstractContentHelper;

class Topnav extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'topnav';
    /**
     *
     * @var array
     */
    protected $brand;

    /**
     *
     * @var array
     */
    protected $navbarheader;

    /**
     *
     * @var string
     */
    protected $ulclass;

    /**
     *
     * @var array
     */
    protected $navbar;

    /**
     *
     * @var array
     */
    protected $wrapper;

    protected $properties = array(
        'brand',
        'navbarheader',
        'ulclass',
        'navbar',
        'wrapper'
    );

    /**
     *
     * @param array $content            
     * @param unknown $medias            
     * @param array $template            
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($entry, $medias, $template)
    {
        $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[static::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]);
        }        
        
        
        $container = new \Zend\Navigation\Navigation($entry['modulContent']);
        $topnav = $this->view->navigationcontentinum($container)
            ->setAcl($this->view->acl)
            ->setRole($this->view->role)
            ->setUlClass($this->ulclass);
        
        
        
        $label = false;
        if (isset($entry['modulDisplay']) && strlen($entry['modulDisplay']) > 0) {
            $label = $entry['modulDisplay'];
        }
        if (isset($entry['modulConfig']) && is_numeric($entry['modulConfig'])) {
            $label = $this->view->images(array(
                'medias' => $entry['modulConfig'],
                'mediaStyle' => ''
            ), $medias);
        }
        $brandname = '';
        if (false !== $label) {
            $brand = $this->brand->toArray();
            if (isset($entry['modulLink'])) {
                $brand['grid']['attr']['href'] = $entry['modulLink'];
            }
            $brandname = $this->deployRow($brand, $label);
        }
        
        $navbarheader = $this->navbarheader->toArray();
        $navbarheader['row']['content:after'] = $brandname;
        
        $html = $this->deployRow($navbarheader, '');
        $html .= $this->deployRow($this->navbar, $topnav);
        return $this->deployRow($this->wrapper, $html);
    }
}