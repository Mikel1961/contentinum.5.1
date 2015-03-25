<?php

namespace Mcwork\Mapper;


use ContentinumComponents\Mapper\Worker;

class ValueOptions extends Worker
{
    
    public function getOptions($params)
    {
        $entries = $this->query($params['entity']);
        $options = array();
        foreach ($entries as $entry) {
            $options[$entry->{$params['value']}] = $entry->{$params['label']};
        }
        return $options;   
    }
    
    protected function query($entityName)
    {
        return $this->getStorage()->getRepository( $entityName )->findAll();
    }
}