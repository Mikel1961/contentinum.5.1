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
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Assets extends AbstractHelper
{

    const ASSETS_PATH = '/assets/app';

    /**
     *
     * @param \Zend\Config $template            
     * @param string $key            
     */
    public function __invoke($htmllayouts, $templateKey, $htmlassets)
    {
        if (! isset($htmllayouts->$templateKey->assetkey)) {
            return false;
        }
        $htmlLayoutAssetKey = $htmllayouts->$templateKey->assetkey;
        
        if (isset($htmllayouts->$templateKey->application)) {
            $state = $htmllayouts->$templateKey->application;
        } else {
            $state = 'debug';
        }
        
        $assets = $htmlassets->$htmlLayoutAssetKey->toArray();
        if (isset($htmllayouts->$templateKey->assets)) {
            $assets = ArrayMergeRecursiveDistinct::merge($assets, $htmllayouts->$templateKey->assets->toArray());
        }
        if ('production' === $state) {
            if (false === ($cssfile = $this->frontendAssets(self::ASSETS_PATH . '/' . $htmlLayoutAssetKey . '.css'))) {
                $cssfile = $this->combinestyles($assets, self::ASSETS_PATH . '/' . $htmlLayoutAssetKey . '.css');
            }
            if (false !== $cssfile) {
                $this->view->headLink()->appendStylesheet($cssfile, array(
                    'media' => 'all'
                ));
            }
            if (false === ($jsfile = $this->frontendAssets(self::ASSETS_PATH . '/js' . $htmlLayoutAssetKey . '.js'))) {
                $jsfile = $this->combinejs($assets, self::ASSETS_PATH . '/js' . $htmlLayoutAssetKey . '.js');
            }
            if (false !== $jsfile) {
                $this->view->headscript()->appendFile($jsfile, array(
                    'type' => 'text/javascript'
                ));
            }
            $jsfile = false;
            if (false === ($jsfile = $this->frontendAssets(self::ASSETS_PATH . '/scripts' . $htmlLayoutAssetKey . '.js'))) {
                $jsfile = $this->combinejs($assets, self::ASSETS_PATH . '/scripts' . $htmlLayoutAssetKey . '.js', 'footer');
            }
            if (false !== $jsfile) {                
                $this->view->inlineScript()->prependFile($jsfile);
            }            
            
            
        } else {
            
            foreach ($assets as $assetKey => $types) {
                switch ($assetKey) {
                    case 'header':
                        foreach ($types as $typeKey => $type) {
                            if ('styles' === $typeKey) {
                                foreach ($type as $fileKey => $file) {
                                    $attr = array(
                                        'media' => 'screen'
                                    );
                                    if (isset($file['attr'])) {
                                        $attr = $file['attr'];
                                    }
                                    $this->view->headLink()->appendStylesheet($file['file'], $attr);
                                }
                            }
                            if ('scripts' === $typeKey) {
                                foreach ($type as $fileKey => $file) {
                                    $this->view->headscript()->appendFile($file['file'], $file['type']);
                                }
                            }
                        }
                        break;
                    case 'footer':
                        $i = 10;
                        foreach ($types as $typeKey => $type) {
                            if ('scripts' === $typeKey) {
                                foreach ($type as $fileKey => $file) {
                                    $this->view->inlinescript()->offsetSetFile($i, $file['file']);
                                    $i ++;
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

    /**
     *
     * @param unknown $assets            
     * @param unknown $assetfile            
     * @param string $case            
     * @return boolean
     */
    protected function combinestyles($assets, $assetfile, $case = 'header')
    {
        $csscontent = '';
        foreach ($assets as $assetKey => $types) {
            switch ($assetKey) {
                case $case:
                    foreach ($types as $typeKey => $type) {
                        if ('styles' === $typeKey) {
                            foreach ($type as $fileKey => $file) {
                                $csscontent .= file_get_contents(DOCUMENT_ROOT . $file['file']);
                            }
                        }
                    }
                    break;
                default:
                    break;
            }
        }
        
        if (strlen($csscontent) > 2) {
            file_put_contents(DOCUMENT_ROOT . $assetfile, $csscontent);
        } else {
            $assetfile = false;
        }
        return $assetfile;
    }

    /**
     *
     * @param unknown $assets            
     * @param unknown $assetfile            
     * @param string $case            
     * @return boolean
     */
    protected function combinejs($assets, $assetfile, $case = 'header')
    {
        $jscontent = '';
        foreach ($assets as $assetKey => $types) {
            switch ($assetKey) {
                case $case:
                    foreach ($types as $typeKey => $type) {
                        if ('scripts' === $typeKey) {
                            foreach ($type as $fileKey => $file) {
                                $jscontent .= file_get_contents(DOCUMENT_ROOT . $file['file']);
                            }
                        }
                    }
                    break;
                default:
                    break;
            }
        }
        
        if (strlen($jscontent) > 2) {
            file_put_contents(DOCUMENT_ROOT . $assetfile, $jscontent);
        } else {
            $assetfile = false;
        }
        return $assetfile;
    }

    protected function frontendAssets($assetfile, $diff = 3600)
    {
        if (file_exists(DOCUMENT_ROOT . $assetfile)) {
            $lastmodified = filemtime(DOCUMENT_ROOT . $assetfile);
            if ($diff < (time() - $lastmodified)) {
                return false;
            } else {
                return $assetfile;
            }
        } else {
            return false;
        }
    }
}