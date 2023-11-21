<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

session_start();
//Load Composer's autoloader


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup_now']))
{
    // session_start();
    $fname = htmlspecialchars($_POST["fname"], ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars($_POST["lname"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pass"], ENT_QUOTES, 'UTF-8');
    $pwdConfirm = htmlspecialchars($_POST["confirm_pass"], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST["address"], ENT_QUOTES, 'UTF-8');
    $PostalCode = htmlspecialchars($_POST["Postal"], ENT_QUOTES, 'UTF-8');
    $City = htmlspecialchars($_POST["City"], ENT_QUOTES, 'UTF-8');
    $Region = htmlspecialchars($_POST["Region"], ENT_QUOTES, 'UTF-8');
    $contactNum = isset($_POST["contact"]) ? intval($_POST["contact"]) : 0;

    


    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-cntrl.classes.php";
    $signup = new SignupContr($fname,  $lname, $pwd, $pwdConfirm, $email, $address, $PostalCode,  $City, $Region, $contactNum);

    // Runnig error handlers and user signup
    $signup-> signupUser();
    if($signup != false){
        echo '<script>alert("A verification code has been sent to your email: ' . $email . '");</script>';

        $_SESSION['register_CustomerName'] = $fname;
        $_SESSION['register_CustomerLastName'] = $lname;
        $_SESSION['register_CustomerPass'] = $pwd;
        $_SESSION['register_CustomerEmail'] = $email;
        $_SESSION['register_CustomerAddress'] = $address;
        $_SESSION['register_CustomerPostalCode'] = $PostalCode;
        $_SESSION['register_CustomerCity'] = $City;
        $_SESSION['register_CustomerRegion'] = $Region;
        $_SESSION['register_CustomerContact'] = $contactNum;


    require_once "../classes/mailer_function.php";
    $mailer = new YourEmailClass();
    $mailer->get_email($email, $fname);
    // $customerId = $signup->fetchCustomerId($username);
    if($mailer != false){

   
    // instantiate ProfileInfoContr class
    // include "../classes/profileinfo.classes.php";
    // include "../classes/profileinfo-cntrl.classes.php";
    // $profileInfo = new ProfileInfoContr($customerId, $username);
    // $profileInfo->defaultProfileInfo();

    // Going back to front page
    // header("location: ../index.php?error=none");
    ?>

<div class="container-fluid vh-100" style="background-color: #978d30;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-4">
            <div class="card" style="box-shadow: -1px 2px 4px 1px rgba(0, 0, 0, 0.25);">
                <div class="card-header">
                    <h5 class="card-title">Verification Code:</h5>
                </div>
                <div class="card-body">
                    <form method="POST" id="otpForm">
                        <div class="form-group mt-3 position-relative">
                            <label for="otp">Enter Code</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" name="otp" id="otp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter the code" required>
                            </div>
                        </div>
                        <button type="button" id="verifyBtn" class="btn btn-success">Verify</button>
                        <button type="button" id="verifyBtn" class="btn btn-warning">Resend</button>
                    </form>
                    <div id="verificationResult"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function() {
    // Handle OTP verification
    $("#verifyBtn").click(function() {

        var enteredOTP = $("#otp").val();
        
        // AJAX request to verify OTP
        $.ajax({
            type: "POST",
            url: "verify_signup.php", // Change to the actual verification script
            data: { otp: enteredOTP },
            success: function(response) {
                if (response === "success") {
                    $("#verificationResult").html("<div class='alert alert-success' role='alert'>Verification successful. Redirecting to home page...</div>");
                    // Redirect to home page after a short delay
                    setTimeout(function() {
                        window.location.href = "../index.php"; // Change to the actual home page URL
                    }, 2000); // 2000 milliseconds (2 seconds)
                } else if (response === "failure") {
                    $("#verificationResult").html("<div class='alert alert-danger' role='alert'>Invalid OTP</div>");
                } else if (response === "error") {
                    $("#verificationResult").html("<div class='alert alert-danger' role='alert'>Error during OTP verification</div>");
                } else if (response === "expired") {
                    $("#verificationResult").html("<div class='alert alert-warning' role='alert'>Session expired. Please try again.</div>");
                }
                else if (response === "unable") {
                    $("#verificationResult").html("<div class='alert alert-warning' role='alert'>Unable to signup user</div>");
                }
            },
            error: function() {
                $("#verificationResult").html("<p>Error during OTP verification</p>");
            }
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<?php
 }else{
    echo '<script>alert("Could not send verification code to email: ' . $email . '");</script>';
    header("location: ../index.php?error=couldnotsendcode");
    exit();
 }
 }else{
    header("location: ../index.php?error=somethingswrong");
    exit();
 }
}
?>


