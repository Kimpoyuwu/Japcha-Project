<?php

class LoginContr extends Login{


    private $pwd;
    private $email;

    public function __construct($email, $pwd){
        $this ->pwd = $pwd;
        $this ->email = $email;
    }

    public function loginUser(){
        if($this->emptyInput() == false) 
        {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
       
        $this->getUser($this ->email, $this ->pwd);
    }

    private function emptyInput(){
        $result;
        if(empty( $this ->email) || empty( $this ->pwd) ) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}