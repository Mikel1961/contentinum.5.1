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
namespace Mcwork\Model\FileSystem;

/**
 * Directory and path file system model
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *        
 */
class Resize extends Directory
{
    /**
     * Image size to resize
     * @var array
     */
    private $resizes;
    
    
    private $resizesImages = array();
    
    private $mediaType;
    
    private $mediaName;
    
    /**
     * @return the $resizes
     */
    public function getResizes()
    {
        return $this->resizes;
    }
    
    /**
     * @param multitype: $resizes
     */
    public function setResizes($resizes)
    {
        $this->resizes = $resizes;
    }
    
    

    /**
     * @return the $resizesImages
     */
    public function getResizesImages()
    {
        return $this->resizesImages;
    }

	/**
     * @param Ambigous <\ContentinumComponents\Images\the, multitype:> $resizesImages
     */
    public function setResizesImages($resizesImages)
    {
        $this->resizesImages = $resizesImages;
    }

	/**
     * @return the $mediaType
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

	/**
     * @param field_type $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

	/**
     * @return the $mediaName
     */
    public function getMediaName()
    {
        return $this->mediaName;
    }

	/**
     * @param field_type $mediaName
     */
    public function setMediaName($mediaName)
    {
        $this->mediaName = $mediaName;
    }

	/**
     * Create images with different sizes from the current uploaded file
     * Hide this images file in a hidden folder
     */
    protected function buildAlternateImageSizes()
    {
        if (is_array($this->resizes) && ! empty($this->resizes)){
            $resize = new \ContentinumComponents\Images\Resize(200, $this->targetPathFileName, $this->targetFileName, $this->target);
            $mediaAlternate = array();
            foreach ($this->resizes as $key => $value) {
                if ('thumbnail' == $key){
                    $resize->setPostfix('th');
                }
                $resize->setTarget($value);
                if (false !== $resize->execute()) {
                    $mediaSizes[] = $value;
                    $source = $this->cleanPath(str_replace($this->getDocumentRoot(), '', $resize->getResizeImageSource()));
                    $mediaAlternate[$key]['mediaName'] = $this->getMediaName();
                    $mediaAlternate[$key]['mediaSource'] = $source;
                    $mediaAlternate[$key]['mediaLink'] = str_replace($this->getDs() .'public', '', $source);
                    $mediaAlternate[$key]['mediaDimensions'] = implode('x', $resize->getNewsize());
                    $mediaAlternate[$key]['mediaType'] = $this->getMediaType();
                }
            }
            $this->resizesImages = $mediaAlternate;        
        }
    }    
}