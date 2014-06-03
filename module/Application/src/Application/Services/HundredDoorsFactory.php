<?php


namespace Application\Services;


use Application\Models\Door;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class HundredDoorsFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $doors = $this->createDoors();
        return new HundredDoors($doors);
    }

    private function createDoors() {
        $doors = [];

        for ($i = 0; $i < 100; $i++) {
            $doors[] = new Door();
        }
        return $doors;
    }
}