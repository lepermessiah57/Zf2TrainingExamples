<?php

namespace Application\Models;

class Card {
    private $value;
    private $suit;

    function __construct($suit, $value) {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function setSuit($suit) {
        $this->suit = $suit;
    }

    public function getSuit() {
        return $this->suit;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}