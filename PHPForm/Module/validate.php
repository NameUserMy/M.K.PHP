<?php

class Validate
{
    private $patertMail = "/[a-zA-Z0-9._%±]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/";
    private $paternPass = "/[a-zA-Z0-9._%±-]{5,10}$/";
    private $paternLogin = "/[a-zA-Z]{5,10}$/";

    public $mailMessage="";
    public $passMessage="";
    public $loginMessage="";

    function Isgood($mail,$login,$pass){
        if(preg_match($this->patertMail, $mail) && preg_match($this->paternLogin, $login) && preg_match($this->paternPass, $pass))
        return true;
        else
        $this->Message($mail,$login,$pass);
        return false;
    }

    private function Message($mail,$login,$pass){

        $this->mailMessage=(preg_match($this->patertMail, $mail))? "":"email@example.com";
        $this->passMessage=(preg_match($this->paternPass, $pass))? "":"min 5 simbol max 10";
       $this->loginMessage=(preg_match($this->paternLogin, $login))? "":"min 5 simbol max 10";


    }
};

?>
