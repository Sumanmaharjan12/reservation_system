<?php
include("connect.php");
$individual=[];
if(isset($_GET['Code'])){
    $Code=$_GET['Code'];
    $sql="select * from booking where Code='$Code'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $individual= array(
                "Code"=> $row['Code'],
                "email"=> $row['email'],
                "arrival"=> $row['arrival'],
                "arrival_time"=> $row['arrival_time'],
                "depature"=> $row['depature'],
                "number"=> $row['number'],
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
        <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>Update Booking Data</h1>
            <form action="update.php" method="POST">
                <input type="hidden" name="Code" value="<?php echo $individual['Code']?>">
                <div class="text">
                    <input type="text" name="email" value="<?= $individual['email']?>" required>
                    <span> </span>
                    <label for="">Email</label>
                </div>
                <div class="text">
                    <input type="date" name="arrival" value="<?= $individual['arrival']?>" required >
                    <span> </span>
                    <label for="">Arrival</label>
                </div>
                <div class="text">
                    <input type="time" name="arrival_time" value="<?= $individual['arrival_time']?>" required>
                    <span> </span>
                    <label for="">Time</label>
                </div>
                <div class="text">
                    <input type="date" name="depature" value="<?= $individual['depature']?>" required>
                    <span> </span>
                    <label for="">Depature</label>
                </div>
                <div class="text">
                    <input type="number" name="number" value="<?= $individual['number']?>" required >
                    <span> </span>
                    <label for="">Number</label>
                </div>
                <input type="submit" value="Update" class="login-button">
                <button class="display-button"><a href="front/homepage.php">Go back</a></button>
            </form>
        </div>
    </div>    
</body>
</html>