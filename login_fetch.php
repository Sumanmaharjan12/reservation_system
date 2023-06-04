<?php
    session_start();
    include('connect.php');
    if(isset($_POST['email']) && isset($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            // $name=$_POST['name'];
    }
        $sql="SELECT * FROM sign where email='$email' AND password='$password' ";
        $result= mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){
            $_SESSION['email']="$email";
            $_SESSION['password']="$password";
            header("location:front/homepage.php");
        }
        else{
            header("location:front/signup.php");
         
        }
        mysqli_close($conn);
?>