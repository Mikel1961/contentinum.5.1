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

use ContentinumComponents\Mapper\Sequence;
/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ContributionGroup extends AbstractContentGroup
{
    /**
     * Page ident
     * @var int
     */
    private $prevPage;
    
    /**
     * Page ident
     * @var int
     */
    private $newPage;
    
    /**
     * Contribution ident
     * @var int
     */
    private $contribution;

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
            return false;
        } else {
            $datas['contentRang'] = $this->getContentRang($datas['adjustments']);
            if ($entity->webPages->id !== $datas['webPages']){
                $this->prevPage = $entity->webPages->id;
                $this->newPage = $datas['webPages'];
                $this->contribution = $entity->webContentgroup->webContent->id;
            }
            $msg = parent::save($datas, $entity, $stage, $id);
            $this->sortitemrang();
            return $msg;
        }
    }    
    
    
    /**
     * 
     * @param unknown $datas
     */
    public function insertContribution($datas)
    {
        $this->addTargetEntities('webContentgroup', $this->getSl()->get('Entity\Name\ContentGroups') );
        $this->addTargetEntities('webPages', $this->getSl()->get('Entity\Name\Page') );
        $datas['contentRang'] = $this->getContentRang($datas['adjustments']);
        $datas['htmlwidgets'] = 'content';
        $datas['publish'] = 'yes';
        $datas['itemRang'] = $this->sequence('webPages', $datas['webPages'], 'itemRang') + 1;
        parent::save($datas, $this->getSl()->get('Entity\PageContent'));
    }
    
    
    
    
    /**
     * Sort new contribution sequence if the contribution has been moved to another page
     */
    public function sortitemrang()
    {
        if ($this->prevPage && $this->newPage){
            $seq = new Sequence($this->getStorage());
            $seq->setEntity($this->getEntity());
            $seq->sortItemRang('webPages', $this->prevPage);
            $seq->sortItemRang('webPages', $this->newPage);
            $this->prevPage = null;
            $this->newPage = null;
        }
    }    
}