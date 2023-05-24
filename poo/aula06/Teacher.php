<?php
require_once 'Pessoa.php';
class Teacher extends Peple
{
    private $specialty;
    private $wage;

    public function receiveWage($increase)
    {
        $this->wage += $increase;
    }
 
    public function getSpecialty()
    {
        return $this->specialty;
    }

    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getWage()
    {
        return $this->wage;
    }

    public function setWage($wage)
    {
        $this->wage = $wage;

        return $this;
    }
}
