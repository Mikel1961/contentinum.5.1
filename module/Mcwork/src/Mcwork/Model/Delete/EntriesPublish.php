<?php
namespace Mcwork\Model\Delete;

class EntriesPublish extends AbstractEntries
{

    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            if ($entity->publish && 'yes' === $entity->publish) {
                return 'Dataset is published and can not be deleted';
            } else {
                $this->deleteEntry($entity, $id);
                return 'The data set was successfully deleted';
            }
        } else {
            return 'Please check, this data set is already associated with another records';
        }
    }
}