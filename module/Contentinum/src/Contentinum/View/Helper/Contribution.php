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
 * @category contentinum components
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper;

use ContentinumComponents\Html\HtmlElements;
use ContentinumComponents\Html\Element\FactoryElement;

class Contribution extends AbstractContentHelper
{

    /**
     *
     * @var unknown
     */
    protected $row;

    /**
     *
     * @var unknown
     */
    protected $grid;

    /**
     *
     * @var unknown
     */
    protected $media;

    /**
     *
     * @var unknown
     */
    protected $content;

    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'row',
        'grid',
        'media',
        'content'
    );

    /**
     *
     * @param array $content
     * @param unknown $medias
     * @param array $template
     * @return Ambigous <string, multitype:>
     */
    public function __invoke(array $content, $medias, $template = null)
    {
        $html = '';
        $factory = false;
        foreach ($content['entries'] as $entry) {
            $this->assignTemplate($entry, $template);
            $row = $this->getTemplateProperty('row', 'element');
            $grid = $this->getTemplateProperty('grid', 'element');
            if (is_array($entry) && isset($entry['element']) && strlen($entry['element']) > 0) {
                $grid = $entry['element'];
            }
            if ($row || $grid) {
                $factory = new HtmlElements(new FactoryElement());
            }
            
            if ($row) {
                $factory->setEncloseTag($row);
                $attr = $this->getTemplateProperty('row', 'attr');
                if (false !== $attr) {
                    $factory->setAttributes(false, $attr);
                    $attr = false;
                }
            }
            
            if ($grid) {
                $factory->setContentTag($grid);
                $usrAttr = false;
                if (is_array($entry) && isset($entry['elementAttribute']) && ! empty($entry['elementAttribute'])) {
                    $usrAttr = $entry['elementAttribute'];
                }
                $attr = $this->getTemplateProperty('grid', 'attr');
                if (false !== $usrAttr && false !== $attr) {          
                    $attr = array_merge($attr, $usrAttr);
                } else {
                    $attr = $usrAttr;
                }
                $factory->setTagAttributtes(false, $attr, 0);
            }
            
            $media = '';
            if (isset($entry['medias']) && $entry['medias'] > 1) {
                $media = $this->view->images($entry, $medias, $this->media);
            }
            
            if (false === $factory) {
                $html .= $media . $entry['content'];
            } else {
                $factory->setHtmlContent($media . $entry['content']);
                $html .= $factory->display();
                $factory = false;
            }
      
            
            
            if ( isset($entry['modul']) && isset($this->view->pluginViewHelper[$entry['modul']]) ){
                $pluginViewHelper = $this->view->pluginViewHelper[$entry['modul']];
                if (isset($this->view->plugins[$entry['modul']][$entry['id']])) {
                    $plugin = array_merge($entry, $this->view->plugins[$entry['modul']][$entry['id']]);
                    $html .= $this->view->$pluginViewHelper($plugin, $medias, $template);
                }                
            }
        }
        $this->unsetProperties();
        return $html;
    }

    /**
     * 
     * @param unknown $row
     * @param unknown $template
     */
    protected function assignTemplate($row, $template)
    {
        if (isset($row['htmlwidgets']) && 'content' != $row['htmlwidgets']) {
            if (isset($template[$row['htmlwidgets']])) {
                $this->setTemplate($template[$row['htmlwidgets']]->toArray());
            } else {
                $this->unsetProperties();
            }
        }
    }
}