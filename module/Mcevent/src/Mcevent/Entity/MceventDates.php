<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Mcevent
 * @package Entity
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * MceventDates
 *
 * @ORM\Table(name="mcevent_dates", indexes={@ORM\Index(name="MCEVENTCALIDENT", columns={"calendar_id"}), @ORM\Index(name="ORGANIZERIDENT", columns={"organizer_id"}), @ORM\Index(name="LOCATIONIDENT", columns={"account_id"})})
 * @ORM\Entity
 */
class MceventDates extends AbstractEntity
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
     * @ORM\Column(name="serial_id", type="string", length=36, nullable=false)
     */
    private $serialId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="resource_id", type="string", length=36, nullable=false)
     */
    private $resourceId = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="organizer_id", type="integer", nullable=false)
     */    
    private $organizerId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255, nullable=false)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="organizer", type="string", length=255, nullable=false)
     */
    private $organizer = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="location_addresse", type="string", length=255, nullable=false)
     */
    private $locationAddresse = '';   

    /**
     * @var string
     *
     * @ORM\Column(name="location_zipcode", type="string", length=25, nullable=false)
     */
    private $locationZipcode = '';
        
    /**
     * @var string
     *
     * @ORM\Column(name="location_city", type="string", length=255, nullable=false)
     */
    private $locationCity = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';
    
    /**
     * 
     * @ORM\Column(name="latitude", type="string", length=250, nullable=false)
     */
    private $latitude = '';
    
    /**
     * 
     * @ORM\Column(name="longitude", type="string", length=250, nullable=false)
     */
    private $longitude = '';
    
    /**
     * 
     * @ORM\Column(name="findlocation", type="string", length=250, nullable=false)
     */
    private $findlocation = '';

    /**
     * @var string
     *
     * @ORM\Column(name="web_medias_id", type="integer", nullable=false)
     */
    private $webMediasId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="web_files_id", type="integer", nullable=false)
     */
    private $webFilesId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="info_url", type="string", length=250, nullable=false)
     */
    private $infoUrl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="string", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="string" , nullable=false)
     */
    private $dateEnd = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="publish", type="string", length=10, nullable=false)
     */
    private $publish = 'yes';

    /**
     * @var string
     *
     * @ORM\Column(name="comment_status", type="string", length=4, nullable=false)
     */
    private $commentStatus = '';

    /**
     * @var string
     *
     * @ORM\Column(name="rating_status", type="string", length=4, nullable=false)
     */
    private $ratingStatus = '';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=12, nullable=false)
     */
    private $status = '';

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=5, nullable=false)
     */
    private $access = '';

    /**
     * @var string
     *
     * @ORM\Column(name="occupancy", type="string", length=1, nullable=false)
     */
    private $occupancy = '';

    /**
     * @var string
     *
     * @ORM\Column(name="public_view", type="string", length=3, nullable=false)
     */
    private $publicView = '';

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
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;    

    /**
     * @var \Mcevent\Entity\MceventTypes
     *
     * @ORM\ManyToOne(targetEntity="Mcevent\Entity\MceventTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calendar_id", referencedColumnName="id")
     * })
     */
    private $calendar;
    


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
     * @return the $serialId
     */
    public function getSerialId()
    {
        return $this->serialId;
    }

	/**
     * @param string $serialId
     */
    public function setSerialId($serialId)
    {
        $this->serialId = $serialId;
    }


	/**
     * @return the $resourceId
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

	/**
     * @param string $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }


	/**
     * @return the $organizerId
     */
    public function getOrganizerId()
    {
        return $this->organizerId;
    }

	/**
     * @param string $organizerId
     */
    public function setOrganizerId($organizerId)
    {
        $this->organizerId = $organizerId;
    }

	/**
     * @return the $summary
     */
    public function getSummary()
    {
        return $this->summary;
    }

	/**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

	/**
     * @return the $organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

	/**
     * @param string $organizer
     */
    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }

	/**
     * @return the $location
     */
    public function getLocation()
    {
        return $this->location;
    }

	/**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

	/**
     * @return the $locationAddresse
     */
    public function getLocationAddresse()
    {
        return $this->locationAddresse;
    }

	/**
     * @param string $locationAddresse
     */
    public function setLocationAddresse($locationAddresse)
    {
        $this->locationAddresse = $locationAddresse;
    }

	/**
     * @return the $locationZipcode
     */
    public function getLocationZipcode()
    {
        return $this->locationZipcode;
    }

	/**
     * @param string $locationZipcode
     */
    public function setLocationZipcode($locationZipcode)
    {
        $this->locationZipcode = $locationZipcode;
    }

	/**
     * @return the $locationCity
     */
    public function getLocationCity()
    {
        return $this->locationCity;
    }

	/**
     * @param string $locationCity
     */
    public function setLocationCity($locationCity)
    {
        $this->locationCity = $locationCity;
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
     * @return the $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

	/**
     * @param field_type $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

	/**
     * @return the $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

	/**
     * @param field_type $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

	/**
     * @return the $findlocation
     */
    public function getFindlocation()
    {
        return $this->findlocation;
    }

	/**
     * @param field_type $findlocation
     */
    public function setFindlocation($findlocation)
    {
        $this->findlocation = $findlocation;
    }

	/**
     * @return the $webMediasId
     */
    public function getWebMediasId()
    {
        return $this->webMediasId;
    }

	/**
     * @param string $webMediasId
     */
    public function setWebMediasId($webMediasId)
    {
        $this->webMediasId = $webMediasId;
    }

	/**
     * @return the $webFilesId
     */
    public function getWebFilesId()
    {
        return $this->webFilesId;
    }

	/**
     * @param string $webFilesId
     */
    public function setWebFilesId($webFilesId)
    {
        $this->webFilesId = $webFilesId;
    }

	/**
     * @return the $infoUrl
     */
    public function getInfoUrl()
    {
        return $this->infoUrl;
    }

	/**
     * @param string $infoUrl
     */
    public function setInfoUrl($infoUrl)
    {
        $this->infoUrl = $infoUrl;
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
     * @return the $dateStart
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

	/**
     * @param DateTime $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

	/**
     * @return the $dateEnd
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

	/**
     * @param DateTime $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
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
     * @return the $commentStatus
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

	/**
     * @param string $commentStatus
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
    }

	/**
     * @return the $ratingStatus
     */
    public function getRatingStatus()
    {
        return $this->ratingStatus;
    }

	/**
     * @param string $ratingStatus
     */
    public function setRatingStatus($ratingStatus)
    {
        $this->ratingStatus = $ratingStatus;
    }

	/**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

	/**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

	/**
     * @return the $access
     */
    public function getAccess()
    {
        return $this->access;
    }

	/**
     * @param string $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

	/**
     * @return the $occupancy
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }

	/**
     * @param string $occupancy
     */
    public function setOccupancy($occupancy)
    {
        $this->occupancy = $occupancy;
    }

	/**
     * @return the $publicView
     */
    public function getPublicView()
    {
        return $this->publicView;
    }

	/**
     * @param string $publicView
     */
    public function setPublicView($publicView)
    {
        $this->publicView = $publicView;
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
     * @return the $account
     */
    public function getAccount()
    {
        return $this->account;
    }

	/**
     * @param \Contentinum\Entity\Accounts $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

	/**
     * @return the $calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

	/**
     * @param \Mcevent\Entity\MceventTypes $calendar
     */
    public function setCalendar($calendar)
    {
        $this->calendar = $calendar;
    }   
    
}