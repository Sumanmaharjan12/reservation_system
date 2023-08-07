<?php
session_start();
include('connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM sign WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Assuming you have stored the hashed passwords in the database
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['Password'];

        // Verify the password using password_verify()
        if (password_verify($password, $storedHashedPassword)) {
            // Password is correct, store email in the session, not the password
            $_SESSION['email'] = $email;
            header("location:../front/homepage.php");
            exit();
        } else {
            echo "<script> alert('Password does not match'); window.location='../front/login.php';</script>";
            exit();
        }
    } else {
        echo "<script> alert('Email does not exist'); window.location='../front/login.php';</script>";
        exit();
    }
}

mysqli_close($conn);
?>












