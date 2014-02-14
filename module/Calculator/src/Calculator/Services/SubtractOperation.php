<?php

namespace Calculator\Services;

class SubtractOperation implements Operation {

    public function execute($a, $b) {
        return $a - $b;
    }
}