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

    public function consoleAction(){
    	return "This is the console route!\n";
    }

    public function consoleWithFlagsAndParametersAction(){
    	$request = $this->getRequest();

    	if(!$request instanceof \Zend\Console\Request){
    		throw new \Exception('This is only a console request');
    	}
    	$email = $request->getParam('email');
    	$flag = $request->getParam('verbose');

    	if($flag){
    		return "An email has been sent to ${email}\n";
    	}else{
    		return "Email sent \n";
    	}
    }
}
