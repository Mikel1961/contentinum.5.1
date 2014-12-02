<?php

namespace Contentinum\Mapper;



use ContentinumComponents\Mapper\Worker;





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
    
    
    private $requestArticle;
    
    /**
     * 
     * @var string
     */
    private $category;
    
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

	public function fetchContent($page)
    {

        $this->setPagecontent( $this->fetchAll($this->queryStringContribution($page['id'], true)));
        $this->setDefaultcontent($this->fetchAll($this->queryStringContribution($page['parentPage'])));
        return $this->prepare($page);
    
    }
    
    
    protected function queryString($pageId)
    {
        $sql = "SELECT main.id, main.adjustments, main.htmlwidgets, main.tpl_assign, main.medias, main.publish, ";
        $sql .= "wpp.url, ";
        $sql .= "wcg.group_style, wcg.group_element, wcg.group_element_attribute, wcg.web_contentgroup_id AS groupId, wcg.web_content_id ";
        $sql .= "FROM web_pages_content AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "WHERE (main.web_pages_id = '" . $pageId . "') ";
        //$sql .= "AND wcg.scope = 'content' ";
        $sql .= "ORDER BY main.content_rang, main.item_rang, wcg.item_rang, wcg.publish_date DESC ";
        $sql .= "LIMIT 0,40;";
        return $sql;
    } 
    
    
    protected function queryStringContribution($pageId, $params = false)
    {
        $sql = "SELECT main.id, main.adjustments, main.htmlwidgets, main.tpl_assign, main.medias, main.publish, ";
        $sql .= "wpp.url, wcg.name AS groupName, wcg.group_style, wcg.group_element, wcg.group_element_attribute, wcg.web_contentgroup_id AS groupId, wcg.web_content_id, ";
        $sql .= "wc.web_medias_id AS medias, wc.htmlwidgets AS contribHtmlwidgets, wc.element, wc.element_attribute AS elementAttribute, wc.resource, ";
        $sql .= "wc.id AS contribId, wc.modul AS modul, wc.modul_params AS modulParams, wc.modul_display AS modulDisplay, wc.modul_config AS modulConfig, wc.modul_link AS modulLink, wc.modul_format AS modulFormat, ";
        $sql .= "wc.media_link_page AS mediaLinkPage, wc.media_link_group AS mediaLinkGroup, wc.media_link_url AS mediaLinkUrl, wc.media_style AS mediaStyle, wc.source AS source, wc.lang AS lang, ";
        $sql .= "wc.title AS title, wc.headline AS headline, wc.content_teaser AS contentTeaser, wc.content AS content, ";
        $sql .= "wc.number_character_teaser AS numberCharacterTeaser, wc.label_read_more AS labelReadMore, wc.publish_date AS publishDate, wc.publish_author AS publishAuthor, wc.author_email AS authorEmail ";
        $sql .= "FROM web_pages_content AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_content AS wc ON wc.id = wcg.web_content_id ";
        $sql .= "WHERE (main.web_pages_id = '" . $pageId . "') ";
        
        if (true === $params){
            if ('archive' === $this->article && strlen($this->category) > 1){
                $sql .= "AND (wcg.publish_date LIKE '".$this->category."%' OR wcg.scope = 'content') ";
            }
        }
        
        
        $sql .= "ORDER BY main.content_rang, main.item_rang, wcg.item_rang, wcg.publish_date DESC ";
        $sql .= "LIMIT 0,40;";
        return $sql;        
    }
    
    
    protected function prepare($page)
    {
        $entries = array_merge($this->pagecontent, $this->defaultcontent);
        if (is_array($entries) && ! empty($entries)) {
            $i = 1;
            $ic = 0;
            $grp = 0;
            foreach ($entries as $entry) {
                if ($grp != $entry['groupId']) {
                    $ic ++;
                    $grp = $entry['groupId'];
                    $content[$ic]['url'] = $entry['url'];
                    $content[$ic]['groupName'] = $entry['groupName'];
                    $content[$ic]['adjustments'] = $entry['adjustments'];
                    $content[$ic]['htmlwidgets'] = $entry['htmlwidgets'];
                    $content[$ic]['groupStyle'] = $entry['group_style'];
                    $content[$ic]['tplAssign'] = $entry['tpl_assign'];
                    $content[$ic]['publish'] = $entry['publish'];
                    $content[$ic]['entries'][$i] = $this->prepareContribution($entry['web_content_id'], $entry);
                    if ($this->requestArticle){
                        $content[$ic]['entries'][$this->article] = $this->requestArticle;
                        $this->requestArticle = null;
                    }
                } else {
                    $content[$ic]['entries'][$i] = $this->prepareContribution($entry['web_content_id'], $entry);
                    if ($this->requestArticle){
                        $content[$ic]['entries'][$this->article] = $this->requestArticle;
                        $this->requestArticle = null;
                    }                    
                }
                $i ++;
            }
        }
        return $content;
    }  
   // l AS authorEmail,
   
   
    private function prepareContribution($id, $entry)
    {
        $contributions = array();
        if (strlen($entry['modul']) > 1){
            $this->modul[$entry['modul']]['modulParams'] = $entry['modulParams'];
            $this->modul[$entry['modul']]['modulDisplay'] = $entry['modulDisplay'];
            $this->modul[$entry['modul']]['modulConfig'] = $entry['modulConfig'];
            $this->modul[$entry['modul']]['modulLink'] = $entry['modulLink'];
            $this->modul[$entry['modul']]['modulFormat'] = $entry['modulFormat'];
        }
        
        $contributions['id'] = $entry['contribId'];
        $contributions['groupName'] = $entry['groupName'];
        $contributions['medias'] = $entry['medias'];
        $contributions['htmlwidgets'] = $entry['contribHtmlwidgets'];
        $contributions['element'] = $entry['element'];
        $contributions['elementAttribute'] = $entry['elementAttribute'];
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
        $contributions['numberCharacterTeaser'] = $entry['numberCharacterTeaser'];        
        $contributions['labelReadMore'] = $entry['labelReadMore'];
        $contributions['publishDate'] = $entry['publishDate'];
        $contributions['publishAuthor'] = $entry['publishAuthor'];
        $contributions['authorEmail'] = $entry['authorEmail'];
        $contributions['groupStyle'] = $entry['group_style'];
        $contributions['groupElement'] = $entry['group_element'];
        $contributions['groupElementAttribute'] = $this->elementAttribute($entry['group_element_attribute']);
        if ($this->article === $contributions['source']){
            $this->requestArticle = $contributions;
        }
        return $contributions;
    }    

    private function oldprepareContribution($id, $entry)
    {
        $contributions = array();
        if (isset($this->contributions[$id])) {
            $contributions = $this->contributions[$id];
            if (strlen($contributions['modul']) > 1){
                $this->modul[$contributions['modul']]['modulParams'] = $contributions['modulParams'];
                $this->modul[$contributions['modul']]['modulDisplay'] = $contributions['modulDisplay'];
                $this->modul[$contributions['modul']]['modulConfig'] = $contributions['modulConfig'];
                $this->modul[$contributions['modul']]['modulLink'] = $contributions['modulLink'];  
                $this->modul[$contributions['modul']]['modulFormat'] = $contributions['modulFormat'];
            }
        }
        $contributions['groupStyle'] = $entry['group_style'];
        $contributions['groupElement'] = $entry['group_element'];
        $contributions['groupElementAttribute'] = $this->elementAttribute($entry['group_element_attribute']);    
        if ($this->article === $contributions['source']){
            $this->requestArticle = $contributions;
        }
        return $contributions;
    }
    
    
    
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
    
}