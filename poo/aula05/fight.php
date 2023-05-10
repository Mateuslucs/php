<?php
require_once 'fighters.php';
class Fight {
    private $challenged;
    private $challenger;
    private $rounds;
    private $approved;

    public function markFight($fighter1, $fighter2){
        if($fighter1->getCategory() === $fighter2->getCategory() && ($fighter1 != $fighter2)){
            $this->approved = true;
            $this->challenged = $fighter1;
            $this->challenger = $fighter2;
        }else{
            $this->approved = false;
            $this->challenged = null;
            $this->challenger = null;
        }
    }
    public function fight(){
        if($this->approved){
            $this->challenged->present();
            $this->challenger->present();
            $winner = rand(0,2);
            switch($winner){
                case 0: //Empate
                    echo "<p>Empate!<p>";
                    $this->challenged->stalemateFight();
                    $this->challenger->stalemateFight();
                    break;
                case 1:
                    echo "<p>".$this->challenged->getName()." venceu a luta<p>";
                    $this->challenged->winFight();
                    $this->challenger->loseFight();
                    break;
                case 2:
                    echo "<p>".$this->challenger->getName()." venceu a luta<p>";
                    $this->challenger->winFight();
                    $this->challenged->loseFight();
                    break;
            }
        }else{
            echo "<p>fight can't happen<p>";
        }
    }
}
?>