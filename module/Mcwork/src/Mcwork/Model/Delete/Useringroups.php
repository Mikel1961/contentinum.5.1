<?php
namespace Mcwork\Model\Delete;

class Useringroups extends AbstractEntries
{

    public function execute($id)
    {
        $entity = $this->find($id);
        $id = (int) $id; 
        if ($id === $entity->id) {
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
            $this->executeQuery("DELETE FROM user_acl_index WHERE id = '{$entity->id}'");
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
            return 'The data set was successfully deleted';
        } else {
            return 'Please check, user in group not found';
        }
    }
}