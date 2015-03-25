<?php

namespace Mcwork\Model\Delete;

use ContentinumComponents\Mapper\Worker;
abstract class AbstractEntries extends Worker
{
    /**
     * 
     * @var array
     */
    protected $relatedEntries;
        
    /**
     * @return the $relatedEntries
     */
    public function getRelatedEntries()
    {
        return $this->relatedEntries;
    }

	/**
     * @param multitype: $relatedEntries
     */
    public function setRelatedEntries($relatedEntries)
    {
        $this->relatedEntries = $relatedEntries;
    }

	protected function isEntries($value)
    {
        $result = false;
        if (is_array($this->relatedEntries) && ! empty($this->relatedEntries)){
            foreach ($this->relatedEntries as $row){
                $result = $this->hasEntries($row['tablename'], $row['column'], $value);
            }
        }
        return $result;
    }
    
}