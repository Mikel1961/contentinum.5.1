<?php
namespace Mcwork\Model\Delete;

class User extends AbstractEntries
{

    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            if ($entity->publish && 'yes' === $entity->publish) {
                return 'Dataset is published and can not be deleted';
            } else {       
                $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
                $this->executeQuery("DELETE FROM users5 WHERE id = '{$entity->id}'");
                $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
                return 'The data set was successfully deleted';
            }
        } else {
            return 'Please check, this data set is already associated with another records';
        }
    }
}