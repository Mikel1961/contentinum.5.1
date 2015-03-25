<?php



namespace Mcwork\Model\Delete;

use ContentinumComponents\Mapper\Sequence;


class NavigationMenue extends AbstractEntries
{
    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            $groupId = $entity->webNavigations->id;
            if ($entity->publish && 'yes' === $entity->publish) {
                return 'Dataset is published and can not be deleted';
            } else {
                $this->deleteEntry($entity, $id);
                $this->itemsort($groupId);
                return 'The data set was successfully deleted';
            }
        } else {
            return 'Please check, this data set is already associated with another records';
        }
    }

    
    protected function itemsort($groupId)
    {
        $sec = new Sequence($this->getStorage());
        $entity = $this->getEntityName();
        $sec->setEntity(new $entity());
        $sec->sortItemRang('webNavigations', $groupId);
    }
}