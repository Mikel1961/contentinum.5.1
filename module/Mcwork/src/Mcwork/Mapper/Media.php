<?php


namespace Mcwork\Mapper;



use ContentinumComponents\Mapper\Worker;
use Mcwork\Mapper\Exception\InvalidArgumentException;


class Media extends Worker
{
    
    const ENTITY_NAME = 'Contentinum\Entity\WebMedias';
    
    const TABLE_NAME = 'web_media';
    
    public function findbySource($source)
    {
        
    }
    
    
    
    /**
     * Build query and get result
     *
     * @param array $columns
     * @param array $where
     * @param string $entityName
     * @throws InvalidValueModelException
     * @return array
     */
    public function fetchMediaTable(array $columns, array $where = null, $entityName = null)
    {
        $em = $this->getStorage();
        if (null === $entityName) {
            $entityName = self::ENTITY_NAME;
            if (false === $entityName) {
                throw new InvalidArgumentException('Entity can not be found or is not available!');
            }
        }
        $builder = $em->createQueryBuilder();
        $builder->add('select', 'main.' . implode(', main.', $columns));
        $builder->add('from', $entityName . ' AS main');
        if (is_array($where) && ! empty($where)) {
            foreach ($where as $conditions) {
                $builder->where($conditions['cond']);
                $builder->setParameter($conditions['param'][0], $conditions['param'][1]);
            }
        }
        $builder->orderBy('main.mediaName', 'ASC');
        $query = $builder->getQuery();
        return $query->getResult();
    } 

    /**
     * 
     * @param unknown $id
     * @return multitype:NULL |boolean
     */
    public function downloadItem($id)
    {
        $item = $this->find($id);
        if ($item){
            return array(
                'filename' => $item->mediaName,
                'source' => $item->mediaSource,
                'size' => $item->mediaSizes,
                'type' => $item->mediaType,
            );
        } else {
            return false;
        }
    }
    
}