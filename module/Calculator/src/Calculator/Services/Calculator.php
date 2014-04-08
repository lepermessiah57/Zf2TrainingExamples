<?php

namespace Calculator\Services;

use AopLogger\Annotation\DebugMethod;

class Calculator {

    /**
     * @DebugMethod
     */
    public function calculateString($operation){
        $operationArray = explode(" " , $operation);
        $operandA = $operationArray[0];
        $operandB = $operationArray[2];
        $operator = $operationArray[1];

        $operationClass = $this->determineCalculationClass($operator);
        return $operationClass->execute($operandA, $operandB);
    }

    private function determineCalculationClass($operator){
        $availableOperationClasses = [
            '+' => 'Calculator\Services\AddOperation',
            'plus' => 'Calculator\Services\AddOperation',
            '*' => 'Calculator\Services\MultiplyOperation',
            '-' => 'Calculator\Services\SubtractOperation',
            '/' => 'Calculator\Services\DivideOperation'
        ];
        $class = $availableOperationClasses[$operator];
        return new $class();
    }
}