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

/**
 * Abstract moduls mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
abstract class AbstractModuls extends Worker
{
    /**
     * Current url
     * @var string
     */
    protected $url;
    
    /**
     * Current url article parameter
     * @var string
     */
    protected $article;
    
    /**
     * Current url category parameter
     * @var string
     */
    protected $category;
    
    
    /**
     * Configuration datas
     * @var array
     */
    protected $configure = array();
    
    /**
     * Name configuration
     * @var string
    */
    protected $key;    
    
    /**
     * @return the $url
     */
    public function getUrl()
    {
        return $this->url;
    }

	/**
     * @param field_type $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

	/**
     * @return the $article
     */
    public function getArticle()
    {
        return $this->article;
    }

	/**
     * @param field_type $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

	/**
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
     * @param field_type $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    /**
     * @return the $configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }
    
    /**
     * @param multitype: $configure
     * @return \Contentinum\Mapper\Navigation
     */
    public function setConfigure($configure)
    {
        $this->configure = $configure;
        return $this;
    }
    
    /**
     * @return the $key
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     *
     * @param string $key
     * @return \Contentinum\Mapper\Navigation
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }    

    /**
     * Fetch database query content
     * @param array $params query parameter
     */
	abstract public function fetchContent(array $params = null);
}