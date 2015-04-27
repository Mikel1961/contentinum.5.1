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
namespace Contentinum\View\Helper\Wanted;

use Contentinum\View\Helper\AbstractContentHelper;

class Group extends AbstractContentHelper
{
    const VIEW_LAYOUT_KEY = 'styles';
    
    const VIEW_TEMPLATE = 'person';
    
    /**
     *
     * @var array
     */
    protected $files;
    
    /**
     *
     * @var array
     */
    protected $toolbar;
    
    /**
     *
     * @var array
     */
    protected $schema;
    
    /**
     *
     * @var array
     */
    protected $wrapper;
    
    /**
     *
     * @var array
     */
    protected $name;
    
    /**
     *
     * @var array
     */
    protected $internet;
    
    /**
     *
     * @var array
     */
    protected $contactImgSource;
    
    /**
     *
     * @var array
     */
    protected $businessTitle;
    
    /**
     * 
     * @var array
     */
    protected $phoneHome;
    
    /**
     *
     * @var array
     */
    protected $phoneWork;
    
    /**
     *
     * @var array
     */
    protected $phoneFax;
    
    /**
     *
     * @var array
     */
    protected $contactEmail;
    
    /**
     *
     * @var array
     */
    protected $organisation;
    
    /**
     *
     * @var array
     */
    protected $address;
    
    /**
     *
     * @var array
     */
    protected $description;

    /**
     *
     * @var array
     */
    protected $properties = array(
        'files',
        'toolbar',
        'wrapper',
        'schema',
        'name',
        'internet',
        'contactImgSource',
        'businessTitle',
        'phoneHome',
        'phoneWork',
        'phoneFax',
        'contactEmail',
        'organisation',
        'address',
        'description'
    );

    /**
     *
     * @param unknown $entries
     * @param unknown $medias
     * @param string $template
     * @return string
     */
    public function __invoke($entries, $medias, $template = null)
    {
        $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[self::VIEW_TEMPLATE])){
            $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
        }        
        
        $html = '';
        foreach ($entries['modulContent'] as $entry) {
            $cardData = '';
            if ( 1 === $entry->enableImage  && 1 != $entry->contacts->contactImgSource){
                $cardData .= $this->deployRow($this->contactImgSource, $this->view->images(array('mediaStyle' => '','medias' => $entry->contacts->contactImgSource), $medias, null, null, true));

            }

            $cardData .= $this->deployRow($this->name, $this->view->wantedname($entry));
            
            if (1 === $entry->enableBusinessTitle && null != ($businesTitle = $this->view->overwriteprops($entry,'contacts','businessTitle'))){
                $cardData .= $this->deployRow($this->businessTitle, $businesTitle );
            }
            if (1 === $entry->enableAddress){
                if (isset($this->address['grids'])){
                    $location = null;
                    $grids = $this->address['grids'];
                    if (null != ($contactAdress = $this->view->overwriteprops($entry,'contacts','contactAddress')) ) {
                        if (isset($grids['contactAddress'])){
                            $location .= $this->deployRow($grids['contactAddress'], $contactAdress);
                        } else {
                            $location .= $contactAdress . ' ';
                        }
                    }
                
                    if (null != ($contactZipcode = $this->view->overwriteprops($entry,'contacts','contactZipcode')) ) {    
                        if (isset($grids['contactZipcode'])){
                            $location .= $this->deployRow($grids['contactZipcode'], $contactZipcode);
                        } else {
                            $location .= $contactZipcode . ' ';
                        }
                    }
                
                    if (null != ($contactCity = $this->view->overwriteprops($entry,'contacts','contactCity')) ) {
                        if (isset($grids['contactCity'])){
                            $location .= $this->deployRow($grids['contactCity'], $contactCity);
                        } else {
                            $location .= $contactCity;
                        }
                    }
                    if (null !== $location){
                        $cardData .= $this->deployRow($this->address, $location);
                    }
                } 
            }
            if (1=== $entry->enablePhoneHome && null != $entry->contacts->phoneHome){
                $cardData .= $this->deployRow($this->phoneHome, $entry->contacts->phoneHome);
            }                   
            if (1 === $entry->enablePhoneWork && null != ($phoneWork = $this->view->overwriteprops($entry,'contacts','phoneWork'))){   
                $cardData .= $this->deployRow($this->phoneWork, $phoneWork);
            }
            if (1 === $entry->enablePhoneFax && null != ($phoneFax = $this->view->overwriteprops($entry,'contacts','phoneFax'))){
                $cardData .= $this->deployRow($this->phoneFax, $phoneFax);
            }            
            if (1 === $entry->enableContactEmail && null != ($contactEmail = $this->view->overwriteprops($entry,'contacts','contactEmail'))){
                $cardData .= $this->deployRow($this->contactEmail, $contactEmail);
            }  
            if (1 === $entry->enableAlternateEmail && null != $entry->contacts->alternateEmail){
                $cardData .= $this->deployRow($this->contactEmail, $entry->contacts->alternateEmail);
            }                      
            if (1 === $entry->enableInternet && null != ($internet = $this->view->overwriteprops($entry,'contacts','internet'))){    
                $cardData .= $this->deployRow($this->internet, $internet);
            } 
            if (1=== $entry->enableDescription && null != $entry->contacts->description){
                $cardData .= $this->deployRow($this->description, $entry->contacts->description);
            }                       
            $html .= $this->deployRow($this->schema, $cardData);
        }
        if (null !== $this->wrapper){
            $html = $this->deployRow($this->wrapper, $html);
        }
        return $html;
    }

    /**
     *
     * @param unknown $var
     * @return string
     */
    protected function salutation($var)
    {
        $str = '';
        switch ($var) {
            case 'mr':
                $str = 'Herr ';
                break;
            case 'ms':
                $str = 'Frau ';
                break;
            default:
                break;
        }
        return $str;
    }
}