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
namespace Contentinum\View\Helper\News;

use Contentinum\View\Helper\AbstractNewsHelper;
use ContentinumComponents\Tools\HandleSerializeDatabase;

class App extends AbstractNewsHelper
{

    /**
     *
     * @param array $content            
     * @param unknown $medias            
     * @param string $template            
     * @param string $teasers            
     * @return string
     */
    public function __invoke(array $entries, $medias, $template)
    {
        $viewTemplate = $this->view->groupstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[static::VIEW_TEMPLATE])) {
            $this->setTemplate($viewTemplate[static::VIEW_TEMPLATE]);
        }
        
        $cut = true;
        if (isset($entries['modulContent']['newsarticle'])) {
            $backLink = $this->backlink->toArray();
            $cut = false;
        }
        $archivbacklink = false;
        if (isset($entries['modulContent']['archivbacklink'])) {
            $archivbacklink = $entries['modulContent']['archivbacklink'];
        }
        
        $labelReadMore = $this->labelReadMore->toArray();
        $publishDate = $this->publishDate->toArray();
        $header = $this->header->toArray();
        $filter = new \Zend\Filter\HtmlEntities();
        $urlFiler = new \ContentinumComponents\Filter\Url\Prepare();
        $html = '';
        foreach ($entries['modulContent']['news'] as $entry) {
            if (1 === (int) $entry['id']) {
                if (isset($entry['group_params'])){
                    $this->convertParams($entry['group_params']);
                    
                }
                if (null === $this->groupName && isset($entry['groupName'])){
                    $this->groupName = $entry['groupName'];
                }
            }
            
            if (1 !== (int) $entry['id'] && 0 === (int) $entry['overwrite']) {
                
                $article = '';
                $head = '';
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
                        'href' => '?u=' . urlencode($this->view->protocol . '://' . $this->view->host . '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#' . $blogId)
                    );
                    $links['sendmail'] = array(
                        'href' => '/' . $entry['id']
                    );
                    $head .= $this->view->contenttoolbar($links, $medias, $this->toolbar->toArray());
                }
                
                $head .= $this->deployRow($this->headline, $entry['headline']);
                $header['grid']['attr']['id'] = $blogId;
                $article .= $this->deployRow($header, $head);
                
                if (true === $cut) {
                    
                    if (1 !== (int) $entry['web_medias_id']) {
                        if ('mediateaserright' == $entry['htmlwidgets']) {
                            $mediaTemplate = $this->mediateaserright->toArray();
                        } else {
                            $mediaTemplate = $this->mediateaserleft->toArray();
                        }
                        if (false !== $this->teaserLandscapeSize){
                            $mediaStyle = '';
                            $setSizes = array(
                                'landscape' => $this->teaserLandscapeSize,
                                'portrait' => $this->teaserPortraitSize
                            );
                        } else {
                            $setSizes = null;
                            $mediaStyle = 'teaser-imageitem-size';
                        }
                        $article .= $this->view->images(array(
                            'medias' => $entry['web_medias_id'],
                            'mediaStyle' => $mediaStyle
                        ), $medias, $mediaTemplate, $setSizes);
                    }
                    
                    if (false !== $archivbacklink){
                        $labelReadMore["grid"]["attr"]['data-backlink'] = '/' . $entry['url'] . '/' . $archivbacklink;
                        $labelReadMore["grid"]["attr"]['class'] = $labelReadMore["grid"]["attr"]['class'] . ' setBacklink';
                    }
                    
                    $labelReadMore["grid"]["attr"]['href'] = '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#' . $blogId;
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
                } else {
                    $article .= $entry['content_teaser'];
                    if (1 !== (int) $entry['web_medias_id']) {
                        $article .= $this->view->images(array(
                            'medias' => $entry['web_medias_id'],
                            'mediaStyle' => ''
                        ), $medias, $this->media->toArray());
                    }
                    $article .= $entry['content'];
                                        
                    if (isset($entries['modulContent']['newsplugins'])) {
                        $plugins = $entries['modulContent']['newsplugins'];
                        if (isset($plugins[$entry['modul']][$entry['id']])) {
                            $pluginViewHelper = $this->view->pluginViewHelper[$entry['modul']];
                            $plugin = array_merge($entry, $plugins[$entry['modul']][$entry['id']]);
                            $article .= $this->view->$pluginViewHelper($plugin, $medias, $template);
                        }                        
                        
                    }

                    $backLink["grid"]["attr"]['href'] = '/' . $this->view->pageurl;
                    if ( isset($this->view->cookies['backlinkarchiv']) ) {
                        $backLink["grid"]["attr"]['class'] = $backLink["grid"]["attr"]['class'] . ' unsetBacklink';
                        $backLink["grid"]["attr"]['href'] = $this->view->cookies['backlinkarchiv'];
                    }
                    
                    $backLink["grid"]["attr"]['title'] = $this->view->translate('Back');
                    $foot = $this->deployRow($backLink, $this->view->translate('Back'));
                    
                    if (null !== $this->footer) {
                        $article .= $this->deployRow($this->footer, $foot);
                    }
                }
                
                $html .= $this->deployRow($this->news, $article);
            }
        }
        
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        
        if (isset($this->groupParams['headlineImages']) && strlen($this->groupParams['headlineImages']) > 1) {
            $styles = '';
            if (isset($this->groupParams['imageStyles']) && strlen($this->groupParams['imageStyles']) > 1) {
                $styles = $this->groupParams['imageStyles'];
            }
            $html = $this->view->images(array(
                'medias' => $this->groupParams['headlineImages'],
                'mediaStyle' => $styles
            ), $medias, $this->media) . $html;
        }
        
        if (isset($this->groupParams['headlineGroup']) && strlen($this->groupParams['headlineGroup']) > 1) {
            if ($this->groupheadline){
                $html = $this->deployRow($this->groupheadline, $this->groupParams['headlineGroup']) . $html;
            } else {
                $html = '<h2>' . $this->groupParams['headlineGroup'] . '</h2>' . $html;
            }
            
        } elseif (isset($this->groupParams['headline']) && strlen($this->groupParams['headline']) > 1) {
            if ($this->groupheadline){
                $html = $this->deployRow($this->groupheadline, $this->groupParams['headline']) . $html;
            } else {
                $html = '<h2 class="headline-'.$urlFiler->filter($this->groupParams['headline']).'">' . $this->groupParams['headline'] . '</h2>' . $html;
            }
        } else {
            if (null !== $this->groupName) {
                if ($this->groupheadline){
                    $html = $this->deployRow($this->groupheadline, $this->groupName) . $html;
                } else {
                    $html = '<h2>' . $this->groupName . '</h2>' . $html;
                }
            }
        }
        
        return $html;
    }

    /**
     *
     * @param unknown $params            
     */
    protected function convertParams($params)
    {
        if (strlen($params) > 4) {
            $mcSerialize = new HandleSerializeDatabase();
            $this->groupParams = $mcSerialize->execUnserialize($params);
        } else {
            $this->groupParams = array();
        }
    }
}