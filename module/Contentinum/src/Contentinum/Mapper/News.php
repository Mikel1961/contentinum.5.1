<?php

namespace Contentinum\Mapper;

use ContentinumComponents\Mapper\Worker;

class News extends Worker
{
    const ENTITY_NAME = 'Contentinum\Entity\WebContentGroups';
    
    const TABLE_NAME = 'web_content_groups';
    
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
    
    
    private $contributions;
    
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
     * @return the $contributions
     */
    public function getContributions()
    {
        return $this->contributions;
    }

	/**
     * @param field_type $contributions
     */
    public function setContributions($contributions)
    {
        $this->contributions = $contributions;
    }

	/**
     * 
     * @return multitype:multitype:array|null
     */
	public function fetchContent()
    {
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * 
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $news = array();
        return $news;
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
        $sql = "SELECT web_content_id ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "WHERE main.web_contentgroup_id = '".$id."' ";
        $sql .= "ORDER BY main.publish_date DESC";
        return $sql;
    }
}