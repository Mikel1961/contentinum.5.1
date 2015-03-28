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

use Zend\View\Helper\AbstractHelper;

class Group extends AbstractHelper
{
    /**
     *
     * @var unknown
     */
    private $row = array(
        'element' => 'ul',
        'attr' => array('class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 mediagroup-list')
        
    );
    
    /**
     *
     * @var unknown
     */
    private $grid = array(
        'element' => 'li',
        
    );

    /**
     *
     * @var unknown
     */
    private $properties = array(
        'row',
        'grid',
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
        $grid = $this->getTemplateProperty('grid', 'element');
        $list = '';
        foreach ($entry['modulContent'] as $media => $entryRow){
            $list .= '<' . $grid . ' class="mediagroup-list-item"><figure class="mediagroup-list-item-figure">';
            $img = '<img src="' . $media . '" alt="'.$entryRow['attr']['alt'].'" />';
            if (isset($entryRow['caption'])){
                $list .= $img . '<figcaption class="mediagroup-list-item-figcaption">';
                $list .= $entryRow['caption'] . '</figcaption>';
            } else {
                $list .= $img;
            }           
            $list .= '</figure></' . $grid . '>';
        }
        
        $html = $this->view->contentelement($this->getTemplateProperty('row', 'element'), $list, $this->getTemplateProperty('row', 'attr'));
        return $html;
    }
    
    /**
     *
     * @param unknown $prop
     * @param unknown $key
     * @return boolean
     */
    protected function getTemplateProperty($prop, $key)
    {
        if (isset($this->{$prop}[$key])) {
            return $this->{$prop}[$key];
        } else {
            return false;
        }
    }
    
    /**
     *
     * @param unknown $template
     */
    protected function setTemplate($template)
    {
        if (null !== $template) {
    
            foreach ($template as $key => $values) {
                if (in_array($key, $this->properties)) {
                    $this->{$key} = $values;
                }
            }
        }
    }
    
    protected function unsetProperties()
    {
        foreach ($this->properties as $prop){
            $this->{$prop} = null;
        }
    }    
}