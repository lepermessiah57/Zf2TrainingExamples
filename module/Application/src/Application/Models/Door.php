<?php


namespace Application\Models;


class Door {

    private $state = false;

    public function switchState(){
        $this->state = !$this->state;
    }

    public function isOpen(){
        return $this->state;
    }

    public function isClosed(){
        return !$this->isOpen();
    }

    public function printState(){
        $closed = '[X]';
        $open = '[ ]';

        return $this->isOpen() ? $open : $closed;
    }
} 