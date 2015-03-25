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
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Save;



use ContentinumComponents\Mapper\Process;
use ContentinumComponents\Filter\Url\Prepare;

abstract class AbstractContribution extends Process
{
    
    const ENTITY_MODEL = 'Contentinum\Entity\WebContent';

    const INUSE_GROUP = 'mediacontent';

    /**
     * Get entity name to have access of the publish property
     * 
     * @return string
     */
    public function getPublishEntity()
    {
        return self::ENTITY_MODEL;
    }
    
    /**
     * ContentinumComponents\Mapper\Process
     * @var \ContentinumComponents\Mapper\Process
     */
    private $prepareFilter;
    
    
    /**
     * 
     * @param unknown $value
     * @return string
     */
    public function prepareLink($value)
    {
        if (null === $this->prepareFilter){
            $this->prepareFilter = new Prepare();
        }
        return $this->prepareFilter->filter($value) . '-' . time();
    }
    
    /**
     * Register this media categorie in the inusemedia table
     * thus different operational prevent the file system
     * Empty cache if register success
     *
     * @param int $mediaId media id
     * @param int $inuseId media categorie id
     * @param string $name group indetifier
     * @param string $status
     */
    protected function inUseMedia($mediaId, $inuseId, $name = self::INUSE_GROUP, $status = 'insert')
    {
        return true;
    }    
    
    
    
}