<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function otherAction(){
    	echo "I'm here!!!";
    }

    public function flashMessangerAction(){
    	$flash = $this->flashMessenger();
    	$flash->addMessage('foo');
    	echo "messages";
    	var_dump($flash->getMessages());
    	echo "<br />";
    	$flash->clearMessages();
    	echo "clear";
    	var_dump($flash->getMessages());
    	die();
    }

    public function forwardAction(){
    	$data = $this->forward()->dispatch('index',array('action'=>'other'));
    	var_dump($data);
    	var_dump("this is the other data...");
    	die();
    }

    public function paramsAction(){
    	$request = $this->getRequest();
    	$post = $request->getPost();
    	$query = $request->getQuery();
    	$route = $request->getRoute();

    	$foo = $post['foo'];
    	$foo = $query['foo'];

    	$post = $this->params()->fromPost();
    	$query = $this->params()->fromQuery();
    	$route = $this->params()->fromRoute();

    	$foo = $this->params()->fromPost('foo');
    	$foo = $this->params()->fromQuery('foo');
    	die();
    }

    public function redirectAction(){
    	return $redirect = $this->redirect()->toUrl('/application/index/other');
    }
}

