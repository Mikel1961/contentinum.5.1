<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * WebContentNameGroup
 *
 * @ORM\Table(name="web_content_namegroup")
 * @ORM\Entity
 */
class WebContentNameGroup extends AbstractEntity
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="feed_title", type="string", length=250, nullable=false)
     */    
    private $feedTitle = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="feed_author", type="string", length=100, nullable=false)
     */    
    private $feedAuthor = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="feed_authoremail", type="string", length=250, nullable=false)
     */    
    private $feedAuthoremail = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="feed_authorinternet", type="string", length=250, nullable=false)
     */
    private $feedAuthorinternet = '';    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="feed_count", type="integer", nullable=false)
     */    
    private $feedCount = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="feed_url", type="string", length=250, nullable=false)
     */
    private $feedUrl = '';    

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
     * @return the $feedTitle
     */
    public function getFeedTitle()
    {
        return $this->feedTitle;
    }

	/**
     * @param string $feedTitle
     */
    public function setFeedTitle($feedTitle)
    {
        $this->feedTitle = $feedTitle;
    }

	/**
     * @return the $feedAuthor
     */
    public function getFeedAuthor()
    {
        return $this->feedAuthor;
    }

	/**
     * @param string $feedAuthor
     */
    public function setFeedAuthor($feedAuthor)
    {
        $this->feedAuthor = $feedAuthor;
    }

	/**
     * @return the $feedAuthoremail
     */
    public function getFeedAuthoremail()
    {
        return $this->feedAuthoremail;
    }

	/**
     * @param string $feedAuthoremail
     */
    public function setFeedAuthoremail($feedAuthoremail)
    {
        $this->feedAuthoremail = $feedAuthoremail;
    }

	/**
     * @return the $feedAuthorinternet
     */
    public function getFeedAuthorinternet()
    {
        return $this->feedAuthorinternet;
    }

	/**
     * @param string $feedAuthorinternet
     */
    public function setFeedAuthorinternet($feedAuthorinternet)
    {
        $this->feedAuthorinternet = $feedAuthorinternet;
    }

	/**
     * @return the $feedCount
     */
    public function getFeedCount()
    {
        return $this->feedCount;
    }

	/**
     * @param number $feedCount
     */
    public function setFeedCount($feedCount)
    {
        $this->feedCount = $feedCount;
    }

	/**
     * @return the $feedUrl
     */
    public function getFeedUrl()
    {
        return $this->feedUrl;
    }

	/**
     * @param string $feedUrl
     */
    public function setFeedUrl($feedUrl)
    {
        $this->feedUrl = $feedUrl;
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

}