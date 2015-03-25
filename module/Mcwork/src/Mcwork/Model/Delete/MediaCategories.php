<?php
namespace Mcwork\Model\Delete;

use ContentinumComponents\Mapper\Sequence;

class MediaCategories extends MediaInUse
{

    public function execute($id)
    {
        $entity = $this->find($id);
        $groupId = $entity->webMediagroupId->id;
        $mediaId = $entity->webMediasId->id;
        
        $this->deleteEntry($entity, $id);
        $this->unregisterMedia($mediaId, $id, 'mediacategories');
        $this->itemsort($groupId);
        return 'The data set was successfully deleted';
    }

    protected function itemsort($groupId)
    {
        $sec = new Sequence($this->getStorage());
        $entity = $this->getEntityName();
        $sec->setEntity(new $entity());
        $sec->sortItemRang('webMediagroupId', $groupId);
    }
}