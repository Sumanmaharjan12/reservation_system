<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <div class="container">
        <div class="item">
            <div class="contact">
                <div class="first">
                    Let's get in touch
                </div>
                <img src="../image/1.png" alt="" class="image">
                <div class="social">
                    <span class="text">Connect With Us:</span>
                    <ul class="social_media">
                        <li><img src="../image/facebook.png" alt=""><a href="facebook.com"></a></li>
                        <li><img src="../image/instagram.png" alt=""><a href="instagram.com"></a></li>
                        <li><img src="../image/twitter.png" alt=""><a href="twitter.com"></a></li>
                    </ul>
                </div>
            </div>

            <div class="submit">
                <a href="homepage.php" class="cross">&times;</a>
                <h4 class="third">Contact US</h4>
                <form action="../backend/sendemail.php" method="post">
                    <div class="input_box">
                        <input type="text" class="input" name="name" required>
                        <label for="">Name</label>
                    </div>
                    <div class="input_box">
                        <input type="email" class="input" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input_box">
                        <input type="tel" class="input" name="phone" required>
                        <label for="">Phone</label>
                    </div>
                    <div class="input_box">
                        <textarea class="input" id="message" cols="30" rows="10" name="message" required></textarea>
                        <label for="">Message</label>
                    </div>
                    <button class="btn" type="submit">Submit</button>
                </form>
            </div>
        </div>
</body>

</html>