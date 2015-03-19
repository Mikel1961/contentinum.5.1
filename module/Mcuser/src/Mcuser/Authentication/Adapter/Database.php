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
namespace Mcuser\Authentication\Adapter;



use Zend\Authentication\Adapter\AdapterInterface;
use ContentinumComponents\Crypt\Password;
use Zend\Authentication\Result;



class Database extends AbstractAdapter implements AdapterInterface
{
    

    /**
     * Mcuser\Model\Auth\User
     *
     * @var Mcuser\Model\Auth\User
     */
    private $worker;

    /**
     * User query array
     *
     * @var array
     */
    private $user;

    /**
     * $identityColumn - the column to use as the identity
     *
     * @var string
     */
    private $identityColumn = 'login_username';

    /**
     * $_credentialColumns - columns to be used as the credentials
     *
     * @var string
     */
    private $credentialColumn = 'login_password';

    /**
     * $identity - Identity value
     *
     * @var string
     */
    private $identity = null;

    /**
     * $credential - Credential values
     *
     * @var string
     */
    private $credential = null;

    /**
     * $credentialTreatment - Treatment applied to the credential, such as MD5() or PASSWORD()
     *
     * @var ContentinumComponents\Crypt\CryptInterface
     */
    private $credentialTreatment = null;

    /**
     * $authenticateResultInfo
     *
     * @var array
     */
    protected $authenticateResultInfo = null;
    
    /**
     * Cryption salt
     * @var string
     */
    protected $salt;

    /**
     *
     * @return the $worker
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     *
     * @param \Mcuser\Model\Auth\Mcuser\Model\Auth\User $worker
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;
    }

    /**
     *
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *
     * @param multitype: $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     *
     * @return the $identityColumn
     */
    public function getIdentityColumn()
    {
        return $this->identityColumn;
    }

    /**
     *
     * @param string $identityColumn
     */
    public function setIdentityColumn($identityColumn)
    {
        $this->identityColumn = $identityColumn;
    }

    /**
     *
     * @return the $credentialColumn
     */
    public function getCredentialColumn()
    {
        return $this->credentialColumn;
    }

    /**
     *
     * @param string $credentialColumn
     */
    public function setCredentialColumn($credentialColumn)
    {
        $this->credentialColumn = $credentialColumn;
    }

    /**
     *
     * @return the $identity
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     *
     * @param string $identity
     */
    public function setIdentity($identity, $treatment = 'md5')
    {
        if (false !== $treatment) {
            $identity = $treatment($identity);
        }
        
        $this->identity = $identity;
    }

    /**
     *
     * @return the $credential
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     *
     * @param string $credential
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
    }

    /**
     *
     * @return the $credentialTreatment
     */
    public function getCredentialTreatment()
    {
        return $this->credentialTreatment;
    }

    /**
     *
     * @param string $credentialTreatment
     */
    public function setCredentialTreatment($credentialTreatment = null)
    {
        if (null === $credentialTreatment) {
            $credentialTreatment = new Password();
        }
        
        $this->credentialTreatment = $credentialTreatment;
    }

    /**
     *
     * @return the $authenticateResultInfo
     */
    public function getAuthenticateResultInfo()
    {
        return $this->authenticateResultInfo;
    }

    /**
     *
     * @param multitype: $authenticateResultInfo
     */
    public function setAuthenticateResultInfo($authenticateResultInfo)
    {
        $this->authenticateResultInfo = $authenticateResultInfo;
    }

    /**
     * @return the $salt
     */
    public function getSalt()
    {
        return $this->salt;
    }

	/**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
    
    /**
     * Sets username and password for authentication
     *
     * @return void
     */
    public function setLoginDatas($identity, $credential, $worker, $user)
    {
        $this->setIdentity($identity);
        $this->setCredential($credential);
        $this->setWorker($worker);
        $this->setUser($user);
        $this->setCredentialTreatment();
        return $this;
    }    

	/**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        if (isset($this->user[$this->identityColumn]) && $this->identity === $this->user[$this->identityColumn]) {
            if ( $this->user['try_login'] < 3 ) { 
                if (isset($this->user[$this->credentialColumn])) {
                    $credential = $this->credentialTreatment->encode($this->credential, $this->getSalt());
                    if ($credential === $this->user[$this->credentialColumn]) {
                        $authResultInfo['code'] = Result::SUCCESS;
                        $authResultInfo['messages'][] = 'Authentication successful.';
                    } else {
                        $authResultInfo['code'] = Result::FAILURE_CREDENTIAL_INVALID;
                        switch ($this->user['try_login']) {
                            case '2':
                                $authResultInfo['messages'][] = 'Supplied credential is invalid, third try! The account has been locked!';
                                break;
                            case '1':
                                $authResultInfo['messages'][] = 'Supplied credential is invalid, second try!';
                                break;
                            case '0':
                            default:
                                $authResultInfo['messages'][] = 'Supplied credential is invalid.';
                                break;
                        }
                    }
                } else {
                    $authResultInfo['code'] = Result::FAILURE_UNCATEGORIZED;
                    $authResultInfo['messages'][] = 'Unknown error.';
                }
            } else {
                $authResultInfo['code'] = Result::FAILURE;
                $authResultInfo['messages'][] = 'user_locked';
            }
        } else {
            $authResultInfo['code'] = Result::FAILURE_IDENTITY_NOT_FOUND;
            $authResultInfo['messages'][] = 'User not found or locked.';
        }
        $this->setAuthenticateResultInfo($authResultInfo);
        return $this->createAuthResult();
    }
    
    /**
     * 
     * @param unknown $sl
     */
    public function getIdentityResult($sl)
    {
        $user = $sl->get('User\Identity');
        return $user->userIdentityInstance($this->user['id']);
    }
    
    /**
     * 
     * @return string
     */
    public function getSessionStorageKey()
    {
        return 'contentinum' . md5($this->user['username']. $this->user[$this->credentialColumn]);
    }    

    /**
     *
     * @return \Zend\Authentication\Result
     */
    protected function createAuthResult()
    {
        return new Result($this->authenticateResultInfo['code'], $this->identity, $this->authenticateResultInfo['messages']);
    }
}