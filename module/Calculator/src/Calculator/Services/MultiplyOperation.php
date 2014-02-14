<?php


namespace Calculator\Services;


class MultiplyOperation implements Operation{

    public function execute($a, $b) {
        return $a * $b;
    }
}