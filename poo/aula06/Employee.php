<?php
require_once 'Pessoa.php';

class Employee extends People
{
    private $sector;
    private $working;

    public function changeWork()
    {
        $this->working = ! $this->working;
    }

    public function getSector()
    {
        return $this->sector;
    }

    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    public function getWorking()
    {
        return $this->working;
    }

    public function setWorking($working)
    {
        $this->working = $working;

        return $this;
    }
}

