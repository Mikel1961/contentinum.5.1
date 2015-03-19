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
namespace Mcuser\Model\Auth;

use ContentinumComponents\Mapper\Process;


class User extends Process
{

    /**
     * Username user input
     * @param unknown $username
     * @return Ambigous <\ContentinumComponents\Mapper\multitype:, \Doctrine\DBAL\Driver\mixed>|boolean
     */
    public function userexists($username)
    {
        if (false !== ($user = $this->queryUser(md5($username)))){
            return $user;
        } else {
            return false;
        }
        
    }
    
    /**
     * Update user login success
     * @param array $user
     */
    public function updateLogin($user)
    {
        $update['countLogin'] = $user['count_login'] + 1;
        $update['lastLogin'] = date('Y-m-d H:i:s');
        $update['tryLogin'] = 0;
        parent::save($update, $this->find($user['id']), self::SAVE_UPDATE);
    }
    
    /**
     * Update count user faild logins
     * @param array $user user identity
     * @param number $add
     */
    public function updateCountLogin($user, $add = 1)
    {
        if (1 === $add){
            $update['tryLogin'] = $user['try_login'] + $add;
        } else {
            $update['tryLogin'] = 0;
        }
        parent::save($update, $this->find($user['id']), self::SAVE_UPDATE);
    }
    
    /**
     * 
     * @param int $userId user contact ident
     * @return multitype:Ambigous <>
     */
    public function usergroups($userId)
    {
        $result = array();
        $entries = $this->fetchAll("SELECT acl_group_id FROM user_acl_index WHERE users_id  = '{$userId}'");
        foreach ($entries as $entry){
            $result[] = $entry['acl_group_id'];
        }      
        return $result;
    }
       
    /**
     * User query login username
     * @param string $loginUsername md5 string
     */
    protected function queryUser($loginUsername)
    {
        return $this->fetchRow("SELECT * FROM users5 WHERE login_username = '{$loginUsername}' AND publish = 'yes'");
    }
    
}