<?php
namespace Contentinum\Options;

use Zend\Stdlib\AbstractOptions;

class PdfOptions extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;    

    /**
     * 
     * @var unknown
     */
    protected $headline;
    
    /**
     *
     * @var unknown
     */
    protected $publishAuthor;    
   
    /**
     *
     * @var unknown
     */
    protected $authorEmail;
    
    /**
     *
     * @var unknown
     */    
    protected $pdfAuthor;

    /**
     *
     * @var unknown
     */    
    protected $pdfLogo;

    /**
     *
     * @var unknown
     */    
    protected $pdfSubtitle = ' ';

    /**
     *
     * @var unknown
     */    
    protected $pdfSignatur;

    /**
     *
     * @var unknown
     */    
    protected $pageFormat = 'A4';

    /**
     *
     * @var unknown
     */    
    protected $pageLayout = 'P';

    /**
     *
     * @var unknown
     */    
    protected $pageFont = 'helvetica';

    /**
     *
     * @var unknown
     */    
    protected $pageFontsize = 10;

    /**
     *
     * @var unknown
     */    
    protected $marginHeader = 15;

    /**
     *
     * @var unknown
     */    
    protected $marginFoot = 15;

    /**
     *
     * @var unknown
     */    
    protected $marginTop = 30;

    /**
     *
     * @var unknown
     */    
    protected $marginRight = 10;

    /**
     *
     * @var unknown
     */    
    protected $marginBottom = 25;

    /**
     *
     * @var unknown
     */    
    protected $marginLeft = 15;
    
    /**
     *
     * @var unknown
     */
    protected $dataFont = 'helvetica';
    
    /**
     *
     * @var unknown
     */
    protected $dataFontsize = 8;    

    /**
     *
     * @var array
     */    
    protected $config = array(

        'PDF_HEADER_LOGO' => 'pdfLogo',
        'PDF_PAGE_FORMAT' => 'pageFormat',
        'PDF_PAGE_ORIENTATION' => 'pageLayout',
        'PDF_AUTHOR' => 'pdfAuthor',
        'PDF_NEWS_AUTHOR' => 'newsAuthor',
        'PDF_HEADER_TITLE' => 'headline',
        'PDF_HEADER_STRING' => 'pdfSubtitle',
        'PDF_MARGIN_HEADER' => 'marginHeader',
        'PDF_MARGIN_FOOTER' => 'marginFoot',
        'PDF_MARGIN_TOP' => 'marginTop',
        'PDF_MARGIN_BOTTOM' => 'marginBottom',
        'PDF_MARGIN_LEFT' => 'marginLeft',
        'PDF_MARGIN_RIGHT' => 'marginRight',
        'PDF_FONT_NAME_MAIN' => 'pageFont',
        'PDF_FONT_SIZE_MAIN' => 'pageFontsize',
        'PDF_FONT_NAME_DATA' => 'dataFont',
        'PDF_FONT_SIZE_DATA' => 'dataFontsize',
        'PDF_NEWS_SIGNATUR' => 'pdfSignatur',        
        
    );
    
    /**
     * 
     * @param unknown $options
     */
    public function __construct($options)
    {
        foreach ($options as $key => $value){
            if (strlen($value) > 0){
                $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                if (method_exists($this, $setter)) {
                    $this->{$setter}($value);
                }
            }
        }
    }
    
    public function getPdfConfiguration($key)
    {
        if (isset($this->config[$key])){
            $getter = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $this->config[$key])));
            return $this->{$getter}();
        } else {
            return false;
        }
    }
    
    public function getConfigureKeys()
    {
        return array_keys($this->config);
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
     * @return the $publishAuthor
     */
    public function getPublishAuthor()
    {
        return $this->publishAuthor;
    }

	/**
     * @return the $authorEmail
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

	/**
     * @param \Contentinum\Options\unknown $publishAuthor
     */
    public function setPublishAuthor($publishAuthor)
    {
        $this->publishAuthor = $publishAuthor;
    }

	/**
     * @param \Contentinum\Options\unknown $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

	/**
     * @return the $pdfAuthor
     */
    public function getPdfAuthor()
    {
        return $this->pdfAuthor;
    }

	/**
     * @param \Contentinum\Options\unknown $pdfAuthor
     */
    public function setPdfAuthor($pdfAuthor)
    {
        $this->pdfAuthor = $pdfAuthor;
    }

	/**
     * @return the $pdfLogo
     */
    public function getPdfLogo()
    {
        return $this->pdfLogo;
    }

	/**
     * @param \Contentinum\Options\unknown $pdfLogo
     */
    public function setPdfLogo($pdfLogo)
    {
        $this->pdfLogo = $pdfLogo;
    }

	/**
     * @return the $pdfSubtitle
     */
    public function getPdfSubtitle()
    {
        return $this->pdfSubtitle;
    }

	/**
     * @param \Contentinum\Options\unknown $pdfSubtitle
     */
    public function setPdfSubtitle($pdfSubtitle)
    {
        $this->pdfSubtitle = $pdfSubtitle;
    }

	/**
     * @return the $pdfSignatur
     */
    public function getPdfSignatur()
    {
        return $this->pdfSignatur;
    }

	/**
     * @param \Contentinum\Options\unknown $pdfSignatur
     */
    public function setPdfSignatur($pdfSignatur)
    {
        $this->pdfSignatur = $pdfSignatur;
    }

	/**
     * @return the $pageFormat
     */
    public function getPageFormat()
    {
        return $this->pageFormat;
    }

	/**
     * @param \Contentinum\Options\unknown $pageFormat
     */
    public function setPageFormat($pageFormat)
    {
        $this->pageFormat = $pageFormat;
    }

	/**
     * @return the $pageLayout
     */
    public function getPageLayout()
    {
        return $this->pageLayout;
    }

	/**
     * @param \Contentinum\Options\unknown $pageLayout
     */
    public function setPageLayout($pageLayout)
    {
        $this->pageLayout = $pageLayout;
    }

	/**
     * @return the $pageFont
     */
    public function getPageFont()
    {
        return $this->pageFont;
    }

	/**
     * @param \Contentinum\Options\unknown $pageFont
     */
    public function setPageFont($pageFont)
    {
        $this->pageFont = $pageFont;
    }

	/**
     * @return the $pageFontsize
     */
    public function getPageFontsize()
    {
        return $this->pageFontsize;
    }

	/**
     * @param \Contentinum\Options\unknown $pageFontsize
     */
    public function setPageFontsize($pageFontsize)
    {
        $this->pageFontsize = $pageFontsize;
    }

	/**
     * @return the $marginHeader
     */
    public function getMarginHeader()
    {
        return $this->marginHeader;
    }

	/**
     * @param \Contentinum\Options\unknown $marginHeader
     */
    public function setMarginHeader($marginHeader)
    {
        $this->marginHeader = $marginHeader;
    }

	/**
     * @return the $marginFoot
     */
    public function getMarginFoot()
    {
        return $this->marginFoot;
    }

	/**
     * @param \Contentinum\Options\unknown $marginFoot
     */
    public function setMarginFoot($marginFoot)
    {
        $this->marginFoot = $marginFoot;
    }

	/**
     * @return the $marginTop
     */
    public function getMarginTop()
    {
        return $this->marginTop;
    }

	/**
     * @param \Contentinum\Options\unknown $marginTop
     */
    public function setMarginTop($marginTop)
    {
        $this->marginTop = $marginTop;
    }

	/**
     * @return the $marginRight
     */
    public function getMarginRight()
    {
        return $this->marginRight;
    }

	/**
     * @param \Contentinum\Options\unknown $marginRight
     */
    public function setMarginRight($marginRight)
    {
        $this->marginRight = $marginRight;
    }

	/**
     * @return the $marginBottom
     */
    public function getMarginBottom()
    {
        return $this->marginBottom;
    }

	/**
     * @param \Contentinum\Options\unknown $marginBottom
     */
    public function setMarginBottom($marginBottom)
    {
        $this->marginBottom = $marginBottom;
    }

	/**
     * @return the $marginLeft
     */
    public function getMarginLeft()
    {
        return $this->marginLeft;
    }

	/**
     * @param \Contentinum\Options\unknown $marginLeft
     */
    public function setMarginLeft($marginLeft)
    {
        $this->marginLeft = $marginLeft;
    }

    
    public function getNewsAuthor()
    {
        $author = '';
        if (strlen($this->publishAuthor) > 1){
            $author = $this->publishAuthor;
        }
        
        if ( strlen($this->authorEmail) > 1 ){
            $author .= ', ' . $this->authorEmail;
        }
        return $author;
    }
	/**
     * @return the $dataFont
     */
    public function getDataFont()
    {
        return $this->dataFont;
    }

	/**
     * @param \Contentinum\Options\unknown $dataFont
     */
    public function setDataFont($dataFont)
    {
        $this->dataFont = $dataFont;
    }

	/**
     * @return the $dataFontsize
     */
    public function getDataFontsize()
    {
        return $this->dataFontsize;
    }

	/**
     * @param \Contentinum\Options\unknown $dataFontsize
     */
    public function setDataFontsize($dataFontsize)
    {
        $this->dataFontsize = $dataFontsize;
    }

    
}