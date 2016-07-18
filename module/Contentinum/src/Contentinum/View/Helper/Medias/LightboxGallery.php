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

class LightboxGallery extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'mediablocklightgallery';

    /**
     *
     * @var unknown
     */
    protected $wrapper;

    /**
     *
     * @var unknown
     */
    protected $elements;
    
    /**
     *
     * @var unknown
     */
    protected $link;    

    /**
     *
     * @var unknown
     */
    protected $caption;

    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'wrapper',
        'elements',
        'link',
        'caption'
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
        $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[$entry['modulFormat']])) {
            $this->setTemplate($viewTemplate[$entry['modulFormat']]);
        } elseif (isset($viewTemplate[self::VIEW_TEMPLATE])) {
            $this->setTemplate(self::VIEW_TEMPLATE);
        } else {
            return '<p style="font-weight:bold;color:red">Template configuration error</p>';
        }
        $list = '';
        $host = $this->view->protocol + '://' . $this->view->host;
        foreach ($entry['modulContent'] as $media => $entryRow) {
            
            $img = '<img src="' . $media . '" alt="' . $entryRow['attr']['alt'] . '" />';
            $title = $entryRow['attr']['alt'];
            if (isset($entryRow['caption'])) {
                $title = $entryRow['caption'];
                if ($this->caption) {
                    $img .= $this->deployRow($this->caption, $entryRow['caption']);
                }
            }
            $link = $this->link->toArray();
            $link['grid']['attr']['title'] = $title;
            $link['grid']['attr']['data-groupname'] = $entryRow['name'];
            $link['grid']['attr']['href'] = $media;

            $list .= $this->deployRow($this->elements, $this->deployRow($link, $img) );
        }
        return $this->deployRow($this->wrapper, $list);
    }
}