<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * Contacts
 *
 * @ORM\Table(name="contacts", indexes={@ORM\Index(name="ACCOUNTIDENT", columns={"account_ident"}), @ORM\Index(name="CONTACTNAME", columns={"last_name"}), @ORM\Index(name="ACCOUNTSCOPE", columns={"accounts_id"})})
 * @ORM\Entity
 */
class Contacts extends AbstractEntity
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
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="salutation", type="string", length=10, nullable=false)
     */
    private $salutation = '';

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     */
    private $firstName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=false)
     */
    private $lastName = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="object_name", type="string", length=250, nullable=false)
     */
    private $objectName = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="business_title", type="string", length=250, nullable=false)
     */
    private $businessTitle = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="just_sign", type="string", length=10, nullable=false)
     */
    private $justSign = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="phone_home", type="string", length=25, nullable=false)
     */
    private $phoneHome = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_mobile", type="string", length=25, nullable=false)
     */
    private $phoneMobile = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_work", type="string", length=25, nullable=false)
     */
    private $phoneWork = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_other", type="string", length=25, nullable=false)
     */
    private $phoneOther = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_fax", type="string", length=25, nullable=false)
     */
    private $phoneFax = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=100, nullable=false)
     */
    private $contactEmail = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="internet", type="text", length=65535, nullable=false)
     */
    private $internet = '';    
        
    /**
     * @var string
     *
     * @ORM\Column(name="alternate_email", type="string", length=100, nullable=false)
     */
    private $alternateEmail = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="contact_chat", type="string", length=100, nullable=false)
     */
    private $contactChat = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=150, nullable=false)
     */    
    private $facebook = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=150, nullable=false)
     */    
    private $twitter = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=150, nullable=false)
     */    
    private $instagram = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="pinterest", type="string", length=150, nullable=false)
     */    
    private $pinterest = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact_img_source", type="string", length=250, nullable=false)
     */
    private $contactImgSource = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact_img_large", type="string", length=250, nullable=false)
     */
    private $contactImgLarge = '';
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="contact_address", type="string", length=250, nullable=false)
     */
    private $contactAddress = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="contact_zipcode", type="string", length=25, nullable=false)
     */
    private $contactZipcode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact_city", type="string", length=250, nullable=false)
     */
    private $contactCity = ''; 

    /**
     * @var string
     *
     * @ORM\Column(name="birthdate", type="string", nullable=false)
     */
    private $birthdate = '0000-00-00 00:00:00';
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';    

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
    private $registerDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = '0000-00-00 00:00:00';

    /**
     * @var \Contentinum\Entity\Accounts
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accounts_id", referencedColumnName="id")
     * })
     */
    private $accounts;

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
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

	/**
     * @return the $salutation
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

	/**
     * @param string $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

	/**
     * @return the $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

	/**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

	/**
     * @return the $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

	/**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

	/**
     * @return the $objectName
     */
    public function getObjectName()
    {
        return $this->objectName;
    }

	/**
     * @param string $objectName
     */
    public function setObjectName($objectName)
    {
        $this->objectName = $objectName;
    }

	/**
     * @return the $businessTitle
     */
    public function getBusinessTitle()
    {
        return $this->businessTitle;
    }

	/**
     * @param string $businessTitle
     */
    public function setBusinessTitle($businessTitle)
    {
        $this->businessTitle = $businessTitle;
    }

	/**
     * @return the $justSign
     */
    public function getJustSign()
    {
        return $this->justSign;
    }

	/**
     * @param string $justSign
     */
    public function setJustSign($justSign)
    {
        $this->justSign = $justSign;
    }

	/**
     * @return the $phoneHome
     */
    public function getPhoneHome()
    {
        return $this->phoneHome;
    }

	/**
     * @param string $phoneHome
     */
    public function setPhoneHome($phoneHome)
    {
        $this->phoneHome = $phoneHome;
    }

	/**
     * @return the $phoneMobile
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

	/**
     * @param string $phoneMobile
     */
    public function setPhoneMobile($phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;
    }

	/**
     * @return the $phoneWork
     */
    public function getPhoneWork()
    {
        return $this->phoneWork;
    }

	/**
     * @param string $phoneWork
     */
    public function setPhoneWork($phoneWork)
    {
        $this->phoneWork = $phoneWork;
    }

	/**
     * @return the $phoneOther
     */
    public function getPhoneOther()
    {
        return $this->phoneOther;
    }

	/**
     * @param string $phoneOther
     */
    public function setPhoneOther($phoneOther)
    {
        $this->phoneOther = $phoneOther;
    }

	/**
     * @return the $phoneFax
     */
    public function getPhoneFax()
    {
        return $this->phoneFax;
    }

	/**
     * @param string $phoneFax
     */
    public function setPhoneFax($phoneFax)
    {
        $this->phoneFax = $phoneFax;
    }

	/**
     * @return the $contactEmail
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

	/**
     * @param string $contactEmail
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

	/**
     * @return the $internet
     */
    public function getInternet()
    {
        return $this->internet;
    }

	/**
     * @param string $internet
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;
    }

	/**
     * @return the $alternateEmail
     */
    public function getAlternateEmail()
    {
        return $this->alternateEmail;
    }

	/**
     * @param string $alternateEmail
     */
    public function setAlternateEmail($alternateEmail)
    {
        $this->alternateEmail = $alternateEmail;
    }

	/**
     * @return the $contactChat
     */
    public function getContactChat()
    {
        return $this->contactChat;
    }

	/**
     * @param string $contactChat
     */
    public function setContactChat($contactChat)
    {
        $this->contactChat = $contactChat;
    }

	/**
     * @return the $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

	/**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

	/**
     * @return the $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

	/**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

	/**
     * @return the $instagram
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

	/**
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

	/**
     * @return the $pinterest
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

	/**
     * @param string $pinterest
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;
    }

	/**
     * @return the $contactImgSource
     */
    public function getContactImgSource()
    {
        return $this->contactImgSource;
    }

	/**
     * @param string $contactImgSource
     */
    public function setContactImgSource($contactImgSource)
    {
        $this->contactImgSource = $contactImgSource;
    }

	/**
     * @return the $contactImgLarge
     */
    public function getContactImgLarge()
    {
        return $this->contactImgLarge;
    }

	/**
     * @param string $contactImgLarge
     */
    public function setContactImgLarge($contactImgLarge)
    {
        $this->contactImgLarge = $contactImgLarge;
    }

	/**
     * @return the $contactAddress
     */
    public function getContactAddress()
    {
        return $this->contactAddress;
    }

	/**
     * @param string $contactAddress
     */
    public function setContactAddress($contactAddress)
    {
        $this->contactAddress = $contactAddress;
    }

	/**
     * @return the $contactCity
     */
    public function getContactCity()
    {
        return $this->contactCity;
    }

	/**
     * @param string $contactCity
     */
    public function setContactCity($contactCity)
    {
        $this->contactCity = $contactCity;
    }

	/**
     * @return the $contactZipcode
     */
    public function getContactZipcode()
    {
        return $this->contactZipcode;
    }

	/**
     * @param string $contactZipcode
     */
    public function setContactZipcode($contactZipcode)
    {
        $this->contactZipcode = $contactZipcode;
    }

	/**
     * @return the $birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

	/**
     * @param DateTime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

	/**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

	/**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return WebContent
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set upDate
     *
     * @param \DateTime $upDate
     * @return WebContent
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;

        return $this;
    }

    /**
     * Get upDate
     *
     * @return \DateTime 
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

	/**
     * @return the $accounts
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

	/**
     * @param \Contentinum\Entity\Accounts $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

}