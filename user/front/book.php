<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
   <div class="header">

   </div>
   <a href="homepage.php" class="cross">&times;</a>
   <section class="book">
        <h1 class="now">Book Now</h1>
        <div class="room-content">
            <div class="room">
                <a href="#divone"><img src="../image/5.12.jpg" alt="" class="room-img"></a>
                <h2 class="room-title">Room 101</h2>
                <span class="price">$50</span><br>
                <a href="#divone"><button class="btn">Book Now</button></a>
                
            </div>
            <div class="room">
                <a href="#divone"><img src="../image/5.11.jpg" alt="" class="room-img"></a>
                <h2 class="room-title">Room 102</h2>
                <span class="price">$60</span><br>
                <a href="#divone"><button class="btn">Book Now</button></a>
            </div>
            <div class="room">
                <a href="#divone"><img src="../image/5.10.jpg" alt="" class="room-img"></a>
                    <h2 class="room-title">Room 103</h2>
                    <span class="price">$80</span><br>
                    <a href="#divone"><button class="btn">Book Now</button></a>
            </div>
            <div class="room">
                <a href="#divone"><img src="../image/5.13.jpg" alt="" class="room-img"></a>
                    <h2 class="room-title">Room 104</h2>
                    <span class="price">$100</span><br>
                   <a href="#divone"> <button class="btn">Book Now</button></a>
            </div>
            <div class="room">
                <a href="#divone"><img src="../image/5.15.jpg" alt="" class="room-img"></a>
                    <h2 class="room-title">Room 103</h2>
                    <span class="price">$120</span><br>
                    <a href="#divone"><button class="btn">Book Now</button></a>
            </div>
            <div class="room">
                <a href="#divone"><img src="../image/5.16.jpg" alt="" class="room-img"></a>
                <h2 class="room-title">Room 103</h2>
                <span class="price">$180</span><br>
                <a href="#divone"><button class="btn">Book Now</button></a>
            </div>
        </div>
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
</body>
</html>