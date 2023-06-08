<?php
include ('connect.php');
if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['arrival'])||isset($_POST['arrival_time'])||isset($_POST['depature'])||isset($_POST['number'])){
    $email=$_POST['email'];
    $arrival=date('Y-m-d',strtotime($_POST['arrival']));;
    $arrival_time=($_POST['arrival_time']);
    $depature=date('Y-m-d',strtotime($_POST['depature']));;
    $number=$_POST['number'];
}
   $query = "INSERT INTO `booking` (email,arrival,arrival_time,depature,number) VALUES ('$email','$arrival','$arrival_time','$depature','$number')";
        
    //$stmt = $conn->prepare($query);

    //$stmt->bind_param('ssssi', $email, $arrival, $arrival_time, $depature, $number);

   // $stmt->execute();
   if(mysqli_query($conn,$query)){
    header("location:../front/homepage.php");
   }
    //$stmt-> close();
    $conn-> close();
?>