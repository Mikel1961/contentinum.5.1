<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * WebPages
 *
 * @ORM\Table(name="web_pages_maintenance")
 * @ORM\Entity
 */
class WebPagesMaintenance extends AbstractEntity
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
     * @ORM\Column(name="maintenance", type="text", nullable=false)
     */
    private $maintenance = '';

    /**
     * @var string
     *
     * @ORM\Column(name="maintenance_start", type="string", nullable=false)
     */
    private $maintenanceStart = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="maintenance_end", type="string", nullable=false)
     */
    private $maintenanceEnd = '0000-00-00 00:00:00';

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
     * @return the $maintenance
     */
    public function getMaintenance()
    {
        return $this->maintenance;
    }

	/**
     * @param string $maintenance
     */
    public function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;
    }

	/**
     * @return the $maintenanceStart
     */
    public function getMaintenanceStart()
    {
        return $this->maintenanceStart;
    }

	/**
     * @param Ambigous <DateTime, string> $maintenanceStart
     */
    public function setMaintenanceStart($maintenanceStart)
    {
        $this->maintenanceStart = $maintenanceStart;
    }

	/**
     * @return the $maintenanceEnd
     */
    public function getMaintenanceEnd()
    {
        return $this->maintenanceEnd;
    }

	/**
     * @param Ambigous <DateTime, string> $maintenanceEnd
     */
    public function setMaintenanceEnd($maintenanceEnd)
    {
        $this->maintenanceEnd = $maintenanceEnd;
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
