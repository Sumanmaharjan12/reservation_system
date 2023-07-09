<?php
include("connect.php");

if ($_POST) {
        $room_no=$_POST['room_no'];
        $room_type=$_POST['room_type'];
        $capacity=$_POST['capacity'];
        $filename = $_FILES["room_img"]["name"];
        $tempname = $_FILES["room_img"]["tmp_name"];
        $folder = "../admin/upload/" . $filename;
    $sql = "UPDATE room SET room_type = '$room_type', capacity = '$capacity', room_image = '$filename' WHERE room_no = '$room_no'";
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully.";
        echo "<script>alert('Thank you! Your profile has been updated.'); window.location='../admin/room.php';</script>";
        mysqli_close($conn);
       
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>