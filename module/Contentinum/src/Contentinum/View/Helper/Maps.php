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
namespace Contentinum\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Maps extends AbstractHelper
{

    /**
     *
     * @param unknown $entries            
     * @param unknown $medias            
     * @param string $template            
     * @return string
     */
    public function __invoke($entries, $medias, $template = null)
    {
        $jsMarker = '';
        $jsMarkerData = array();
        $i = 0;
        foreach ($entries['modulContent'] as $marker => $entry) {
            $headline = $entry->webMaps->headline;
            $centerLatitude = (float) $entry->webMaps->centerlatitude;
            $centerLongitude = (float) $entry->webMaps->centerlongitude;
            $startzoom = (int) $entry->webMaps->startzoom;
            
            $jsMarkerData[$i]['name'] = $entry->name;
            $jsMarkerData[$i]['latitude'] = (float) $entry->latitude;
            $jsMarkerData[$i]['longitude'] = (float) $entry->longitude;
            $jsMarkerData[$i]['zindex'] = 1;
            if ($entry->webMediaIdent > 1) {
                $jsMarkerData[$i]['image'] = $this->view->getmedialink($entry->webMediaIdent, $medias);
            } else {
                $jsMarkerData[$i]['image'] = "";
            }
            $jsMarkerData[$i]['street'] = $entry->street;
            $jsMarkerData[$i]['city'] = $entry->city;
            $jsMarkerData[$i]['description'] = $entry->description;
            
            if ($entry->mapMarker > 0) {
                $jsMarkerData[$i]['mapmarker'] = $this->view->getmedialink($entry->mapMarker, $medias);
            } else {
                $jsMarkerData[$i]['mapmarker'] = "";
            }
            
            $i ++;
        }
        
        $script = 'var centerLatitude = ' . $centerLatitude . '; var centerLongitude = ' . $centerLongitude . '; var startZoom = ' . $startzoom . ';';
        $script .= 'var mapMarkers = ' . json_encode($jsMarkerData) . ';';
        $this->view->inlinescript()->appendScript($script);
        $html = '';
        if (isset($entries['modulFormat']) && null != $entries['modulFormat']) {
            $html .= '<' . $entries['modulFormat'] . '>' . $headline . '</' . $entries['modulFormat'] . '>';
        }
        $html .= '<div id="map_canvas"> </div>';
        return $html;
    }
}