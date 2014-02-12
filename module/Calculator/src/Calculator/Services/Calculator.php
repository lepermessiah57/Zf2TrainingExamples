<?php

namespace Calculator\Services;

class Calculator {

    public function calculateString($operation){
        $operationArray = explode(" " , $operation);
        $operandA = $operationArray[0];
        $operandB = $operationArray[2];
        $operator = $operationArray[1];

        $method = $this->determineCalculationMethod($operator);

        return $this->$method($operandA, $operandB);
    }

    private function addMethod($a, $b){
        return $a + $b;
    }

    private function subtractMethod($a, $b){
        return $a - $b;
    }

    private function multiplyMethod($a, $b){
        return $a * $b;
    }

    private function divideMethod($a, $b){
        return $a / $b;
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