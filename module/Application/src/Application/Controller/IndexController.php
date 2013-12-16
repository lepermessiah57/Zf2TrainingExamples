<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mail\Message;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function sendEmailAction(){
        $smtp = $this->serviceLocator->get('Transport');
        $message = new Message();
        $message->setTo(''); //PUT TO HERE
        $message->setFrom('mrc.tester@gmail.com');
        $message->setSubject('Foo');
        $message->setBody('bar');
        $smtp->send($message);
        die();
    }
}
