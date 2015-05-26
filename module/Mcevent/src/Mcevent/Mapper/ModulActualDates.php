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

class ModulActualDates extends AbstractModuls
{

    const ENTITY_NAME = 'Mcevent\Entity\MceventDates';

    const TABLE_NAME = 'web_maps_data';
    
    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->query($this->configure['modulParams']);
    }

    /**
     *
     * @param unknown $id            
     */
    private function query($id)
    {
        
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from(self::ENTITY_NAME , 'main');
        $builder->where('main.calendar = :id');
        $builder->andWhere('main.dateStart >= :id2');
        $builder->andWhere('main.publish = :id3');
        $builder->setParameter('id', $id);
        $builder->setParameter('id2', date('Y-m-d') . ' 00:00:00');
        $builder->setParameter('id3', 'yes');
        $builder->add('orderBy', 'main.dateStart ASC');
        
        if (null != $this->configure['modulDisplay']) {
            $builder->setMaxResults( $this->configure['modulDisplay'] );
        }
        
        return $builder->getQuery()->getResult();        
    }
}