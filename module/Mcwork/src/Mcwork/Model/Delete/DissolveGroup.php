<?php


namespace Mcwork\Model\Delete;



use ContentinumComponents\Mapper\Worker;
use Mcwork\Model\Exception\UnexpectedValueException;

class DissolveGroup extends Worker
{
    /**
     * Move contribution trash
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
            try {
     
                
                $groupIdent = $id;
                $inGroup = $this->fetchAll('SELECT * FROM web_content_groups WHERE web_contentgroup_id = ' . $id);
                $groupPage = $this->fetchRow('SELECT * FROM web_pages_content WHERE web_contentgroup_id = ' . $id);
                
                foreach ($inGroup as $groupItem) {
                    $update = array();
                    $update['webContentgroup'] = $groupItem['web_content_id'];
                    $update['groupStyle'] = 'none';
                    $update['groupElement'] = '';
                    $update['groupElementAttribute'] = '';
                    $update['itemRang'] = '1';                
                    $this->save($update, $this->find($groupItem['id'], true), self::SAVE_UPDATE);                
                    if ($groupIdent != $groupItem['web_content_id']) {
                        $insert = array();
                        $pageContent = new \Mcwork\Model\Categories\Page($this->getStorage());
                        $pageContent->setEntity(new \Contentinum\Entity\WebPagesContent());
                        $insert['id'] = $pageContent->sequence() + 1;                        
                        $insert['item_rang'] = $pageContent->sequence('webPages', $groupPage['web_pages_id'],'itemRang') + 1;
                        unset($pageContent);
                        $insert['web_pages_id'] = $groupPage['web_pages_id'];
                        $insert['web_contentgroup_id'] = $groupItem['id'];
                        $insert['adjustments'] = $groupPage['adjustments'];
                        $insert['htmlwidgets'] = $groupPage['htmlwidgets'];
                        $insert['publish'] = 'yes';
                        $insert['tpl_assign'] = $groupPage['tpl_assign'];
                        $insert['file'] = '';
                        $insert['medias'] = '0';
                        $insert['content_rang'] = $groupPage['content_rang'];
                        $insert['created_by'] = $groupPage['created_by'];
                        $insert['update_by'] = $groupPage['update_by'];
                        $insert['register_date'] = date('Y-m-d H-i-s');
                        $insert['up_date'] = date('Y-m-d H-i-s');  
                        $this->insertQuery('web_pages_content', $insert);
                    }
                }
       
            return 'The contribution group was successfully dissolve!';
        } catch (UnexpectedValueException $e) {
            return  $e->getMessage();
        }
    }    
}