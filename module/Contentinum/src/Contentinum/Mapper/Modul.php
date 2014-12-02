<?php

namespace Contentinum\Mapper;


use ContentinumComponents\Mapper\Worker;
class Modul extends Worker
{
    /**
     * Modul configuration
     * @var array
     */
    private $modul = array();
    
    /**
     * Plugin services
     * @var array
     */
    private $keys = array(
        'topbar' => 'Contentinum\Navigation',
        'newsarchive' => 'Contentinum\Newsarchive',
        'news' => 'Contentinum\News',
        'navigation' => 'Contentinum\Navigation',
        'mediagroup' => 'Contentinum\Mediagroup'
        
    );
    
    /**
     * @return the $modul
     */
    public function getModul()
    {
        return $this->modul;
    }

	/**
     * @param multitype: $modul
     */
    public function setModul($modul)
    {
        $this->modul = $modul;
    }

    /**
     * Build and get plugin content
     * @return multitype: NULL|array
     */
	public function fetchContent()
    {
        $result = null;
        if (!empty($this->modul)){
            foreach ($this->modul as $key => $modulValues){
                $modulContent = $this->getSl()->get($this->keys[$key]);
                $modulContent->setConfigure($modulValues)->setKey($key);
                $result[$key] = $modulValues;
                $result[$key]['modulContent'] = $modulContent->fetchContent();
            }
        }
        return $result;
    }

}