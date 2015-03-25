<?php


namespace Mcwork\Model\Delete;

class MediaInUse extends AbstractEntries
{
    
    /**
     * Unregister media in table
     *
     * @param int $mediaId media id
     * @param int $inuseId media categoriy id
     * @param string $name group identifier
     */
    public function unregisterMedia($mediaId, $inuseId, $name)
    {
        $sql = "DELETE FROM mediainuse ";
        $sql .= "WHERE mediasid = '" . $mediaId . "' ";
        $sql .= "AND inuseid = '" . $inuseId . "' ";
        $sql .= "AND groupname = '" . $name . "' ";
        $this->executeQuery($sql);
    }   

}