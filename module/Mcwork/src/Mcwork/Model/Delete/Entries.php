<?php
namespace Mcwork\Model\Delete;

class Entries extends AbstractEntries
{

    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            $this->deleteEntry($entity, $id);
            return 'The data set was successfully deleted';
        } else {
            return 'Please check, this data set is already associated with another records';
        }
    }
}