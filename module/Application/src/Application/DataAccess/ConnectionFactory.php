<?php

namespace Application\DataAccess;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ConnectionFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new Connection($config['connection_string']);
    }
}