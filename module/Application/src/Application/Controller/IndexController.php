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
use Zend\View\Model\JsonModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addSessionAction(){
		$request = $this->getRequest()->getPost();
		$key = $request->get('key');
		$value = $request->get('value');
		$container = new Container('controller');
		$container->$key = $value;
		return $this->redirect()->toRoute('view');
    }

    public function dumpSessionAction(){
    	$data = array();
    	$container = new Container('controller');
    	foreach($container as $key => $value){
    		$data[$key] = $value;
    	}
    	return new ViewModel(array('data'=>$data));
    }

    public function clearSessionAction(){
    	$container = new Container('controller');
    	$container->getManager()->getStorage()->clear('controller');
    	return $this->redirect()->toRoute('view');
    }
}
