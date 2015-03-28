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
 * @version   1.1.0
 */
namespace Contentinum\Service\Domains;

use Contentinum\Service\WebsiteServiceFactory;
use ContentinumComponents\Mapper\Worker;

/**
 * Config key website preferences
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PageHeadersServiceFactory extends WebsiteServiceFactory
{

    const CONTENTINUM_DATABASE = 'contentinum_page_header';

    const CONTENTINUM_CACHE = 'Contentinum\Cache\PublicContent';
        
    /**
     * Get result from cache or execute database query
     *
     * @param array $config query and cache parameters
     * @param ServiceLocatorInterface $sl
     * @return multitype:NULL
     */
    protected function queryDbCacheResult($config, $sl)
    {
        $result = array();
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        $key = $config['cache'];
        if (! ($result = $cache->getItem($key))) {
            $worker = new Worker($sl->get($config['entitymanager']));
            $worker->setEntity($config['entity']);
            $entries = $worker->getStorage()
            ->getRepository($worker->getEntityName())
            ->findBy(array(),array('itemRang' => 'ASC'));
            $i = 1;
            foreach ($entries as $entry) {
                $metas = array();
                $metas['rel'] = ($entry->metaRel) ? $entry->metaRel : false;
                $metas['type'] = ($entry->metaType) ? $entry->metaType : false;
                $metas['title'] = ($entry->metaTitle) ? $entry->metaTitle : false;
                $metas['content'] = ($entry->metaContent) ? $entry->metaContent : false;
                if (1 !== $entry->webMedias->id){
                    $metas['href'] = $entry->webMedias->mediaLink;
                    $metas['sizes'] = $entry->webMedias->mediaDimensions;
                } else {
                    $metas['href'] = $entry->metaLink;
                }
                
                $result[$entry->webPages->id][] = $metas;
                $i++;
            }
            if (isset($config['savecache']) && true === $config['savecache']){
                $cache->setItem($key, $result);
            }
        }
        if (null === $result){
            $result = array();
        }
        return $result;
    }
        
}