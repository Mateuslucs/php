<?php
require_once 'Pessoa.php';
class Aluno extends Peple
{
    private $registration;
    private $course;

    public function cancelRegistration()
    {
        echo "<p>Registration will be</p>";
    }

   
    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }
   
    public function getRegistration()
    {
        return $this->registration;
    }

    public function setRegistration($registration)
    {
        $this->registration = $registration;

        return $this;
    }
}
