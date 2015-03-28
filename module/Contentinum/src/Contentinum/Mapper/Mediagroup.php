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
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper;

use ContentinumComponents\Tools\HandleSerializeDatabase;

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Mediagroup extends AbstractModuls
{
    const ENTITY_NAME = 'Contentinum\Entity\WebMediaCategories';
    
    const TABLE_NAME = 'web_media_categories';
    
    /**
     * ContentinumComponents\Tools\HandleSerializeDatabase
     * @var ContentinumComponents\Tools\HandleSerializeDatabase
     */
    private $mcUnserialize;

    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
	public function fetchContent(array $params = null)
    {
        $this->mcUnserialize = new HandleSerializeDatabase();
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * Build content array from database query result
     * @param array $entries query result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $result = array();
        foreach ($entries as $entry){
            $metas = $this->mcUnserialize->execUnserialize($entry->webMediasId->mediaMetas);
            $result[$entry->webMediasId->mediaLink]['attr']['alt'] = $metas['alt'];
            if (isset($metas['title'])){
                $result[$entry->webMediasId->mediaLink]['attr']['title'] = $metas['title'];
            }
            if (isset($metas['caption'])){
                $result[$entry->webMediasId->mediaLink]['caption'] = $metas['caption'];
            }
        }
        return $result;
    }    
    
    /**
     * Database query
     * @param unknown $id
     */
    private function query($id)
    {
        return $this->getStorage()->getRepository( self::ENTITY_NAME )->findBy(array('webMediagroupId' => $id), array('itemRang' => 'ASC'));
    }
}