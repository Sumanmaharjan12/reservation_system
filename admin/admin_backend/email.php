<?php
require_once("../../phpmailer/vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendConfirmationEmail($recipientEmail, $code){
    echo  "<script>alert('Sending confirmation email to: $recipientEmail');</script>";
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "maharjansuman447@gmail.com";
    $mail->Password = "jpdywcgkmtdtdwkx";

    $mail->setFrom("maharjansuman447@gmail.com", "Suman"); // Replace with the sender's email and name
    $mail->addAddress($recipientEmail); // User's email and name as recipient

    $mail->Subject = 'Booking Confirmation';
    $mail->Body = 'Your booking has been confirmed.
Thank you for booking in our Hotel. 
For futher detail contact
Phone Number: 9861344956 '; // You can customize the confirmation message here

    try {
        // Send the email
        $mail->send();
        echo "<script>alert('Mail has been sent');</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo . "<br>";
        echo "Exception Message: " . $e->getMessage();
    }
}







