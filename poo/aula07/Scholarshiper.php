<?php
require_once 'Student.php';

class Scholarshiper extends Student
{
    private $scholarship;

    public function renovateScholarship(){

    }

    public function payTuition()
    {
        
    }

    public function getScholarship()
    {
        return $this->scholarship;
    }

    public function setScholarship($scholarship)
    {
        $this->scholarship = $scholarship;

        return $this;
    }
}
