<?php
namespace Mcwork\Options;

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
        'formbuttons',
        'settoroute',
        'populate',
        'populateentity',
        'populateFromRoute',
        'setexclude',
        'notpopulate',
        'services',
        'populateSerializeFields',
    );

    protected $properties = array(
        'splitQuery',
        'resource',
        'title',
        'headTitle',
        'bodyTagAttribs',
        'headline',
        'columnright',
        'subheadline',
        'content',
        'footer',
        'template',
        'layout',
        'toolbar',
        'tableedit',
        'templateWidget',
        'bodyScriptFiles',
        'app'
    );

    /**
     * Standard options
     *
     * @var string
     */
    protected $stdParams = '_default';
    
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
     * Url parameter tag
     * @var string
     */
    protected $tag;
    
    /**
     * Url parameter tagvalue
     * @var string
     */
    protected $tagvalue;
    
    /**
     * Host name
     * @var string
     */
    protected $host;
    
    /**
     * REQUEST_URI
     * @var string
     */
    protected $query;    
    
    /**
     * 
     * @var unknown
     */
    protected $splitQuery;
    
    /**
     * 
     * @var multiple
     */
    protected $ident;


    /**
     * Application options
     *
     * @var array
     */
    protected $app;

    /**
     * 
     * @var string
     */
    protected $resource;

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
    private $headTitle;

    /**
     * 
     * @var string
     */
    private $bodyTagAttribs;
    
    /**
     *
     * @var string
     */    
    private $headline;
    
    /**
     *
     * @var string
     */    
    private $columnright;
    
    /**
     *
     * @var string
     */    
    private $subheadline;
    
    /**
     *
     * @var string
     */    
    private $content;
    
    /**
     *
     * @var string
     */    
    private $footer;
    
    /**
     *
     * @var string
     */    
    private $template;
    
    /**
     * 
     * @var string
     */
    private $layout;
    
    /**
     *
     * @var string
     */    
    private $toolbar;
    
    /**
     *
     * @var string
     */    
    private $tableedit;
    
    /**
     *
     * @var string
     */    
    private $templateWidget;
    
    /**
     * 
     * @var string
     */
    private $bodyScriptFiles;


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
    }

    public function setPageOptions($pageOptions)
    {
        foreach ($pageOptions as $property => $option) {
            if (in_array($property, $this->properties)) {
                if (is_array($option) || strlen($option) > 0) {
                    switch ($property){
                        case 'app':
                            $this->setApp($option);
                            break;
                            default:
                                $this->{$property} = $option;
                            break;
                    }
                }
            }
        }
    }
    
    public function requestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }  

    /**
     * Split page url
     *
     * @param string $page
     * @param int $i
     * @param sting $seperator
     * @return string
     */
    public function split($page, $i = null, $seperator = null)
    {
        if (null === $i) {
            $i = self::URL_I;
        }
    
        if (null === $seperator) {
            $seperator = self::URL_SEPERATOR;
        }
    
        return implode($seperator, array_slice(explode($seperator, $page), 0, $i, true));
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
    public function setStdParams($stdParams = null)
    {
        if (null === $stdParams){
            $stdParams = self::STD_PARAMETER;
        }
        $this->stdParams = $stdParams;
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
     * @return the $tag
     */
    public function getTag()
    {
        return $this->tag;
    }

	/**
     * @return the $tagvalue
     */
    public function getTagvalue()
    {
        return $this->tagvalue;
    }

	/**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

	/**
     * @param string $tagvalue
     */
    public function setTagvalue($tagvalue)
    {
        $this->tagvalue = $tagvalue;
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
     * @return the $ident
     */
    public function getIdent()
    {
        return $this->ident;
    }

	/**
     * @param \Mcwork\Options\multiple $ident
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;
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
        if (is_array($this->app)){
            foreach ($app as $key => $value){
                if (is_array($value) || strlen($value) > 0) {
                    $this->app[$key] = $value;
                }
            }
        } else {
            $this->app = $app;
        }
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
     * @return the $headTitle
     */
    public function getHeadTitle()
    {
        return $this->headTitle;
    }

	/**
     * @param \Mcwork\Options\unknown $headTitle
     */
    public function setHeadTitle($headTitle)
    {
        $this->headTitle = $headTitle;
    }

	/**
     * @return the $bodyTagAttribs
     */
    public function getBodyTagAttribs()
    {
        return $this->bodyTagAttribs;
    }

	/**
     * @param string $bodyTagAttribs
     */
    public function setBodyTagAttribs($bodyTagAttribs)
    {
        $this->bodyTagAttribs = $bodyTagAttribs;
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
     * @return the $columnright
     */
    public function getColumnright()
    {
        return $this->columnright;
    }

	/**
     * @param string $columnright
     */
    public function setColumnright($columnright)
    {
        $this->columnright = $columnright;
    }

	/**
     * @return the $subheadline
     */
    public function getSubheadline()
    {
        return $this->subheadline;
    }

	/**
     * @param string $subheadline
     */
    public function setSubheadline($subheadline)
    {
        $this->subheadline = $subheadline;
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
     * @return the $footer
     */
    public function getFooter()
    {
        return $this->footer;
    }

	/**
     * @param string $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

	/**
     * @return the $template
     */
    public function getTemplate()
    {
        return $this->template;
    }

	/**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

	/**
     * @return the $layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

	/**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

	/**
     * @return the $toolbar
     */
    public function getToolbar()
    {
        return $this->toolbar;
    }

	/**
     * @param string $toolbar
     */
    public function setToolbar($toolbar)
    {
        $this->toolbar = $toolbar;
    }

	/**
     * @return the $tableedit
     */
    public function getTableedit()
    {
        return $this->tableedit;
    }

	/**
     * @param string $tableedit
     */
    public function setTableedit($tableedit)
    {
        $this->tableedit = $tableedit;
    }

	/**
     * @return the $templateWidget
     */
    public function getTemplateWidget()
    {
        return $this->templateWidget;
    }

	/**
     * @param string $templateWidget
     */
    public function setTemplateWidget($templateWidget)
    {
        $this->templateWidget = $templateWidget;
    }
	/**
     * @return the $bodyScriptFiles
     */
    public function getBodyScriptFiles()
    {
        return $this->bodyScriptFiles;
    }

	/**
     * @param string $bodyScriptFiles
     */
    public function setBodyScriptFiles($bodyScriptFiles)
    {
        $this->bodyScriptFiles = $bodyScriptFiles;
    }


}