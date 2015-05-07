<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * Users5
 *
 * @ORM\Table(name="users5", uniqueConstraints={@ORM\UniqueConstraint(name="USERNAME", columns={"username"})}, indexes={@ORM\Index(name="USERCONTACT", columns={"contacts_id"}), @ORM\Index(name="USERROLE", columns={"user_roles_id"})})
 * @ORM\Entity
 */
class Users5 extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';

    /**
     * @var string
     *
     * @ORM\Column(name="apps", type="text", length=65535, nullable=false)
     */
    private $apps = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="initials", type="string", length=10, nullable=false)
     */
    private $initials = '';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=6, nullable=false)
     */
    private $language = 'de';

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=50, nullable=false)
     */
    private $avatar = '';

    /**
     * @var string
     *
     * @ORM\Column(name="login_homedir", type="string", length=250, nullable=false)
     */
    private $loginHomedir = '/mcwork/dashboard';
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_home", type="string", length=150, nullable=false)
     */    
    private $userHome = '';

    /**
     * @var string
     *
     * @ORM\Column(name="logout_path", type="string", length=200, nullable=false)
     */
    private $logoutPath = '/';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=150, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="login_username", type="string", length=150, nullable=false)
     */
    private $loginUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="login_password", type="string", length=32, nullable=false)
     */
    private $loginPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="login_password_alt", type="string", length=32, nullable=false)
     */
    private $loginPasswordAlt = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="get_password", type="boolean", nullable=false)
     */
    private $getPassword = '';

    /**
     * @var string
     *
     * @ORM\Column(name="verify_string", type="string", length=32, nullable=false)
     */
    private $verifyString = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="try_login", type="integer", nullable=false)
     */
    private $tryLogin = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="last_login", type="string", nullable=false)
     */
    private $lastLogin = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="last_logout", type="string", nullable=false)
     */
    private $lastLogout = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="count_login", type="integer", nullable=false)
     */
    private $countLogin = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="publish", type="string", length=10, nullable=false)
     */
    private $publish = 'no';

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="datetime", nullable=false)
     */
    private $registerDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate;

    /**
     * @var \Contentinum\Entity\UserRoles
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\UserRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_roles_id", referencedColumnName="id")
     * })
     */
    private $userRoles;

    /**
     * @var \Contentinum\Entity\Contacts
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\Contacts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contacts_id", referencedColumnName="id")
     * })
     */
    private $contacts;
    
    /**
     * Construct
     * @param array $options
     */
    public function __construct (array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getEntityName()
     */
    public function getEntityName()
    {
        return get_class($this);
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryKey()
     */
    public function getPrimaryKey()
    {
        return 'id';
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryValue()
     */
    public function getPrimaryValue()
    {
        return $this->id;
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getProperties()
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
    
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @return the $params
     */
    public function getParams()
    {
        return $this->params;
    }

	/**
     * @param string $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

	/**
     * @return the $apps
     */
    public function getApps()
    {
        return $this->apps;
    }

	/**
     * @param string $apps
     */
    public function setApps($apps)
    {
        $this->apps = $apps;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

	/**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

	/**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

	/**
     * @return the $initials
     */
    public function getInitials()
    {
        return $this->initials;
    }

	/**
     * @param string $initials
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
    }

	/**
     * @return the $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

	/**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

	/**
     * @return the $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

	/**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

	/**
     * @return the $loginHomedir
     */
    public function getLoginHomedir()
    {
        return $this->loginHomedir;
    }

	/**
     * @param string $loginHomedir
     */
    public function setLoginHomedir($loginHomedir)
    {
        $this->loginHomedir = $loginHomedir;
    }

	/**
     * @return the $userHome
     */
    public function getUserHome()
    {
        return $this->userHome;
    }

	/**
     * @param string $userHome
     */
    public function setUserHome($userHome)
    {
        $this->userHome = $userHome;
    }

	/**
     * @return the $logoutPath
     */
    public function getLogoutPath()
    {
        return $this->logoutPath;
    }

	/**
     * @param string $logoutPath
     */
    public function setLogoutPath($logoutPath)
    {
        $this->logoutPath = $logoutPath;
    }

	/**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }

	/**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

	/**
     * @return the $loginUsername
     */
    public function getLoginUsername()
    {
        return $this->loginUsername;
    }

	/**
     * @param string $loginUsername
     */
    public function setLoginUsername($loginUsername)
    {
        $this->loginUsername = $loginUsername;
    }

	/**
     * @return the $loginPassword
     */
    public function getLoginPassword()
    {
        return $this->loginPassword;
    }

	/**
     * @param string $loginPassword
     */
    public function setLoginPassword($loginPassword)
    {
        $this->loginPassword = $loginPassword;
    }

	/**
     * @return the $loginPasswordAlt
     */
    public function getLoginPasswordAlt()
    {
        return $this->loginPasswordAlt;
    }

	/**
     * @param string $loginPasswordAlt
     */
    public function setLoginPasswordAlt($loginPasswordAlt)
    {
        $this->loginPasswordAlt = $loginPasswordAlt;
    }

	/**
     * @return the $getPassword
     */
    public function getGetPassword()
    {
        return $this->getPassword;
    }

	/**
     * @param boolean $getPassword
     */
    public function setGetPassword($getPassword)
    {
        $this->getPassword = $getPassword;
    }

	/**
     * @return the $verifyString
     */
    public function getVerifyString()
    {
        return $this->verifyString;
    }

	/**
     * @param string $verifyString
     */
    public function setVerifyString($verifyString)
    {
        $this->verifyString = $verifyString;
    }

	/**
     * @return the $tryLogin
     */
    public function getTryLogin()
    {
        return $this->tryLogin;
    }

	/**
     * @param number $tryLogin
     */
    public function setTryLogin($tryLogin)
    {
        $this->tryLogin = $tryLogin;
    }

	/**
     * @return the $lastLogin
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

	/**
     * @param Ambigous <DateTime, string> $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

	/**
     * @return the $lastLogout
     */
    public function getLastLogout()
    {
        return $this->lastLogout;
    }

	/**
     * @param Ambigous <DateTime, string> $lastLogout
     */
    public function setLastLogout($lastLogout)
    {
        $this->lastLogout = $lastLogout;
    }

	/**
     * @return the $countLogin
     */
    public function getCountLogin()
    {
        return $this->countLogin;
    }

	/**
     * @param number $countLogin
     */
    public function setCountLogin($countLogin)
    {
        $this->countLogin = $countLogin;
    }

	/**
     * @return the $publish
     */
    public function getPublish()
    {
        return $this->publish;
    }

	/**
     * @param string $publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
    }

	/**
     * @return the $deleted
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

	/**
     * @param boolean $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

	/**
     * @return the $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

	/**
     * @param number $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

	/**
     * @return the $updateBy
     */
    public function getUpdateBy()
    {
        return $this->updateBy;
    }

	/**
     * @param number $updateBy
     */
    public function setUpdateBy($updateBy)
    {
        $this->updateBy = $updateBy;
    }

	/**
     * @return the $registerDate
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

	/**
     * @param DateTime $registerDate
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

	/**
     * @return the $upDate
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

	/**
     * @param DateTime $upDate
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;
    }

	/**
     * @return the $userRoles
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

	/**
     * @param \Contentinum\Entity\UserRoles $userRoles
     */
    public function setUserRoles($userRoles)
    {
        $this->userRoles = $userRoles;
    }

	/**
     * @return the $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

	/**
     * @param \Contentinum\Entity\Contacts $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }
    
}