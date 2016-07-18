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
 * @category Mcevent
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Mapper;

use Contentinum\Mapper\AbstractModuls;

class ModulDates extends AbstractModuls
{

    const ENTITY_NAME = 'Mcevent\Entity\MceventDates';

    const TABLE_NAME = 'web_maps_data';
    
    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->querylike($this->configure['modulParams']);
    }

    /**
     *
     * @param unknown $id            
     */
    private function query($id)
    {
        $repository = $this->getStorage()->getRepository(self::ENTITY_NAME);
        if (null == $this->configure['modulDisplay']) {
            return $repository->findBy(array(
                'calendar' => $id,
            ), array(
                'dateStart' => 'ASC'
            ));
        } else {
            return $repository->findBy(array(
                'calendar' => $id
            ), array(
                'dateStart' => 'ASC'
            ), (int) $this->configure['modulDisplay']);
        }
    }

    private function querylike($id)
    {
        if ($this->article && 'archive' !== $this->article) {
            $rdate = $this->category;
        } else {
            $rdate = date('Y');
        }
        $repository = $this->getStorage()->getRepository(self::ENTITY_NAME);
        $qb = $repository->createQueryBuilder('event');
        $qb->where('event.calendar = :ident');
        $qb->andWhere('event.dateStart LIKE :eventyear');
        $qb->orderBy('event.dateStart', 'ASC');
        $qb->setParameter('ident', $id);
        $qb->setParameter('eventyear', $rdate . '%');
        return $qb->getQuery()->getResult();
    }

}