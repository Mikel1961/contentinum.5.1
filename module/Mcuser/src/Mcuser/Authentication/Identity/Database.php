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
 * @category contentinum user
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcuser\Authentication\Identity;


use ContentinumComponents\Mapper\Worker;
use Mcuser\Authentication\Identity\Exception\InvalidValueIdentityException;


class Database extends Worker
{
    /**
     * 
     * @param string $id
     * @param string $username
     */
    public function userIdentityInstance($id = null, $username = null)
    {
        $userEntry = $this->getUserIdentity($id,$username);
        $identity = false;
        if (!empty($userEntry)) {
            $identity = new \stdClass();
            $identity->username = $userEntry['username'];
            $name = $userEntry['firstName'] . ' ' . $userEntry['lastName'];
            if (strlen($name) < 3){
                $name = $userEntry['objectName'];
            }
            $identity->name = $name;
            $identity->email = $userEntry['contactEmail'];
            $identity->userid = $userEntry['id'];
            $identity->roleident = $userEntry['roleident'];
            $identity->rolename = $userEntry['rolename'];
            $identity->role = $userEntry['role'];
            $identity->language = $userEntry['language'];       
        }
        return $identity;
    }
    
    /**
     * 
     * @param unknown $id
     * @return Ambigous <\ContentinumComponents\Mapper\multitype:, \Doctrine\DBAL\Driver\mixed>
     */
    public function getUserIdentity($id = null, $username = null)
    {
        return $this->fetchRow($this->queryString($id, $username));
    }
    
    /**
     *
     * @param unknown $id
     * @return string
     */
    public function queryString($id = null, $username = null)
    {
        $sql = "SELECT main.id, main.username, main.language, ";
        $sql .= "ref1.first_name AS firstName, ref1.last_name AS lastName, ref1.object_name AS objectName , ref1.contact_email AS contactEmail, ";
        $sql .= "ref2.id AS roleident, ref2.name AS rolename, ref2.scope AS role ";
        $sql .= "FROM users5 As main ";
        $sql .= "LEFT JOIN contacts AS ref1 ON ref1.id = main.contacts_id ";
        $sql .= "LEFT JOIN user_roles AS ref2 ON ref2.id = main.user_roles_id ";
        if (null !== $id){
            $sql .= "WHERE main.id = '{$id}'";
        } elseif (null !== $username){
            $sql .= "WHERE main.login_username = '". md5($username) ."'";
        } else {
            throw new InvalidValueIdentityException('No parameters for the identity query available');
        }
        return $sql;
    }    
}