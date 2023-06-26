<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];


$to="sumanmaharjan222@gmail.com";

$subject="New contact form submission";
$body="Name:$name\n";
$body .="Email:$email\n";
$body .="Message:\n$message";

$headers="From:$email\r\n";


if(mail($to,$subject,$body,$headers)){
    echo"email sent successfully.";
}
else{
    echo"error";
}
}
?>