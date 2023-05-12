<?php
require_once 'peple.php';
require_once 'publictaion.php';
class Book implements Publication {
    private string $title;
    private string $author;
    private int $totalPages;
    private int $currentPage;
    private bool $open;
    private $reader;

    public function __construct($title, $author, $totalPages,$reader)
    {
        $this->title = $title;
        $this->author = $author;
        $this->totalPages = $totalPages;
        $this->currentPage = 0;
        $this->open = false;
        $this->reader = $reader;
    }

    public function details(){
        echo"
        <h3>-----------------------------------------------</h3>
        <p>Book title: ".$this->getTitle()."</p>
        <p>Author: ".$this->getAuthor()."</p>
        <p>Total pages: ".$this->getTotalPages()."</p>
        <p>Current page: ".$this->getCurrentPage()."</p>
        <p>Reader: ".$this->reader->getName()."</p>
        <h3>-----------------------------------------------</h3>
        ";
    }

    private function setTitle($title){
        $this->title = $title; 
    }
    private function setAuthor($author){
        $this->author = $author;
    }
    private function setTotalPages($totalPages){
        $this->totalPages = $totalPages;
    }
    private function setCurrentPage($currentPage){
        $this->currentPage = $currentPage;
    }
    private function setOpen($open){
        $this->open = $open;
    }
    private function setReader($reader){
        $this->reader = $reader;
    }


    public function getTitle(){
        return $this->title; 
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getTotalPages(){
        return $this->totalPages;
    }
    public function getCurrentPage(){
        return $this->currentPage;
    }
    public function getOpen(){
        return $this->open;
    }
    public function getReader(){
        return $this->reader;
    }

    public function open(){
        $this->open = true;
    }
    public function close(){
        $this->open = false;
    }
    public function leafThrough($page){
        if($page > $this->totalPages){
            $this->currentPage = 0;
        }else{
            $this->currentPage = $page;
        }
    }
    public function advancePage(){
        if($this->totalPages > $this->currentPage){

            $this->currentPage++;
        }
    }
    public function backPage(){
        $this->currentPage--;
    }

}

?>