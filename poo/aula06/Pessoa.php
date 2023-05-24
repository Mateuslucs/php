<?php

class Peple{
    private $nome;
    private $years;
    private $sex;

    public function birthday()
    {
        $this->years++;
    }


    
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    
    public function getYears()
    {
        return $this->years;
    }

     
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    
    public function getSex()
    {
        return $this->sex;
    }

   
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }
}


?>