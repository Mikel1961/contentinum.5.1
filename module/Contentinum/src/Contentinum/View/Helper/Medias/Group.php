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
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Medias;

use Contentinum\View\Helper\AbstractContentHelper;
use ContentinumComponents\Html\HtmlAttribute;

class Group extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'mediablockgrid';

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
    protected $properties = array(
        'row',
        'grid'
    );
    
    /**
     *
     * @param array $entry            
     * @param unknown $medias            
     * @param unknown $template            
     * @return unknown
     */
    public function __invoke(array $entry, $medias, $template)
    {
        if (strpos($entry['modulFormat'], 'mediablocklightgallery') !== false) {
            return $this->view->lightboxgallery($entry, $medias, $template);
        } elseif (strpos($entry['modulFormat'], 'cameragallery') !== false) {
            return $this->view->cameragallery($entry, $medias, $template);
        } elseif (strpos($entry['modulFormat'], 'caroufredsel') !== false) {
            return $this->view->caroufredsel($entry, $medias, $template);
        } else {
            
            $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
            if (isset($viewTemplate[$entry['modulFormat']])) {
                $this->setTemplate($viewTemplate[$entry['modulFormat']]);
            } elseif (isset($viewTemplate[static::VIEW_TEMPLATE])) {
                $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]);
            } else {
                return '<p style="font-weight:bold;color:red">Template configuration error</p>';
            }
            $grid = $this->getTemplateProperty('grid', 'element');
            
            $attr = $this->getTemplateProperty('grid', 'attr');
            $attr = HtmlAttribute::attributeArray($attr->toArray());
            $list = '';
            foreach ($entry['modulContent'] as $media => $entryRow) {
                $list .= '<' . $grid . $attr . '><figure class="mediagroup-list-item-figure">';
                $img = '<img src="' . $media . '" alt="' . $entryRow['attr']['alt'] . '" />';
                if (isset($entryRow['caption'])) {
                    $list .= $img . '<figcaption class="mediagroup-list-item-figcaption">';
                    $list .= $entryRow['caption'] . '</figcaption>';
                } else {
                    $list .= $img;
                }
                $list .= '</figure></' . $grid . '>';
            }
            $attr = $this->getTemplateProperty('row', 'attr');
            $html = $this->view->contentelement($this->getTemplateProperty('row', 'element'), $list, $attr->toArray());
            return $html;
        }
    }
}