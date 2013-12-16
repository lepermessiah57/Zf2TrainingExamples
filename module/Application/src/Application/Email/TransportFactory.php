<?php

namespace Application\Email;

use Zend\Mail\Transport\Smtp;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TransportFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');

        return new Smtp($config['email']['SmtpOptions']);

    }

} 