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
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

  <div class="nav">
    <img src="../image/2.png" alt="" class="img">
    <a href="login.php">Login</a>
    <a href="SignUp.php">SignUp</a>
  </div>
  <div class="slider">

  </div>
  <section class="info">
    <p>Want to Book Room?</p>
    <a href="login.php"><button class="arrow">Book Now</button></href></a>
  </section>
  <footer class="footer">
    <div class="footer_containerleft">
      <img src="../image/2.png" alt="">
    </div>
    <div class="footer_containerright">
      <div class="row">
        <div class="footer-col">
          <h4> Want to be a member?</h4>
          <ul>
            <li>
              <a href="signup.php"> Sign Up</a>
            </li>
          </ul>
        </div> <!-- footer-col -->
        <div class="footer-col">
          <h4> Get Help </h4>
          <ul>
            <li class="register_style">
              <p> Have a account?</p>
              <a href="login.php"> Login</a>
            </li>
          </ul>
        </div> <!-- footer-col -->
        <div class="footer-col">
          <h4> Follow US</h4>
          <div class="social-links">
            <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/" target="_blank"> <i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/" target="_blank"> <i class="fab fa-twitter"></i></a>
          </div>
        </div> <!-- footer-col ends -->
      </div> <!-- row -->
      <div class="copyright1">
        <p> 2023 Hotel. All rights reserved.</p>
        <p>Use of this site constitutes acceptance of our User Agreement and privacy policy.</p>
        <p>The Material on this site may not be reproduced, distributed, transmitted, cached or otherwise used, except
          with the prior written permission of Hotel.</p>
      </div>
    </div> <!-- footer_containerright -->

  </footer>
</body>

</html>