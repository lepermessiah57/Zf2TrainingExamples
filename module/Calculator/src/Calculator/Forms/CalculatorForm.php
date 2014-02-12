<?php

namespace Calculator\Forms;

use Zend\Form\Element\Submit;
use Zend\Form\Form;
use \Zend\Form\Element\Text;

class CalculatorForm extends Form{

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        $this->addElements();
    }

    private function addElements() {
        $text = new Text();
        $text->setName('operation');
        $text->setOptions(['required'=>true]);
        $this->add($text);

        $button = new Submit();
        $button->setValue("Calculate");
        $button->setName("submit");
        $this->add($button);
    }


} 