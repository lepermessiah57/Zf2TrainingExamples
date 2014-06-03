<?php


namespace Application\Services;


class HundredDoors {

    private $doors;

    public function __construct($doors) {
        $this->doors = $doors;
    }

    public function getDoors() {
        return $this->doors;
    }
} 