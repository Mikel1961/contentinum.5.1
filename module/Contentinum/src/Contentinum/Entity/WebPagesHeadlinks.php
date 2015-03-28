<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * WebPages
 *
 * @ORM\Table(name="web_pages_headlinks", indexes={@ORM\Index(name="PAGEATTRIBPARENT", columns={"web_pages_id"}),@ORM\Index(name="PAGEMETAMEDIA", columns={"web_medias_id"})});
 * @ORM\Entity
 */
class WebPagesHeadlinks extends AbstractEntity
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
     * @ORM\Column(name="linkgroup", type="integer", nullable=false)
     */    
    private $linkgroup = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_rel", type="string", length=250, nullable=false)
     */
    private $metaRel = '';

    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_size", type="string", length=50, nullable=false)
     */
    private $metaSize = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_type", type="string", length=50, nullable=false)
     */
    private $metaType = '';  
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=50, nullable=false)
     */
    private $metaTitle = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="meta_link", type="string", length=250, nullable=false)
     */
    private $metaLink = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_name", type="string", length=250, nullable=false)
     */
    private $metaName = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_content", type="string", length=250, nullable=false)
     */
    private $metaContent = '';    
    
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
    private $createdBy = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy = 0;

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
     *
     * @var \Contentinum\Entity\WebMedia
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebMedias")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="web_medias_id", referencedColumnName="id")
     * })
     */
    private $webMedias;    

    /**
     * @var \Contentinum\Entity\WebPagesParameter
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebPagesParameter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="web_pages_id", referencedColumnName="id")
     * })
     */
    private $webPages;

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
     */
    public function setId($id)
    {
    	$this->id = $id;
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
     * @return the $linkgroup
     */
    public function getLinkgroup()
    {
        return $this->linkgroup;
    }

	/**
     * @param number $linkgroup
     */
    public function setLinkgroup($linkgroup)
    {
        $this->linkgroup = $linkgroup;
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
     * @return the $metaRel
     */
    public function getMetaRel()
    {
        return $this->metaRel;
    }

	/**
     * @param string $metaRel
     */
    public function setMetaRel($metaRel)
    {
        $this->metaRel = $metaRel;
    }

	/**
     * @return the $metaSize
     */
    public function getMetaSize()
    {
        return $this->metaSize;
    }

	/**
     * @param string $metaSize
     */
    public function setMetaSize($metaSize)
    {
        $this->metaSize = $metaSize;
    }

	/**
     * @return the $metaType
     */
    public function getMetaType()
    {
        return $this->metaType;
    }

	/**
     * @param string $metaType
     */
    public function setMetaType($metaType)
    {
        $this->metaType = $metaType;
    }

	/**
     * @return the $metaTitle
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

	/**
     * @param string $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

	/**
     * @return the $metaLink
     */
    public function getMetaLink()
    {
        return $this->metaLink;
    }

	/**
     * @param string $metaLink
     */
    public function setMetaLink($metaLink)
    {
        $this->metaLink = $metaLink;
    }

	/**
     * @return the $metaName
     */
    public function getMetaName()
    {
        return $this->metaName;
    }

	/**
     * @param string $metaName
     */
    public function setMetaName($metaName)
    {
        $this->metaName = $metaName;
    }

	/**
     * @return the $metaContent
     */
    public function getMetaContent()
    {
        return $this->metaContent;
    }

	/**
     * @param string $metaContent
     */
    public function setMetaContent($metaContent)
    {
        $this->metaContent = $metaContent;
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
     * @return the $webMedias
     */
    public function getWebMedias()
    {
        return $this->webMedias;
    }

	/**
     * @param \Contentinum\Entity\WebMedia $webMedias
     */
    public function setWebMedias($webMedias)
    {
        $this->webMedias = $webMedias;
    }

	/**
     * @param DateTime $upDate
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;
    }

	/**
     * Set webPages
     *
     * @param \Contentinum\Entity\WebPagesParameter $webPages
     * @return WebNavigationTree
     */
    public function setWebPages(\Contentinum\Entity\WebPagesParameter $webPages = null)
    {
        $this->webPages = $webPages;

    }

    /**
     * Get webPages
     *
     * @return \Contentinum\Entity\WebPagesParameter 
     */
    public function getWebPages()
    {
        return $this->webPages;
    }
}
