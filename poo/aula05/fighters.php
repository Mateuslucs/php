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
        $this->victories = $victories;
        $this->defeat = $defeat;
        $this->stalemate = $stalemate;
    }

    public function present(){
        echo "Lutador: ".$this->name;
        echo "<br>Origem: ".$this->nationality;
        echo "<br>".$this->yearOld." anos";
        echo "<br>".$this->height." m de altura";
        echo "<br>Pesando: ".$this->weight." Kg";
        echo "<br>Ganhou: ".$this->victories;
        echo "<br>Perdeu: ".$this->defeat;
        echo "<br>Empatou: ".$this->stalemate;
    }
    public function status(){
        echo $this->name;
        echo "<br>É um peso: ".$this->category;
        echo "<br>".$this->victories." vitorias";
        echo "<br>".$this->defeat." derrotas";
        echo "<br>".$this->stalemate."empates";
    }
    public function winFight(){
        $this->setVictories($this->victories + 1);
    }
    public function loseFight(){
        $this->setDefeat($this->defeat + 1);
    }
    public function stalemateFight(){
        $this->setStalemate($this->stalemate + 1);
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