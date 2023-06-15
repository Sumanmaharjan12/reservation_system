<?php
    session_start();
    include('connect.php');
    if(isset($_POST['name']) && isset($_POST['password'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            // $name=$_POST['name'];
    }
        $sql="SELECT * FROM admin where name='$name' AND password='$password' ";
        $result= mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){
            $_SESSION['name']="$name";
            $_SESSION['password']="$password";
            header("location:../admin/admin_index.php");
        }
        else{
            echo"
            <script> alert('wrong password!'); window.location='../admin/admin_login.php';</script>
            ";
        }
        mysqli_close($conn);
?>