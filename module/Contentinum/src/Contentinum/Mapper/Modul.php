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

use Contentinum\Mapper\Exception\InvalidArgumentException;
/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Modul extends AbstractModuls
{

    /**
     * Modul configuration
     * 
     * @var array
     */
    private $modul = array();

    /**
     * Plugin services
     * 
     * @var array
     */
    private $keys = array();

    /**
     *
     * @return the $modul
     */
    public function getModul()
    {
        return $this->modul;
    }

    /**
     *
     * @param multitype: $modul            
     */
    public function setModul($modul)
    {
        $this->modul = $modul;
    }
    
    /**
     * Plugin keys
     * @param array $plugins
     */
    public function setPlugins($plugins)
    {
        $this->keys = $plugins;
    }

    /**
     * (non-PHPdoc)
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $result = null;
        if (empty($this->keys)){
            throw new InvalidArgumentException('No plugin keys available!');
        }
        
        if (! empty($this->modul)) {
            foreach ($this->modul as $modulKey => $modulbyArticle) { // $modulValues
                foreach ($modulbyArticle as $ident => $modulValues) {
                    $modulContent = $this->getSl()->get($this->keys[$modulKey]);
                    $modulContent->setConfigure($modulValues)->setKey($modulKey);
                    $modulContent->setUrl($this->getUrl());
                    $modulContent->setArticle( $this->getArticle());
                    $modulContent->setCategory($this->getCategory());
                    $modulContent->setTag($this->getTag());
                    $modulContent->setTagValue($this->getTagValue());
                    $result[$modulKey][$ident] = $modulValues;
                    $result[$modulKey][$ident]['modulContent'] = $modulContent->fetchContent();
                }
            }
        }
        return $result;
    }
}