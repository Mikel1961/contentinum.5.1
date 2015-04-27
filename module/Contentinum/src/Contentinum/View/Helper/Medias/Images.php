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

use ContentinumComponents\Tools\HandleSerializeDatabase;
use ContentinumComponents\Html\HtmlAttribute;
use ContentinumComponents\Images\CalculateResize;
use Contentinum\View\Helper\AbstractContentHelper;

class Images extends AbstractContentHelper
{

    const VIEW_TEMPLATE = '_defaultimages';

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
     * @param unknown $article            
     * @param unknown $medias            
     * @param string $template            
     * @param string $setSize            
     * @return string
     */
    public function __invoke($article, $medias, $template = null, $setSize = null, $onlyImg = false)
    {
        if (null == $template){
            $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
            if (isset($viewTemplate[static::VIEW_TEMPLATE])) {
                $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]->media);
            }
        } else {
            $this->setTemplate($template);
        }
        
        $size = $article['mediaStyle'];
        $id = $article['medias'];
                
        if (isset($medias[$id])) {
            $medias = $medias[$id]->toArray();
            $src = $medias['mediaLink'];
            
            $factory = false;
            $unserialize = new HandleSerializeDatabase();
            $mediaMetas = $unserialize->execUnserialize($medias['mediaMetas']);
            
            $styleAttr = '';
            $img = '<img src="' . $src . '"';
            if (null !== $setSize) {
                if (is_array($setSize) && isset($setSize['landscape']) ){
                    $landscape = $setSize['landscape'];
                    $styleAttr = ' landscape';
                    if (isset($setSize['portrait'])){
                        $styleAttr = ' portrait';
                        $portrait = $setSize['portrait'];
                    } else {
                        $styleAttr = ' portrait';
                        $portrait = $landscape;
                    }
                } else {
                    $portrait = $landscape = $setSize;
                }
                $resize = new CalculateResize($landscape);
                $resize->setFile(DOCUMENT_ROOT . DS . $src);
                $resize->getNewSize();
                if ('portrait' == $resize->getFormat()) {
                    $resize->setTarget($portrait);
                    $resize->getNewSize();
                }
                $img .= ' ' . $resize->getHtmlString();
            }
            if (isset($mediaMetas['alt'])) {
                $img .= ' alt="' . $mediaMetas['alt'] . '"';
            }

            if ( false !== ($title = $this->hasValue($mediaMetas, 'title')) ) {
                $img .= ' title="' . $title . '"';
            }
            
            $img .= ' />';
            
            if ( false !== ($mediaLinkUrl = $this->hasValue($article, 'mediaLinkUrl')) ) {    
                $img = '<a href="' . $mediaLinkUrl . '">' . $img . '</a>';
            }
            
            if (true === $onlyImg){
                return $img;
            }
            
            if (strlen($styleAttr) > 1){
                $article['mediaStyle'] = $article['mediaStyle'] . $styleAttr;
            }            
            
            $content = $this->format($this->getTemplateProperty('row', 'element'), $this->getTemplateProperty('grid', 'element'), $img, $this->hasValue($mediaMetas, 'caption'), $article['mediaStyle']);
            $this->unsetProperties();
            return $content;
        } else {
            return '';
        }
    }

    /**
     *
     * @param unknown $row            
     * @param unknown $grid            
     * @param unknown $img            
     * @param unknown $caption            
     * @param unknown $mediaStyle            
     * @return string
     */
    protected function format($row, $grid, $img, $caption, $mediaStyle)
    {
        $html = '<' . $row;
        $attr = $this->getTemplateProperty('row', 'attr');
        
        if (strlen($mediaStyle) > 1) {
            if (is_object($attr)) {
                $attr = $attr->toArray();
            }
            $class = '';
            if (isset($attr['class'])) {
                $class = $attr['class'] . ' ';
            }
            $attr['class'] = $class . $mediaStyle;
        }
        
        if ($attr && is_array($attr)) {
            $html .= HtmlAttribute::attributeArray($attr);
        }
        $attr = null;
        $html .= '>' . $img;
        
        if (false !== $caption) {
            if ($grid) {
                $html .= '<' . $grid;
                $attr = $this->getTemplateProperty('grid', 'attr');
                if ($attr) {
                    if (is_object($attr)) {
                        $attr = $attr->toArray();
                    }
                    $html .= HtmlAttribute::attributeArray($attr);
                }
                $html .= '>';
                $html .= $caption;
                $html .= '</' . $grid . '>';
            }
        }
        $html .= '</' . $row . '>';
        return $html;
    }
}