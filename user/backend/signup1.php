<?php
include('connect.php');
        if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['date'])||isset($_POST['password'])||isset($_POST['confirmpassword'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $date=date('Y-m-d',strtotime($_POST['date']));
            $password=$_POST['password'];
            $confirmpassword=$_POST['confirmpassword'];
        }
            $query = "INSERT INTO sign(name,email,date,password,confirmpassword) VALUES ('$name', '$email', '$date', '$password', '$confirmpassword')";
            if(mysqli_query($conn,$query)){
            header("location:../front/login.php");
            }
       
            $conn-> close();

?>
