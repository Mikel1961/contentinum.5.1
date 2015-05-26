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
 * Modul Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulBlogActual extends AbstractModuls
{
    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModul::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->build($this->query($this->configure['modulParams']));
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
            $result['news'] = $entries;
        }
        return $result;
    }  

    /**
     * Build query string and execute this
     * @param int $id blog or news ident
     */
    private function query($id)
    {
    
        if (null == $this->configure['modulDisplay']){
            $limit = 10;
        } else {
            $limit = (int) $this->configure['modulDisplay'];
        }
    
        $sql = "SELECT mainContent.id, mainContent.web_medias_id, mainContent.htmlwidgets, mainContent.source, mainContent.headline, ";
        $sql .= "mainContent.content_teaser, mainContent.content, mainContent.number_character_teaser, ";
        $sql .= "mainContent.label_read_more, mainContent.publish_date, DATE_FORMAT(mainContent.publish_date,'%Y/%m/%d') AS lnPublishDate, mainContent.publish_author, ";
        $sql .= "mainContent.author_email, mainContent.overwrite, pageParams.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_content AS mainContent ON mainContent.id = main.web_content_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS pageParams ON pageParams.id = main.content_group_page ";
        $sql .= "WHERE main.web_contentgroup_id = '" . $id . "' ";
        $sql .= "AND mainContent.publish = 'yes' ";
        $sql .= "ORDER BY main.publish_date DESC ";
        $sql .= "LIMIT 0,{$limit} ";
        return $this->fetchAll($sql);
    }    
}