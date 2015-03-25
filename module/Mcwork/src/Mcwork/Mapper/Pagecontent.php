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
class Pagecontent extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $sql = "SELECT main.group_style, main.web_contentgroup_id AS groupId, main.update_by AS wcgupdate_by, main.created_by AS wcgcreated_by, "; 
        $sql .= "wpc.id, wpc.adjustments, wpc.htmlwidgets, wpc.publish, wpc.created_by, wpc.update_by, wpc.register_date, wpc.up_date, ";
        $sql .= "wpp.id AS wppid, wpp.label, ";
        $sql .= "wc.title, wc.id AS wcid, wc.publish AS wcpublish ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_content AS wpc ON wpc.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wpc.web_pages_id ";
        $sql .= "LEFT JOIN web_content AS wc ON wc.id = main.web_content_id ";
        $sql .= "WHERE main.scope = 'content' ";
        $sql .= "ORDER BY main.web_contentgroup_id, main.item_rang, wpc.item_rang ";
        
        $entries = $this->fetchAll($sql);
        $i = 1;
        $ic = 0;
        $grp = 0;
        $content = array();
        $i5 = 0;
        foreach ($entries as $entry) {
            if ($grp != $entry['groupId']) {
                $ic ++;
                $grp = $entry['groupId'];
                $content[$ic]['id'] = $entry['id'];
                $content[$ic]['adjustments'] = $entry['adjustments'];
                $content[$ic]['htmlwidgets'] = $entry['htmlwidgets'];
                $content[$ic]['publish'] = $entry['publish'];
                $content[$ic]['wppid'] = $entry['wppid'];
                $content[$ic]['label'] = $entry['label'];
                $content[$ic]['entries'][$i] = array(
                    'wcid' => $entry['wcid'],
                    'title' => $entry['title'],
                    'group_style' => $entry['group_style'],
                    'wcpublish' => $entry['wcpublish'],
                    'groupId' => $entry['groupId'],
                    'wcgcreated_by' => $entry['wcgcreated_by'],
                    'wcgupdate_by' => $entry['wcgupdate_by']
                );
                $content[$ic]['register_date'] = $entry['register_date'];
                $content[$ic]['up_date'] = $entry['up_date'];
                $content[$ic]['created_by'] = $entry['created_by'];
                $content[$ic]['update_by'] = $entry['update_by'];
            } else {
                $content[$ic]['entries'][$i] = array(
                    'wcid' => $entry['wcid'],
                    'title' => $entry['title'],
                    'group_style' => $entry['group_style'],
                    'wcpublish' => $entry['wcpublish'],
                    'groupId' => $entry['groupId'],
                    'wcgcreated_by' => $entry['wcgcreated_by'],
                    'wcgupdate_by' => $entry['wcgupdate_by']
                );
            }
            $i ++;
            if ($i5 > 3){
                break;
            }
        }
        return $content;
    }
      
}