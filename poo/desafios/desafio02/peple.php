<?php
class Peple {
    private string $name;
    private int $yearOld;
    private string $sex;

    public function __construct($name, $yearOld, $sex){
        $this->setName($name);
        $this->setYearOld($yearOld);
        $this->setSex($sex);
    }

    public function haveBirthday(){
        $this->yearOld += 1;
        echo "<p>------------------------------------------</p>";
        echo "<p>Happy birthday to you !!, ".$this->getYearOld()." years</p>";
        echo "<p>------------------------------------------</p>";
    }

    private function setName($name){
        $this->name = $name;
    }
    
    private function setYearOld($yearOld){
        $this->yearOld = $yearOld;
    }
    
    private function setSex($sex){
        $this->sex = $sex;
    }

    public function getName(){
        return $this->name;
    }
    
    public function getYearOld(){
        return $this->yearOld;
    }
    
    public function getSex(){
        return $this->sex;
    }
}

?>