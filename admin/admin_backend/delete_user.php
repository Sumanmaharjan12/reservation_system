<?php
include('../admin_backend/connect.php');
if(isset($_GET['email'])){
    $email=$_GET['email'];
    $query="Delete from sign where email=$email";
    $result = mysqli_query($conn, $query);
   
    if($result){
        echo"
        <script> confirm('Do you want to delete the data?'); window.location='../admin/users.php';</script>
        ";
    }
    else{
        echo "<script> confirm('error while deleting'); window.location='../admin/users.php';</script>
        ";
    }
}
mysqli_close($conn);
?>
