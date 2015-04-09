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

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulBlogsMonthly extends AbstractModuls
{
    const ENTITY_NAME = 'Contentinum\Entity\WebContentGroups';

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->build($this->query($this->configure['modulParams']));
    }
    
    /**
     * 
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $newsarchive = array();
        foreach ($entries as $entry){
            if ('0000' !== $entry['year']){
                $newsarchive[$entry['year']][$entry['month']] = $entry['url'];
            }
        }
        return $newsarchive;
    }    
    
    /**
     * 
     * @param unknown $id
     */
    private function query($id)
    {
        
        return $this->fetchAll($this->queryString($id));
    }
    
    /**
     * 
     * @param int $id
     * @return string
     */
    private function queryString($id)
    {
        $sql = "SELECT DATE_FORMAT(main.publish_date, '%Y') as year, DATE_FORMAT(main.publish_date, '%m') as month, wpp.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.content_group_page ";   
        $sql .= "LEFT JOIN web_content AS wc ON wc.id = main.web_content_id ";
        $sql .= "WHERE main.web_contentgroup_id = '".$id."' ";
        $sql .= "AND wc.publish = 'yes' ";
        $sql .= "ORDER BY main.publish_date DESC";
        return $sql;
    }
}