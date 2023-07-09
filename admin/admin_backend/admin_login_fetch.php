<?php
    session_start();
    include('connect.php');
    if(isset($_POST['name']) && isset($_POST['password'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            // $name=$_POST['name'];
    }
        $sql="SELECT t1.name, t2.name
        FROM admin t1
        JOIN admin_detail t2 ON t1.name = t2.name
        WHERE t1.name = '$name';";
        $result= mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){
            $_SESSION['name']="$name";
            $_SESSION['password']="$password";
            header("location:../admin/admin_index.php");
        }
        else{
            // echo"
            // <script> alert('No account found'); window.location='../admin/admin_index.php';</script>
            // ";
            $_SESSION['error']="Incorrect username or password";
            header("location:../admin/index.php");
        }
        mysqli_close($conn);
?>