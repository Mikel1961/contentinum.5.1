<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * AccountAddresses
 *
 * @ORM\Table(name="account_addresses", indexes={@ORM\Index(name="ACCOUNTADDRESS", columns={"accounts_id"})})
 * @ORM\Entity
 */
class AccountAddresses extends AbstractEntity
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
     * @ORM\Column(name="addresstype", type="string", length=25, nullable=false)
     */
    private $addresstype = 'work';

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=250, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="further", type="text", length=65535, nullable=false)
     */
    private $further = '';

    /**
     * @var string
     *
     * @ORM\Column(name="postbox", type="string", length=25, nullable=false)
     */
    private $postbox = '';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=100, nullable=false)
     */
    private $state = '';

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode", type="string", length=20, nullable=false)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="postalcodebox", type="string", length=20, nullable=false)
     */
    private $postalcodebox = '';

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=false)
     */
    private $country = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="deleted", type="integer", nullable=false)
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
     * @return the $addresstype
     */
    public function getAddresstype()
    {
        return $this->addresstype;
    }

	/**
     * @param string $addresstype
     */
    public function setAddresstype($addresstype)
    {
        $this->addresstype = $addresstype;
    }

	/**
     * @return the $street
     */
    public function getStreet()
    {
        return $this->street;
    }

	/**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

	/**
     * @return the $further
     */
    public function getFurther()
    {
        return $this->further;
    }

	/**
     * @param string $further
     */
    public function setFurther($further)
    {
        $this->further = $further;
    }

	/**
     * @return the $postbox
     */
    public function getPostbox()
    {
        return $this->postbox;
    }

	/**
     * @param string $postbox
     */
    public function setPostbox($postbox)
    {
        $this->postbox = $postbox;
    }

	/**
     * @return the $city
     */
    public function getCity()
    {
        return $this->city;
    }

	/**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

	/**
     * @return the $state
     */
    public function getState()
    {
        return $this->state;
    }

	/**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

	/**
     * @return the $postalcode
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

	/**
     * @param string $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

	/**
     * @return the $postalcodebox
     */
    public function getPostalcodebox()
    {
        return $this->postalcodebox;
    }

	/**
     * @param string $postalcodebox
     */
    public function setPostalcodebox($postalcodebox)
    {
        $this->postalcodebox = $postalcodebox;
    }

	/**
     * @return the $country
     */
    public function getCountry()
    {
        return $this->country;
    }

	/**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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