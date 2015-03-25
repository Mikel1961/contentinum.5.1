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
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ContentinumComponents\Tools\HandleSerializeDatabase;


class PublicPdfFactory implements FactoryInterface
{
    /**
     * ContentinumComponents\Tools\HandleSerializeDatabase
     * @var \ContentinumComponents\Tools\HandleSerializeDatabase
     */
    private $mcSerialize;
    
    /* (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $sl)
    {

        $medias = $sl->get('Mcwork\Media');
        $options = array();
        foreach ($medias as $row){
            if ('index' === $row['resource'] && 'application/pdf' === $row['mediaType']) {
                $options[$row['id']] = $row['mediaName'] . ' #' . $this->mediaMetas($row['mediaMetas'], $row['mediaName']);
            }
        }
        return $options;
    }
    
    
    protected function mediaMetas ($metas, $name)
    {
        if (null === $this->mcSerialize){
            $this->mcSerialize = new HandleSerializeDatabase();
        }
        $metas = $this->mcSerialize->execUnserialize($metas);
        if (isset($metas['linkname']) && strlen($metas['linkname']) > 1 ){
            return $metas['linkname'];
        } else {
            return $name;
        }
    }
}