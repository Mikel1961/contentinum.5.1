<?php


namespace Mcwork\Mapper;


use ContentinumComponents\Storage\StorageDirectory;


class TemplateFiles extends StorageDirectory
{
    
    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }
    
    public function fetchContent(array $params = null)
    {
        $cd = null;
        
        if (isset($params['id']) && strlen($params['id']) > 1){
            $cd = str_replace('_', DS, $params['id']);
        }
        
        return $this->fetchAll($this->getEntity(),$cd);
    }    
}