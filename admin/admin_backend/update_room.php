<?php
session_start();
include("connect.php");
$individual=[];
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from room where id='$id'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $individual= array(
                "room_no"=> $row['room_no'],
                "room_type"=> $row['room_type'],
                "capacity"=> $row['capacity'],
                "room_image"=> $row['room_image'],
            );
        }
        }
        else{
            echo "no record found!!";
            exit;
    }
}
mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
        <title>Updates</title>
        <link rel="stylesheet" href="../backend_css/update.css">
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>Update Booking Data</h1>
            <form action="roomedit.php" method="POST">
                <div class="text">
                    <input type="text" name="room_no" value="<?= $individual['room_no']?>" required>
                    <span> </span>
                    <label for="">Room no</label>
                </div>
                <div class="text">
                    <input type="text" name="room_type" value="<?= $individual['room_type']?>" required>
                    <span> </span>
                    <label for="">Room Type</label>
                </div>
                <div class="text">
                    <input type="number" name="capacity" value="<?= $individual['capacity']?>" required >
                    <span> </span>
                    <label for="">Capacity</label>
                </div>
                <div class="text">
                    <input type="file" name="room_image" value="<?= $individual['room_image']?>" required >
                    <span> </span>
                    <label for="">Room room_image</label>
                </div>
                <input type="submit" value="Update" class="login-button">
                <button class="display-button"><a href="../admin/booking.php">Go back</a></button>
            </form>
        </div>
    </div>    
</body>
</html>