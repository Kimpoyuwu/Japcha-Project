<?php

if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $pwd = $_POST["pass"];
    

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-cntrl.classes.php";
    $login = new LoginContr($email, $pwd);

    // Runnig error handlers and user signup
    $login-> loginUser();
    

    // Going back to front page
    header("location: ../index.php?error=nonelogin");

}








































// if (isset($_POST["submit"])) {

//     $email = $_POST["email"];
//     $pass = $_POST["pass"];

//     require_once 'db.inc.php';
//     require_once 'functions.inc.php';

//     if (emptyInputLogin($email , $pass) !== false){
//         header("location: ../index.php?error=emptyinput");
//         exit();
//     }

//     loginUser($conn, $email, $pass);
// }
// else {
//     header("location: ../index.php" );
//     exit();
// }