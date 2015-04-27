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
namespace Contentinum\View\Helper\Wanted;

use Zend\View\Helper\AbstractHelper;

/**
 * Handle layout sequence
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Name extends AbstractHelper 
{
	
	/**
	 * Converts bytes into KB, MB, GB or TB
	 *
	 * @param int $bytes
	 *        	file size in bytes
	 * @return string
	 */
	public function __invoke($entry, $group = true) 
	{
	    $result = '';
	    if (1 === $entry->enableSalutation){
	        $result .= $this->salutation($entry->contacts->salutation) . ' ';
	    }
	    if (1 === $entry->enableTitle){
	        $result .= $this->salutation($entry->contacts->title) . ' ';
	    }	    
	    if (1 === $entry->enableFirstName ){
	        $result .= $entry->contacts->firstName . ' ';
	    }
	    
	    if (1 === $entry->enableLastName ){
	        $result .= $entry->contacts->lastName;
	    }	    
	    
	    return $result;
	}
	
	/**
	 *
	 * @param unknown $var
	 * @return string
	 */
	protected function salutation($var)
	{
	    $str = '';
	    switch ($var) {
	        case 'mr':
	            $str = 'Herr ';
	            break;
	        case 'ms':
	            $str = 'Frau ';
	            break;
	        default:
	            break;
	    }
	    return $str;
	}	
}