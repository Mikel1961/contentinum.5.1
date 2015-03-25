<?php
namespace Mcwork\Model\Delete;

class News extends AbstractEntries
{

    /**
     * Move contribution trash
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
        $entity = $this->find($id);
        if ($entity->publish && 'yes' === $entity->publish) {
            return 'Dataset is published and can not be deleted';
        } else {
            
            if (true === $this->removeAssociatedEntries($entity->id)){
                $this->executeQuery("UPDATE web_content SET deleted = '1' WHERE id = '{$entity->id}'");      
            }
            return 'The contribution was successfully move in trash';
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return boolean
     */
    protected function removeAssociatedEntries($id)
    {

        $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
        $this->executeQuery("DELETE FROM web_content_groups WHERE web_content_id = '{$id}'");
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");    

        return true;
    }
}