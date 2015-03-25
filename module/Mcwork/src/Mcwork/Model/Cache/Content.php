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
 * @link https://github.com/Mikel1961/contentinum-components
 * @version 1.0.0
 */
namespace Mcwork\Model\Cache;

use ContentinumComponents\Storage\StorageFiles;
use ContentinumComponents\Storage\AbstractStorageEntity;
use Mcwork\Model\Cache\Exception\InvalidArgumentException;

/**
 * Cache handle model
 * Provides methods to list and delete cache content
 * Cache storage informations from Service Mcwork\Cachekeys
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Content extends StorageFiles
{

    const MCWORK_CACHEKEYS = 'Mcwork\Cachekeys';

    const CACHE_FILESYSTEM = 'Mcwork\Cache\Data';

    const CACHE_FSENTITY = 'Mcwork\Entity\CacheFiles';

    /**
     * Cache keys
     *
     * @var array
     */
    protected $keys = false;

    /**
     * 
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
        return $this->emptyCache(array('id' => $id));
    }

    /**
     * Remove cache item(s)
     *
     * @param array $attribs
     * @param AbstractStorageEntity $entity
     * @param ServiceLocatorInterface $sl
     * @throws ParamNotExistsModelException
     * @return string
     */
    public function emptyCache(array $attribs)
    {
        if (strlen($attribs['id']) > 1 && 'all' != $attribs['id']) {
            $keys = $this->getCacheKeys($this->getSl(), self::CACHE_FILESYSTEM);
            if (isset($keys[$attribs['id']])) {
                $data = $keys[$attribs['id']];
                $keyCache = $this->getSl()->get( $data['cache']);
                if ($keyCache->hasItem($attribs['id'])) {
                    $keyCache->removeItem($attribs['id']);
                }
                if (isset($data['related'])) {
                    foreach ($data['related'] as $key) {
                        if (isset($keys[$key])) {
                            $data = $keys[$key];
                            $keyCache = $this->getSl()->get( $data['cache']);
                            if ($keyCache->hasItem($key)) {
                                $keyCache->removeItem($key);
                            }
                        }
                    }
                }
            }
            return 'The cache was successfully cleared';
        } elseif ('all' == $attribs['id']) {
            $keys = $this->getCacheKeys($this->getSl());
            foreach ($keys as $key => $datas) {
                $keyCache = $this->getSl()->get( $datas['cache']);
                if ($keyCache->hasItem($key)) {
                    $keyCache->removeItem($key);
                }
                $cacheData[$key] = $datas;
            }
            return 'All cache files were successfully cleared';
        } else {
            throw new InvalidArgumentException('It was not a valid index passed');
        }
    }

    /**
     * Get cache keys
     * 
     * @param ServiceLocatorInterface $sl
     * @return array
     */
    protected function getCacheKeys($sl)
    {
        if (false === $this->keys) {
            $keys = $sl->get(self::MCWORK_CACHEKEYS);
            $this->keys = $keys->toArray();
        }
        return $this->keys;
    }
}