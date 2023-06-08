<?php
include("connect.php");

if ($_POST) {
    $Code=$_POST['Code'];
    $email=$_POST['email'];
    $arrival=date('Y-m-d',strtotime($_POST['arrival']));
    $arrival_time=($_POST['arrival_time']);
    $depature=date('Y-m-d',strtotime($_POST['depature']));
    $number=$_POST['number'];
    $sql = "UPDATE booking SET Code = '$Code', email = '$email', arrival = '$arrival', arrival_time='$arrival_time', depature='$depature', number='$number' WHERE Code = $Code";
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully.";
        echo "<script>alert('Thank you! Your booking has been updated.'); window.location='../front/homepage.php';</script>";
        mysqli_close($conn);
        //header('Location: front/homepage.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>