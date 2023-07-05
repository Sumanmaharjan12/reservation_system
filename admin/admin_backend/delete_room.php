<?php
include('connect.php');
if(isset($_GET['room_no'])){
    $room_no=$_GET['room_no'];
    $query="Delete from room where room_no=$room_no";
    $result = mysqli_query($conn, $query);
   
    if($result){
        echo"
        <script> confirm('Do you want to delete the data?'); window.location='../admin/room.php';</script>
        ";
    }
    else{
        echo "<script> alert('error while deleting'); window.location='../admin/room.php';</script>
        ";
    }
}
mysqli_close($conn);
?>
