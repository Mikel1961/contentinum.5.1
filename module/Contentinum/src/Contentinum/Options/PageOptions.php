<?php
namespace Contentinum\Options;

use Zend\Stdlib\AbstractOptions;

class PageOptions extends AbstractOptions
{
    CONST URL_SEPERATOR = '/';
    
    CONST URL_I = 3;    
    
    const STD_PARAMETER = '_default';
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    protected $appProperties = array(
        'controller',
        'worker',
        'entity',
        'entitymanager',
        'form',
        'formaction',
        'formattributes',
        'settoroute',
        'populate',
    );

    protected $properties = array(
        'splitQuery',
        'standardDomain',
        'app',
        'id',
        'layout',
        'template',
        'htmlstructure',
        'htmlwidgets',
        'parentPage',
        'resource',
        'title',
        'label',
        'headline',
        'charset',
        'favicon',
        'bodyId',
        'bodyClass',
        'htmlId',
        'htmlClass',
        'headScript',
        'headStyle',
        'bodyFooterScript',
        'inlineScript',
        'metaDocstart',        
        'metaTitle',
        'metaDescription',
        'metaKeywords',
        'metaViewport',
        'author',
        'locale',
        'robots',
        'language',
        'languageParent',
        'content',
    );

    /**
     * Standard options
     *
     * @var string
     */
    protected $stdParams = '_default';
    
    /**
     * Host name
     * @var string
     */
    protected $host;
    
    /**
     * Host name
     * @var string
     */
    protected $protocol;    
    
    /**
     * REQUEST_URI
     * @var string
     */
    protected $query;  
    
    /**
     *
     * @var unknown
     */
    protected $splitQuery = 1;    
    
    /**
     * Article, Contributions, Tag source string
     * @var string
     */
    protected $article;
    
    /**
     * Tag category
     * @var string
     */
    protected $category;
    
    /**
     * Ident
     * @var string
     */
    protected $ident;
    
    /**
     * 
     * @var string
     */
    protected $sub;
    
    /**
     * 
     * @var string
     */
    protected $standardDomain = 'no';

    /**
     * Application options
     *
     * @var array
     */
    protected $app;
    
    /**
     * Page, Default page and preferences indetifier
     * @var unknown
     */
    protected $id;

    /**
     * Layout script
     *
     * @var string
     */
    protected $layout;

    /**
     * Template script
     *
     * @var string
     */
    protected $template;
    
    /**
     * @var string
     */
    private $htmlstructure;
    
    /**
     * @var string
     */
    private $htmlwidgets;    
    
    /**
     * Parent page
     * @var int
     */
    private $parentPage;
    
    /**
     * Resource access
     * @var string
     */
    protected $resource;
    
    /**
     * 
     * @var array
     */
    protected $pageHeaders;

    /**
     * Website title
     *
     * @var string
     */
    private $title;
    
    /**
     * 
     * @var unknown
     */
    private $headline;
    
    /**
     * Page label
     * @var string
     */
    private $label;
    
    /**
     * 
     * @var string
     */
    private $charset;
    
    /**
     * @var string
     */
    private $favicon;
    
    /**
     * @var string
     */
    private $bodyId;
    
    /**
     * @var string
     */
    private $bodyClass;
    
    /**
     * 
     * @var string
     */
    private $htmlId;
    
    /**
     * 
     * @var string
     */
    private $htmlClass;  
    
    /**
     * @var string
     */
    private $headScript;
    
    
    /**
     * @var string
     */
    private $headStyle;
    
    /**
     * @var string
     */
    private $inlineScript;
    
    /**
     * @var string
     */
    private $metaDocstart;    
    
    /**
     * Website title extension
     * @var unknown
     */
    private $metaTitle;

    /**
     * Website meta description
     *
     * @var string
     */
    private $metaDescription;

    /**
     * Website meta keywords
     *
     * @var string
     */
    private $metaKeywords;
    
    /**
     * 
     * @var unknown
     */
    private $metaViewport;
    
    /**
     * Website author
     *
     * @var string
     */
    private $author;

    /**
     * Website locale adjustment
     *
     * @var string
     *
     */
    private $locale;
        
    /**
     * 
     * @var string
     */
    private $robots;
       
    /**
     * @var string
     */
    private $language;
    
    /**
     * @var string
     */
    private $languageParent;    
    
    /**
     * 
     * @var unknown
     */
    private $content;

