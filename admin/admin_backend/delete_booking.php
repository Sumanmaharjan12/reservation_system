<?php
include('../admin_backend/connect.php');
if(isset($_GET['email'])){
    $email=$_GET['email'];
    $query="Delete from booking where email=$email";
    $result = mysqli_query($conn, $query);
   
    if($result){
        echo"
        <script> confirm('Do you want to delete the data?'); window.location='../admin/booking.php';</script>
        ";
    }
    else{
        echo "<script> confirm('Error while deleting'); window.location='../admin/booking.php';</script>
        ";
    }
}
mysqli_close($conn);
?>
