<?php

namespace Calculator\Controller;

use Calculator\Forms\CalculatorForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class StringCalculatorController extends AbstractActionController
{

    public function indexAction()
    {
        /**
         * @var \Calculator\Services\Calculator $calculator
         */
        $result = 0.0;

        $form = new CalculatorForm("Calculate");
        $data = ['form' => $form, 'result' => $result];

        if($this->getRequest()->isPost()){
            $operation = $this->params()->fromPost('operation');
            $data['operation'] = $operation;
            $calculator = $this->getServiceLocator()->get('Calculator');
            $data['result'] = $calculator->calculateString($operation);
        }

        $session = new Container('calculator');
        if($session->result){
            $data['memory'] = $session->result;
        }

        $view =  new ViewModel($data);
        return $view;
    }

    public function storeResultAction(){
        $container = new Container('calculator');
        $result = $this->params()->fromPost('result');
        $container->result = $result;

        return $this->redirect()->toUrl("/calculator");
    }

    public function clearResultAction(){
        $container = new Container('calculator');
        $container->getManager()->getStorage()->clear('calculator');

        return $this->redirect()->toUrl("/calculator");
    }

}

