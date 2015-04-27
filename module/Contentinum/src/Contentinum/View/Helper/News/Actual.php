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
namespace Contentinum\View\Helper\News;

use Contentinum\View\Helper\AbstractNewsHelper;

class Actual extends AbstractNewsHelper
{

    const VIEW_TEMPLATE = 'newsactual';

    public function __invoke(array $entries, $medias, $template)
    {
        $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[static::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]);
        }
        
        $labelReadMore = $this->labelReadMore->toArray();
        $publishDate = $this->publishDate->toArray();
        $filter = new \Zend\Filter\HtmlEntities();
        $html = '';
        foreach ($entries['modulContent']['news'] as $entry) {
            if (0 === (int) $entry['overwrite']) {
                
                $article = '';
                $head = '';
                $arr = preg_split('/[\s]+/', $entry['publish_date']);
                $lnPublishDate = $arr[0];                 
                $publishDate['grid']['attr']['datetime'] = $entry['publish_date'];
                
                $head .= $this->deployRow($publishDate, $entry['publish_date']);
                if (isset($entry['publish_author'])) {
                    $head .= $this->deployRow($this->publishAuthor, $entry['publish_author']);
                }
                $blogId = 'blog' . $entry['id'];
                if (null !== $this->toolbar) {
                    $links['pdf'] = array(
                        'href' => '/' . $entry['id']
                    );
                    $links['facebook'] = array(
                        'href' => '?u=' . urlencode($this->view->protocol . '://' . $this->view->host . '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#'.$blogId)
                    );
                    $links['sendmail'] = array(
                        'href' => '/' . $entry['id']
                    );                    
                    $head .= $this->view->contenttoolbar($links, $medias, $this->toolbar->toArray());
                }
                
                $head .= $this->deployRow($this->headline, $entry['headline']);
                $article .= $this->deployRow($this->header, $head);
                
                if (1 !==  (int) $entry['web_medias_id']) {
                    if ('mediateaserright' == $entry['htmlwidgets']) {
                        $mediaTemplate = $this->mediateaserright->toArray();
                    } else {
                        $mediaTemplate = $this->mediateaserleft->toArray();
                    }
                    $setSizes = array(
                        'landscape' => $this->teaserLandscapeSize,
                        'portrait' => $this->teaserPortraitSize
                    );
                    $article .= $this->view->images(array(
                        'medias' => $entry['web_medias_id'],
                        'mediaStyle' => ''
                    ), $medias, $mediaTemplate, $setSizes);
                }
                $labelReadMore["grid"]["attr"]['href'] = '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#'.$blogId;
                $labelReadMore["grid"]["attr"]['title'] = $entry['label_read_more'] . ' zu ' . $filter->filter($entry['headline']); 
                
                if (strlen($entry['content_teaser']) > 1) {
                    $article .= $entry['content_teaser'];
                    $article .= $this->deployRow($labelReadMore, $entry['label_read_more']);
                } else {
                    $content = $entry['content'];
                    if ($entry['number_character_teaser'] > 0 && strlen($content) > $entry['number_character_teaser']) {
                        $content = substr($content, 0, $entry['number_character_teaser']);
                        $content = substr($content, 0, strrpos($content, " "));
                        $content = $content . ' ...</p>';
                        $article .= $content;
                        $article .= $this->deployRow($labelReadMore, $entry['label_read_more']);
                    } else {
                        $article .= $content;
                    }
                }
                
                $html .= $this->deployRow($this->news, $article);
            }
        }
        
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        
        return $html;
    }
}