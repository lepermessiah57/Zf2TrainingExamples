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

            $doors = $this->switchDoors($number);
        }
        return ['doors'=>$doors];
    }

    private function switchDoors($number){
        $doors = $this->createDoors();
        for($i = 1; $i <= $number; $i++){
            foreach($doors as $index=>$door){
                if(($index+1) % $i == 0){
                    $door->switchState();
                }
            }
        }
        return $doors;
    }

    private function createDoors(){
        $doors = [];

        for($i = 0; $i < 100; $i++){
            $doors[] = new Door();
        }
        return $doors;
    }
} 