<?php
include('connect.php');
if(isset($_GET['email'])){
    $email=$_GET['email'];
    $query="Delete from admin_detail where email=$email";
    $result = mysqli_query($conn, $query);
   
    if($result){
        echo"
        <script> confirm('Do you want to delete the data?'); window.location='../admin/admin_index.php';</script>
        ";
    }
    else{
        echo "<script> alert('error while deleting'); window.location='../admin/admin_index.php';</script>
        ";
    }
}
mysqli_close($conn);
?>
