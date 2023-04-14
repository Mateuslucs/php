<?php
class BankAccount{
    public $numberAccount;
    protected $type;
    private $nameUser;
    private $balance;
    private $status;

    public function __construct($YourNameUser){
        $this->numberAccount = "".rand(10000,99999)."-".rand(0,9);
        $this->nameUser = $YourNameUser;
        $this->balance = 0;
        $this->status = false;
    }

    public function openAccount($YourType){
        $this->status = true;
        $this->type = $YourType;

        if($YourType == "CC"){
            $this->balance = 50;
        }else{
            $this->balance = 150;
        }
        
    }

    public function closeAccount(){
        if($this->status == true){
            if($this->balance > 0){
                $this->cashout($this->balance);
                $this->status = false;
                echo "<br>Your account was closed sucess !,<br> Your money will be withdraw soon";
            }else if($this->balance < 0){
                echo "Your account is in debit !<br> please, pay the debit before close account";
            }else{
                echo "Your account was closed sucess !";
            }
        }else{
            echo "your account not open";
        }
        
    }

    public function deposit($value){
        if($this->status == true){
            $this->balance += $value;
        }
        
    }

    public function cashout($value){
        if($this->status == true){
            if($value <= $this->balance){
                $this->balance -= $value;
            }
            
        }
        
    }

    public function payMonthlyFee(){
        if($this->status == true){
            if($this->type == "CC"){
                $this->balance -= 12;
            }else{
                $this->balance -= 20;
            }
        }
        
    }

    public function getNumberAccount(){
        return $this->numberAccount;
    }

    public function setNumberAccount($number){
        $this->numberAccount = $number;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($YourType){
        $this->type = $YourType;
    }

    public function getNameUser(){
        return $this->nameUser;
    }

    public function setNameUser($YourNameUser){
        $this->nameUser = $YourNameUser;
    }

    public function getBalance(){
        return $this->balance;
    }

    public function getStatus(){
        return $this->status;
    }

}
?>