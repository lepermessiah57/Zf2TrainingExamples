<?php

namespace Application\Event;

use Zend\Mvc\MvcEvent;

class MyEvent {
	
	public function handleEvent($event){
		$event->getViewModel()->setTemplate('/error/exception.phtml');
	}
}