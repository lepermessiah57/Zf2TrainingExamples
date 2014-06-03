<?php


namespace Application\Controller;


use Application\Models\Book;
use Zend\Mvc\Controller\AbstractActionController;

class BookController extends AbstractActionController{

    public function getFavoriteBookAction(){
        $book = new Book();
        $book->setAuthor('Michael Crichton');
        $book->setCover('Torn off');
        $book->setPages(492);
        $book->setTitle('Jurassic Park');
        $book->setWords('many');

        return array('favorite' => $book);
    }

} 