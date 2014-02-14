<?php

namespace Calculator\Services;

class AddOperation implements Operation {

    public function execute($a, $b){
        return $a + $b;
    }

} 