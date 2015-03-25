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

/**
 * Save model provides method to prepae insert and update datas
 * Save media informations in a databse table (not the media self!)
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Upload extends Process
{
    /**
     * 
     * @var unknown
     */
    private $saveStatus;
    
    /**
     * @return the $saveStatus
     */
    public function getSaveStatus()
    {
        return $this->saveStatus;
    }

	/**
     * @param \Mcwork\Model\Save\unknown $saveStatus
     */
    public function setSaveStatus($saveStatus)
    {
        $this->saveStatus = $saveStatus;
    }

	/**
     * Prepare datas before save
     * decide is it a insert or update
     * 
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        if ('force' === $stage){
            $entity = $this->handleEntity($entity);
            return parent::save($datas, $entity, self::SAVE_INSERT);
        }
        if (false !== ($result = $this->alreadyExists($datas['mediaSource'], $entity))){
            $entity = $this->find($result,true);
        }
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $this->saveStatus = 'insert';
            return parent::save($datas, $entity, $stage, $id);
        } else {
            $this->saveStatus = 'update';
            if ( isset($datas['mediaMetas'])) {
            	unset($datas['mediaMetas']);
            }            
            parent::save($datas, $entity, $stage, $id);
        }
    }
    
    /**
     * is media already exists
     * @param string $mediaSource media source string
     * @param WebMedias $entity
     * @return boolean|int
     */
    protected function alreadyExists($mediaSource,$entity)
    {
        $this->setEntity($entity);
        $entityName = $this->getEntityName();
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->add('select', 'main')->add('from', $entityName . ' AS main');
        $builder->add('where', 'main.mediaSource = ?' . 1);
        $builder->setParameter(1, $mediaSource);
        $query = $builder->getQuery();
        $result = $query->getResult();
        if (!$result){
        	return false;
        } else {
        	return $result[0]->id;
        }        
    }
}