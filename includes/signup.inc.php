<?php

if(isset($_POST["submit"]))
{
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['pass'];
    $pwdConfirm = $_POST['confirm_pass'];
    $address = $_POST['address'];
    $contactNum = $_POST['contact'];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-cntrl.classes.php";
    $signup = new SignupContr($username, $pwd, $pwdConfirm, $email, $address, $contactNum);

    // Runnig error handlers and user signup
    $signup-> signupUser();
    

    // Going back to front page
    header("location: ../index.php?error=none");

}










































// if (isset($_POST["submit"])) {

//     $username = $_POST['userName'];
//     $email = $_POST['email'];
//     $password = $_POST['pass'];
//     $confirm_password = $_POST['confirm_pass'];
//     $customer_address = $_POST['address'];
//     $contact_number = $_POST['contact'];

//     require_once 'db.inc.php';
//     require_once 'functions.inc.php';

//     if (emptyInputSignup($username , $email, $password,  $confirm_password, $customer_address,  $contact_number) !== false){
//         header("location: ../index.php?error=emptyinput");
//         exit();
//     }
//     if (invalidUid($username) !== false) {
//         header("location: ../index.php?error=invaliduid");
//         exit();
//     }
//     if (invalidEmail($email) !== false) {
//         header("location: ../index.php?error=invalidemail");
//         exit();
//     }
//     if (pwdMatch($password, $confirm_password) !== false) {
//         header("location: ../index.php?error=passworddoesnotmatch");
//         exit();
//     }
//     if (uidExist($conn, $username,  $email) !== false) {
//         header("location: ../index.php?error=usernametaken");
//         exit();
//     }

//     createUser($conn, $username,  $email,  $password, $confirm_password, $customer_address,  $contact_number);


// }
// else {
//     header("location: ../index.php" );
// }