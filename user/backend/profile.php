<?php
session_start();
include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
    header('Location: ../front/login.php');
    exit();
}

// Retrieve the user ID from the session
// $name= $_SESSION['name'];
$email = $_SESSION['email'];


// Establish a database connection


// Retrieve records for the logged-in user
$query = "select * from sign where email='$email'";
$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $i = 0;
    // Looping through the results
    while ($row = mysqli_fetch_assoc($result)) {
        $records[$i] = array(
            "name" => $row['name'],
            "email" => $row['email'],
            "date" => $row['date'],

        );
        $i++;
    }
}
?>
<link rel="stylesheet" href="../backend_css/profile.css">
<div class="container">
    <?php
    foreach ($records as $individual) {
        ?>
        <div class="container">
            <div class="center">
                <a href="../front/homepage.php" class="close">&times;</a>
                <h1>MY PROFILE</h1>
                <img src="../image/av.png" alt="">
                <form action=" " method="POST">
                    <div class="text">
                        <input type="name" name="name" id="myInput" value="<?= $individual['name'] ?>" readonly>
                        <span> </span>
                        <label for="">Name</label>
                    </div>
                    <div class="text">
                        <input type="email" name="email" id="myInput" value="<?= $individual['email'] ?>" readonly>
                        <span> </span>
                        <label for="">Email</label>
                    </div>
                    <div class="text">
                        <input type="date" name="date" id="myInput" value="<?= $individual['date'] ?>" readonly>
                        <span> </span>
                        <label for="">Date of Birth</label>
                    </div>
                    <button class="display-button"><a
                            href="update_profile.php?email=<?= $individual['email'] ?>">EDIT</a></button>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>