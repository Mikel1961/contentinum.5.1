<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * WebContent
 *
 * @ORM\Table(name="web_content", indexes={@ORM\Index(name="TITLEINTERNALUSE", columns={"title"}), @ORM\Index(name="HEADLINEPUBLICUSE", columns={"headline"}),@ORM\Index(name="CONTENTPUBLICUSE", columns={"content"})})
 * @ORM\Entity
 */
class WebContent extends AbstractEntity
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
     * @ORM\Column(name="web_contentgroup_id", type="integer", nullable=false)
     */
    private $contentgroup = 0;    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="web_pages_id", type="integer", nullable=false)
     */
    private $webPagesIdent = 0;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="htmlwidgets", type="string", length=50, nullable=false)
     */
    private $htmlwidgets = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="element", type="string", length=20, nullable=false)
     */
    private $element = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="element_attribute", type="text", nullable=false)
     */
    private $elementAttribute = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="resource", type="string", length=50, nullable=false)
     */
    private $resource = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="text", nullable=false)
     */
    private $source = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="modul", type="string", length=60, nullable=false)
     */
    private $modul = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="modul_params", type="text", nullable=false)
     */
    private $modulParams = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="modul_display", type="string", length=250, nullable=false)
     */
    private $modulDisplay = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="modul_config", type="string", length=250, nullable=false)
     */
    private $modulConfig = '';   
    
    /**
     * @var string
     *
     * @ORM\Column(name="modul_link", type="string", length=250, nullable=false)
     */
    private $modulLink = '';    

    /**
     * @var string
     *
     * @ORM\Column(name="modul_format", type="string", length=80, nullable=false)
     */
    private $modulFormat = '';    
 
    /**
     * @var string
     *
     * @ORM\Column(name="media_link_page", type="integer", nullable=false)
     */
    private $mediaLinkPage = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="media_link_group", type="integer", nullable=false)
     */
    private $mediaLinkGroup = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="media_link_url", type="string", length=250, nullable=false)
     */
    private $mediaLinkUrl = '';
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="media_style", type="string", length=250, nullable=false)
     */
    private $mediaStyle = '';   

    /**
     * @var boolean
     *
     * @ORM\Column(name="media_placeholder", type="integer", nullable=false)
     */
    private $mediaPlaceholder = 0;    

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=6, nullable=false)
     */
    private $lang = 'de';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="text", nullable=false)
     */
    private $headline = '';

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", nullable=false)
     */
    private $question = '';

    /**
     * @var string
     *
     * @ORM\Column(name="content_teaser", type="text", nullable=false)
     */
    private $contentTeaser = '';

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content = '';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="number_character_teaser", type="integer", nullable=false)
     */
    private $numberCharacterTeaser = '0';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="label_read_more", type="string", length=200, nullable=false)
     */
    private $labelReadMore = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="publish_date", type="string", length=30, nullable=false)
     */
    private $publishDate = '';    
        
    /**
     * @var string
     *
     * @ORM\Column(name="publish_author", type="string", length=100, nullable=false)
     */
    private $publishAuthor = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="author_email", type="string", length=80, nullable=false)
     */
    private $authorEmail = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="publish", type="string", length=10, nullable=false)
     */
    private $publish = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="publish_up", type="string", nullable=false)
     */
    private $publishUp = '0000-00-00 00:00:00';
    
    /**
     * @var string
     *
     * @ORM\Column(name="publish_down", type="string", nullable=false)
     */
    private $publishDown = '0000-00-00 00:00:00';
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment_status", type="boolean", nullable=false)
     */
    private $commentStatus = '0';    

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version = '0';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="overwrite", type="integer", nullable=false)
     */
    private $overwrite = '0';    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="replace_default", type="integer", nullable=false)
     */
    private $replaceDefault = 0;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="integer", nullable=false)
     */
    private $deleted = 0;    

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
     * @var \Contentinum\Entity\WebMedia
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebMedias",cascade={"persist"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="web_medias_id", referencedColumnName="id")
     * })
     */
    private $webMediasId;    

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
     * @return the $contentgroup
     */
    public function getContentgroup()
    {
        return $this->contentgroup;
    }

	/**
     * @param number $contentgroup
     */
    public function setContentgroup($contentgroup)
    {
        $this->contentgroup = $contentgroup;
    }

	/**
     * @return the $webPagesIdent
     */
    public function getWebPagesIdent()
    {
        return $this->webPagesIdent;
    }

	/**
     * @param number $webPagesIdent
     */
    public function setWebPagesIdent($webPagesIdent)
    {
        $this->webPagesIdent = $webPagesIdent;
    }

	/**
     * @return the $htmlwidgets
     */
    public function getHtmlwidgets()
    {
        return $this->htmlwidgets;
    }

	/**
     * @param string $htmlwidgets
     */
    public function setHtmlwidgets($htmlwidgets)
    {
        $this->htmlwidgets = $htmlwidgets;
    }

	/**
     * @return the $element
     */
    public function getElement()
    {
        return $this->element;
    }

	/**
     * @param string $element
     */
    public function setElement($element)
    {
        $this->element = $element;
    }

	/**
     * @return the $elementAttribute
     */
    public function getElementAttribute()
    {
        return $this->elementAttribute;
    }

	/**
     * @param string $elementAttribute
     */
    public function setElementAttribute($elementAttribute)
    {
        $this->elementAttribute = $elementAttribute;
    }

	/**
     * @return the $resource
     */
    public function getResource()
    {
        return $this->resource;
    }

	/**
     * @param string $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

	/**
     * @return the $source
     */
    public function getSource()
    {
        return $this->source;
    }

	/**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

	/**
     * @return the $modul
     */
    public function getModul()
    {
        return $this->modul;
    }

	/**
     * @param string $modul
     */
    public function setModul($modul)
    {
        $this->modul = $modul;
    }

	/**
     * @return the $modulParams
     */
    public function getModulParams()
    {
        return $this->modulParams;
    }

	/**
     * @param string $modulParams
     */
    public function setModulParams($modulParams)
    {
        $this->modulParams = $modulParams;
    }

	/**
     * @return the $modulDisplay
     */
    public function getModulDisplay()
    {
        return $this->modulDisplay;
    }

	/**
     * @param string $modulDisplay
     */
    public function setModulDisplay($modulDisplay)
    {
        $this->modulDisplay = $modulDisplay;
    }

	/**
     * @return the $modulConfig
     */
    public function getModulConfig()
    {
        return $this->modulConfig;
    }

	/**
     * @param string $modulConfig
     */
    public function setModulConfig($modulConfig)
    {
        $this->modulConfig = $modulConfig;
    }

	/**
     * @return the $modulLink
     */
    public function getModulLink()
    {
        return $this->modulLink;
    }

	/**
     * @param string $modulLink
     */
    public function setModulLink($modulLink)
    {
        $this->modulLink = $modulLink;
    }

	/**
     * @return the $modulFormat
     */
    public function getModulFormat()
    {
        return $this->modulFormat;
    }

	/**
     * @param string $modulFormat
     */
    public function setModulFormat($modulFormat)
    {
        $this->modulFormat = $modulFormat;
    }

	/**
     * @return the $mediaLinkPage
     */
    public function getMediaLinkPage()
    {
        return $this->mediaLinkPage;
    }

	/**
     * @param string $mediaLinkPage
     */
    public function setMediaLinkPage($mediaLinkPage)
    {
        $this->mediaLinkPage = $mediaLinkPage;
    }

	/**
     * @return the $mediaLinkGroup
     */
    public function getMediaLinkGroup()
    {
        return $this->mediaLinkGroup;
    }

	/**
     * @param string $mediaLinkGroup
     */
    public function setMediaLinkGroup($mediaLinkGroup)
    {
        $this->mediaLinkGroup = $mediaLinkGroup;
    }

	/**
     * @return the $mediaLinkUrl
     */
    public function getMediaLinkUrl()
    {
        return $this->mediaLinkUrl;
    }

	/**
     * @param string $mediaLinkUrl
     */
    public function setMediaLinkUrl($mediaLinkUrl)
    {
        $this->mediaLinkUrl = $mediaLinkUrl;
    }

	/**
     * @return the $mediaStyle
     */
    public function getMediaStyle()
    {
        return $this->mediaStyle;
    }

	/**
     * @param string $mediaStyle
     */
    public function setMediaStyle($mediaStyle)
    {
        $this->mediaStyle = $mediaStyle;
    }

	/**
     * @return the $mediaPlaceholder
     */
    public function getMediaPlaceholder()
    {
        return $this->mediaPlaceholder;
    }

	/**
     * @param boolean $mediaPlaceholder
     */
    public function setMediaPlaceholder($mediaPlaceholder)
    {
        $this->mediaPlaceholder = $mediaPlaceholder;
    }

	/**
     * @return the $lang
     */
    public function getLang()
    {
        return $this->lang;
    }

	/**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

	/**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

	/**
     * @return the $headline
     */
    public function getHeadline()
    {
        return $this->headline;
    }

	/**
     * @param string $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

	/**
     * @return the $question
     */
    public function getQuestion()
    {
        return $this->question;
    }

	/**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

	/**
     * @return the $contentTeaser
     */
    public function getContentTeaser()
    {
        return $this->contentTeaser;
    }

	/**
     * @param string $contentTeaser
     */
    public function setContentTeaser($contentTeaser)
    {
        $this->contentTeaser = $contentTeaser;
    }

	/**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

	/**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

	/**
     * @return the $numberCharacterTeaser
     */
    public function getNumberCharacterTeaser()
    {
        return $this->numberCharacterTeaser;
    }

	/**
     * @param number $numberCharacterTeaser
     */
    public function setNumberCharacterTeaser($numberCharacterTeaser)
    {
        $this->numberCharacterTeaser = $numberCharacterTeaser;
    }

	/**
     * @return the $labelReadMore
     */
    public function getLabelReadMore()
    {
        return $this->labelReadMore;
    }

	/**
     * @param string $labelReadMore
     */
    public function setLabelReadMore($labelReadMore)
    {
        $this->labelReadMore = $labelReadMore;
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
     * @return the $publishAuthor
     */
    public function getPublishAuthor()
    {
        return $this->publishAuthor;
    }

	/**
     * @param string $publishAuthor
     */
    public function setPublishAuthor($publishAuthor)
    {
        $this->publishAuthor = $publishAuthor;
    }

	/**
     * @return the $authorEmail
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

	/**
     * @param string $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
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
     * @param string $publishUp
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
     * @param string $publishDown
     */
    public function setPublishDown($publishDown)
    {
        $this->publishDown = $publishDown;
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
     * @return the $version
     */
    public function getVersion()
    {
        return $this->version;
    }

	/**
     * @param number $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

	/**
     * @return the $overwrite
     */
    public function getOverwrite()
    {
        return $this->overwrite;
    }

	/**
     * @param number $overwrite
     */
    public function setOverwrite($overwrite)
    {
        $this->overwrite = $overwrite;
    }

	/**
     * @return the $replace
     */
    public function getReplaceDefault()
    {
        return $this->replaceDefault;
    }

	/**
     * @param number $replace
     */
    public function setReplaceDefault($replace)
    {
        $this->replaceDefault = $replace;
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
     *
     * @return the $webMediasId
     */
    public function getWebMediasId()
    {
    	return $this->webMediasId;
    }
    
    /**
     *
     * @param \Contentinum\Entity\WebMedia $webMediasId
     * @return WebMediasMetas
     */
    public function setWebMediasId($webMediasId)
    {
    	$this->webMediasId = $webMediasId;
    
    	return $this;
    }    
}