<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="SignUp.css">
</head>
<body>
    <h1 data-text="signup">SignUp</h1>
    <div class="sign">
        <form action="../signup1.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name"required ><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="date">Date of Birth:</label><br>
            <input type="date" name="date" id="date" ><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"required><br>
            <label for="Confirm Password">Confirm Password:</label><br>
            <input type="password" name="confirmpassword" id="confirmpassword"required><br>
            <button name="submit">Confirm</button>
        </form>
        <p>By clicking the Confirm button, you agree to our<br> <a href="">Terms and condition</a> and <a href="">Policy Privacy</a></p>
    </div>
   
</body>
</html>