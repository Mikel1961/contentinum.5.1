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
namespace Contentinum\View\Helper\Files;

use Contentinum\View\Helper\AbstractContentHelper;
use ContentinumComponents\Html\HtmlAttribute;

class Group extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'filegrouplist';

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
    protected $files;

    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'row',
        'grid',
        'files'
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
        switch ($entry['modulFormat']) {
            default:
                break;
        }
        
        $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
        
        if (isset($viewTemplate[static::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]);
        }
        $attr = '';
        $grid = $this->getTemplateProperty('grid', 'element');
        if (false !== ($attr = $this->getTemplateProperty('grid', 'attr'))) {
            if (is_object($attr)) {
                $attr = $attr->toArray();
            }
            $attr = HtmlAttribute::attributeArray($attr);
        }
        $list = '';
        $files = $this->files->toArray();
        $href = $files['grid']['attr']['href'];
        foreach ($entry['modulContent'] as $ident => $fileRow) {
            $list .= '<' . $grid . $attr . '>';
            if (strlen($fileRow['attr']['linkname']) > 1) {
                $label = $fileRow['attr']['linkname'];
            } else {
                $label = $fileRow['mediaName'];
            }
            
            $files['grid']['label'] = 'content';
            $files['grid']['attr']['href'] = $href . $ident;
            $files['grid']['attr']['title'] = 'Download ' . $label;
            
            $list .= $this->deployRow($files, $label);
            
            $list .= '</' . $grid . '>';
        }
        
        if (false !== ($values = $this->getTemplateProperty('row', 'attr'))) {
            if (is_object($values)) {
                $attr = $values->toArray();
            }
        } else {
            $attr = array();
        }
        
        $html = $this->view->contentelement($this->getTemplateProperty('row', 'element'), $list, $attr);
        return $html;
    }
}