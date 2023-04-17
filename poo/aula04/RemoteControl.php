<?php
require_once "controller.php";
class RemoteControl implements Controller {
    private $volume;
    private $power;
    private $playing;

    public function __construct(){
        $this->volume = 50;
        $this->power = false;
        $this->playing = false;
    }

    private function getVolume(){
        return $this->volume;
    }

    private function getPower(){
        return $this->power;
    }

    private function getPlaying(){
        return $this->playing;
    }

    private function setVolume($volume){
        $this->volume = $volume;
    }

    private function setPower($power){
        $this->power = $power;
    }

    private function setPlaying($playing){
        $this->playing = $playing;
    }

    public function powerOn(){
        $this->power = true;
    }
    public function powerOff(){
        $this->power = false;
    }
    public function openMenu(){
        echo "<br>Is it on?: " . ($this->power?"YES":"NO");
        echo "<br>Is it Playing?: " . ($this->playing?"YES":"NO");
        echo "<br>Volume: " . $this->volume;
        for($i=0; $i <= $this->volume; $i+=10){
            echo "|";
        }
        echo "<br>";
    }
    public function closeMenu(){
        echo "closing the menu ...";
    }
    public function moreVolume(){
        if($this->power){
            $this->setVolume($this->volume + 5);
        }
    }
    public function lessVolume(){
        if($this->power){
            $this->setVolume($this->volume - 5);
        }
    }
    public function muteOn(){
        if($this->power && $this->volume > 0){
            $this->setVolume(0);
        }
    }
    public function muteOff(){
        if($this->power && $this->volume == 0){
            $this->setVolume(50);
        }
    }
    public function play(){
        if($this->power && !($this->playing)){
            $this->setPlaying(true);
        }
    }
    public function pause(){
        if($this->power && $this->playing){
            $this->setPlaying(false);
        }
    }
}
?>