    /**
     * 
     * @param array $pageOptions
     * @param string $stdParams
     * @param array $options
     */
    public function __construct(array $pageOptions, $stdParams = null, $options = null)
    {
        if (null !== $stdParams) {
            $this->stdParams = $stdParams;
        } else {
            $this->stdParams = self::STD_PARAMETER;
        }
        
        if (isset($pageOptions[$this->stdParams])) {
            $this->setPageOptions($pageOptions[$this->stdParams]);
        }
        
        if (null !== $options) {
            $this->setFromArray($options);
        }
    }

    /**
     * 
     * @param array $pageOptions
     * @param string $stdParams
     */
    public function addPageOptions(array $pageOptions, $stdParams = null)
    {
        if (null !== $stdParams) {
            $this->stdParams = $stdParams;
        }
        
        if (isset($pageOptions[$this->stdParams])) {
            $this->setPageOptions($pageOptions[$this->stdParams]);
        }
        
        if ('no' === $this->standardDomain){
            $this->stdParams = self::STD_PARAMETER;
        }
    }

    /**
     * Set page options overwrite exist parameters
     * @param array $pageOptions
     */
    public function setPageOptions($pageOptions)
    {
        foreach ($pageOptions as $property => $option) {
            if (in_array($property, $this->properties)) {
                if (is_array($option) || strlen($option) > 0) {
                    $this->{$property} = $option;
                }
            }
        }
    }
    
    /**
     * Split page url
     *
     * @param string $query
     * @param int $i
     * @param sting $seperator
     * @return string
     */
    public function split($query = null, $i = null, $seperator = null, $remove = true)
    {
        if (!$query){
            $query = $this->query;
        }
                
        if (null === $i) {
            $i = self::URL_I;
        }
    
        if (null === $seperator) {
            $seperator = self::URL_SEPERATOR;
        }
        
            
        if (true === $remove){
            if (substr($query, 0, 1) === $seperator){
                $query = substr($query,1);
            }
        }
    
        return implode($seperator, array_slice(explode($seperator, $query), 0, $i, true));
    } 

    
    /**
     * @return the $splitQuery
     */
    public function getSplitQuery()
    {
        if (null === $this->splitQuery){
            $this->splitQuery = self::URL_I;
        }
        return $this->splitQuery;
    }
    
    /**
     * @param \Mcwork\Options\unknown $splitQuery
     */
    public function setSplitQuery($splitQuery)
    {
        $this->splitQuery = $splitQuery;
    }    

    /**
     *
     * @return the $stdParams
     */
    public function getStdParams()
    {
        return $this->stdParams;
    }

    /**
     *
     * @param string $stdParams
     */
    public function setStdParams($stdParams)
    {
        $this->stdParams = $stdParams;
    }

	/**
     * @return the $host
     */
    public function getHost()
    {
        return $this->host;
    }

