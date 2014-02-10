<?php

namespace Application\Controller;

use Application\Models\Card;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CardController  extends AbstractActionController{

    public function showCardsAction(){
        $suits = ['Spade','Club','Diamond','Heart'];
        $values = ['Ace','2','3','4','5','6','7','8','9','10','Jack','Queen','King'];
        $cards = [];
        foreach($suits as $suit){
            foreach($values as $value){
                $cards[] = new Card($suit, $value);
            }
        }

        $viewModel = new ViewModel(['cards' => $cards]);
        return $viewModel;
    }

    public function showCardAction(){
        $value = $this->params()->fromRoute('value', 0);
        $values = ['Spade','Club','Diamond','Heart'];

        $card = new Card($values[array_rand($values, 1)], $value);

        return new ViewModel(['card'=>$card]);

    }

    public function fooAction(){
        die("hello");
    }


} 