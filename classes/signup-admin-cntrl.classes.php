<?php

class SignupContrAdmin extends Signup{

    private $username;
    private $pwd;
    private $email;
    private $userLevel;
    private $contactNum;

    public function __construct($username, $email, $pwd, $userLevel, $contactNum){
        $this ->username = $username;
        $this ->pwd = $pwd;
        $this ->email = $email;
        $this ->userLevel = $userLevel;
        $this ->contactNum = $contactNum;
        
    }

    public function signupAdmin(){
        if($this->emptyInput() == false) 
        {
            header("location: ../adminAccount.php?error=emptyinput");
            exit();
        }
        if($this->invalidName() == false) 
        {
            header("location: ../adminAccount.php?error=invalidname");
            exit();
        }
        if($this->invalidEmail() == false) 
        {
            header("location: ../adminAccount.php?error=invalidemail");
            exit();
        }
        // if($this->pwdMatch() == false) 
        // {
        //     header("location: ../adminAccount.php?error=passwordmatch");
        //     exit();
        // }
        if($this->uidTakenCheck() == false) 
        {
            header("location: ../adminAccount.php?error=usernameoremailtaken");
            exit();
        }

        $this->setAdmin($this ->username, $this ->email,   $this ->pwd, $this ->userLevel,  $this ->contactNum );
    }

    private function emptyInput(){
        $result;
        if(empty( $this ->username) || empty( $this ->pwd) || empty( $this ->email) || empty($this ->contactNum) ) 
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
    
    // private function pwdMatch() {
    //     $result;
    //     if ($this ->pwd !== $this ->pwdConfirm) {
    //         $result = false;
    //     }
    //     else {
    //         $result = true;
    //     }
    //     return $result;
    // }
    
    private function uidTakenCheck() {
        $result;
        if (!$this->checkAdmin(!$this ->username, $this ->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
     }
}