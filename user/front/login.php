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
    <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
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
                        <i onclick="pass()" id="pass-icon" class="bx bxs-hide"></i> 
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
    <!-- for showing and hiding password -->
    <script>
    var a;
    function pass(){
        if(a==1){
            document.getElementById('password').type='password';
            document.getElementById('pass-icon').src='bxs-hide';
            a=0;
        }
        else{
            document.getElementById('password').type='text';
            document.getElementById('pass-icon').src='bxs-show';
            a=1;
        }
    }
   </script>
</body>
</html>