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
namespace Contentinum\View\Helper\Styles;

use Contentinum\View\Helper\AbstractContentHelper;

class Panel extends AbstractContentHelper
{

    const VIEW_LAYOUT_KEY = 'styles';

    const VIEW_TEMPLATE = 'panel';

    /**
     *
     * @var array
     */
    protected $panel;

    /**
     *
     * @var array
     */
    protected $headline;

    /**
     *
     * @var array
     */
    protected $content;

    /**
     *
     * @var array
     */
    protected $properties = array(
        'panel',
        'headline',
        'content'
    );

    /**
     *
     * @param unknown $entries            
     * @param unknown $medias            
     * @param string $template            
     * @return string
     */
    public function __invoke($entries, $medias, $template = null, $status = null)
    {
        $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[self::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
        }
        
        $html = '';
        if (isset($entries['headline'])) {
            $html .= $this->deployRow($this->headline, $entries['headline']);
        }
        if (isset($entries['content'])) {
            $html .= $this->deployRow($this->content, $entries['content']);
            if (null !== $status){
                $panel = $this->panel->toArray();
                $panel['grid']['attr']['class'] = $panel['grid']['attr']['class'] . ' ' . $status;
                $this->panel = $panel;
            }
            return $this->deployRow($this->panel, $html);
        } else {
            return '';
        }
    }
}