<?php


namespace Application\Controller;


use Application\Models\Door;
use Zend\Mvc\Controller\AbstractActionController;

class DoorController extends AbstractActionController {

    public function switchDoorsAction(){
        $request = $this->getRequest();
        $doors = [];
        if($request->isPost()){
            $post = $request->getPost();

            $number = $post->get('doorStateIndex');

            $doorOpener = $this->serviceLocator->get('DoorOpener');

            $doors = $doorOpener->switchDoors($number);
        }
        return ['doors'=>$doors];
    }
} 