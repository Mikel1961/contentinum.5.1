<?php


namespace Mcwork\Model\Delete;




use ContentinumComponents\Mapper\Worker;
use ContentinumComponents\Storage\StorageManager;


class Files extends Worker
{ 

    public function execute($id)
    {
       
        $entity = $this->find($id);     
        $this->deleteFile($entity->mediaSource);
        $this->deleteEntry($entity, $id);
        return true;
    }
    
    
    protected function deleteFile($source)
    {
        
        $storage = new StorageManager();
        $source = $storage->getDocumentRoot() .   $source;
        if (file_exists($source)){
            $storage->delete($source);
            return true;
        } else {
            return false;
        }
        
    }

}