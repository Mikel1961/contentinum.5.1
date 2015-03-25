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
 * @category contentinum
 * @package Service
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Service\Media;

use Contentinum\Service\WebsiteServiceFactory;
use Mcwork\Mapper\Media;

/**
 * Content of full media table to use in backend
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class TableServiceFactory extends WebsiteServiceFactory
{

    /**
     * Cache key media table
     * 
     * @var string
     */
    const CONTENTINUM_DATABASE = 'mcwork_media';

    /**
     * Name cache factory
     * 
     * @var string
     */
    const CONTENTINUM_CACHE = 'Mcwork\Cache\Structures';

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Service\WebsiteServiceFactory::queryDbCacheResult()
     */
    protected function queryDbCacheResult($config, $sl)
    {
        $result = array();
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        $key = $config['cache'];
        
        if (! ($result = $cache->getItem($key))) {
            $worker = new Media($sl->get($config['entitymanager']));
            $worker->setEntity($config['entity']);
            $datas = $worker->fetchMediaTable(array(
                'id',
                'parentMedia',
                'mediaName',
                'mediaSource',
                'mediaLink',
                'mediaType',
                'mediaAlternate',
                'mediaMetas',
                'mediaSizes',
                'resource',
                'createdBy',
                'updateBy',
                'registerDate',
                'upDate'
            ),null,$config['entity']);
            foreach ($datas as $row) {
                $result[$row['mediaSource']]['mediaSizes'] = $row['mediaSizes'];
                $result[$row['mediaSource']]['id'] = $row['id'];
                $result[$row['mediaSource']]['parentMedia'] = $row['parentMedia'];
                $result[$row['mediaSource']]['mediaLink'] = $row['mediaLink'];
                $result[$row['mediaSource']]['mediaName'] = $row['mediaName'];
                $result[$row['mediaSource']]['mediaType'] = $row['mediaType'];
                $result[$row['mediaSource']]['mediaAlternate'] = $row['mediaAlternate'];
                $result[$row['mediaSource']]['mediaMetas'] = $row['mediaMetas'];
                $result[$row['mediaSource']]['resource'] = $row['resource'];
                $result[$row['mediaSource']]['createdBy'] = $row['createdBy'];
                $result[$row['mediaSource']]['updateBy'] = $row['updateBy'];
                $result[$row['mediaSource']]['registerDate'] = $row['registerDate'];
                $result[$row['mediaSource']]['upDate'] = $row['upDate'];
            }
            if (isset($config['savecache']) && true === $config['savecache']){
                $cache->setItem($key, $result);
            }
        }
        return $result;
    }
}