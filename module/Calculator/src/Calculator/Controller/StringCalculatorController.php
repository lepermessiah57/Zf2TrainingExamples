<?php

namespace Calculator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StringCalculatorController extends AbstractActionController
{

    public function indexAction()
    {
        /**
         * @var \Calculator\Services\Calculator $calculator
         */
        $result = 0.0;

        if($this->getRequest()->isPost()){
            $operation = $this->params()->fromPost('operation');
            $calculator = $this->getServiceLocator()->get('Calculator');
            $result = $calculator->calculateString($operation);
        }
        return new ViewModel(['result'=>$result, 'operation' => $operation]);
    }

    public function CalculateAction()
    {
        return new ViewModel();
    }


}

