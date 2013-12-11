<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class HelloWorldController extends AbstractActionController
{
    public function helloWorldAction()
    {
        return array();
    }
    
    public function helloMyNameIsAction(){
    	$name = $this->params()->fromRoute('name');
    	return array('name'=>$name);
    }

    public function helloAction(){
    	$query = $this->getRequest()->getQuery();
    	$name = $query->get('name');

        $data = array('name'=>$name);

        $model = new ViewModel($data);
        $model->setTemplate('/application/hello-world/hello-my-name-is.phtml');
    	return $model;
    }

    public function helloJsonAction(){
        $post = $this->getRequest()->getPost();
        $name = $post->get('name');

        $data = array('name'=>$name);

        $model = new JsonModel($data);
        return $model;
    }
}
