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
     * @ORM\Column(name="business_title", type="string", length=100, nullable=false)
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