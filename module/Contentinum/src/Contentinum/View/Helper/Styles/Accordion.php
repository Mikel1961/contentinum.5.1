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

use ContentinumComponents\Filter\Url\Prepare;
use Contentinum\View\Helper\AbstractContentHelper;

class Accordion extends AbstractContentHelper
{
    const VIEW_TEMPLATE = 'accordion';
    
    /**
     *
     * @var array
     */
    protected $wrapper;    
    
    /**
     * 
     * @var array
     */
    protected $body;
    
    /**
     * 
     * @var unknown
     */
    protected $header;
    
    /**
     * 
     * @var array
     */
    protected $content;
    
    /**
     * 
     * @var array
     */
    protected $contenttab;
    
    /**
     * 
     * @var string
     */
    protected $framework;
        
    /**
     * 
     * @var string
     */
    protected $active;
    
    /**
     *
     * @var array
     */
    protected $properties = array(
        'wrapper',
        'body',
        'header',
        'content',
        'contenttab',
        'framework',
        'active'
    );

    /**
     * Create accordion elements
     * @param array $content
     * @param array $template
     * @param unknown $medias
     * @param unknown $widgets
     * @param array $specified
     * @return Ambigous <string, multitype:>
     */
    public function __invoke(array $entries, array $template, $medias, $widgets, array $specified = null)
    {
        if (is_array($template) && !empty($template)){
             $this->setTemplate($template);
        } else {
            $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
            if (isset($viewTemplate[self::VIEW_TEMPLATE])) {
                $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
            }
        }
        $i = 0;
        $filter = new Prepare();
        $accordion = '';
        foreach ($entries['entries'] as $entry) {
            $ident = $filter->filter($entry['title']);
            $content = $this->content;
            if ( 'bootstrap' === $this->framework ) {
         
                $content['row']['attr']['id'] .= $ident;
                $content['row']['attr']['aria-labelledby'] = $ident;
                if (0 === $i){
                    $content['row']['attr']['class'] .= ' in';
                }
             } else {
                $content['grid']['attr']['id'] = $ident; 
                if (false !== $this->active && 0 === $i){
                    $content['grid']['attr']['class'] = $content['grid']['attr']['class'] . ' ' . $this->active;
                }
            }
            
            $str = $this->deployRow($content, $this->view->contribution(array(
                'entries' => array(
                    $entry
                )
            ), $medias, $widgets));
            $content = array();

            if ( 'bootstrap' === $this->framework ) {
                
        
                $contenttab = $this->contenttab;
                if (0 === $i){
                    $contenttab['grid']['attr']['data-toggle'] = 'collapse';
                    $contenttab['grid']['attr']['aria-expanded'] = 'true';
                }
                $contenttab['grid']['attr']['href'] .= $ident;
                $contenttab['grid']['attr']['aria-controls'] .= $ident;
                $header = $this->header;
                $header['grid']['attr']['id'] = $ident;
                $panelHeader = $this->deployRow($header, $this->deployRow($contenttab, $entry['title']));
                $panelContent = $str;
                $accordion .= $this->deployRow($this->body, $panelHeader . $panelContent);
                $contenttab = array();
                $body = array();
            } else {

                $body = $this->body;
                $body['grid']['content:after:outside'] = $str;
                $body['grid']['attr']['controls'] = $ident;
                $body['grid']['attr']['href'] = '#' . $ident;            
                if (0 === $i){
                    $body['grid']['attr']['aria-selected'] = 'true';                             
                    $body['row']['attr']['aria-hidden'] = 'false';
                }
                $accordion .= $this->deployRow($body, $entry['title']);
            
            }
            $i++;
        }
        
        return $this->deployRow($this->wrapper, $accordion);

    }
}