<?php




namespace Contentinum\Service\Mail;





use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Contentinum\Model\Sendmail;



class SendmailServiceFactory implements FactoryInterface
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mail = new Sendmail();
        $mail->setTransport($serviceLocator->get('Contentinum\Smtp\Transport'));
        return $mail;
    }
}