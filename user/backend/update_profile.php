<?php
session_start();
include("connect.php");
$individual = [];
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "select * from sign where email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $individual = array(
                "name" => $row['name'],
                "email" => $row['email'],
                "date" => $row['date'],
            );
        }
    } else {
        echo "no record found!!";
        exit;
    }
}
mysqli_close($conn);
?>

<!doctype html>
<html>

<head>
    <title>Updates</title>
    <link rel="stylesheet" href="../backend_css/update.css">
</head>

<body>
    <div class="container">
        <div class="center">
            <h1>Update Booking Data</h1>
            <form action="profileupdate.php" method="POST">
                <div class="text">
                    <input type="text" name="name" value="<?= $individual['name'] ?>" required>
                    <span> </span>
                    <label for="">Name</label>
                </div>
                <div class="text">
                    <input type="text" name="email" value="<?= $individual['email'] ?>" required>
                    <span> </span>
                    <label for="">Email</label>
                </div>
                <div class="text">
                    <input type="date" name="date" value="<?= $individual['date'] ?>" required>
                    <span> </span>
                    <label for="">date</label>
                </div>
                <input type="submit" value="Update" class="login-button">
                <button class="display-button"><a href="profile.php">Go back</a></button>
            </form>
        </div>
    </div>
</body>

</html>