<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class UserController extends AbstractActionController{

    public function registerUserAction(){
        $user_registration = $this->serviceLocator->get('UserRegistration');
        $post = $this->getRequest()->getPost();
        $username = $post->get('username');
        $password = $post->get('password');
        $email = $post->get('email');
        $name = $post->get('name');
        $user_id = $user_registration->registerUser($username, $password, $email, $name);

        return new JsonModel(['user'=>$user_id]);
    }

    public function indexAction(){
        return array();
    }

    public function lookupAction(){
        $user_lookup_service = $this->serviceLocator->get('UserLookupService');
        $query = $this->getRequest()->getQuery();
        $user_id = $query['user_id'];
        $user = $user_lookup_service->lookupUser($user_id);

        return new JsonModel(['user'=>$user]);
    }
} 