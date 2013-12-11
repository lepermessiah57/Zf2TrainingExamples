<?php

namespace Application\Services;


use Application\Models\User;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserRegistration implements ServiceLocatorAwareInterface{
    private $service_locator;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->service_locator = $serviceLocator;
    }

    public function getServiceLocator() {
        return $this->service_locator;
    }


    public function registerUser($username, $password, $email, $name){
        $user = new User();
        $hydrator = new ClassMethods();
        $hydrator->hydrate([$username, $password, $email, $name], $user);
        return $this->getServiceLocator()->get('DataBaseManager')->insert($user);
    }

}