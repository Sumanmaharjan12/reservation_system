<?php
include("connect.php");

if ($_POST) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $date=date('Y-m-d',strtotime($_POST['date']));
    $number=$_POST['number'];
    $sql = "INSERT INTO admin_detail (id,name,email,date,number) VALUES('$id','$name','$email','$date','$number')";
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully.";
        echo "<script>alert('New Admin Added'); window.location='../admin/admin_index.php';</script>";
        mysqli_close($conn);
        //header('Location: front/homepage.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>