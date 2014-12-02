<?php

namespace Contentinum\Mapper;

use ContentinumComponents\Mapper\Worker;
use ContentinumComponents\Tools\HandleSerializeDatabase;

class Mediagroup extends Worker
{
    const ENTITY_NAME = 'Contentinum\Entity\WebMediaCategories';
    
    const TABLE_NAME = 'web_media_categories';
    
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
     * ContentinumComponents\Tools\HandleSerializeDatabase
     * @var ContentinumComponents\Tools\HandleSerializeDatabase
     */
    private $mcUnserialize;
    
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
        $this->mcUnserialize = new HandleSerializeDatabase();
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * 
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $result = array();
        foreach ($entries as $entry){
            $metas = $this->mcUnserialize->execUnserialize($entry->webMediasId->mediaMetas);
            $result[$entry->webMediasId->mediaLink]['attr']['alt'] = $metas['alt'];
            if (isset($metas['title'])){
                $result[$entry->webMediasId->mediaLink]['attr']['title'] = $metas['title'];
            }
            if (isset($metas['caption'])){
                $result[$entry->webMediasId->mediaLink]['caption'] = $metas['caption'];
            }
        }
        return $result;
    }    
    
    /**
     * 
     * @param unknown $id
     */
    private function query($id)
    {
        $repository = $this->getStorage()->getRepository( self::ENTITY_NAME );
        return $repository->findBy(array('webMediagroupId' => $id), array('itemRang' => 'ASC'));
    }
    
    /**
     * 
     * @param int $id
     * @return string
     */
    private function queryString($id)
    {
        $sql = "";
        return $sql;
    }
}