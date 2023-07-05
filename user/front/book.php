<?php
include('../backend/connect.php');
$query="select * from room";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
</head>
<body>
   <div class="header">

   </div>
   <a href="homepage.php" class="cross">&times;</a>
   <h1 class="now">Book Now</h1>
   <section class="book">
        <?php
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="room-content">
            <div class="room">
                <a href="#divone"><img src="../../admin/admin/upload/<?php echo $row["room_image"];?>" alt="" class="room-img"></a>
                <div class="detail">
                    <h2 class="room-title"><span class='bx bx-room'><?php echo $row["room_no"]; ?></span></h2>
                    <span class="price"><span class='bx bx-bed'><?php echo $row["room_type"]; ?></span><br>
                    <span class="price"><span class='bx bx-group'><?php echo $row["capacity"]; ?></span><br>
                    <a href="#divone" onclick="setRoomNo(<?php echo $row['room_no']; ?>)"><button class="btn">Book Now</button></a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
   </section>
   <div class="overlay" id="divone">
    <div class="wrapper">
        <h2>Please Fill up the Form</h2>
        <a href="#"class="close">&times;</a>
        <div class="content">
            <div class="container">
                <form action="../backend/booking.php" method="POST" onsubmit="return validate()">
                    <div class="input">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" id="email"required>
                    </div>
                    <div class="input">
                        <label for="date">Arrirval Date:</label><br>
                        <input type="date" name="arrival" id="arrival" required>
                    </div>
                    <div class="input">
                        <label for="time">time:</label><br>
                        <input type="time" name="arrival_time" id="arrival_time">
                    </div>
                    <div class="input">
                        <label for="date">Depature Date</label>
                        <input type="date" name="depature" id="depature">
                    </div>
                    <div class="input">
                        <label for="number">Number of People</label>
                        <input type="number" name="number" id="number">
                    </div>
                    <div class="input">
                        <input type="hidden" name="status" value="Pending">
                    </div>
                    <div class="input">
                        <input type="hidden" name="room_no" id="room_no">
                    </div>
                    <input type="hidden" name="status" value="Pending">
                        <button class="button" type="submit">Book</button>
                </form>
            </div>
        </div>
    </div>
   </div>
        <script>
            function validate(){
                var inputDate=document.getElementById("arrival").value;
                var inputDate1=document.getElementById("depature").value;
                var select=new Date(inputDate);
                var select1=new Date(inputDate1);
                var current=new Date();
                var current1=new Date();
                if(select<current){
                    alert("You cannot book on a past date.");
                    return false;
                }
                else if(select1<current1){
                    alert("You cannot book on a past date.");
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
        <script>
            function setRoomNo(roomNo) {
            document.getElementById("room_no").value = roomNo;
            }
        </script>
</body>
</html>