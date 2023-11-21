<?php
// session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

class YourEmailClass {
    public function get_email($email, $username) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                 // Enable verbose debug output
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'adnerdevila23@gmail.com';                     // SMTP username
            $mail->Password   = 'tcgs yycp hgfp iaxv';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable implicit TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('adnerdevila23@gmail.com', 'JapCha');
            $mail->addAddress($email, $username);     // Add a recipient

            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            // Store the OTP in the session
            $_SESSION['verification_code'] = [
                'code' => $verification_code,
                'timestamp' => time(),
            ];

            $mail->Subject = 'Email Verification';
            // $mail->Body    = '<p>Your Verification code is: <b style="font-size: 30px; ">'. $verification_code .'</b></p> ';
            $mail->Body = '<div class="card" style=" width: 400px; height: 200px;">
            <div class="card-header"  style="border: 1px solid black; background-color: #978d30; width: 100%;padding: 2px; text-align: center;">
                <b class="card-title" style="font-size: 25px; width: 100%;">Verification Code:</b>
            </div>
            <div class="card-body" style="border: 1px solid black; padding: 2px; width:100%; text-align: center;">
             <b style="font-size: 50px;">'. $verification_code .'</b>
            </div>
            </div>
        </div>';
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

