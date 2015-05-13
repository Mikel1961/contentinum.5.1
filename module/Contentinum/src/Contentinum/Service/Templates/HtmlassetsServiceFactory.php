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
namespace Contentinum\Service\Templates;

use Contentinum\Service\TemplateServiceFactory;
use Zend\Config\Reader\Xml;
use Zend\Config\Config;

/**
 * Config template key html layout
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class HtmlassetsServiceFactory extends TemplateServiceFactory
{

    const CONTENTINUM_TEMPLATE = 'templates_htmlassets';
    
    /**
     * Name cache factory
     * @var string
     */
    const CONTENTINUM_CACHE = 'Contentinum\Cache\StrutureContent';    
    
    
    /**
     * Get result from cache or read from xml file
     *
     * @param string $file path to file and filename
     * @param string $key template file ident
     * @param ServiceLocatorInterface $sl
     */
    protected function getTemplateFileAsConfig($dir, $key, $sl)
    {
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        if (! ($result = $cache->getItem($key))) {
            $xmlFile = new Xml();
            $i = 1;
            foreach (scandir($dir) as $file){
                if ('.' != $file && '..' != $file){
                    if (1 === $i){
                        $result = new Config($xmlFile->fromFile($dir.DS.$file));
                    } else {
                        $result->merge(new Config($xmlFile->fromFile($dir.DS.$file)));
                    }
                    $i++;
                }
            }
            $cache->setItem($key, $result);
        }
        return $result;
    }    
}