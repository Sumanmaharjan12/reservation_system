<?php
include ('connect.php');
if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['arrival'])||isset($_POST['arrival_time'])||isset($_POST['depature'])||isset($_POST['number'])){
    $email=$_POST['email'];
    $arrival=date('Y-m-d',strtotime($_POST['arrival']));;
    $arrival_time=($_POST['arrival_time']);
    $depature=date('Y-m-d',strtotime($_POST['depature']));;
    $number=$_POST['number'];
    $room_no=$_POST['room_no'];
    $status=$_POST['status'];
}
    $query = "SELECT * FROM booking WHERE room_no = '$room_no' AND (('$arrival' >= arrival AND '$arrival' <= depature) OR ('$depature' >= arrival AND '$depature' <= depature))";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // The room is already booked during the selected dates, display an error message or redirect the user to a different page
            echo"
            <script> alert('Sorry, this room is already booked during the selected dates.'); window.location='../front/book.php';</script>
            ";
            exit();
    }

   $query = "INSERT INTO `booking` (email,arrival,arrival_time,depature,number,room_no,status) VALUES ('$email','$arrival','$arrival_time','$depature','$number','$room_no','$status')";
        
    //$stmt = $conn->prepare($query);

    //$stmt->bind_param('ssssi', $email, $arrival, $arrival_time, $depature, $number);

   // $stmt->execute();
   if(mysqli_query($conn,$query)){
    echo"
    <script> alert('Booking Sucessfull'); window.location='../front/homepage.php';</script>
    ";
   }
    //$stmt-> close();
    $conn-> close();
?>