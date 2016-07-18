<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * IndexContacts
 *
 * @ORM\Table(name="index_contacts", indexes={@ORM\Index(name="CONTACTGROUP", columns={"index_group_id"}), @ORM\Index(name="GRPCONTACTIDENT", columns={"contacts_id"})})
 * @ORM\Entity
 */
class IndexContacts extends AbstractEntity
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
     * @var integer
     *
     * @ORM\Column(name="item_rang", type="integer", nullable=false)
     */
    private $itemRang;

    /**
     * @var string
     *
     * @ORM\Column(name="publish", type="string", length=10, nullable=false)
     */
    private $publish = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="business_title", type="string", length=250, nullable=false)
     */
    private $businessTitle = '';
    
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
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';  
    
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
     * @ORM\Column(name="enable_title", type="integer", nullable=false)
     */
    private $enableTitle = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_salutation", type="integer", nullable=false)
     */
    private $enableSalutation = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_first_name", type="integer", nullable=false)
     */
    private $enableFirstName = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_last_name", type="integer", nullable=false)
     */
    private $enableLastName = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_business_title", type="integer", nullable=false)
     */
    private $enableBusinessTitle = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_just_sign", type="integer", nullable=false)
     */
    private $enableJustSign = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_home", type="integer", nullable=false)
     */
    private $enablePhoneHome = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_mobile", type="integer", nullable=false)
     */
    private $enablePhoneMobile = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_work", type="integer", nullable=false)
     */
    private $enablePhoneWork = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_other", type="integer", nullable=false)
     */
    private $enablePhoneOther = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_fax", type="integer", nullable=false)
     */
    private $enablePhoneFax = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_contact_email", type="integer", nullable=false)
     */
    private $enableContactEmail = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_internet", type="integer", nullable=false)
     */
    private $enableInternet = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_alternate_email", type="integer", nullable=false)
     */
    private $enableAlternateEmail = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_chat", type="integer", nullable=false)
     */
    private $enableChat = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_facebook", type="integer", nullable=false)
     */
    private $enableFacebook = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_twitter", type="integer", nullable=false)
     */
    private $enableTwitter = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_instagram", type="integer", nullable=false)
     */
    private $enableInstagram = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_pinterest",type="integer", nullable=false)
     */
    private $enablePinterest = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_image", type="integer", nullable=false)
     */
    private $enableImage = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="enable_address", type="integer", nullable=false)
     */
    private $enableAddress = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="enable_birthdate", type="integer", nullable=false)
     */
    private $enableBirthdate = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_description", type="integer", nullable=false)
     */
    private $enableDescription = 1;    

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy = '0';

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
     * @var \Contentinum\Entity\Contacts
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\Contacts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contacts_id", referencedColumnName="id")
     * })
     */
    private $contacts;

    /**
     * @var \Contentinum\Entity\IndexGroups
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\IndexGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="index_group_id", referencedColumnName="id")
     * })
     */
    private $indexGroup;

    
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
     * @return the $itemRang
     */
    public function getItemRang()
    {
        return $this->itemRang;
    }

	/**
     * @param number $itemRang
     */
    public function setItemRang($itemRang)
    {
        $this->itemRang = $itemRang;
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
     * @return the $enableTitle
     */
    public function getEnableTitle()
    {
        return $this->enableTitle;
    }

	/**
     * @param string $enableTitle
     */
    public function setEnableTitle($enableTitle)
    {
        $this->enableTitle = $enableTitle;
    }

	/**
     * @return the $enableSalutation
     */
    public function getEnableSalutation()
    {
        return $this->enableSalutation;
    }

	/**
     * @param string $enableSalutation
     */
    public function setEnableSalutation($enableSalutation)
    {
        $this->enableSalutation = $enableSalutation;
    }

	/**
     * @return the $enableFirstName
     */
    public function getEnableFirstName()
    {
        return $this->enableFirstName;
    }

	/**
     * @param string $enableFirstName
     */
    public function setEnableFirstName($enableFirstName)
    {
        $this->enableFirstName = $enableFirstName;
    }

	/**
     * @return the $enableLastName
     */
    public function getEnableLastName()
    {
        return $this->enableLastName;
    }

	/**
     * @param string $enableLastName
     */
    public function setEnableLastName($enableLastName)
    {
        $this->enableLastName = $enableLastName;
    }

	/**
     * @return the $enableBusinessTitle
     */
    public function getEnableBusinessTitle()
    {
        return $this->enableBusinessTitle;
    }

	/**
     * @param string $enableBusinessTitle
     */
    public function setEnableBusinessTitle($enableBusinessTitle)
    {
        $this->enableBusinessTitle = $enableBusinessTitle;
    }

	/**
     * @return the $enableJustSign
     */
    public function getEnableJustSign()
    {
        return $this->enableJustSign;
    }

	/**
     * @param string $enableJustSign
     */
    public function setEnableJustSign($enableJustSign)
    {
        $this->enableJustSign = $enableJustSign;
    }

	/**
     * @return the $enablePhoneHome
     */
    public function getEnablePhoneHome()
    {
        return $this->enablePhoneHome;
    }

	/**
     * @param string $enablePhoneHome
     */
    public function setEnablePhoneHome($enablePhoneHome)
    {
        $this->enablePhoneHome = $enablePhoneHome;
    }

	/**
     * @return the $enablePhoneMobile
     */
    public function getEnablePhoneMobile()
    {
        return $this->enablePhoneMobile;
    }

	/**
     * @param string $enablePhoneMobile
     */
    public function setEnablePhoneMobile($enablePhoneMobile)
    {
        $this->enablePhoneMobile = $enablePhoneMobile;
    }

	/**
     * @return the $enablePhoneWork
     */
    public function getEnablePhoneWork()
    {
        return $this->enablePhoneWork;
    }

	/**
     * @param string $enablePhoneWork
     */
    public function setEnablePhoneWork($enablePhoneWork)
    {
        $this->enablePhoneWork = $enablePhoneWork;
    }

	/**
     * @return the $enablePhoneOther
     */
    public function getEnablePhoneOther()
    {
        return $this->enablePhoneOther;
    }

	/**
     * @param string $enablePhoneOther
     */
    public function setEnablePhoneOther($enablePhoneOther)
    {
        $this->enablePhoneOther = $enablePhoneOther;
    }

	/**
     * @return the $enablePhoneFax
     */
    public function getEnablePhoneFax()
    {
        return $this->enablePhoneFax;
    }

	/**
     * @param string $enablePhoneFax
     */
    public function setEnablePhoneFax($enablePhoneFax)
    {
        $this->enablePhoneFax = $enablePhoneFax;
    }

	/**
     * @return the $enableContactEmail
     */
    public function getEnableContactEmail()
    {
        return $this->enableContactEmail;
    }

	/**
     * @param string $enableContactEmail
     */
    public function setEnableContactEmail($enableContactEmail)
    {
        $this->enableContactEmail = $enableContactEmail;
    }

	/**
     * @return the $enableInternet
     */
    public function getEnableInternet()
    {
        return $this->enableInternet;
    }

	/**
     * @param string $enableInternet
     */
    public function setEnableInternet($enableInternet)
    {
        $this->enableInternet = $enableInternet;
    }

	/**
     * @return the $enableAlternateEmail
     */
    public function getEnableAlternateEmail()
    {
        return $this->enableAlternateEmail;
    }

	/**
     * @param string $enableAlternateEmail
     */
    public function setEnableAlternateEmail($enableAlternateEmail)
    {
        $this->enableAlternateEmail = $enableAlternateEmail;
    }

	/**
     * @return the $enableChat
     */
    public function getEnableChat()
    {
        return $this->enableChat;
    }

	/**
     * @param string $enableChat
     */
    public function setEnableChat($enableChat)
    {
        $this->enableChat = $enableChat;
    }

	/**
     * @return the $enableFacebook
     */
    public function getEnableFacebook()
    {
        return $this->enableFacebook;
    }

	/**
     * @param string $enableFacebook
     */
    public function setEnableFacebook($enableFacebook)
    {
        $this->enableFacebook = $enableFacebook;
    }

	/**
     * @return the $enableTwitter
     */
    public function getEnableTwitter()
    {
        return $this->enableTwitter;
    }

	/**
     * @param string $enableTwitter
     */
    public function setEnableTwitter($enableTwitter)
    {
        $this->enableTwitter = $enableTwitter;
    }

	/**
     * @return the $enableInstagram
     */
    public function getEnableInstagram()
    {
        return $this->enableInstagram;
    }

	/**
     * @param string $enableInstagram
     */
    public function setEnableInstagram($enableInstagram)
    {
        $this->enableInstagram = $enableInstagram;
    }

	/**
     * @return the $enablePinterest
     */
    public function getEnablePinterest()
    {
        return $this->enablePinterest;
    }

	/**
     * @param string $enablePinterest
     */
    public function setEnablePinterest($enablePinterest)
    {
        $this->enablePinterest = $enablePinterest;
    }

	/**
     * @return the $enableImage
     */
    public function getEnableImage()
    {
        return $this->enableImage;
    }

	/**
     * @param string $enableImage
     */
    public function setEnableImage($enableImage)
    {
        $this->enableImage = $enableImage;
    }

	/**
     * @return the $enableAddress
     */
    public function getEnableAddress()
    {
        return $this->enableAddress;
    }

	/**
     * @param string $enableAddress
     */
    public function setEnableAddress($enableAddress)
    {
        $this->enableAddress = $enableAddress;
    }

	/**
     * @return the $enableBirthdate
     */
    public function getEnableBirthdate()
    {
        return $this->enableBirthdate;
    }

	/**
     * @param string $enableBirthdate
     */
    public function setEnableBirthdate($enableBirthdate)
    {
        $this->enableBirthdate = $enableBirthdate;
    }

	/**
     * @return the $enableDescription
     */
    public function getEnableDescription()
    {
        return $this->enableDescription;
    }

	/**
     * @param string $enableDescription
     */
    public function setEnableDescription($enableDescription)
    {
        $this->enableDescription = $enableDescription;
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

	/**
     * @return the $indexGroup
     */
    public function getIndexGroup()
    {
        return $this->indexGroup;
    }

	/**
     * @param \Contentinum\Entity\IndexGroups $indexGroup
     */
    public function setIndexGroup($indexGroup)
    {
        $this->indexGroup = $indexGroup;
    }
    
}