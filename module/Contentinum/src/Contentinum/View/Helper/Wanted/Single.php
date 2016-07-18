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

class Single extends AbstractContentHelper
{
     const VIEW_LAYOUT_KEY = 'contribution';

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
    protected $person;

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
        'person',
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
    public function __invoke($entries, $medias, $template = null, $objectName = false)
    {
        $hm = true;
        switch ($entries['modulConfig']) {
            
            case 'templatevalue':
                return '<p style="font-weight:bold;color:red">Template configuration error</p>';
                break;
            case 'organisation':
                $hm = false;
            default:
                $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
                if (isset($viewTemplate[self::VIEW_TEMPLATE])) {
                    $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
                }
                break;
        }        
        
        $html = '';
        foreach ($entries['modulContent'] as $entry) {
            $cardData = '';
            if (false === $objectName){
                $name = $this->salutation($entry->salutation) . $entry->firstName . ' ' . $entry->lastName;
            } else {
                $name = $entry->objectName;
            }
            if (0 != $entry->contactImgSource && 1 != $entry->contactImgSource){
                $cardData .= $this->deployRow($this->contactImgSource, $this->view->images(array('mediaStyle' => '','medias' => $entry->contactImgSource), $medias, null, null, true));
            }
            
            
            
            if (true === $hm){
                $cardData .= $this->deployRow($this->person, $name);
                $ext = ($entry->accounts->organisationExt) ? ', ' . $entry->accounts->organisationExt . '' : '';
                $cardData .= $this->deployRow($this->organisation, $entry->accounts->organisation . $ext);
                $cardData .= $this->deployRow($this->businessTitle, $entry->businessTitle);

            }
            
            if (false === $hm){
                $organisation = $this->organisation->toArray();
                $organisation['grid']['element'] = 'h3';
                $ext = ($entry->accounts->organisationExt) ? ', ' . $entry->accounts->organisationExt . '' : '';
                $cardData .= $this->deployRow($organisation, $entry->accounts->organisation . $ext);
                $person = $this->person->toArray();
                $person['grid']['element'] = 'p';
                $cardData .= $this->deployRow($person, $name);
                $cardData .= $this->deployRow($this->businessTitle, $entry->businessTitle);
            }            
            
          

            
            if (isset($this->address['grids'])){
                $location = '';
                $grids = $this->address['grids'];
                if (strlen($entry->contactAddress) > 1){
                    if (isset($grids['contactAddress'])){
                        $location .= $this->deployRow($grids['contactAddress'], $entry->contactAddress);
                    } else {
                        $location .= $entry->contactAddress . ' ';
                    }
                }
            
                if (strlen($entry->contactZipcode) > 1){
                    if (isset($grids['contactZipcode'])){
                        $location .= $this->deployRow($grids['contactZipcode'], $entry->contactZipcode);
                    } else {
                        $location .= $entry->contactZipcode . ' ';
                    }
                }
            
                if (strlen($entry->contactCity) > 1){
                    if (isset($grids['contactCity'])){
                        $location .= $this->deployRow($grids['contactCity'], $entry->contactCity);
                    } else {
                        $location .= $entry->contactCity;
                    }
                }
                if (strlen($location) > 1){
                    $cardData .= $this->deployRow($this->address, $location);
                }
                
            }
            if (strlen($entry->phoneHome) > 1){
                $cardData .= $this->deployRow($this->phoneHome, $entry->phoneHome);
            }                    
            if (strlen($entry->phoneWork) > 1){    
                $cardData .= $this->deployRow($this->phoneWork, $entry->phoneWork);
            }
            if (strlen($entry->phoneFax) > 1){
                $cardData .= $this->deployRow($this->phoneFax, $entry->phoneFax);
            }            
            if (strlen($entry->contactEmail) > 1){
                $cardData .= $this->deployRow($this->contactEmail, $entry->contactEmail);
            }
            if (strlen($entry->internet) > 1){    
                $cardData .= $this->deployRow($this->internet, $entry->internet);
            }            
            if (strlen($entry->description) > 1){
                $cardData .= $this->deployRow($this->description, $entry->description);
            }    
            $html .= $this->deployRow($this->schema, $cardData);
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