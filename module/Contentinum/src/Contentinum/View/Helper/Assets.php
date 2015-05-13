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
 * @category Contentinum
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ContentinumComponents\Tools\ArrayMergeRecursiveDistinct;


/**
 * Assets view helper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Assets extends AbstractHelper
{
	/**
	 * 
	 * @param \Zend\Config $template
	 * @param string $key
	 */
	public function __invoke($htmllayouts, $templateKey, $htmlassets)
	{
	    
	    if (! isset($htmllayouts->$templateKey->assetkey)){
	        return false;
	    }
	    $htmlLayoutAssetKey = $htmllayouts->$templateKey->assetkey;
	    $assets = $htmlassets->$htmlLayoutAssetKey->toArray();
	    if (isset($htmllayouts->$templateKey->assets)){
	        $assets = ArrayMergeRecursiveDistinct::merge($assets,$htmllayouts->$templateKey->assets->toArray());
	    }
	    
	    foreach ($assets as $assetKey => $types){
	        switch ($assetKey){
	            case 'header':
	                foreach ($types as $typeKey => $type){
	                    if ('styles' === $typeKey){
	                        foreach ($type as $fileKey => $file){
	                            $attr = array('media' => 'screen');
	                            if ( isset($file['attr']) ){
	                                $attr = $file['attr'];
	                            }
	                            $this->view->headLink()->appendStylesheet($file['file'], $attr);	                            
	                        }
	                    }
	                    if ('scripts' === $typeKey){
	                        foreach ($type as $fileKey => $file){
	                            $this->view->headscript()->appendFile($file['file'],$file['type']);
	                        }	                         
	                    }	                    
	                }
	                break;
	            case 'footer':
	                $i = 10;
	                foreach ($types as $typeKey => $type){
	                    if ('scripts' === $typeKey){
	                        foreach ($type as $fileKey => $file){
	                            $this->view->inlinescript()->offsetSetFile($i, $file['file']);
	                            $i++;
	                        }
	                    }	                    
	                }
	                break;
	             default:
	                 break;   
	        }
	        
	    }
	    
	}
}