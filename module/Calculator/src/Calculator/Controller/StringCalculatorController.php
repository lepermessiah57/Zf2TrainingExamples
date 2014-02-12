<?php

namespace Calculator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StringCalculatorController extends AbstractActionController
{

    public function indexAction()
    {
        $result = 0.0;

        if($this->getRequest()->isPost()){
            $operation = $this->params()->fromPost('operation');
            $operationArray = explode(" " , $operation);
            $operandA = $operationArray[0];
            $operandB = $operationArray[2];
            $operator = $operationArray[1];

            switch ($operator) {
                case "+" :
                    $result = $operandA + $operandB;
                    break;
                case "-" :
                    $result = $operandA - $operandB;
                    break;
                case "/" :
                    $result = $operandA / $operandB;
                    break;
                case "*" :
                    $result = $operandA * $operandB;
                    break;
                case "%" :
                    $result = $operandA % $operandB;
                    break;
                default:
                    throw new \Exception('Stop breaking');
            }
        }
        return new ViewModel(['result'=>$result, 'operation' => $operation]);
    }

    public function CalculateAction()
    {
        return new ViewModel();
    }


}