	/**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

	/**
     * @return the $protocol
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

	/**
     * @param string $protocol
     */
    public function setProtocol($protocol = null)
    {
        
        if (null === $protocol){
            if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
            ) {
                $protocol = 'https';
            } else {
                $protocol = 'http';
            }            
            
        }
        $this->protocol = $protocol;
    }

	/**
     * @return the $query
     */
    public function getQuery()
    {
        return $this->query;
    }

	/**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

	/**
     * @return the $article
     */
    public function getArticle()
    {
        return $this->article;
    }

	/**
     * @param string $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

	/**
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

	/**
     * @return the $ident
     */
    public function getIdent()
    {
        return $this->ident;
    }

	/**
     * @param string $ident
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;
    }

	/**
     * @return the $sub
     */
    public function getSub()
    {
        return $this->sub;
    }

	/**
     * @param field_type $sub
     */
    public function setSub($sub)
    {
        $this->sub = $sub;
    }

	/**
     * @return the $standardDomain
     */
    public function getStandardDomain()
    {
        return $this->standardDomain;
    }

	/**
     * @param string $standardDomain
     */
    public function setStandardDomain($standardDomain)
    {
        $this->standardDomain = $standardDomain;
    }

	/**
     *
     * @return the $app
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     *
     * @param string $property
     * @return Ambigous <\Contentinum\Options\the, multitype:>|boolean|multitype:string
     */
    public function getAppOption($property = null)
    {
        if (null === $property) {
            return $this->getApp();
        }
        
        if (isset($this->app[$property])) {
            return $this->app[$property];
        } else {
            return false;
        }
    }

    /**
     *
     * @param multitype: $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    /**
     *
     * @param unknown $property
     * @param unknown $value
     */
    public function addAppOptions($property, $value)
    {
        if (in_array($property, $this->appProperties)) {
            $this->app[$property] = $value;
        }
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param \Contentinum\Options\unknown $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     *
     * @return the $layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     *
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     *
     * @return the $template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

	/**
     * @return the $htmlstructure
     */
    public function getHtmlstructure()
    {
        return $this->htmlstructure;
    }

	/**
     * @param string $htmlstructure
     */
    public function setHtmlstructure($htmlstructure)
    {
        $this->htmlstructure = $htmlstructure;
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
     * @return the $parentPage
     */
    public function getParentPage()
    {
        return $this->parentPage;
    }

	/**
     * @param number $parentPage
     */
    public function setParentPage($parentPage)
    {
        $this->parentPage = $parentPage;
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
     * @return the $pageHeaders
     */
    public function getPageHeaders()
    {
        return $this->pageHeaders;
    }
    
    /**
     * @param multitype: $pageHeaders
     */
    public function addPageHeaders($pageHeaders)
    {
        $this->pageHeaders[] = $pageHeaders;
    }    

	/**
     * @param multitype: $pageHeaders
     */
    public function setPageHeaders($pageHeaders)
    {
        $this->pageHeaders = $pageHeaders;
    }

	/**
     * @return the $label
     */
    public function getLabel()
    {
        return $this->label;
    }

	/**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

	/**
     *
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
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
     * @param \Contentinum\Options\unknown $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

	/**
     * @return the $charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

	/**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

	/**
     * @return the $favicon
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

	/**
     * @param string $favicon
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;
    }

	/**
     * @return the $bodyId
     */
    public function getBodyId()
    {
        return $this->bodyId;
    }

	/**
     * @param string $bodyId
     */
    public function setBodyId($bodyId)
    {
        $this->bodyId = $bodyId;
    }

	/**
     * @return the $bodyClass
     */
    public function getBodyClass()
    {
        return $this->bodyClass;
    }

	/**
     * @param string $bodyClass
     */
    public function setBodyClass($bodyClass)
    {
        $this->bodyClass = $bodyClass;
    }

	/**
     * @return the $htmlId
     */
    public function getHtmlId()
    {
        return $this->htmlId;
    }

	/**
     * @param string $htmlId
     */
    public function setHtmlId($htmlId)
    {
        $this->htmlId = $htmlId;
    }

	/**
     * @return the $htmlClass
     */
    public function getHtmlClass()
    {
        return $this->htmlClass;
    }

	/**
     * @param string $htmlClass
     */
    public function setHtmlClass($htmlClass)
    {
        $this->htmlClass = $htmlClass;
    }

	/**
     * @return the $headScript
     */
    public function getHeadScript()
    {
        return $this->headScript;
    }

	/**
     * @param string $headScript
     */
    public function setHeadScript($headScript)
    {
        $this->headScript = $headScript;
    }

	/**
     * @return the $headStyle
     */
    public function getHeadStyle()
    {
        return $this->headStyle;
    }

	/**
     * @param string $headStyle
     */
    public function setHeadStyle($headStyle)
    {
        $this->headStyle = $headStyle;
    }

	/**
     * @return the $inlineScript
     */
    public function getInlineScript()
    {
        return $this->inlineScript;
    }

	/**
     * @param string $inlineScript
     */
    public function setInlineScript($inlineScript)
    {
        $this->inlineScript = $inlineScript;
    }

	/**
     * @return the $metaDocstart
     */
    public function getMetaDocstart()
    {
        return $this->metaDocstart;
    }

	/**
     * @param string $metaDocstart
     */
    public function setMetaDocstart($metaDocstart)
    {
        $this->metaDocstart = $metaDocstart;
    }

	/**
     * @return the $metaTitle
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

	/**
     * @param \Contentinum\Options\unknown $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

	/**
     *
     * @return the $metaDescription
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     *
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     *
     * @return the $metaKeywords
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     *
     * @param string $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return the $metaViewport
     */
    public function getMetaViewport()
    {
        return $this->metaViewport;
    }

	/**
     * @param \Contentinum\Options\unknown $metaViewport
     */
    public function setMetaViewport($metaViewport)
    {
        $this->metaViewport = $metaViewport;
    }

	/**
     *
     * @return the $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     *
     * @return the $locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
	/**
     * @return the $robots
     */
    public function getRobots()
    {
        return $this->robots;
    }

	/**
     * @param string $robots
     */
    public function setRobots($robots)
    {
        $this->robots = $robots;
    }

	/**
     * @return the $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

	/**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

	/**
     * @return the $languageParent
     */
    public function getLanguageParent()
    {
        return $this->languageParent;
    }

	/**
     * @param string $languageParent
     */
    public function setLanguageParent($languageParent)
    {
        $this->languageParent = $languageParent;
    }
	/**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

	/**
     * @param \Contentinum\Options\unknown $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}