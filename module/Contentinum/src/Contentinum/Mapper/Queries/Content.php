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
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper\Queries;

use ContentinumComponents\Mapper\Worker;

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Content extends Worker
{
    
    /**
     *
     * @var array
     */
    private $contributions;
    
    /**
     *
     * @var array
     */
    private $pagecontent;
        
    /**
     *
     * @var array
     */
    private $defaultcontent;  

    /**
     * Plugin configurations
     * @var array
     */
    private $modul;
    
    /**
     * Source
     * @var string
     */
    private $article;    
    
    /**
     * 
     * @var array
     */
    private $requestArticle;
    
    /**
     * 
     * @var string
     */
    private $category;
    

    /**
     * 
     * @var array
     */
    private $replace = array();
    
    /**
     * @return the $contributions
     */
    public function getContributions()
    {
        return $this->contributions;
    }

	/**
     * @param multitype: $contributions
     */
    public function setContributions($contributions)
    {
        $this->contributions = $contributions;
        return $this;
    }

	/**
     * @return the $pagecontent
     */
    public function getPagecontent()
    {
        return $this->pagecontent;
    }

	/**
     * @param multitype: $pagecontent
     */
    public function setPagecontent($pagecontent)
    {
        $this->pagecontent = $pagecontent;
    }

	/**
     * @return the $defaultcontent
     */
    public function getDefaultcontent()
    {
        return $this->defaultcontent;
    }

	/**
     * @param multitype: $defaultcontent
     */
    public function setDefaultcontent($defaultcontent)
    {
        $this->defaultcontent = $defaultcontent;
    }


	/**
     * @return the $modul
     */
    public function getModul()
    {
        return $this->modul;
    }

	/**
     * @param multitype: $modul
     */
    public function setModul($modul)
    {
        $this->modul = $modul;
    }

	/**
     * @return the $article
     */
    public function getArticle()
    {
        return $this->article;
    }

	/**
     * @param string $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

	/**
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Current page and default pages
     * @param array $page
     */
	public function fetchContent($page)
    {

        $this->setPagecontent( $this->fetchAll($this->queryStringContribution($page['id'], true)));
        $this->setDefaultcontent($this->fetchAll($this->queryStringContribution($page['parentPage'])));
        return $this->removeContribs( $this->prepare($page) );
    
    }
    
    /**
     * 
     * @param unknown $id
     * @return Ambigous <\Contentinum\Mapper\Queries\Ambigous, \Contentinum\Mapper\Queries\multitype:unknown, multitype:object Ambigous <multitype:, string> >
     */
    public function fetchErrorContent($id)
    {
        $this->setPagecontent( $this->fetchAll($this->queryStringContribution($id, true)));
        $this->defaultcontent = array();
        return $this->prepare(null);
    }
    
    /**
     * Prepare defauöt and current page contributions
     * @param array $page
     * @return Ambigous <\Contentinum\Mapper\multitype:unknown, NULL, multitype:object Ambigous <multitype:, string> >
     */
    protected function prepare($page)
    {
        

        $this->removeOverwriteTrue();        
        $entries = array_merge($this->pagecontent, $this->defaultcontent);
        if (is_array($entries) && ! empty($entries)) {
            $i = 1;
            $ic = 0;
            $grp = 0;
            foreach ($entries as $entry) {
                if ($grp != $entry['groupId']) {
                    $ic ++;
                    $grp = $entry['groupId'];
                    $content[$ic]['contentIdent'] = $entry['web_content_id'];
                    $content[$ic]['url'] = $entry['url'];
                    $content[$ic]['adjustments'] = $entry['adjustments'];
                    $content[$ic]['htmlwidgets'] = $entry['htmlwidgets'];
                    $content[$ic]['groupStyle'] = $entry['group_style'];
                    $content[$ic]['tplAssign'] = $entry['tpl_assign'];
                    $content[$ic]['publish'] = $entry['publish'];
                    $content[$ic]['entries'][$i] = $this->prepareContribution($entry['web_content_id'], $entry);
                } else {
                    $content[$ic]['entries'][$i] = $this->prepareContribution($entry['web_content_id'], $entry);
                 
                }
                $i ++;
            }
        }
        return $content;
    }  
   
   /**
    * Prepare contribution datas
    * @param int $id contribution ident
    * @param object $entry
    * @return multitype:unknown Ambigous <multitype:, string>
    */
    private function prepareContribution($id, $entry)
    {
        $contributions = array();
        if (strlen($entry['modul']) > 1){
            $this->modul[$entry['modul']][$entry['contribId']]['modulReferer'] = $entry['contribId'];
            $this->modul[$entry['modul']][$entry['contribId']]['modulParams'] = $entry['modulParams'];
            $this->modul[$entry['modul']][$entry['contribId']]['modulDisplay'] = $entry['modulDisplay'];
            $this->modul[$entry['modul']][$entry['contribId']]['modulConfig'] = $entry['modulConfig'];
            $this->modul[$entry['modul']][$entry['contribId']]['modulLink'] = $entry['modulLink'];
            $this->modul[$entry['modul']][$entry['contribId']]['modulFormat'] = $entry['modulFormat'];
        }
        if ($entry['replaceDefault'] > 0){
            $this->replace[] = $entry['replaceDefault'];
        }
        $contributions['id'] = $entry['contribId'];
        $contributions['medias'] = $entry['medias'];
        $contributions['htmlwidgets'] = $entry['contribHtmlwidgets'];
        $contributions['element'] = $entry['element'];
        $contributions['elementAttribute'] = $this->elementAttribute($entry['elementAttribute']);
        $contributions['resource'] = $entry['resource'];
        $contributions['modul'] = $entry['modul'];
        $contributions['modulParams'] = $entry['modulParams'];
        $contributions['modulDisplay'] = $entry['modulDisplay'];
        $contributions['modulConfig'] = $entry['modulConfig'];
        $contributions['modulLink'] = $entry['modulLink'];
        $contributions['modulFormat'] = $entry['modulFormat'];
        $contributions['mediaLinkPage'] = $entry['mediaLinkPage'];      
        $contributions['mediaLinkGroup'] = $entry['mediaLinkGroup'];
        $contributions['mediaLinkUrl'] = $entry['mediaLinkUrl'];
        $contributions['mediaStyle'] = $entry['mediaStyle'];
        $contributions['source'] = $entry['source'];
        $contributions['lang'] = $entry['lang'];
        $contributions['title'] = $entry['title'];
        $contributions['headline'] = $entry['headline'];
        $contributions['contentTeaser'] = $entry['contentTeaser'];
        $contributions['content'] = $entry['content'];
        $contributions['publishDate'] = $entry['publishDate'];
        $contributions['publishAuthor'] = $entry['publishAuthor'];
        $contributions['authorEmail'] = $entry['authorEmail'];
        $contributions['groupStyle'] = $entry['group_style'];
        $contributions['groupElement'] = $entry['group_element'];
        $contributions['groupElementAttribute'] = $this->elementAttribute($entry['group_element_attribute']);
        return $contributions;
    }    


    /**
     * Remove overwrite contributions
     */
    protected function removeOverwriteTrue()
    {
        if (!empty($this->pagecontent)){
            $defaults = array();
            foreach ($this->defaultcontent as $row){
                if (0 == $row['overwrite']){
                    $defaults[] = $row;
                }
            }
            $this->defaultcontent = $defaults;
        }
    }   

    /**
     * Remove default contributions
     * @param array $content
     * @return array
     */
    protected function removeContribs($content)
    {
        if (!empty($this->replace)){
            $tmp = $content;
            foreach ($this->replace as $id){    
                foreach ($content as $key => $row){
                    if ($id === $row['contentIdent']){
                        unset($tmp[$key]);
                        break;
                    }
                }
            }
            $content = $tmp;
        }
        return $content;
    }

    /**
     * Format element attributes
     * @param string $attr
     * @return array|string
     */
    protected function elementAttribute($attr)
    {
        $params = '';
        if (strlen($attr) > 1) {
            $rows = explode(';', $attr);
            foreach ($rows as $row) {
                $row = trim($row);
                if (strlen($row) > 1) {
                    $parts = explode(':', $row);
                    $params[$parts[0]] = $parts[1];
                }
            }
        }
        
        return $params;
    }   
    
    /**
     * Default and current page conribution queries
     * @param int $pageId page ident
     * @param string $params
     * @return string
     */    
    protected function queryStringContribution($pageId, $params = false)
    {
        $sql = "SELECT ";
        $sql .= "main.id, main.adjustments, main.htmlwidgets, main.tpl_assign, main.medias, main.publish, ";
        $sql .= "wpp.url, wcg.group_style, wcg.group_element, wcg.group_element_attribute, ";
        $sql .= "wcg.web_contentgroup_id AS groupId, wcg.web_content_id, "; 
        $sql .= "wc.web_medias_id AS medias, wc.htmlwidgets AS contribHtmlwidgets, wc.element, wc.element_attribute AS elementAttribute, wc.resource, ";
        $sql .= "wc.id AS contribId, wc.modul AS modul, wc.modul_params AS modulParams, wc.modul_display AS modulDisplay, wc.modul_config AS modulConfig, wc.modul_link AS modulLink, wc.modul_format AS modulFormat, ";
        $sql .= "wc.media_link_page AS mediaLinkPage, wc.media_link_group AS mediaLinkGroup, wc.media_link_url AS mediaLinkUrl, wc.media_style AS mediaStyle, wc.source AS source, wc.lang AS lang, ";
        $sql .= "wc.title AS title, wc.headline AS headline, wc.content_teaser AS contentTeaser, wc.content AS content, ";
        $sql .= "wc.publish_date AS publishDate, wc.publish_author AS publishAuthor, wc.author_email AS authorEmail, wc.overwrite, wc.replace_default AS replaceDefault ";
        $sql .= "FROM web_pages_content AS main ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "LEFT JOIN web_content AS wc ON wc.id = wcg.web_content_id ";
        $sql .= "WHERE (main.web_pages_id = '" . $pageId . "') "; 
        $sql .= "AND wcg.name = '_default' ";
        $sql .= "AND wc.publish = 'yes' AND main.publish = 'yes' ";
        $sql .= "ORDER BY main.content_rang, main.item_rang, wcg.item_rang ";
        $sql .= "LIMIT 0,40;";
        return $sql;        
    }    
}