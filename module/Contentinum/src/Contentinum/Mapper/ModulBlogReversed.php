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
class ModulBlogReversed extends AbstractModuls
{

    /**
     *
     * @var unknown
     */
    private $findModul = false;

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Mapper\AbstractModul::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->build($this->groupQuery($this->configure['modulParams']));
    }

    /**
     * Build content array from query result
     *
     * @param array $entries
     *            database result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        if (is_array(($contents = $this->query($this->configure['modulParams'])))) {
            $entries = array_merge($entries, $contents);
        }
        $result = array();
        if ($entries) {
            $result['news'] = $entries;
        }
        if ($this->article && 'archive' !== $this->article) {
            $result['newsarticle'] = 1;
            $this->isModulContent($entries);
            if (false !== $this->findModul){
                $result['newsplugins'] = $this->fetchModulContent();
            }          
        } elseif ($this->article && 'archive' === $this->article && $this->category) {
            $result['archivbacklink'] = $this->article . '/' . $this->category;
        }
        return $result;
    }

    /**
     *
     * @param unknown $entries            
     * @return unknown
     */
    private function isModulContent($entries)
    {
        foreach ($entries as $entry) {
            if (1 !== (int) $entry['id']){
                if (strlen($entry['modul']) > 1) {
                    $modul[$entry['modul']][$entry['id']]['modulReferer'] = $entry['id'];
                    $modul[$entry['modul']][$entry['id']]['modulParams'] = $entry['modul_params'];
                    $modul[$entry['modul']][$entry['id']]['modulDisplay'] = $entry['modul_display'];
                    $modul[$entry['modul']][$entry['id']]['modulConfig'] = $entry['modul_config'];
                    $modul[$entry['modul']][$entry['id']]['modulLink'] = $entry['modul_link'];
                    $modul[$entry['modul']][$entry['id']]['modulFormat'] = $entry['modul_format'];
                    $this->findModul = $modul;
                }
                break;
            }
            
        }
        
        return $entries;
    }
    
    /**
     * 
     */
    private function fetchModulContent()
    {
        $modul = $this->getSl()->get('Contentinum\Modul');
        $modul->setPlugins( $this->getSl()->get('Contentinum\PluginKeys') );
        $modul->setUrl($this->getUrl());
        $modul->setArticle( $this->getArticle() );
        $modul->setCategory( $this->getCategory() );
        $modul->setModul($this->findModul);
        return $modul->fetchContent();
    }

    /**
     * Build query string and execute this
     *
     * @param int $id
     *            blog or news ident
     */
    private function query($id)
    {
        if (null == $this->configure['modulDisplay']) {
            $limit = 10;
        } else {
            $limit = (int) $this->configure['modulDisplay'];
        }
        
        if (null == $this->configure['modulFormat']){
            
        }
        
        switch ($this->configure['modulFormat']){
            case 'totime':
                $condition = date('Y-m-d H:i:s');
                break;
            case 'todate':
            default:
              $condition = date('Y-m-d') . ' 00:00:00';  
              break;
        }
        
        
        
        $sql = "SELECT mainContent.id, mainContent.web_medias_id, mainContent.htmlwidgets, mainContent.source, mainContent.headline, ";
        $sql .= "mainContent.modul, mainContent.modul_params, mainContent.modul_display, mainContent.modul_config, mainContent.modul_link, mainContent.modul_format, ";
        $sql .= "mainContent.content_teaser, mainContent.content, mainContent.number_character_teaser, ";
        $sql .= "mainContent.label_read_more, mainContent.publish_date, DATE_FORMAT(mainContent.publish_date,'%Y/%m/%d') AS lnPublishDate, mainContent.publish_author, ";
        $sql .= "mainContent.author_email, mainContent.overwrite, pageParams.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_content AS mainContent ON mainContent.id = main.web_content_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS pageParams ON pageParams.id = main.content_group_page ";
        if ($this->article && 'archive' !== $this->article) {
            $sql .= "WHERE mainContent.source = '" . $this->article . "' ";
        } elseif ($this->article && 'archive' === $this->article && $this->category) {
            $sql .= "WHERE main.web_contentgroup_id = '" . $id . "' ";
            $sql .= "AND main.publish_date LIKE '" . $this->category . "%' ";
            $sql .= "ORDER BY main.publish_date DESC ";
        } else {
            $sql .= "WHERE main.web_contentgroup_id = '" . $id . "' ";
            $sql .= "AND main.publish_date > '" . $condition . "' ";
            $sql .= "ORDER BY main.publish_date ASC ";
            $sql .= "LIMIT 0,{$limit} ";
        }
        
        return $this->fetchAll($sql);
    }

    /**
     * Build query string and execute this
     *
     * @param int $id
     *            blog or news ident
     */
    private function groupQuery($id)
    {
        $sql = "SELECT main.web_content_id AS id, main.name AS groupName, main.group_style, main.group_element, ";
        $sql .= "main.group_element_attribute, main.web_contentgroup_id AS groupId, main.group_params ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "WHERE main.web_contentgroup_id = '" . $id . "' ";
        $sql .= "AND main.web_content_id = '1' ";
        return $this->fetchAll($sql);
    }

    private function modulquery()
    {} 
}