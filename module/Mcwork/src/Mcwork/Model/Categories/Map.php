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
namespace Mcwork\Model\Categories;

/**
 * Map categories model
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Map extends AbstractCategories
{

    const ENTITY_GROUP = 'Contentinum\Entity\WebMaps';

    const ENTITY_CATEGORIES = 'Contentinum\Entity\WebMapsData';

    const CATEGORIES_GROUP = 'webMaps';

    const CATEGORY_TABLE_NAME = 'web_maps_data';

    const CATEGORY_ITEM_PRIMARY = 'id';

    const CATEGORY_GROUP_TABLE_NAME = 'web_maps';

    const CATEGORY_GROUP_PRIMARY = 'id';

    const CATEGORY_COL_GROUP = 'web_maps_id';


    /**
     * Get the contents of the specific category
     *
     * @param array $params query conditions
     * @param boolen $asArray false = return entity objects, true returns a result array
     * @return Ambigous <\Mcwork\Model\Categories\multitype:unknown, multitype:, array>
     */
    public function fetchContent($params, $asArray = false)
    {
        if (isset($params['id'])) {
            $em = $this->getStorage();
            $builder = $em->createQueryBuilder();
            $builder->select('main');
            $builder->from('Contentinum\Entity\WebMapsData', 'main');
            $builder->leftJoin('Contentinum\Entity\WebMaps', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.id = main.webMaps');
            $builder->where('main.webMaps = :id');
            $builder->setParameter('id', $params['id']);
            $builder->orderBy('main.name', 'ASC');
            $result = $builder->getQuery()->getResult();
        } else {
            $result = array();
        }
        return $this->resultAsArray($result, $asArray);
    }
}