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

class SearchForm extends AbstractHelper
{
    /**
     * Ignore case sensitive
     * @var boolen
     */
    protected $bCase = true;

    /**
     *
     * @param unknown $entries            
     * @param unknown $medias            
     * @param string $template            
     * @return string
     */
    public function __invoke($entries, $medias, $template = null)
    {
        $html = $searchResult = '';
        $form = $entries['modulContent']['form'];

        
        if ($this->view->contentsearch) {
            $form->setAttribute('action', '/suche/'. $this->view->article);
            $form->populateValues(array('contentsearch' => $this->view->contentsearch));
            $contentsearch = htmlentities($this->view->contentsearch,ENT_COMPAT,'UTF-8');
            $strModifier = '';
            if (true === $this->bCase) {
                $strModifier = 'i';
            }
            $strQuotedNeedle = preg_quote($contentsearch, '/');
            $strPattern = '/' . $strQuotedNeedle . '/' . $strModifier;
            foreach ($this->view->contentToSearch as $row) {
                if (preg_match($strPattern, $row['content'])) {                 
                    $ln = '/' . $this->view->article . '/' . $row['source'];
                    $searchResult .= '<h3 class="searchresult"><a href="' . $ln . '">' . $this->view->searchhighlight($row['headline'], $strPattern) . '</a></h3>';
                    $content = substr($row['content'], 0, '300');
                    $content = substr($content, 0, strrpos($content, " "));
                    $content = $content . ' </p>';
                    $searchResult .= $this->view->searchhighlight($content, $strPattern);
                }
            }
        
            if (strlen($searchResult) < 2){
                $searchResult = '<hr /><p>Keine Ergebnisse zu dem Suchbegriff [ &quot;' . $contentsearch . '&quot; ] gefunden.</p><hr />';
            } else {
                $searchResult = '<hr />' . $searchResult;
            }
        }
        $html .= '<div id="form-container"> <div class="server-process"> </div>';        
        $html .= $this->view->renderForm($form);
        $html .= '</div>'; 
        $html .= $searchResult;       
        
        return $html;
    }
}