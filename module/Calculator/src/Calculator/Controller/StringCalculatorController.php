<?php

namespace Calculator\Controller;

use Calculator\Forms\CalculatorForm;
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

        $form = new CalculatorForm("Calculate");

        if($this->getRequest()->isPost()){
            $operation = $this->params()->fromPost('operation');
            $calculator = $this->getServiceLocator()->get('Calculator');
            $result = $calculator->calculateString($operation);
        }
        return new ViewModel(['form'=>$form, 'result'=>$result, 'operation' => $operation]);
    }

    public function CalculateAction()
    {
        return new ViewModel();
    }


}

