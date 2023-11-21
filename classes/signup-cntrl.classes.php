<?php

class SignupContr extends Signup{

    private $username;
    private $lname;
    private $pwd;
    private $pwdConfirm;
    private $email;
    private $address;
    private $PostalCode;
    private $City;
    private $Region;
    private $contactNum;

    public function __construct($username, $lname, $pwd, $pwdConfirm, $email, $address, $PostalCode,  $City, $Region, $contactNum){
        $this ->username = $username;
        $this ->lname = $lname;
        $this ->pwd = $pwd;
        $this ->pwdConfirm = $pwdConfirm;
        $this ->email = $email;
        $this ->address = $address;
        $this ->PostalCode = $PostalCode;
        $this ->City = $City;
        $this ->Region = $Region;
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
            // throw new Exception("Password Don't match");
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false) 
        {
            header("location: ../index.php?error=emailalreadyused");
            exit();
        }
        if($this->validatePassword() == false){
            header("location: ../index.php?error=passwordshouldbealphanumeric");
            exit();
        }
        if($this->validateContact() == false){
            header("location: ../index.php?error=invalidcontactnumber");
            exit();
        }
        if($this->validatePostalCode() == false){
            header("location: ../index.php?error=invalidPostalCode");
            exit();
        }
        // $this->setUser($this ->username,  $this ->pwd,  $this ->email, $this ->address,  $this ->contactNum );
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

    private function invalidName() {
        $result;
        if (preg_match("/^[a-zA-Z0-9]+$/", $this->username) || preg_match("/^[a-zA-Z0-9]+$/", $this->lname)) {
            $result = true;
        } else {
            $result = false;
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
    private function validateContact(){
        if (strlen($this->contactNum) < 11) {
            return false;
        }
        
        return true;
    }

    private function validatePostalCode(){
        if (strlen($this->PostalCode) > 4) {
            return false;
        }
        return true;
    }

    private function validatePassword() {
        // Check if the password is at least 8 characters long
        if (strlen($this->pwd) < 8) {
            return false;
        }
    
        // Check if the password contains at least one digit (0-9)
        if (!preg_match('/\d/', $this->pwd)) {
            return false;
        }
    
        // Check if the password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $this->pwd)) {
            return false;
        }
    
        // Check if the password contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $this->pwd)) {
            return false;
        }
    

    
        // If all checks pass, the password is valid
        return true;
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