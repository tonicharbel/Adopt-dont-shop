<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST["send"])){
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;   
        $mail->Username   = '';
        $mail->Password   = ''; // Use your App Password here not your password
        $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;; // Use TLS encryption
        $mail->Port       = 587; // Port for TLS encryption

        $mail->setFrom('tonicharbel83@gmail.com');
        $mail->addAddress($_POST["email"]);
        
        $mail->isHTML(true); 
        $mail->Subject = "Reset Password";//$_POST["subject"];
        $mail->Body = "<a href='reset.php'>change you pass</a>";//$_POST["message"];
        $mail->send();
        echo "
        <script>
            alert('Email Sent');
            document.location.href='index.php';
        </script>";
    } catch (Exception $e) { 
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
