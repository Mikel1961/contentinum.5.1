<?php




namespace Contentinum\Service\Mail;





use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;


class TransportServiceFactory implements FactoryInterface
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $transport = new Smtp();
        $transport->setOptions( new SmtpOptions($config['mail']['transport']['options']));
        return $transport;
        
    }
}