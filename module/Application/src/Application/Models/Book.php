<?php

namespace Application\Models;

class Book {
    private $author;
    private $title;
    private $pages;

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function getPages() {
        return $this->pages;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function toJson(){
        return ['author' => $this->getAuthor(), 'title'=>$this->getTitle(), 'pages' => $this->getPages()];
    }


} 