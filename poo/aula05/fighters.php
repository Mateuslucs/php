<?php
class Fighters {
    private $name;
    private $nationality;
    private $yearOld;
    private $height;
    private $weight;
    private $category;
    private $victories;
    private $defeat;
    private $stalemate;

    public function __construct($name, $nationality, int $yearOld, float $height, float $weight, int $victories, int $defeat, int $stalemate){
        $this->name = $name;
        $this->nationality = $nationality;
        $this->yearOld = $yearOld;
        $this->height = $height;
        $this->setWeight($weight);

    }

    public function present(){

    }
    public function status(){

    }
    public function winFight(){

    }
    public function loseFight(){

    }
    public function stalemateFight(){

    }

    private function setName($name){
        $this->name = $name;
    }
    private function setNationality($nationality){
        $this->nationality = $nationality;
    }
    private function setYearOld($yearOld){
        $this->yearOld = $yearOld;
    }
    private function setHeight($height){
        $this->height = $height;
    }
    private function setWeight($weight){
        $this->weight = $weight;
        $this->setCategory();
    }
    private function setCategory(){
        if($this->weight < 52.2){
            $this->category = "Invalid";
        }else if($this->weight <= 70.3){
            $this->category = "Lightweight";
        }else if($this->weight <= 83.9){
            $this->category = "Middleweight";
        }else if($this->weight <= 120.2){
            $this->category = "Heavyweight";
        }else{
            $this->category = "Invalid";
        }
        
    }
    private function setVictories($victories){
        $this->victories = $victories;
    }
    private function setDefeat($defeat){
        $this->defeat = $defeat;
    }
    private function setStalemate($stalemate){
        $this->$stalemate = $stalemate;
    }
}

?>