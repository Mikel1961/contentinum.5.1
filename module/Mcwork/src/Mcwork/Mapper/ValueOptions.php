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
            $label = '';
            $i = 0;
            if (is_array($params['label'])){
                foreach ($params['label'] as $labelKey){
                    if ( strlen($entry->{$labelKey}) > 1 ){
                       if (0 !== $i){
                           $label .= ', ';
                       } 
                       $i++; 
                       $label .= $entry->{$labelKey};
                    }
                }
            } else {
                $label = $entry->{$params['label']};
            }
            if (strlen($label) > 1){
                $options[$entry->{$params['value']}] = $label;
            }
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