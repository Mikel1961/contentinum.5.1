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

use ContentinumComponents\Mapper\Worker;

class Sitemap extends Worker
{
    /**
     * Navigation level
     * @var integer
     */
    private $level = 9999;
    
    /**
     * Counter loop
     * @var interger
     */
    private $currentlevel = 0;  
    
    /**
     * 
     * @var unknown
     */
    private $rang = 2; 
    
    /**
     * 
     * @var unknown
     */
    private $nav = array();
    
    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $navs = $this->fetchSitemapTrees();
        foreach ($navs as $nav){
            $this->build($this->query($nav['id']));
        }
        ksort($this->nav);
        return $this->nav;
    }

    /**
     *
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        $this->currentlevel = $this->currentlevel + 1;
        $nav = array();
        foreach ($entries as $entry){
            $this->format($entry);
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                $this->build($this->query($entry['parent_from']));
            }
        }
    } 

    /**
     * 
     * @param unknown $entry
     */
    private function format($entry)
    {
        if ('#' !== $entry['url']){
            $page = array();
            $page['label'] = $entry['label'];
            $page['lastmod'] = $entry['lastmod'];
            $page['changefreq'] = $entry['changefreq'];
            $page['priority'] = $entry['priority'];
            
            if ('index' == $entry['url']){
                $uri = '/';
                $i = 1;
            } else {
                $uri = '/' . $entry['url'];
                $this->rang++;
                $i = $this->rang;
            }
            
            $page['uri'] = $uri;
            $page['resource'] = $entry['resource'];
            $this->nav[$i] = $page;  
        }      
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
        $sql = "SELECT main.rel_link, main.target_link, main.resource, main.parent_from, ";
        $sql .= "wpp.label, wpp.url, DATE_FORMAT(wpp.up_date,'%Y-%m-%d') AS lastmod, wpp.changefreq, wpp.priority ";
        $sql .= "FROM web_navigation_tree AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "WHERE main.publish = 'yes' ";
        $sql .= "AND wpp.publish = 'yes' ";
        $sql .= "AND main.web_navigation_id = '".$id."' ";
        $sql .= "ORDER BY main.item_rang";
        return $sql;
    }  

    /**
     * 
     * @return Ambigous <\ContentinumComponents\Mapper\multitype:, multitype:>
     */
    private function fetchSitemapTrees()
    {
        return $this->fetchAll("SELECT id FROM web_navigations WHERE sitemap = 'yes'");
    }
}