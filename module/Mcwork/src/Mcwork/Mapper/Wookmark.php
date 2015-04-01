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
namespace Mcwork\Mapper;

use ContentinumComponents\Mapper\Worker;

/**
 * Prepare database query for wookmark reload image request
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Wookmark extends Worker
{

    /**
     *
     * @var array $data
     */
    protected $data;

    /**
     *
     * @var int $itemsPerPage
     */
    protected $itemsPerPage;

    /**
     *
     * @param unknown $data            
     * @param unknown $itemsPerPage            
     */
    public function init($data, $itemsPerPage)
    {
        $this->data = $data;
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * Returns the pictures of the given page or an empty array if page doesn't exist
     *
     * @param int $page            
     * @return array
     */
    public function getPage($page = 1)
    {
        if ($page > 0 && $page <= $this->getNumberOfPages()) {
            $startOffset = ($page - 1) * $this->itemsPerPage;
            return array_slice($this->data, $startOffset, $this->itemsPerPage);
        }
        return array();
    }

    /**
     * Returns the maximum number of pages
     *
     * @return int
     */
    public function getNumberOfPages()
    {
        return ceil(count($this->data) / $this->itemsPerPage);
    }

    /**
     * Content query
     *
     * @param array $params
     *            query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $entries = $this->query();
        $data = array();
        foreach ($entries as $entry) {
            if (1 !== $entry->id && 0 === $entry->parentMedia){
                $row = array();
                if ( preg_match('/image\//', $entry->mediaType)  ){
                    $row['appkey'] = 'imageattribute';
                } else {
                    $row['appkey'] = 'fileattribute';
                }
                $row['id'] = $entry->id;
                $row['title'] = $entry->mediaName;
                $row['mediaType'] = $entry->mediaType;
                $row['image'] = $entry->mediaLink;
                $row['preview'] = $entry->mediaLink;
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * database query
     */
    protected function query()
    {
        return $this->getStorage()
            ->getRepository($this->getEntityName())
            ->findBy(array('resource' => 'index'));
    }
}