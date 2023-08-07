<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$mail = require __DIR__ . "/mailer.php";

$mail->setFrom($email, $name);
$mail->addAddress("maharjansuman447@gmail.com", "Suman");

$mail->Subject = "Contact Form Submission";
$mail->Body = "From: $email<br><br>Message: $message";

$mail->send();

header("Location: email_sent.php");
?>
