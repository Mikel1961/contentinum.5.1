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
 * @category contentinum
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.1.0
 */
namespace Contentinum\Model;

use Zend\Mail\Message;

class Sendmail extends Message
{
    /**
     * Zend\Mail\Transport\Smtp
     * @var Zend\Mail\Transport\Smtp
     */
    private $transport;
    
    /**
     * Contentinum\Entity\WebForms
     * @var \Contentinum\Entity\WebForms
     */
    private $formConfigure;
    
    /**
     * 
     * @var array
     */
    private $formFields;
    
    /**
     * 
     * @var array
     */
    private $formDatas;
    
    /**
     * 
     * @var array
     */
    private $configure;
    
	/**
     * @return the $transport
     */
    public function getTransport()
    {
        return $this->transport;
    }

	/**
     * @param \Contentinum\Model\Zend\Mail\Transport\Smtp $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }
    
	/**
     * @return the $formConfigure
     */
    public function getFormConfigure()
    {
        return $this->formConfigure;
    }

	/**
     * @param \Contentinum\Entity\WebForms $formConfigure
     */
    public function setFormConfigure($formConfigure)
    {
        $this->formConfigure = $formConfigure;
    }

	/**
     * @return the $formFields
     */
    public function getFormFields()
    {
        return $this->formFields;
    }

	/**
     * @param multitype: $formFields
     */
    public function setFormFields($formFields)
    {
        $this->formFields = $formFields;
    }

	/**
     * @return the $formDatas
     */
    public function getFormDatas()
    {
        return $this->formDatas;
    }

	/**
     * @param multitype: $formDatas
     */
    public function setFormDatas($formDatas)
    {
        $this->formDatas = $formDatas;
    }

    /**
     * @return the $configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }

	/**
     * @param multitype: $configure
     */
    public function setConfigure($configure)
    {
        $this->configure = $configure;
    }

    /**
     * Prepare and send mail
     * @return boolean
     */
	public function send()
    {
        $this->addFrom($this->configure['mailfrom'], $this->configure['mailfromname']);
        $this->addReplyTo($this->configure['mailfrom'], $this->configure['mailfromname']);
        $emailname = null;
        if (strlen($this->formConfigure->emailname) > 1){
            $emailname = $this->formConfigure->emailname;
        }
        $this->addTo($this->formConfigure->email, $emailname);
        
        if (strlen($this->formConfigure->emailcc) > 1){
            $this->addCc( explode(';', $this->formConfigure->emailcc) );
        }        
        
        $this->setSubject( $this->formConfigure->emailsubject );
        
        $emailBody = "\n";
        $emailBody .= 'Serverzeit: ' . date('d.m.Y, H:i');
        $emailBody .= "\n\n\n";
        foreach ($this->formDatas as $name => $value){
            if (isset($this->formFields[$name]['label'])){
                $emailBody .= $this->formFields[$name]['label'] . ": ";
            }
            $emailBody .= $value . "\n";
        }
        $emailBody .= "\n\n" . $this->configure['signature'];
        $this->setBody($emailBody);
        $this->transport->send($this);
        return true;
    }
    
    /**
     * 
     * @param unknown $userData
     * @param unknown $contribution
     * @param unknown $host
     * @return boolean
     */
    public function sendRecommendation($userData, $contribution, $host)
    {
        
        $template = file_get_contents(CON_ROOT_PATH . '/data/files/emailtemplates/recommendation');
        $this->addFrom($this->formDatas['sender'], $this->formDatas['name']);
        $this->addReplyTo($this->formDatas['sender'], $this->formDatas['name']);
        $emailname = null;
        if (strlen($this->formDatas['namereceiver']) > 1){
            $emailname = $this->formDatas['namereceiver'];
        }
        $this->addTo($this->formDatas['receiver'], $emailname);
        $this->setSubject('Empfehlung von ' . $this->formDatas['name']);   
        $emailBody = 'Serverzeit: ' . date('d.m.Y, H:i');
        $emailBody .= "\n\n\n";             
        $body = str_replace('{EMAIL}', $this->formDatas['sender'], $template);
        $body = str_replace('{NAME}', $this->formDatas['name'], $body);
        $body = str_replace('{NOTE}', $this->formDatas['note'], $body);
        $body = str_replace('{HOST}', $host, $body);
        $body = str_replace('{HAEDLINE}', $this->formDatas['headline'], $body);
        $body = str_replace('{LINK}', 'http://' . $host . '/' . $contribution['source'], $body);     
        $emailBody .= $body;   
        $this->setBody($emailBody);
        $this->transport->send($this);
        return true;
    }
    
}