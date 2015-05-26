<?php

namespace Mcwork\Mapper;


use ContentinumComponents\Mapper\Worker;

class ValueOptions extends Worker
{
    
    public function getOptions($params)
    {
        $entries = $this->query($params['entity'], $params);
        $options = array();
        foreach ($entries as $entry) {
            $options[$entry->{$params['value']}] = $entry->{$params['label']};
        }
        return $options;   
    }
    
    protected function query($entityName, $params)
    {
        if (isset($params['sortby'])){            
            return $this->getStorage()->getRepository( $entityName )->findBy(array(),$params['sortby']);
        } else {
            return $this->getStorage()->getRepository( $entityName )->findAll();
        }
    }
}