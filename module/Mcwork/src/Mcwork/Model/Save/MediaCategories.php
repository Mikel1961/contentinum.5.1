<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Save;

use ContentinumComponents\Mapper\Process;
use Mcwork\Model\Medias\InUse;

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class MediaCategories extends Process
{
    const INUSE_GROUP = 'mediacategories';
    
    private $app = array(
        'webMediagroupId' => 'web_mediagroup_id',
        'webMediasId' => 'web_medias_id',
        'resource' => 'resource',
        'description' => 'description',
        'parentMediaFile' => 'parent_media_file',
        'alternateDownload' => 'alternate_download',
        'alternateLinktitle' => 'alternate_linktitle',
        'alternateLabelname' => 'alternate_labelname'
        
    );

    /**
     * Prepare datas before save
     * Insert the category with the correct sequnce number in this group
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $datas['itemRang'] = $this->sequence('webMediagroupId', $datas['webMediagroupId'], 'itemRang') + 1;
            parent::save($datas, $entity, $stage, $id);
            $this->inUseMedia($datas['webMediasId'], $this->lastInsertId);
            return true;
        } else {
            $this->inUseMedia($entity->webMediasId->id, $entity->id, self::INUSE_GROUP, 'delete');
            //var_dump($datas);exit;
            parent::save($datas, $entity, $stage, $id);
            $this->inUseMedia($datas['webMediasId'], $entity->id);
        }
    }
    
    /**
     * Register this media categorie in the inusemedia table
     * thus different operational prevent the file system
     * Empty cache if register success
     *
     * @param int $mediaId media id
     * @param int $inuseId media categorie id
     * @param string $name group indetifier
     * @param string $status
     */
    protected function inUseMedia($mediaId, $inuseId, $name = self::INUSE_GROUP, $status = 'insert')
    {
        $save = new InUse($this->getStorage());
        $save->setSl($this->getSl());
        if ('insert' == $status) {
            $save->insert($mediaId, $inuseId, $name);
        } else {
            $save->remove($mediaId, $inuseId, $name);
        }
    }    
}