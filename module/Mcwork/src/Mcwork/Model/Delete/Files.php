<?php


namespace Mcwork\Model\Delete;




use ContentinumComponents\Mapper\Worker;
use ContentinumComponents\Storage\StorageManager;


class Files extends Worker
{ 

    public function execute($id)
    {
       
        $entity = $this->find($id);   
        if ($entity){
            
            $this->deleteFile($entity->mediaSource);
            $this->deleteThumbnail($id);
            $this->deleteEntry($entity, $id);            
            
            return true;
        } else {
            throw new \Mcwork\Model\Exception\InvalidValueModelException('No file found');
        }


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
    
    protected function deleteThumbnail($id)
    {
        $this->executeQuery("DELETE FROM web_medias WHERE parent_media = {$id};");
    }

}