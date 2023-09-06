<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
     // Get the form data
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['pass'];
    $userLevel = $_POST['user_level'];
    $contactNum = $_POST['contact'];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-admin-cntrl.classes.php";
    $signup = new SignupContrAdmin($username, $email, $pwd, $userLevel, $contactNum);

    // Runnig error handlers and user signup
    $signup-> signupAdmin();
    

    // Going back to front page
    header("location: ../adminAccount.php?error=none");

}
