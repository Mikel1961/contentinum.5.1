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
namespace Contentinum\Mapper\Queries;

use ContentinumComponents\Mapper\Worker;


class Api extends Worker
{
    
    public function fetchContacts(array $params = null)
    {
        $search = preg_split('/[\s]+/', $params['search']);
        $filter = new \Zend\I18n\Filter\Alnum();
        foreach ($search as $value){        
            $values[] = $filter->filter($value);
        }
        $row = $this->fetchRow( "SELECT id FROM contacts WHERE first_name LIKE '" .$values[0]. "%' AND last_name LIKE '".$values[1]."%';");  
        if (is_array($row) && isset($row['id'])){
            return $this->getStorage()->getRepository('Contentinum\Entity\Contacts')->findBy(array('id' => $row['id']));
        } else {
            return false;
        }
    }
    
    public function fetchRessource(array $params = null)
    {
        $filter = new \Zend\I18n\Filter\Alnum();
        $search = $filter->filter($params['search']);
        $row = $this->fetchRow( "SELECT id FROM contacts WHERE object_name LIKE '" .$search. "%';");
        if (is_array($row) && isset($row['id'])){
            return $this->getStorage()->getRepository('Contentinum\Entity\Contacts')->findBy(array('id' => $row['id']));
        } else {
            return false;
        }
    }    
    
}