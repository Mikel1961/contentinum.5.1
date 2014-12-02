<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * IndexCategorie
 *
 * @ORM\Table(name="index_categorie", uniqueConstraints={@ORM\UniqueConstraint(name="scope", columns={"scope"})}, indexes={@ORM\Index(name="keyword", columns={"index_groups_id"})})
 * @ORM\Entity
 */
class IndexCategorie extends AbstractEntity
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", length=250, nullable=false)
     */
    private $scope;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=100, nullable=false)
     */
    private $avatar = '';

    /**
     * @var string
     *
     * @ORM\Column(name="image_source", type="string", length=250, nullable=false)
     */
    private $imageSource = '';

    /**
     * @var string
     *
     * @ORM\Column(name="headlines", type="string", length=150, nullable=false)
     */
    private $headlines = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sub_headline", type="text", length=65535, nullable=false)
     */
    private $subHeadline = '';

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
    private $publish = 'yes';

    /**
     * @var string
     *
     * @ORM\Column(name="publish_up", type="string", length=20, nullable=false)
     */
    private $publishUp = '';

    /**
     * @var string
     *
     * @ORM\Column(name="publish_down", type="string", length=20, nullable=false)
     */
    private $publishDown = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="item_rang", type="integer", nullable=false)
     */
    private $itemRang;

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
     * @var \Contentinum\Entity\IndexGroups
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\IndexGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="index_groups_id", referencedColumnName="id")
     * })
     */    
    private $indexGroups;   

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
     * @return the $scope
     */
    public function getScope()
    {
        return $this->scope;
    }

	/**
     * @param string $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
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
     * @return the $imageSource
     */
    public function getImageSource()
    {
        return $this->imageSource;
    }

	/**
     * @param string $imageSource
     */
    public function setImageSource($imageSource)
    {
        $this->imageSource = $imageSource;
    }

	/**
     * @return the $headlines
     */
    public function getHeadlines()
    {
        return $this->headlines;
    }

	/**
     * @param string $headlines
     */
    public function setHeadlines($headlines)
    {
        $this->headlines = $headlines;
    }

	/**
     * @return the $subHeadline
     */
    public function getSubHeadline()
    {
        return $this->subHeadline;
    }

	/**
     * @param string $subHeadline
     */
    public function setSubHeadline($subHeadline)
    {
        $this->subHeadline = $subHeadline;
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
     * @return the $publishUp
     */
    public function getPublishUp()
    {
        return $this->publishUp;
    }

	/**
     * @param DateTime $publishUp
     */
    public function setPublishUp($publishUp)
    {
        $this->publishUp = $publishUp;
    }

	/**
     * @return the $publishDown
     */
    public function getPublishDown()
    {
        return $this->publishDown;
    }

	/**
     * @param DateTime $publishDown
     */
    public function setPublishDown($publishDown)
    {
        $this->publishDown = $publishDown;
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
     * @return the $indexGroups
     */
    public function getIndexGroups()
    {
        return $this->indexGroups;
    }

	/**
     * @param \Contentinum\Entity\IndexGroups $indexGroups
     */
    public function setIndexGroups($indexGroups)
    {
        $this->indexGroups = $indexGroups;
    }
    


}

