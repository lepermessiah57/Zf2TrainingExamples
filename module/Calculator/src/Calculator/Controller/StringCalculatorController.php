<?php

namespace Calculator\Controller;

use Calculator\Forms\CalculatorForm;
use Zend\Console\Request;
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
            $data['result'] = $this->calculateOperation($operation);
        }

        $session = new Container('calculator');
        if($session->result){
            $data['memory'] = $session->result;
        }

        return $data;
    }

    public function storeResultAction(){
        $container = new Container('calculator');
        $result = $this->params()->fromPost('result');
        $container->result = $result;

        return $this->redirect()->toRoute("home");
    }

    public function clearResultAction(){
        $container = new Container('calculator');
        $container->getManager()->getStorage()->clear('calculator');

        return $this->redirect()->toUrl("/calculator");
    }

    public function consoleCalculateAction(){
        /**
         * @var \Zend\Console\Request $request
         */
        $request = $this->getRequest();
        $operation = $request->getParam('operation');
        return $this->calculateOperation($operation) . "\n";
    }

    private function calculateOperation($operation) {
        $calculator = $this->getServiceLocator()->get('Calculator');
        return $calculator->calculateString($operation);
    }

}

