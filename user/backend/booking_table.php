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
$query = "SELECT b.code, b.email, b.arrival, b.arrival_time, b.depature, b.number, b.status, r.room_no
FROM booking b
INNER JOIN room r ON b.room_no = r.room_no
WHERE b.email = '$email'";
$result = mysqli_query($conn, $query);


// Check for errors
if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}
$records=array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $i = 0;
    // Looping through the results
    while ($row = mysqli_fetch_assoc($result)) {
        $currentDateTime = date("Y-m-d H:i:s");

        // Check if the booking has expired
        if ($currentDateTime > $row["depature"]) {
            continue;
        }
        $records[$i] = array(
            "code" => $row['code'],
            "email" => $row['email'],
            "arrival" => $row['arrival'],
            "arrival_time" => $row['arrival_time'],
            "depature" => $row['depature'],
            "number" => $row['number'],
            "status" => $row['status'],
            "room_no" => $row['room_no'],
        );
        $i++;
    }
}

?>
<link rel="stylesheet" href="../backend_css/booking_table.css">
<section class="booking" id="booking">
    <section class="clip_path">
        <h1>My BOOKING</h1>
        <a href="../front/homepage.php"><img src="../image/logout.png" alt=""></a>
    </section>
    <table border="2px" class="table">
        <thead>
            <th>Code</th>
            <th>Email</th>
            <th>Arrival Date</th>
            <th>Time</th>
            <th>Depature Date</th>
            <th>Number of Person</th>
            <th>Room No</th>
            <th>status</th>
        </thead>
        <tbody>
            <?php
            foreach ($records as $individual) {
                ?>
                <tr>
                    <td>
                        <?= $individual['code']; ?>
                    </td>
                    <td>
                        <?= $individual['email']; ?>
                    </td>
                    <td>
                        <?= $individual['arrival']; ?>
                    </td>
                    <td>
                        <?= $individual['arrival_time']; ?>
                    </td>
                    <td>
                        <?= $individual['depature']; ?>
                    </td>
                    <td>
                        <?= $individual['number']; ?>
                    </td>
                    <td>
                        <?= $individual['room_no']; ?>
                    </td>
                    <td>
                        <?= $individual['status']; ?>
                    </td>
                    <td>
                        <a href='delete.php?email="<?= $individual['email'] ?>"' class="btn">Delete</a>

                    </td>
                </tr>
                <?php
            }
            if (empty($records)) {
                echo '<p style="color: red; font-size: 18px; text-align: center;">No booking records found.</p>';
            }
            ?>
        </tbody>
    </table>
</section>