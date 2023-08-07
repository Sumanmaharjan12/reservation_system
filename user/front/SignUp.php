<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="SignUp.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
</head>

<body>
    <a href="index.php" class="cross">&times;</a> <br>
    <h1 data-text="signup">SignUp</h1>

    <div class="sign">
        <form action="../backend/signup1.php" method="POST" onsubmit="return myfun()">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="date">Date of Birth:</label><br>
            <input type="date" name="date" id="date" required>
            <span id="date-error" style="color: red; font-size:12px;"></span><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>
            <img src="../image/eye.png" onclick="pass()" class="pass-icon" id="pass-icon" alt="">
            <span id="messages" style="color:red;"></span>
            <label for="Confirm Password">Confirm Password:</label><br>
            <input type="password" name="confirmpassword" id="confirmpassword" required><br>
            <span id="messages"></span>
            <input type="submit" value="Submit" class="submit">
        </form>
        <p>By clicking the Confirm button, you agree to our<br> <a href="">Terms and condition</a> and <a href="">Policy
            Privacy</a></p>
    </div>

    <script>
        function myfun() {
            var a = document.getElementById("password").value;
            var b = document.getElementById("confirmpassword").value;
            if (a != b) {
                document.getElementById("messages").innerHTML = "Password does not match";
                return false;
            }

            var dateOfBirth = document.getElementById("date").value;
            var today = new Date();
            var age = today.getFullYear() - new Date(dateOfBirth).getFullYear();
            var monthDiff = today.getMonth() - new Date(dateOfBirth).getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < new Date(dateOfBirth).getDate())) {
                age--;
            }

            if (age < 18) {
                document.getElementById("date-error").innerHTML = "You must be 18 years or older to sign up";
                return false;
            }
        }
    </script>
    <script>
        var a;
        function pass() {
            if (a == 1) {
                document.getElementById('password').type = 'password';
                document.getElementById('pass-icon').src = '../image/eye.png';
                a = 0;
            } else {
                document.getElementById('password').type = 'text';
                document.getElementById('pass-icon').src = '../image/show.jpg';
                a = 1;
            }
        }
    </script>
</body>

</html>
