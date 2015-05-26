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

class CarouFredSelGallery extends AbstractContentHelper
{
    const VIEW_TEMPLATE = 'caroufredsel';

    /**
     *
     * @var unknown
     */
    protected $wrapper;
    
    /**
     *
     * @var unknown
     */
    protected $imageitem;
    
    /**
     *
     * @var unknown
     */
    protected $listitem;
    
    /**
     *
     * @var unknown
     */
    protected $title;    
    
    /**
     *
     * @var unknown
     */
    protected $caption; 
    
    /**
     *
     * @var unknown
     */
    protected $description;
    
    /**
     *
     * @var unknown
     */
    protected $longdescription; 

    /**
     * 
     * @var unknown
     */
    protected $btnrow;
    
    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'wrapper',
        'imageitem',
        'listitem',
        'title',        
        'caption',
        'description',
        'longdescription',  
        'btnrow',      
        
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
        } elseif ( isset($viewTemplate[self::VIEW_TEMPLATE])) {
            $this->setTemplate(self::VIEW_TEMPLATE);
        } else {
            return '<p style="font-weight:bold;color:red">Template configuration error</p>';
        }  

        
        $html = '';
        foreach ($entry['modulContent'] as $media => $entryRow){
            
            $captions = '';
            $listcontent = '';
            if (isset($entryRow['caption'])){
                $captions .= $this->deployRow($this->caption, $entryRow['caption']);
            }
            
            if (isset($entryRow['description'])){
                $captions .= $this->deployRow($this->description, $entryRow['description']);
            }            
            
            if (isset($entryRow['longdescription']) && strlen($entryRow['longdescription']) > 2 ){
                $captions .= $this->deployRow($this->longdescription, $entryRow['longdescription']);
            }   

            if (strlen($captions) > 2 ){
                $listcontent = $this->deployRow($this->title, $captions);
            }
            
            $imageitem = $this->imageitem->toArray();
            if (isset($imageitem['grid']['content:after:outside'])){
            $imageitem['grid']['content:after:outside'] = $imageitem['grid']['content:after:outside'] . $listcontent;
            } else {
                $imageitem['grid']['content:after:outside'] = $listcontent;
            }
            
            $html  .= $this->deployRow($this->listitem, $this->deployRow($imageitem, '<img src="' . $media . '" alt="'.$entryRow['attr']['alt'].'" />'));
            
            
        }
        $wrapper = $this->wrapper->toArray();
        $wrapper['grid']['content:after:outside'] = $this->deployRow($this->btnrow, '');
        return $this->deployRow($wrapper, $html);
    }  
}