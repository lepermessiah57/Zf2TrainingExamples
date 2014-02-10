<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HelloWorldController extends AbstractActionController
{
    public function helloWorldAction()
    {
        return array();
    }
    
    public function helloMyNameIsAction(){
    	$name = $this->params()->fromRoute('name', 'Default');
    	return array('name'=>$name);
    }
}
