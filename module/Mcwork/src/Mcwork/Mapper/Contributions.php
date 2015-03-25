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
 * Query contents for this request
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Contributions extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $contributions = $this->fetchAll($this->queryStringContribution());
        if (!$contributions || empty($contributions)){
            return array();
        }
        $result = $this->fetchAll($this->queryStringPageContent());
        $pagecontent = array();
        foreach ($result as $row){
            $pagecontent[$row['web_contentgroup_id']] = $row;
        }
        $result = array();
        foreach ($contributions as $row){
            if ( isset($pagecontent[$row['web_contentgroup_id']]) ){
                $result[] = array_merge($row, $pagecontent[$row['web_contentgroup_id']]);
            } elseif ( isset($pagecontent[$row['groupId']]) ){
                $result[] = array_merge($row, $pagecontent[$row['groupId']]);
            }
        }
        return $result;
    }
    
    /**
     * 
     * @return string
     */
    protected function queryStringContribution()
    {
        $sql = "SELECT main.id, main.title, main.publish, main.register_date, main.up_date, main.created_by, main.update_by, ";
        $sql .= "wcg.id AS groupId, wcg.web_contentgroup_id ";
        $sql .= "FROM web_content AS main ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_content_id = main.id ";
        $sql .= "WHERE main.deleted = 0 ";
        $sql .= "AND wcg.scope = 'content';";
        return $sql;
    }
    
    /**
     * 
     * @return string
     */
    protected function queryStringPageContent()
    {
    
        $sql = "SELECT main.adjustments, wpp.label, wpp.id AS pageid, main.web_contentgroup_id ";
        $sql .= "FROM web_pages_content AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id";
        return $sql;
    }    
}