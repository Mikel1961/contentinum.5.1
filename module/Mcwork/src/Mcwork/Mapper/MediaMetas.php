<?php


namespace Mcwork\Mapper;



use ContentinumComponents\Mapper\Worker;



class MediaMetas extends Worker
{
    
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        return $this->getStorage()->getRepository( $this->getEntityName() )->findAll();
    }
    
}