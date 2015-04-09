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

use ContentinumComponents\Tools\HandleSerializeDatabase;
use ContentinumComponents\Filter\Url\Prepare;

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulAccountMembers extends AbstractModuls
{

    const ENTITY_NAME = 'Contentinum\Entity\Accounts';

    const TABLE_NAME = 'accounts';

    /**
     * ContentinumComponents\Tools\HandleSerializeDatabase
     *
     * @var ContentinumComponents\Tools\HandleSerializeDatabase
     */
    private $mcUnserialize;

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $this->mcUnserialize = new HandleSerializeDatabase();
        return $this->build($this->query($this->configure['modulParams']));
    }

    /**
     *
     * @param unknown $entries            
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        switch ($this->configure['modulFormat']) {
            case 'listdatas':
                return $entries;
                break;
            default:                
                $result = array();
                $filter = new Prepare();
                foreach ($entries as $entry) {
                    $organisation = $filter->filter($entry->organisation);
                    if (preg_match('/\bkreisstadt-/', $organisation)) {
                        $orga = str_replace('kreisstadt-', '', $organisation);
                    }
                    if (preg_match('/\bstadt-/', $organisation)) {
                        $orga = str_replace('stadt-', '', $organisation);
                    }
                    if (preg_match('/gemeinde-/', $organisation)) {
                        $orga = str_replace('gemeinde-', '', $organisation);
                    }
                    
                    if (strlen($entry->imgSource) == 0) {
                        $entry->imgSource = '/accounts/' . $entry->fieldtypes->typescope . '/' . $organisation . '.jpg';
                    }
                    $result[$orga] = $entry->toArray();
                }
                ksort($result);
                return $result;
        }
    }

    /**
     *
     * @param unknown $id            
     */
    private function query($id)
    {
        $repository = $this->getStorage()->getRepository(self::ENTITY_NAME);
        return $repository->findBy(array(
            'fieldtypes' => $id
        ), array(
            'organisation' => 'ASC'
        ));
    }
}