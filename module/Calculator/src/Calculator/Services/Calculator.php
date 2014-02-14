<?php

namespace Calculator\Services;

class Calculator {

    public function calculateString($operation){
        $operationArray = explode(" " , $operation);
        $operandA = $operationArray[0];
        $operandB = $operationArray[2];
        $operator = $operationArray[1];

        $operationClass = $this->determineCalculationClass($operator);
        if($operationClass){
            return $operationClass->execute($operandA, $operandB);
        }

        $method = $this->determineCalculationMethod($operator);

        return $this->$method($operandA, $operandB);
    }

    private function addMethod($a, $b){
        $operation = new AddOperation();
        return $operation->execute($a, $b);
    }

    private function subtractMethod($a, $b){
        $operation = new SubtractOperation();
        return $operation->execute($a, $b);
    }

    private function multiplyMethod($a, $b){
        return $a * $b;
    }

    private function divideMethod($a, $b){
        return $a / $b;
    }

    private function determineCalculationClass($operator){
        $availableOperationClasses = [
            '+' => 'Calculator\Services\AddOperation',
            'plus' => 'Calculator\Services\AddOperation'
        ];
        if(!in_array($operator, $availableOperationClasses)) return;
        $class = $availableOperationClasses[$operator];
        return new $class();
    }

    private function determineCalculationMethod($operator) {

        $availableOperations = ["+" => "addMethod",
            "plus" => "addMethod",
            "-" => "subtractMethod",
            "/" => "divideMethod",
            "*" => "multiplyMethod"];

        $method = $availableOperations[$operator];
        if (!$method) throw new \Exception("Operation not allowed");
        return $method;
    }
}