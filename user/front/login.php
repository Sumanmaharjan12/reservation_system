<?php
    session_start();
   
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
    <a href="index.php" class="cross">&times;</a>
        <div class="login">
           <img src="../image/av.png" alt="">
             <h1>Log In</h1>
                <form action="../backend/login_fetch.php" method="POST">
                    <div class="input_feild">
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                    </div>
                    <div class="input_feild">
                        <input type="password" name="password" id="password"placeholder="PASSWORD">
                    </div>  
                    <div class="btn">
                        <button  type="submit" onclick="checkInput(event)" name="login">Log In</button>
                    </div>
                    <div class="register">
                        <p>Don't have a account? <a href="SignUp.php">Register</a></p>
                    </div>
             </form>
    </div>
    
    <script>
        
        function checkInput(event) {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            if (email === "" && password === "") {
                alert("Please enter your email and password");
                event.preventDefault(); 
            } 
            else if (email === "") {
                alert("Please enter your email");
                event.preventDefault(); 
            }
            else if (password === "") {
                alert("Please enter your password");
                event.preventDefault(); 
            } 
        }
    </script>
</body>
</html>