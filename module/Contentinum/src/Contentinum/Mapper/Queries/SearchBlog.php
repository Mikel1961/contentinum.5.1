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
namespace Contentinum\Mapper\Queries;

use ContentinumComponents\Mapper\Worker;


class SearchBlog extends Worker
{
  
     
    public function fetchContent($pageUrl)
    {
        return $this->query($pageUrl);
    }
    
    /**
     * SQL query
     * @param int $id
     * @param int $contributionId
     * @param int $pageIdent
     * @return string
     */
    protected function query($pageUrl)
    {
        $sql = "SELECT mainContent.id, mainContent.source, mainContent.headline, mainContent.content, ";
        $sql .= "mainContent.content_teaser, mainContent.content, mainContent.number_character_teaser, ";
        $sql .= "mainContent.label_read_more, mainContent.publish_date, mainContent.publish_author, ";
        $sql .= "mainContent.author_email, mainContent.overwrite, pageParams.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_content AS mainContent ON mainContent.id = main.web_content_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS pageParams ON pageParams.id = main.content_group_page ";
        $sql .= "WHERE pageParams.url = '{$pageUrl}' ";
        $sql .= "ORDER BY main.publish_date DESC ";
        $sql .= "LIMIT 0,1000 ";
        return $this->fetchAll($sql);
        return $sql;
    }
    
}