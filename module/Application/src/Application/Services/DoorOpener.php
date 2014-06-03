<?php


namespace Application\Services;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoorOpener implements ServiceLocatorAwareInterface {

    private $serviceLocator;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function switchDoors($number){
        $hundredDoors = $this->getServiceLocator()->get('HundredDoors');
        $doors = $hundredDoors->getDoors();
        for($i = 1; $i <= $number; $i++){
            foreach($doors as $index=>$door){
                if(($index+1) % $i == 0){
                    $door->switchState();
                }
            }
        }
        return $doors;
    }
}