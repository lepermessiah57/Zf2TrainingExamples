<?php

namespace Application\Services;


class UserLookupService {
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function lookupUser($id){
        return $this->database->get($id);
    }
} 