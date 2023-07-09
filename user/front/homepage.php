<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="image/logo.png" alt="">
            </div>
            <div class="icon">
                <a href=""><img src="../image/icon.png" alt=""></a>
                <div class="dropdown">
                    <a href="../backend/profile.php">My Profile</a>
                    <a href="../backend/booking_table.php">My Booking</a>
                    <a href="../backend/logout.php">Logout</a>
                </div>
            </div>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="book.php">Booking</a></li>
                <li><a href="contact.php">Contact</a></li>
        </div>
        </div>
        <div class="title">
            <h2>Book A Room</h2><br>
            <h3>For Your</h3><br>
            <h1>Holiday&Business Trip</h1>
        </div>
        <div class="btn">
            <a href="#learn">Learn More</a>
        </div>
    </header>
    <div id="learn">
        <section class="about">
            <div class="about_img">
                <img src="../image/5.7.jpg" alt="">
            </div>
            <div class="content">
                <p>When it comes to choosing a hotel for a holiday or business trip, one of the most important factors
                    to consider is the availability and suitability of the rooms.Some content about the types of rooms
                    that are available for both holiday and business trips are standard, suites,connecting rooms,family
                    rooms and luxury rooms. When choosing a hotel for your holiday or business trip, it's important to
                    consider the types of rooms available and choose one that suits your needs and preferences. Whether
                    you're looking for a basic standard room or a luxurious suite, there's a room available to fit every
                    budget and travel style.Our hotel have a many types of rooms for your holidays and business trip
                    which can fullfill your needs and preferences.</p>

            </div>
        </section>
    </div>
</body>

</html>