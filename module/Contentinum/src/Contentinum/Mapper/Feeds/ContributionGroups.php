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
namespace Contentinum\Mapper\Feeds;

use ContentinumComponents\Mapper\Worker;
/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ContributionGroups extends Worker
{
    const ENTITY_NAME = 'Contentinum\Entity\WebContentGroups';
    
    const TABLE_NAME = 'web_content_groups';
    
    private $feed = array();

    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModul::fetchContent()
     */
	public function fetchContent(array $params = null)
    {
        return $this->build($this->query($params['id']));
    }
    
    /**
     * Build content array from query result
     * @param array $entries database result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {

        $result = array();
        if ($entries){
            $result['feed'] = $this->feed;
            $result['feedentries'] = $entries;
        }
        return $result;
    }    
    
    /**
     * Contribution group query
     * @param int $id
     */    
    private function query($id)
    {
       $newsgroup = $this->groupQuery($id);

       $orWhere = '';
       foreach ($newsgroup as $group){
           
           if ( strlen($orWhere) > 1  ){
               $orWhere .= ' OR ';
           }
           if (empty($this->feed)){
               $this->feed = $group;
           }
           $orWhere .= "main.web_contentgroup_id = '{$group['indexgroup_id']}'";
       }       
        
        if (null == $this->feed['feed_count']){
            $limit = 10;
        } else {
            $limit = (int) $this->feed['feed_count'];
        }
        $sql = "SELECT mainContent.id, mainContent.web_medias_id, mainContent.htmlwidgets, mainContent.source, mainContent.headline, ";
        $sql .= "mainContent.content_teaser, mainContent.content, mainContent.number_character_teaser, ";
        $sql .= "mainContent.label_read_more, mainContent.publish_date, mainContent.up_date, mainContent.publish_author, ";
        $sql .= "mainContent.author_email, mainContent.overwrite, pageParams.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_content AS mainContent ON mainContent.id = main.web_content_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS pageParams ON pageParams.id = main.content_group_page ";
        $sql .= "WHERE ({$orWhere}) ";
        $sql .= "ORDER BY main.publish_date DESC ";
        $sql .= "LIMIT 0,{$limit} ";
        return $this->fetchAll($sql);
    }  
    
    /**
     *
     * @param unknown $id
     */
    private function groupQuery($id)
    {
        return $this->fetchAll("SELECT wcn.feed_title, wcn.feed_author, wcn.feed_authoremail, wcn.feed_authorinternet, wcn.feed_count, wcn.feed_url, main.indexgroup_id FROM web_content_indexgroup AS main LEFT JOIN web_content_namegroup AS wcn ON wcn.id = main.groups_id WHERE wcn.feed_url = '{$id}'");
    }  
    
}