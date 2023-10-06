<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $pwd = $_POST["pass"];
    

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-cntrl.classes.php";
    $login = new Login();

    // Runnig error handlers and user signup
    $customerData = $login->getUser($email, $pwd);
    if ($customerData) {
        // Redirect customer to the customer dashboard
        header("location: ../index.php?error=nonelogin");
        exit();
    }

    $adminData = $login->adminLogin($email, $pwd);
    if($adminData){
        header("location: ../back-end/AdminDashBoard.php?error=nonelogin");
        exit();
    }

    // Going back to front page
    header("location: ../index.php?error=authenticationfailed");
    exit();

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