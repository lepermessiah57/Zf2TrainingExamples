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
use Zend\Mime\Mime;
use Zend\Mime\Part;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function sendSimpleEmailAction(){
        $smtp = $this->serviceLocator->get('Transport');
        $message = $this->generateMessage();
        $message->setBody('bar');
        $smtp->send($message);
        die();
    }

    public function sendSimpleEmailWithAttachmentAction(){
        $contents = "This is a file";
        $smtp = $this->serviceLocator->get('Transport');

        $attachment = new Part($contents);
        $attachment->type = "text/plain";
        $attachment->disposition = Mime::DISPOSITION_ATTACHMENT;
        $attachment->filename = "bar.txt";

        $text = new Part('bar');
        $text->type = Mime::TYPE_TEXT;

        $mimeMessage = new \Zend\Mime\Message();
        $mimeMessage->setParts([$text, $attachment]);

        $message = $this->generateMessage();
        $message->setBody($mimeMessage);
        $smtp->send($message);
        die();
    }

    public function sendHtmlEmailAction(){
        $smtp = $this->serviceLocator->get('Transport');
        $contents = '<html><head></head><body><table><tr><td style="color:red">Hello</td><td>Html Email</td></tr></table></body>';
        $html = new Part($contents);
        $html->type = Mime::TYPE_HTML;

        $mimeMessage = new \Zend\Mime\Message();
        $mimeMessage->setParts([$html]);

        $message = $this->generateMessage();
        $message->setBody($mimeMessage);
        $smtp->send($message);
        die();
    }

    /**
     * @return Message
     */
    public function generateMessage() {
        $message = new Message();
        $message->setTo(''); //PUT TO HERE
        $message->setFrom('mrc.tester@gmail.com');
        $message->setSubject('Foo');
        return $message;
    }

    //TODO: send html email

}
