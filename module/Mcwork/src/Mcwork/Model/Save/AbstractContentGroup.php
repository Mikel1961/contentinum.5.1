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
use ContentinumComponents\Tools\HandleSerializeDatabase;



abstract class AbstractContentGroup extends Process
{
    const ENTITY_MODEL = 'Contentinum\Entity\WebContentGroups';
    
    const AREA_HEADER = 'HEADER';
    const AREA_FOOTER = 'FOOTER';
    const AREA_CONTENT = 'CONTENT';
    const AREA_ASIDE = 'ASIDE';
    const AREA_CONTENTFOOTER = 'CONTENTFOOTER';
    const AREA_CONTENTHEADER = 'CONTENTHEADER';
    const AREA_NEWSCONTENT = 'NEWSCONTENT';  
    const AREA_MAINNAVIGATION = 'MAINNAVIGATION';
    const GROUP_SCOPE = 'group';
    
    private $contentRang = false;
    
    
    /**
     * ContentinumComponents\Tools\HandleSerializeDatabase
     * @var \ContentinumComponents\Tools\HandleSerializeDatabase
     */
    private $mcSerialize;

    /**
     * Get entity name to have access of the publish property
     *
     * @return string
     */
    public function getPublishEntity()
    {
        return self::ENTITY_MODEL;
    }    
    
	/**
     * @return the $contentRang
     */
    public function getContentRang($key = null)
    {
        if (false === $this->contentRang){
            $assigns = $this->getSl()->get('Contentinum\TemplateAssign');
            $itemRang = array();
            foreach ($styles->assigns as $key => $row){
                $itemRang[$key] = $row->rang;
            }            
            $this->setContentRang($itemRang);
        }
        if (null !== $key && isset($this->contentRang[$key]) ){
            return $this->contentRang[$key];
        } else {
            return '400';
        }
    }

	/**
     * @param multitype:string  $contentRang
     */
    public function setContentRang($contentRang)
    {
        $this->contentRang = $contentRang;
    }
    
    /**
     * Serialize group params if params avaiable
     * @param array $datas
     * @return string
     */
    public function serializeGroupParams($datas)
    {
        if (null === $this->mcSerialize){
            $this->mcSerialize = new HandleSerializeDatabase();
        }
        return $this->mcSerialize->execSerialize($datas);
    }
    
    /**
     * Unserialize group params if avaiable
     * @param string $datas
     * @return Ambigous <multitype:, mixed>
     */
    public function unserializeGroupParams($datas)
    {
        if (null === $this->mcSerialize){
            $this->mcSerialize = new HandleSerializeDatabase();
        }
        return $this->mcSerialize->execUnserialize($datas);
    }    

}