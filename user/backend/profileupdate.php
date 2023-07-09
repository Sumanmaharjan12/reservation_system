<?php
include("connect.php");

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $sql = "UPDATE sign SET name = '$name', email = '$email', date = '$date' WHERE `email`= '$email' ";
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully.";
        echo "<script>alert('Thank you! Your profile has been updated.'); window.location='../front/homepage.php';</script>";
        mysqli_close($conn);
        //header('Location: front/homepage.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>