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
 * @category Mcevent
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\View\Helper\Event;

use Contentinum\View\Helper\AbstractContentHelper;

class DatesRow extends AbstractContentHelper
{
    const VIEW_LAYOUT_KEY = 'styles';
    
    const VIEW_TEMPLATE = 'events';

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
     * @var unknown
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
    protected $summary;

    /**
     *
     * @var array
     */
    protected $organizer;

    /**
     *
     * @var array
     */
    protected $dateStart;

    /**
     *
     * @var array
     */
    protected $organisation;
    
    /**
     * 
     * @var unknown
     */
    protected $descriptionhead;
    
    /**
     * 
     * @var unknown
     */
    protected $description;

    /**
     *
     * @var array
     */
    protected $location;

    /**
     *
     * @var array
     */
    protected $properties = array(
        'files',
        'toolbar',
        'wrapper',
        'schema',
        'summary',
        'organizer',
        'dateStart',
        'organisation',
        'descriptionhead',
        'description',
        'location'
    );

    private $monthsname = array(
        '01' => 'Januar',
        '02' => 'Februar',
        '03' => 'März',
        '04' => 'April',
        '05' => 'Mai',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'August',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Dezember'
    );

    private $dayname = array(
        '1' => 'Montag',
        '2' => 'Dienstag',
        '3' => 'Mittwoch',
        '4' => 'Donnerstag',
        '5' => 'Freitag',
        '6' => 'Samstag',
        '7' => 'Sonntag'
    );

    /**
     *
     * @param array $entry            
     * @param unknown $medias            
     * @param unknown $template            
     * @return unknown
     */
    public function __invoke(array $entries, $medias, $template)
    {
        $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[self::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
        }
        $events = '';
        $format = $entries['modulFormat'];
        $displaymonthname = false;
        
        $dataProp = array();
        foreach ($entries['modulContent'] as $entry) {
            $dateData = '';           
            $dataProp['data-summary'] = $entry->summary;
            
            $dateData .= $this->deployRow($this->summary, $entry->summary);
            $dataProp['data-attendee'] = $entry->organizer;
            $dateData .= $this->deployRow($this->organizer, $entry->organizer);
            
            $datetime = new \DateTime($entry->dateStart);
            
            $dataProp['data-dstart'] = $datetime->format("Ymd\\THis");
            $dataProp['data-dend'] = '00000000T000000';
            
            $mthNum = $datetime->format('m');
            
            $content = $this->dayname[$datetime->format('N')] . ', ' . $datetime->format('d') . '. ' . $this->monthsname[$datetime->format('m')] . ' ' . $datetime->format('Y');
            if ('00:00' !== $datetime->format("H:i")) {
                $content .= ', ' . $datetime->format("H:i");
                $dateStartTemplate = $this->dateStart->toArray();
            } else {
                $dateStartTemplate = $this->dateStart->toArray();
                if (isset($dateStartTemplate["grid"]["content:after"])) {
                    unset($dateStartTemplate["grid"]["content:after"]);
                }
            }
            $dateStartTemplate['grid']['attr']['datetime'] = $entry->dateStart;
            $dateData .= $this->deployRow($dateStartTemplate, $content, '<meta content="' . $datetime->format("Y-m-d\\TH:i:s\\Z+01:00") . '" itemprop="startDate">');
            
            // location new
            if (1 !== $entry->account->id) {
                if (isset($this->location['grids'])) {
                    $location = '';
                    $grids = $this->location['grids'];
                    if (strlen($entry->account->accountStreet) > 1) {
                        if (isset($grids['accountStreet'])) {
                            $location .= $this->deployRow($grids['accountStreet'], $entry->account->accountStreet);
                        } else {
                            $location .= $entry->account->accountStreet . ' ';
                        }
                    }
                    
                    if (strlen($entry->account->accountZipcode) > 1) {
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountZipcode'], $entry->account->accountZipcode);
                        } else {
                            $location .= $entry->account->accountZipcode . ' ';
                        }
                    }
                    
                    if (strlen($entry->account->accountCity) > 1) {
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountCity'], $entry->account->accountCity);
                        } else {
                            $location .= $entry->account->accountCity;
                        }
                    }
                }
                $orgaExt = '';
                if (strlen($entry->account->organisationExt) > 1) {
                    $orgaExt = ' ' . $entry->account->organisationExt;
                }
                
                $locationName = $this->deployRow($this->organisation, $entry->account->organisation . $orgaExt);
                
                $dateData .= $this->deployRow($this->location, $location, $locationName);
                
                $dataProp['data-location'] = $entry->account->organisation . $orgaExt . ' ' . $entry->account->accountStreet . ' ' . $entry->account->accountZipcode . ' ' . $entry->account->accountCity;
            } else {
                if (isset($this->location['grids'])) {
                    $location = '';
                    $grids = $this->location['grids'];
                    if (strlen($entry->locationAddresse) > 1) {
                        if (isset($grids['accountStreet'])) {
                            $location .= $this->deployRow($grids['accountStreet'], $entry->locationAddresse);
                        } else {
                            $location .= $entry->locationAddresse . ' ';
                        }
                    }
                    
                    if (strlen($entry->locationZipcode) > 1) {
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountZipcode'], $entry->locationZipcode);
                        } else {
                            $location .= $entry->locationZipcode . ' ';
                        }
                    }
                    
                    if (strlen($entry->locationCity) > 1) {
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountCity'], $entry->locationCity);
                        } else {
                            $location .= $entry->locationCity;
                        }
                    }
                }
                
                $locationName = $this->deployRow($this->organisation, $entry->location);
                
                $dateData .= $this->deployRow($this->location, $location, $locationName);
                
                $dataProp['data-location'] = $entry->location . ' ' . $entry->locationAddresse . ' ' . $entry->locationZipcode . ' ' . $entry->locationCity;
            }
            $description = '';
            if ( strlen($entry->description) > 4 ){
                $description = $entry->description;
            }
            
            if ( $entry->webMediasId > 0 ){
                $description .= $this->view->images(array('mediaStyle' => '','medias' => $entry->webMediasId), $medias, null, null, true);
            }
            
            if ( $entry->webFilesId > 0 ){
                $description .= $this->view->mediadownload($entry->webFilesId, $medias);
            }
            
            if ('' != $description){
                $descriptionHead = $this->descriptionhead->toArray();
                $descriptionBody = $this->description->toArray();
                $descriptionHead['grid']['attr']['data-ident'] = 'event' . $entry->id;
                $descriptionBody['grid']['attr']['id'] = 'event' . $entry->id;
                $dateData .= $this->deployRow($descriptionHead, 'Weitere Informationen');
                $dateData .= $this->deployRow($descriptionBody, $description);                
            }
            
            $toolbar = '';
            if (null !== $this->toolbar) {
                $toolbar = $this->view->contenttoolbar(array(
                    'getevent' => array(
                        'attr' => $dataProp
                    )
                ), $medias, $this->toolbar->toArray());
            }
            if ('displaymonthname' == $format && $displaymonthname != $mthNum){
                $displaymonthname = $mthNum;
                $events .= '<h3><i class="fa fa-calendar"></i> ' . $this->monthsname[$mthNum] . '</h3>';
            }
            $events .= $this->deployRow($this->schema, $toolbar . $dateData);
            $dataProp = array();
        }
        
        $events = $this->deployRow($this->wrapper, $events);
        
        if (null !== $this->files) {
            $this->deployFiles($this->files);
        }
        
        return $events;
    }
}