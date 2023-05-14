<?php
include ('connect.php');
if(isset($_POST['email'])||isset($_POST['arrival'])||isset($_POST['time'])||isset($_POST['depature'])||isset($_POST['number'])){
    $email=$_POST['email'];
    $arrival=date('Y-m-d',strtotime($_POST['arrival']));;
    $time=($_POST['time']);
    $depature=date('Y-m-d',strtotime($_POST['depature']));;
    $number=$_POST['number'];
}
    $query = "INSERT INTO booking(email,arrival,time,depature,number) VALUES (?,?,?,?,?)";
        
    $stmt = $conn->prepare($query);

    $stmt->bind_param('sssss', $email, $arrival, $time, $depature, $number);

    $stmt->execute();
    header("location:front/homepage.php");
    $stmt-> close();
    $conn-> close();
?>