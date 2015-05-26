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
namespace Contentinum\View\Helper\Navigation\Builds;


use Zend\View\Helper\Navigation\Menu;
use RecursiveIteratorIterator;
use Zend\Navigation\AbstractContainer;
use Zend\Navigation\Page\AbstractPage;

/**
 * Copy method renderNormalMenu() and htmlify()
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Multilevel extends Menu
{
    /**
     * Set Submenu class attribute
     * @var string
     */
    protected $subUlClass = '';

    /**
     * Submenue attribute
     * @var null|array
     */
    protected $subUlAttribute = '';
    
    
    protected $depth = 0;
    
    protected $attr = array();
    
    
    public function __invoke($ontainer, $attr = array())
    {
        $this->attr = $attr;
        return parent::__invoke($ontainer);
    }


    /**
     * Copy from Zend View Helper Menu
     * @see \Zend\View\Helper\Navigation\Menu::renderNormalMenu()
     */
    protected function renderNormalMenu(
        AbstractContainer $container,
        $ulClass,
        $indent,
        $minDepth,
        $maxDepth,
        $onlyActive,
        $escapeLabels,
        $addClassToListItem
    ) {
        $html = '';

        // find deepest active
        $found = $this->findActive($container, $minDepth, $maxDepth);
        if ($found) {
            $foundPage  = $found['page'];
            $foundDepth = $found['depth'];
        } else {
            $foundPage = null;
        }

        // create iterator
        $iterator = new RecursiveIteratorIterator($container,
            RecursiveIteratorIterator::SELF_FIRST);
        if (is_int($maxDepth)) {
            $iterator->setMaxDepth($maxDepth);
        }

        // iterate container
        $prevDepth = -1;
        foreach ($iterator as $page) {
            $depth = $iterator->getDepth();
            $this->depth = $depth;
            $isActive = $page->isActive(true);
            if ($depth < $minDepth || !$this->accept($page)) {
                // page is below minDepth or not accepted by acl/visibility
                continue;
            } elseif ($onlyActive && !$isActive) {
                // page is not active itself, but might be in the active branch
                $accept = false;
                if ($foundPage) {
                    if ($foundPage->hasPage($page)) {
                        // accept if page is a direct child of the active page
                        $accept = true;
                    } elseif ($foundPage->getParent()->hasPage($page)) {
                        // page is a sibling of the active page...
                        if (!$foundPage->hasPages() ||
                            is_int($maxDepth) && $foundDepth + 1 > $maxDepth) {
                                // accept if active page has no children, or the
                                // children are too deep to be rendered
                                $accept = true;
                            }
                    }
                }

                if (!$accept) {
                    continue;
                }
            }  //print '<pre>';
            //var_dump($page);exit;
            // make sure indentation is correct
            $depth -= $minDepth;
            $myIndent = $indent . str_repeat('        ', $depth);

            if ($depth > $prevDepth) {
                // start new ul tag
                if ($ulClass && $depth ==  0) {
                    $ulClass = ' class="' . $ulClass . '"';
                    $ulIdent = '';
                } else {
                    $ulClass = ( isset($this->attr['subUlClass']) ) ? ' class="' . $this->attr['subUlClass'] . '"' : '';
                    $ulIdent = ' data-ident="subIdent' . $page->get('aIdent') . '"';

                }
                $html .= $myIndent . '<ul'. $ulIdent . $ulClass . '>' . self::EOL;
            } elseif ($prevDepth > $depth) {
                // close li/ul tags until we're at current depth
                for ($i = $prevDepth; $i > $depth; $i--) {
                    $ind = $indent . str_repeat('        ', $i);
                    $html .= $ind . '    </li>' . self::EOL;
                    $html .= $ind . '</ul>' . self::EOL;
                }
                // close previous li tag
                $html .= $myIndent . '    </li>' . self::EOL;
            } else {
                // close previous li tag
                $html .= $myIndent . '    </li>' . self::EOL;
            }

            // render li tag and page
            $liClasses = array();
            // Is page active?
   
            if ($isActive) {         
                $liClasses[1] = 'active';
            }            
            
            if(true == ($subIdent = $page->get('listSubIdent'))){
                ( isset($this->attr['listHasDropdown']) ) ? $liClasses[2] =  $this->attr['listHasDropdown'] : '';
            }


            if(true == ($listClass = $page->get('listClass'))){
                $liClasses[3] = $listClass;
            }
            
            $liIdent = '';
            if(true == ($listIdent = $page->get('listIdent'))){
                $liIdent = ' id="' . $listIdent . '"';
            }
            $liClass = empty($liClasses) ? '' : ' class="' . implode(' ', $liClasses) . '"';

            $html .= $myIndent . '    <li' . $liIdent . $liClass . '>' . self::EOL
            . $myIndent . '        ' . $this->htmlify($page, $escapeLabels, $addClassToListItem) . self::EOL;

            // store as previous depth for next iteration
            $prevDepth = $depth;
        }

        if ($html) {
            // done iterating container; close open ul/li tags
            for ($i = $prevDepth+1; $i > 0; $i--) {
                $myIndent = $indent . str_repeat('        ', $i-1);
                $html .= $myIndent . '    </li>' . self::EOL
                . $myIndent . '</ul>' . self::EOL;
            }
            $html = rtrim($html, self::EOL);
        }

        return $html;
    }

    /**
     * Copy from Zend helper menu
     * @see \Zend\View\Helper\Navigation\Menu::htmlify()
     */
    public function htmlify(AbstractPage $page, $escapeLabel = false, $addClassToListItem = false)
    {
        // get label and title for translating
        $label = $page->getLabel();
        $title = $page->getTitle();

        // translate label and title?
        if (null !== ($translator = $this->getTranslator())) {
            $textDomain = $this->getTranslatorTextDomain();
            if (is_string($label) && !empty($label)) {
                $label = $translator->translate($label, $textDomain);
            }
            if (is_string($title) && !empty($title)) {
                $title = $translator->translate($title, $textDomain);
            }
        }

        // get attribs for element
        $attribs = array(
            'id'     => $page->getId(),
            'title'  => $title,
        );

        if ($addClassToListItem === false) {
            $attribs['class'] = $page->getClass();
        }

        // does page have a href?
        $href = $page->getHref();
        if ($href) {
            $element = 'a';
            $attribs['href'] = $href;
            $attribs['target'] = $page->getTarget();
            if(true == ($aClass = $page->get('aClass'))){
                $addClass = ( isset( $attribs['class']) ) ? ' ' .  $attribs['class'] : '';
                $attribs['class'] = $aClass . $addClass;
                $addClass = '';
            }
            if(true == ($subIdent = $page->get('listSubIdent'))){
                $addClass = ( isset( $attribs['class']) ) ? ' ' .  $attribs['class'] : '';
                $attribs['class'] = ( isset($this->attr['linkClassDropdown']) ) ? $this->attr['linkClassDropdown'] . $addClass : $addClass;
                $attribs['data-ident'] = 'subIdent' . $subIdent;
            } elseif (0 == $this->depth){
                $addClass = ( isset( $attribs['class']) ) ? ' ' .  $attribs['class'] : '';
                $attribs['class'] = ( isset($this->attr['linkClassDefault']) ) ? $this->attr['linkClassDefault'] . $addClass : $addClass;                
            } 
            if(true == ($aAttribute = $page->get('aAttribute'))){
                $attribs = array_merge($attribs, $aAttribute);
            }

        } else {
            $element = 'span';
        }
        $aData = '';
        if(true == ($aData = $page->get('aData'))){
            $aData = ' ' . $aData;
        }

        $html = '<' . $element . $this->htmlAttribs($attribs) . $aData . '>';
        if ($escapeLabel === true) {
            $escaper = $this->view->plugin('escapeHtml');
            //$html .= $escaper($label);
            $html .= $label;
        } else {
            $html .= $label;
        }

        if(true == ($aLabelExt = $page->get('aLabelExt'))){
            $html .= $aLabelExt;
        }

        $html .= '</' . $element . '>';

        return $html;
    }

}
