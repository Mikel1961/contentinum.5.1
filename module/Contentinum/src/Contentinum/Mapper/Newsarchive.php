<?php

namespace Contentinum\Mapper;

use ContentinumComponents\Mapper\Worker;

class Newsarchive extends Worker
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

        $newsarchive = array();
        foreach ($entries as $entry){
            if ('0000' !== $entry['year']){
                $newsarchive[$entry['year']][$entry['month']] = $entry['url'];
            }
        }
        return $newsarchive;
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
        $sql = "SELECT DATE_FORMAT(main.publish_date, '%Y') as year, DATE_FORMAT(main.publish_date, '%m') as month, wpp.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_content AS wpc ON wpc.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wpc.web_pages_id ";        
        $sql .= "WHERE main.web_contentgroup_id = '".$id."' ";
        $sql .= "ORDER BY main.publish_date DESC";
        return $sql;
    }
}