<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;


/**
 * WebFormsField
 *
 * @ORM\Table(name="web_forms_fieldoptions", indexes={@ORM\Index(name="FORMFIELDIDENT", columns={"form_field_id"}) })
 * @ORM\Entity
 */
class WebFieldOptions extends AbstractEntity
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
     * @ORM\Column(name="option_group", type="string", length=250, nullable=false)
     */    
    private $optionGroup = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="string", length=250, nullable=false)
     */
    private $optionValue = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="option_label", type="string", length=250, nullable=false)
     */
    private $optionLabel = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="option_labeltitle", type="string", length=250, nullable=false)
     */
    private $optionLabeltitle = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="img_source", type="string", length=250, nullable=false)
     */
    private $imgSource = '';    
    
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
     *
     * @var \Contentinum\Entity\WebFormsField
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebFormsField")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="form_field_id", referencedColumnName="id")
     * })
     */
    private $formField;    

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
     * @return the $optionGroup
     */
    public function getOptionGroup()
    {
        return $this->optionGroup;
    }

	/**
     * @param string $optionGroup
     */
    public function setOptionGroup($optionGroup)
    {
        $this->optionGroup = $optionGroup;
    }

	/**
     * @return the $optionValue
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

	/**
     * @param string $optionValue
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;
    }

	/**
     * @return the $optionLabel
     */
    public function getOptionLabel()
    {
        return $this->optionLabel;
    }

	/**
     * @param string $optionLabel
     */
    public function setOptionLabel($optionLabel)
    {
        $this->optionLabel = $optionLabel;
    }

	/**
     * @return the $optionLabeltitle
     */
    public function getOptionLabeltitle()
    {
        return $this->optionLabeltitle;
    }

	/**
     * @param string $optionLabeltitle
     */
    public function setOptionLabeltitle($optionLabeltitle)
    {
        $this->optionLabeltitle = $optionLabeltitle;
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
     * @return the $formField
     */
    public function getFormField()
    {
        return $this->formField;
    }

	/**
     * @param \Contentinum\Entity\WebFormsField $formField
     */
    public function setFormField($formField)
    {
        $this->formField = $formField;
    }

}