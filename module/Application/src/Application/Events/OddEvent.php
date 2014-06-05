<?php


namespace Application\Events;
use Zend\Mvc\MvcEvent;

class OddEvent {

    public function echoOddSeconds($event){
        /** @var $event  \Zend\Mvc\MvcEvent */

        if(!$event->getController() instanceof \Application\Controller\DoorController){
            return;
        }
        $date = new \DateTime();
        echo $date->format('h:i:s') . "<br/>";

    }

}