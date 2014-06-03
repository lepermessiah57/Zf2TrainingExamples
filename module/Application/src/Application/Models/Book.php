<?php


namespace Application\Models;


class Book {

    private $pages;
    private $words;
    private $cover;
    private $title;
    private $author;

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setCover($cover) {
        $this->cover = $cover;
    }

    public function getCover() {
        return $this->cover;
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

    public function setWords($words) {
        $this->words = $words;
    }

    public function getWords() {
        return $this->words;
    }
} 