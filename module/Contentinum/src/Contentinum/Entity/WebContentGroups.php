<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;
use Zend\XmlRpc\Value\String;

/**
 * WebContentGroups
 *
 * @ORM\Table(name="web_content_groups", indexes={@ORM\Index(name="CONTENTGROUP", columns={"web_contentgroup_id"}), @ORM\Index(name="GROUPREFCONTENT", columns={"web_content_id"})})
 * @ORM\Entity
 */
class WebContentGroups extends AbstractEntity
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
     * @var String
     * 
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name = '_default';
    
    /**
     * @var String
     *
     * @ORM\Column(name="scope", type="string", length=15, nullable=false)
     */
    private $scope = 'content';    
    
    /**
     * @var String
     *
     * @ORM\Column(name="content_group_name", type="string", length=15, nullable=false)
     */    
    private $contentGroupName = 'content';  

    /**
     * @var integer
     *
     * @ORM\Column(name="web_contentgroup_id", type="integer", nullable=false)
     */
    private $webContentgroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_style", type="string", length=50, nullable=false)
     */
    private $groupStyle = 'none';
    
    /**
     * @var string
     *
     * @ORM\Column(name="group_element", type="string", length=20, nullable=false)
     */
    private $groupElement = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="group_element_attribute", type="text", nullable=false)
     */
    private $groupElementAttribute = '';    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="item_rang", type="integer", nullable=false)
     */
    private $itemRang = '0';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="publish_date", type="string", length=30, nullable=false)
     */
    private $publishDate = '0000-00-00 00:00:00'; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="group_params", type="text", nullable=false)
     */
    private $groupParams = '';    

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
     * @var \Contentinum\Entity\WebContent
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebContent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="web_content_id", referencedColumnName="id")
     * })
     */
    private $webContent;
    
    
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
     * @return WebPagesContent
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
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param \Zend\XmlRpc\Value\String $name
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
     * @param \Zend\XmlRpc\Value\String $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

	/**
     * @return the $contentGroupName
     */
    public function getContentGroupName()
    {
        return $this->contentGroupName;
    }

	/**
     * @param \Zend\XmlRpc\Value\String $contentGroupName
     */
    public function setContentGroupName($contentGroupName)
    {
        $this->contentGroupName = $contentGroupName;
    }

	/**
     * @return the $webContentgroup
     */
    public function getWebContentgroup()
    {
        return $this->webContentgroup;
    }

	/**
     * @param number $webContentgroup
     */
    public function setWebContentgroup($webContentgroup)
    {
        $this->webContentgroup = $webContentgroup;
    }

	/**
     * @return the $groupStyle
     */
    public function getGroupStyle()
    {
        return $this->groupStyle;
    }

	/**
     * @param number $groupStyle
     */
    public function setGroupStyle($groupStyle)
    {
        $this->groupStyle = $groupStyle;
    }

	/**
     * @return the $groupElement
     */
    public function getGroupElement()
    {
        return $this->groupElement;
    }

	/**
     * @param string $groupElement
     */
    public function setGroupElement($groupElement)
    {
        $this->groupElement = $groupElement;
    }

	/**
     * @return the $groupElementAttribute
     */
    public function getGroupElementAttribute()
    {
        return $this->groupElementAttribute;
    }

	/**
     * @param string $groupElementAttribute
     */
    public function setGroupElementAttribute($groupElementAttribute)
    {
        $this->groupElementAttribute = $groupElementAttribute;
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
     * @return the $publishDate
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

	/**
     * @param string $publishDate
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;
    }

	/**
     * @return the $groupParams
     */
    public function getGroupParams()
    {
        return $this->groupParams;
    }

	/**
     * @param string $groupParams
     */
    public function setGroupParams($groupParams)
    {
        $this->groupParams = $groupParams;
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
     * @return the $webContent
     */
    public function getWebContent()
    {
        return $this->webContent;
    }

	/**
     * @param \Contentinum\Entity\WebContent $webContent
     */
    public function setWebContent($webContent)
    {
        $this->webContent = $webContent;
    }

}