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
    <link rel="stylesheet" href="../admin_css/admin_login.css">
</head>
<body>
    <div class="container">
        <div class="login">
             <h1>ADMIN</h1>
                <form action="../admin_backend/admin_login_fetch.php" method="POST">
                    <div class="input_feild">
                        <input type="text" name="name" id="name" placeholder="Name"><br>
                    </div>
                    <div class="input_feild">
                        <input type="password" name="password" id="password"placeholder="PASSWORD">
                    </div>  
                    <div class="btn">
                        <button  type="submit" onclick="checkInput(event)" name="login">Log In</button>
                    </div>
                    <div class="message">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
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