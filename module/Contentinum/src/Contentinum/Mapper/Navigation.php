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
class Navigation extends AbstractModuls
{
    const ENTITY_NAME = 'Contentinum\Entity\WebNavigationTree';
    
    const TABLE_NAME = 'web_navigation_tree';
    
    /**
     * Navigation level
     * @var integer
     */
    private $level = 0;
    
    /**
     * Counter loop
     * @var interger
     */
    private $currentlevel = 0;
    
    /**
     * Set level
     */
    public function setLevel()
    {
        if (isset($this->configure['modulDisplay']) && $this->configure['modulDisplay'] > '0'){
            if (is_numeric($this->configure['modulDisplay'])){
                $this->level = (int) $this->configure['modulDisplay'];
            } else {
                $this->level = 9999;
            }
        } else {
            $this->level = 9999;
        }
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $this->setLevel();
        if ('topbar' === $this->key){
            return $this->build($this->query($this->configure['modulParams']));
        } else {
            $nav = $this->build($this->query($this->configure['modulParams']));
            if ('displayheadline' === $this->configure['modulConfig']) {
                $headline = $this->fetchRow("SELECT * FROM web_navigations WHERE id = '{$this->configure['modulParams']}'");
                $result['headline'] = $headline['headline'];
                $result['tags'] = $headline['tags'];
            }
            $result['nav'] = $nav;
            return $result;
        }
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
            $page = array();
            $page['label'] = $entry['label'];
        
            if ('#' == $entry['url']){
                $uri = '#';
            } elseif ('index' == $entry['url']){
                $uri = '/';
            } else {
                $uri = '/' . $entry['url'];
            }
        
            $page['uri'] = $uri;
            $page['resource'] = $entry['resource'];
            $page['listIdent'] = $entry['dom_id'];
            $page['linkClass'] = $entry['style_class'];
        
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                if (null !== ($pages = $this->build($this->query($entry['parent_from'])))) {
                    if ('topbar' === $this->key){
                        $page['listClass'] = 'has-dropdown';
                        $page['subUlClass'] = 'dropdown';
                        $page['pages'] = $pages;
                    } else {
                        if (! empty($pages)){
                            $page['listClass'] = 'navigation-list-has-dropdown';
                            $page['subUlClass'] = 'navigation-list-dropdown';                        
                            $page['pages'] = $pages;
                        }
                    }
                }
            }
            $nav[] = $page;
        }
  
        return $nav;        
        
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
        $sql = "SELECT main.rel_link, main.target_link, main.resource, main.parent_from, main.dom_id, main.style_class, ";
        $sql .= "wpp.label, wpp.url ";
        $sql .= "FROM web_navigation_tree AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "WHERE main.publish = 'yes' ";
        $sql .= "AND wpp.publish = 'yes' ";
        $sql .= "AND main.web_navigation_id = '".$id."' ";
        $sql .= "ORDER BY main.item_rang";
        return $sql;
    }
    
}