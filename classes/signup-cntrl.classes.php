<?php

class SignupContr extends Signup{

    private $username;
    private $pwd;
    private $pwdConfirm;
    private $email;
    private $address;
    private $contactNum;

    public function __construct($username, $pwd, $pwdConfirm, $email, $address, $contactNum){
        $this ->username = $username;
        $this ->pwd = $pwd;
        $this ->pwdConfirm = $pwdConfirm;
        $this ->email = $email;
        $this ->address = $address;
        $this ->contactNum = $contactNum;
        
    }

    public function signupUser(){
        if($this->emptyInput() == false) 
        {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidName() == false) 
        {
            header("location: ../index.php?error=name");
            exit();
        }
        if($this->invalidEmail() == false) 
        {
            header("location: ../index.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() == false) 
        {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false) 
        {
            header("location: ../index.php?error=emailalreadyused");
            exit();
        }

        $this->setUser($this ->username,  $this ->pwd,  $this ->pwdConfirm,  $this ->email, $this ->address,  $this ->contactNum );
    }

    private function emptyInput(){
        $result;
        if(empty( $this ->username) || empty( $this ->pwd) || empty($this ->pwdConfirm) || empty( $this ->email) || empty(  $this ->address) || empty($this ->contactNum) ) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidName(){
        $result;
        if(preg_match("/^[a-zA-Z0-9]*$/", $this ->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if (!filter_var($this ->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    
    private function pwdMatch() {
        $result;
        if ($this ->pwd !== $this ->pwdConfirm) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    
    
    private function uidTakenCheck() {
        return $this->checkUser($this->email);
    }

    public function fetchCustomerId($username){
        $customerId = $this->getCustomerId($username);
        return $customerId[0]["customer_id"];
    }
}