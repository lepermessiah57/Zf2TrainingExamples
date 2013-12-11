<?php

namespace Application\Controller;

use Application\Models\Book;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class BookRestController extends AbstractRestfulController{

    public function get($id) {
        $book = new Book();
        if($id == 1){
            $book->setAuthor('Michael Crichton');
            $book->setTitle('Jurassic Park');
            $book->setPages(464);
        }else{
            $book->setAuthor('Unknown');
            $book->setTitle('none');
            $book->setPages(0);
        }

        return new JsonModel(array($book->toJson()));
    }

} 