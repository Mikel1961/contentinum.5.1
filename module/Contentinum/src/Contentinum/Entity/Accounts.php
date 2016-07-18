<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * Accounts
 *
 * @ORM\Table(name="accounts", indexes={@ORM\Index(name="ACCOUNTIDENT", columns={"account_id"}), @ORM\Index(name="ACCOUNTSCOPE", columns={"account_name"}), @ORM\Index(name="ORGANISATION", columns={"organisation"}), @ORM\Index(name="FIELDTYPESREF", columns={"fieldtypes_id"})})
 * @ORM\Entity
 */
class Accounts extends AbstractEntity
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
     * @ORM\Column(name="account_id", type="string", length=36, nullable=false)
     */
    private $accountId;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="account_name", type="string", length=250, nullable=false)
     */
    private $accountName;

    /**
     * @var string
     *
     * @ORM\Column(name="organisation", type="string", length=255, nullable=false)
     */
    private $organisation;

    /**
     * @var string
     *
     * @ORM\Column(name="organisation_ext", type="string", length=250, nullable=false)
     */
    private $organisationExt = '';

    /**
     * @var string
     *
     * @ORM\Column(name="organisation_scope", type="string", length=250, nullable=false)
     */
    private $organisationScope;

    /**
     * @var string
     *
     * @ORM\Column(name="img_logo", type="string", length=250, nullable=false)
     */
    private $imgLogo = '';

    /**
     * @var string
     *
     * @ORM\Column(name="img_source", type="string", length=250, nullable=false)
     */
    private $imgSource = '';

    /**
     * @var string
     *
     * @ORM\Column(name="img_large", type="string", length=250, nullable=false)
     */
    private $imgLarge = '';

    /**
     * @var string
     *
     * @ORM\Column(name="account_fax", type="string", length=25, nullable=false)
     */
    private $accountFax = '';

    /**
     * @var string
     *
     * @ORM\Column(name="account_phone", type="string", length=25, nullable=false)
     */
    private $accountPhone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_alternate", type="string", length=25, nullable=false)
     */
    private $phoneAlternate = '';

    /**
     * @var string
     *
     * @ORM\Column(name="account_email", type="string", length=100, nullable=false)
     */
    private $accountEmail = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_street", type="string", length=250, nullable=false)
     */    
    private $accountStreet = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_street_number", type="string", length=15, nullable=false)
     */
    private $accountStreetNumber = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_addresss", type="string", length=100, nullable=false)
     */    
    private $accountAddresss = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_zipcode", type="string", length=100, nullable=false)
     */    
    private $accountZipcode = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_city", type="string", length=250, nullable=false)
     */    
    private $accountCity = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_country", type="string", length=100, nullable=false)
     */    
    private $accountCountry = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="account_state", type="string", length=100, nullable=false)
     */    
    private $accountState = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=50, nullable=false)
     */
    private $latitude = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_ext", type="text", length=65535, nullable=false)
     */
    private $descriptionExt = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=50, nullable=false)
     */
    private $longitude = '';    
    

    /**
     * @var string
     *
     * @ORM\Column(name="basedir", type="string", length=500, nullable=false)
     */
    private $basedir = '';

    /**
     * @var string
     *
     * @ORM\Column(name="internet", type="string", length=250, nullable=false)
     */
    private $internet = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';

    /**
     * @var string
     *
     * @ORM\Column(name="publish", type="string", length=10, nullable=false)
     */
    private $publish = 'yes';

    /**
     * @var integer
     *
     * @ORM\Column(name="webentry", type="string", length=10, nullable=false)
     */
    private $webentry = 'default';

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="integer", nullable=false)
     */
    private $deleted = 0;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="event_location", type="integer", nullable=false)
     */
    private $eventLocation = 0;    

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
     * @var \Contentinum\Entity\FieldTypes
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\FieldTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fieldtypes_id", referencedColumnName="id")
     * })
     */
    private $fieldtypes;

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
     * @param number $id
     *
     * @return Accounts
     */
    public function setId($id)
    {
    	$this->id = $id;
    
    	return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	/**
     * @return the $accountId
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

	/**
     * @param string $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

	/**
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

	/**
     * @param integer $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

	/**
     * @return the $accountName
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

	/**
     * @param string $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

	/**
     * @return the $organisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

	/**
     * @param string $organisation
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    }

	/**
     * @return the $organisationExt
     */
    public function getOrganisationExt()
    {
        return $this->organisationExt;
    }

	/**
     * @param string $organisationExt
     */
    public function setOrganisationExt($organisationExt)
    {
        $this->organisationExt = $organisationExt;
    }

	/**
     * @return the $organisationScope
     */
    public function getOrganisationScope()
    {
        return $this->organisationScope;
    }

	/**
     * @param string $organisationScope
     */
    public function setOrganisationScope($organisationScope)
    {
        $this->organisationScope = $organisationScope;
    }

	/**
     * @return the $imgLogo
     */
    public function getImgLogo()
    {
        return $this->imgLogo;
    }

	/**
     * @param string $imgLogo
     */
    public function setImgLogo($imgLogo)
    {
        $this->imgLogo = $imgLogo;
    }

	/**
     * @return the $imgSource
     */
    public function getImgSource()
    {
        return $this->imgSource;
    }

	/**
     * @param string $imgSource
     */
    public function setImgSource($imgSource)
    {
        $this->imgSource = $imgSource;
    }

	/**
     * @return the $imgLarge
     */
    public function getImgLarge()
    {
        return $this->imgLarge;
    }

	/**
     * @param string $imgLarge
     */
    public function setImgLarge($imgLarge)
    {
        $this->imgLarge = $imgLarge;
    }

	/**
     * @return the $accountFax
     */
    public function getAccountFax()
    {
        return $this->accountFax;
    }

	/**
     * @param string $accountFax
     */
    public function setAccountFax($accountFax)
    {
        $this->accountFax = $accountFax;
    }

	/**
     * @return the $accountPhone
     */
    public function getAccountPhone()
    {
        return $this->accountPhone;
    }

	/**
     * @param string $accountPhone
     */
    public function setAccountPhone($accountPhone)
    {
        $this->accountPhone = $accountPhone;
    }

	/**
     * @return the $phoneAlternate
     */
    public function getPhoneAlternate()
    {
        return $this->phoneAlternate;
    }

	/**
     * @param string $phoneAlternate
     */
    public function setPhoneAlternate($phoneAlternate)
    {
        $this->phoneAlternate = $phoneAlternate;
    }

	/**
     * @return the $accountEmail
     */
    public function getAccountEmail()
    {
        return $this->accountEmail;
    }

	/**
     * @param string $accountEmail
     */
    public function setAccountEmail($accountEmail)
    {
        $this->accountEmail = $accountEmail;
    }

	/**
     * @return the $accountStreet
     */
    public function getAccountStreet()
    {
        return $this->accountStreet;
    }

	/**
     * @param string $accountStreet
     */
    public function setAccountStreet($accountStreet)
    {
        $this->accountStreet = $accountStreet;
    }

	/**
     * @return the $accountStreetNumber
     */
    public function getAccountStreetNumber()
    {
        return $this->accountStreetNumber;
    }

	/**
     * @param string $accountStreetNumber
     */
    public function setAccountStreetNumber($accountStreetNumber)
    {
        $this->accountStreetNumber = $accountStreetNumber;
    }

	/**
     * @return the $accountAddresss
     */
    public function getAccountAddresss()
    {
        return $this->accountAddresss;
    }

	/**
     * @param string $accountAddresss
     */
    public function setAccountAddresss($accountAddresss)
    {
        $this->accountAddresss = $accountAddresss;
    }

	/**
     * @return the $accountZipcode
     */
    public function getAccountZipcode()
    {
        return $this->accountZipcode;
    }

	/**
     * @param string $accountZipcode
     */
    public function setAccountZipcode($accountZipcode)
    {
        $this->accountZipcode = $accountZipcode;
    }

	/**
     * @return the $accountCity
     */
    public function getAccountCity()
    {
        return $this->accountCity;
    }

	/**
     * @param string $accountCity
     */
    public function setAccountCity($accountCity)
    {
        $this->accountCity = $accountCity;
    }

	/**
     * @return the $accountCountry
     */
    public function getAccountCountry()
    {
        return $this->accountCountry;
    }

	/**
     * @param string $accountCountry
     */
    public function setAccountCountry($accountCountry)
    {
        $this->accountCountry = $accountCountry;
    }

	/**
     * @return the $accountState
     */
    public function getAccountState()
    {
        return $this->accountState;
    }

	/**
     * @param string $accountState
     */
    public function setAccountState($accountState)
    {
        $this->accountState = $accountState;
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
     * @return the $descriptionExt
     */
    public function getDescriptionExt()
    {
        return $this->descriptionExt;
    }

	/**
     * @param string $descriptionExt
     */
    public function setDescriptionExt($descriptionExt)
    {
        $this->descriptionExt = $descriptionExt;
    }

	/**
     * @return the $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

	/**
     * @return the $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

	/**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

	/**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

	/**
     * @return the $basedir
     */
    public function getBasedir()
    {
        return $this->basedir;
    }

	/**
     * @param string $basedir
     */
    public function setBasedir($basedir)
    {
        $this->basedir = $basedir;
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
     * @return the $webentry
     */
    public function getWebentry()
    {
        return $this->webentry;
    }

	/**
     * @param number $webentry
     */
    public function setWebentry($webentry)
    {
        $this->webentry = $webentry;
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
     * @return the $eventLocation
     */
    public function getEventLocation()
    {
        return $this->eventLocation;
    }

	/**
     * @param boolean $eventLocation
     */
    public function setEventLocation($eventLocation)
    {
        $this->eventLocation = $eventLocation;
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
     * @return the $fieldtypes
     */
    public function getFieldtypes()
    {
        return $this->fieldtypes;
    }

	/**
     * @param \Contentinum\Entity\FieldTypes $fieldtypes
     */
    public function setFieldtypes($fieldtypes)
    {
        $this->fieldtypes = $fieldtypes;
    }

}