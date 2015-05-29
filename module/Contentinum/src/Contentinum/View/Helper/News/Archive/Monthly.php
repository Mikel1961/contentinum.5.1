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
 * @category contentinum components
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\News\Archive;

use Contentinum\View\Helper\AbstractContentHelper;

class Monthly extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'newsarchiv';

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
    protected $format;

    /**
     *
     * @var unknown
     */
    protected $hassub;

    /**
     *
     * @var unknown
     */
    protected $sublistswrapper;

    /**
     *
     * @var unknown
     */
    protected $subwrapper;

    /**
     *
     * @var unknown
     */
    protected $subelements;

    /**
     *
     * @var unknown
     */
    protected $sublists;

    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'wrapper',
        'elements',
        'hassub',
        'format',
        'sublistswrapper',
        'subwrapper',
        'subelements'
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

    /**
     * Build archive list
     *
     * @param array $content            
     * @param unknown $medias            
     * @param array $template            
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($entries, $medias, $template = null)
    {
        $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[$entries['modulFormat']])) {
            $this->setTemplate($viewTemplate[$entries['modulFormat']]);
        } elseif (isset($viewTemplate[self::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[self::VIEW_TEMPLATE]);
        } else {
            return '<p style="font-weight:bold;color:red">Template configuration error</p>';
        }
        $html = $this->deployRow($this->wrapper, $this->listitems($entries['modulContent']));
        switch ($this->format) {
            case 'block':
                $html .= $this->deployRow($this->sublistswrapper, $this->sublists);
                break;
            default:
                break;
        }
        return $html;
    }

    /**
     * List years
     *
     * @param array $entries            
     * @return string html
     */
    protected function listitems($entries)
    {
        $list = '';
        foreach ($entries as $year => $month) {
            $sublist = '';
            $elements = $this->elements->toArray();
            $elements['grid']['attr']['href'] = '#';
            if (false !== ($sublist = $this->months($year, $month))) {
                $hassub = $this->hassub;
                if ($hassub) {
                    $elements['grid']['attr']['class'] = $hassub['attr']['class'] . ' ' . $elements['grid']['attr']['class'];
                    $elements['grid']['attr']['data-ident'] = $year;
                }
            }
            switch ($this->format) {
                case 'block':
                    $this->sublists = $this->sublists . $sublist;
                    break;
                case 'standard':
                default:
                    $elements['grid']['content:after:outside'] = $sublist;
                    break;
            }
            $list .= $this->deployRow($elements, $this->view->translate('Year') . ' ' . $year);
        }
        return $list;
    }

    /**
     * List mounth
     *
     * @param interger $year            
     * @param array $month            
     * @return string html
     */
    protected function months($year, $month)
    {
        $list = '';
        foreach ($month as $num => $url) {
            $subelements = $this->subelements->toArray();
            $subelements['grid']['attr']['href'] = '/' . $url . '/archive/' . $year . '-' . $num;
            $list .= $this->deployRow($subelements, $this->monthsname[$num]);
        }
        
        if (strlen($list) > 2) {
            $subwrapper = $this->subwrapper->toArray();
            $subwrapper['grid']['attr']['id'] = $year;
            return $this->deployRow($subwrapper, $list);
        } else {
            return false;
        }
    }
}