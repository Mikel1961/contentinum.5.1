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

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class News extends AbstractContribution
{

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $datas['title'] = $datas['headline'];
            $datas['source'] = $this->prepareLink($datas['headline']);          
            $msg = parent::save($datas, $entity, $stage, $id);
            $lastInsertId = $this->getLastInsertId();
            $this->inUseMedia($datas['webMediasId'], $lastInsertId);
            $this->assignGroup($datas, $lastInsertId);
        } else {
            $this->inUseMedia($entity->webMediasId->id, $entity->id, self::INUSE_GROUP, 'delete');
            $datas['title'] = $datas['headline'];
            $datas['source'] = $this->prepareLink($datas['headline']);
            parent::save($datas, $entity, $stage, $id);
            $this->inUseMedia($datas['webMediasId'], $entity->id);
            $this->updateGroup($datas, $entity->id);

        }
        return true;
    }
    
    /**
     * 
     * @param unknown $datas
     * @param unknown $lastInsertId
     */
    public function assignGroup($datas, $lastInsertId)
    {
        $row = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$datas['webContentgroup']}' AND web_content_id = '1'");
        $insert['name'] = $row['name'];
        $insert['scope'] = $row['scope'];
        $insert['contentGroupName'] = $row['content_group_name'];
        $insert['groupStyle'] = $row['group_style'];
        $insert['itemRang'] = 1;
        $insert['webContent'] = $lastInsertId;
        $insert['webContentgroup'] = $datas['webContentgroup'];
        $insert['publishDate'] = $datas['publishDate'];
        $this->unsetTargetEntities();
        $this->setTargetEntities(array('webContent' => $this->getEntityName()));
        $this->unsetEntity();
        parent::save($insert, $this->getSl()->get('Entity\ContentGroups'));
        
    }
    
    /**
     * Only publish update
     * @param array $datas
     * @param integer $webContent
     */
    public function updateGroup($datas,$webContent)
    {
        $row = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$datas['webContentgroup']}' AND web_content_id = '1'");
        $this->executeQuery("UPDATE web_content_groups SET name = '{$row['name']}', web_contentgroup_id = '{$datas['webContentgroup']}', publish_date = '{$datas['publishDate']}' WHERE web_content_id = '{$webContent}'");
    }

}