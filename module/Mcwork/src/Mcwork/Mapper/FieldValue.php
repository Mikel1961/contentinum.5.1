<?php

namespace Mcwork\Mapper;


use ContentinumComponents\Mapper\Worker;
use ContentinumComponents\Tools\HandleSerializeDatabase;

class FieldValue extends Worker
{
    
    public function getValue($params)
    {
        $entity = $params['entity'];
        $this->setEntity(new $entity());
        $entry = $this->query($params['id']);
        $datas = array();
        switch ($params['app']){
            case 'fileattribute':
                $datas = $this->fileattribute($entry);
                break;
            default:
                break;
        }
        
        return $datas;
    }
    
    protected function query($id)
    {
        
        return $this->fetchPopulateValues($id);
    }
    
    
    protected function fileattribute($entry)
    {
        $mcSerialize = new HandleSerializeDatabase(); 
        return $mcSerialize->execUnserialize($entry['mediaMetas']);
    }
}