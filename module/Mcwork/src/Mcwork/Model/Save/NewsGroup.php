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
class NewsGroup extends AbstractContentGroup
{

    const ENTITY_MODEL = 'Contentinum\Entity\WebPagesParameter';

    const GROUP_NAME = 'news';

    private $serializeParams = array(
        'headlineGroup',
        'headlineImages',
        'imageStyles',
        'numberCharacterTeaser',
        'numbernews',
        'labelReadMore',
        'publishAuthor',
        'authorEmail',
        'pdfLogo',
        'pageFormat',
        'pageLayout',
        'pdfAuthor',
        'headline',
        'pdfSubtitle',
        'pdfSignatur',
        'marginHeader',
        'marginFoot',
        'marginTop',
        'marginBottom',
        'marginLeft',
        'marginRight',
        'pageFont',
        'pageFontsize'
    );

    /**
     * Get entity name to have access of the publish property
     *
     * @return string
     */
    public function getPublishEntity()
    {
        return self::ENTITY_MODEL;
    }

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $datas['scope'] = static::GROUP_SCOPE;
            $datas['webContent'] = 1;
            $datas['contentGroupName'] = static::GROUP_NAME;
            $datas['groupStyle'] = static::GROUP_NAME;
            $datas['webContentgroup'] = $this->sequence() + 1;
            $datas['itemRang'] = 1;
            foreach ($this->serializeParams as $fields) {
                $groupParams[$fields] = $datas[$fields];
                unset($datas[$fields]);
            }
            $datas['groupParams'] = $this->serializeGroupParams($groupParams);
            parent::save($datas, $entity);
            $lastInsertId = $this->getLastInsertId();
            $datas['webContentgroup'] = $this->find($lastInsertId, true);
            $this->assignPageContent($datas, $lastInsertId);
        } else {
            foreach ($this->serializeParams as $fields) {
                $groupParams[$fields] = $datas[$fields];
                unset($datas[$fields]);
            }
            $datas['groupParams'] = $this->serializeGroupParams($groupParams);
            parent::save($datas, $entity, $stage, $id);
        }
        return true;
    }

    /**
     * Assign contribution group to a page
     *
     * @param array $datas
     *            insert group datas
     * @param int $lastInsertId            
     */
    protected function assignPageContent($datas, $lastInsertId)
    {
        $this->unsetEntity();
        if (! isset($datas['adjustments'])) {
            $insert['adjustments'] = static::AREA_NEWSCONTENT;
        }
        $insert['contentRang'] = $this->getContentRang($insert['adjustments']);
        $insert['itemRang'] = 1;
        $insert['webPages'] = $datas['webPages'];
        $insert['webContentgroup'] = $datas['webContentgroup'];
        $insert['publish'] = 'yes';
        $insert['htmlwidgets'] = $datas['htmlwidgets'];
        $insert['tplAssign'] = $datas['tplAssign'];
        parent::save($insert, $this->getSl()->get('Entity\PageContent'));
    }

    /**
     * Update page content parameters
     * 
     * @param array $datas            
     * @param integer $contentGroupId            
     */
    protected function updatePageContent($datas, $contentGroupId)
    {
        $row = $this->fetchRow("SELECT * FROM web_pages_content WHERE web_contentgroup_id = '{$contentGroupId}'");
        if (isset($row['id'])) {
            $this->unsetEntity();
            $this->setEntity($this->getSl()
                ->get('Entity\PageContent'));
            $this->addTargetEntities('webContentgroup', $this->getSl()
                ->get('Entity\Name\ContentGroups'));
            $entity = $this->find($row['id']);
            parent::save($datas, $this->find($row['id']), self::SAVE_UPDATE);
        }
    }
}