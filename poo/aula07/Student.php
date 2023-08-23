<?php
require_once 'People.php';

class Student extends People
{
    private $registration;
    private $course;

    public function payTuition(){
        
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

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }
}
