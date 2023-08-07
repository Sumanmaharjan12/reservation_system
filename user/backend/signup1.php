<?php
include('connect.php');

if (isset($_POST['name'], $_POST['email'], $_POST['date'], $_POST['password'], $_POST['confirmpassword'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $password = $_POST['password'];
    $hashedpassword=password_hash($password,PASSWORD_BCRYPT);
    $confirmpassword = $_POST['confirmpassword'];
    $hashedpassword1=password_hash($confirmpassword,PASSWORD_BCRYPT);

    // Check if email already exists
    $checkQuery = "SELECT * FROM sign WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script> 
            alert('Email already exists');
            window.location.href='../front/signup.php';
            </script>";
        exit();
    }

    // Insert the user information into the database
    $insertQuery = "INSERT INTO sign (name, email, date, password, confirmpassword) 
                    VALUES ('$name', '$email', '$date', '$hashedpassword', '$hashedpassword1')";
    if (mysqli_query($conn, $insertQuery)) {
        header("location:../front/login.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

$conn->close();
?>
