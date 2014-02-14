<?php


namespace Calculator\Services;


class DivideOperation implements Operation {

    public function execute($a, $b) {
        return $a / $b;
    }
}