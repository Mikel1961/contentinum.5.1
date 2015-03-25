<?php
namespace Mcwork\Model\Delete;

class Contribution extends AbstractEntries
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
        // contribution group
        $grpRow = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_content_id = '{$id}'");
        // in page (page content)
        $inPageRow = $this->fetchRow("SELECT * FROM web_pages_content WHERE web_contentgroup_id = '{$grpRow['id']}'");
        if ($inPageRow && is_array($inPageRow)){
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
            $this->executeQuery("DELETE FROM web_pages_content WHERE id = '{$inPageRow['id']}'");
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");           
        }
        
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
        $this->executeQuery("DELETE FROM web_content_groups WHERE id = '{$grpRow['id']}'");
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");    

        return true;
    }
}