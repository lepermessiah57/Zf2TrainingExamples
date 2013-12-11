<?php

namespace Application\DataAccess;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DataBaseManagerFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $connection = $serviceLocator->get('connection');
        return new DataBaseManager($connection);
    }

} 