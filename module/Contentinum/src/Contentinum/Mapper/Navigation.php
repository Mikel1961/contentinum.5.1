<?php

namespace Contentinum\Mapper;

use ContentinumComponents\Mapper\Worker;

class Navigation extends Worker
{
    const ENTITY_NAME = 'Contentinum\Entity\WebNavigationTree';
    
    const TABLE_NAME = 'web_navigation_tree';
    
    /**
     * Configuration datas
     * @var array
     */
    private $configure = array();
    
    /**
     * Name configuration
     * @var string
     */
    private $key;
    
    /**
     * Navigation level
     * @var integer
     */
    private $level = 0;
    
    /**
     * Counter loop
     * @var interger
     */
    private $currentlevel = 0;
    
    /**
     * @return the $configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }

	/**
     * @param multitype: $configure
     * @return \Contentinum\Mapper\Navigation
     */
    public function setConfigure($configure)
    {
        $this->configure = $configure;
        return $this;
    }

	/**
     * @return the $key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * 
     * @param string $key
     * @return \Contentinum\Mapper\Navigation
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
    
    /**
     * Set level
     */
    public function setLevel()
    {
        if (isset($this->configure['modulDisplay']) && $this->configure['modulDisplay'] > '0'){
            if (is_numeric($this->configure['modulDisplay'])){
                $this->level = (int) $this->configure['modulDisplay'];
            } else {
                $this->level = 9999;
            }
        } else {
            $this->level = 9999;
        }
    }

    /**
     * 
     * @return multitype:multitype:array|null
     */
	public function fetchContent()
    {
        $this->setLevel();
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * 
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        $this->currentlevel = $this->currentlevel + 1;
        $nav = array();
        foreach ($entries as $entry){
            $page = array();
            $page['label'] = $entry['label'];
        
            if ('#' == $entry['url']){
                $uri = '#';
            } elseif ('index' == $entry['url']){
                $uri = '/';
            } else {
                $uri = '/' . $entry['url'];
            }
        
            $page['uri'] = $uri;
        
            $page['resource'] = $entry['resource'];
        
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                if (null !== ($pages = $this->build($this->query($entry['parent_from'])))) {
                    if ('topbar' === $this->key){
                        $page['listClass'] = 'has-dropdown';
                        $page['subUlClass'] = 'dropdown';
                        $page['pages'] = $pages;
                    }
                }
            }
            $nav[] = $page;
        }
        return $nav;        
        
    }    
    
    /**
     * 
     * @param unknown $id
     */
    private function query($id)
    {
        return $this->fetchAll($this->queryString($id));
    }
    
    /**
     * 
     * @param int $id
     * @return string
     */
    private function queryString($id)
    {
        $sql = "SELECT main.rel_link, main.target_link, main.resource, main.parent_from, ";
        $sql .= "wpp.label, wpp.url ";
        $sql .= "FROM web_navigation_tree AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "WHERE main.publish = 'yes' ";
        $sql .= "AND wpp.publish = 'yes' ";
        $sql .= "AND main.web_navigation_id = '".$id."' ";
        $sql .= "ORDER BY main.item_rang";
        return $sql;
    }
    
}