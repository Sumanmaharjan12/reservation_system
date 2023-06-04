<?php
session_start();
include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php');
    exit();
}

// Retrieve the user ID from the session
// $name= $_SESSION['name'];
$email= $_SESSION['email'];


// Establish a database connection


// Retrieve records for the logged-in user
$query="select * from booking where email='$email'";
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
            "Code" => $row['Code'],
            "email" => $row['email'],
            "arrival" => $row['arrival'],
            "arrival_time" => $row['arrival_time'],
            "depature" => $row['depature'],
            "number" => $row['number'],
        );
        $i++;
    }
}
?>
<link rel="stylesheet" href="front/booking_table.css">
<div class="booking">
    <h1>MY BOOKING</h1>
    <a href="front/homepage.php"><img src="image/logout.png" alt=""></a>
</div>
<table border="2px" class="table">
    <thead>
        <th>SN</th>
        <th>Email</th>
        <th>Arrival Date</th>
        <th>Time</th>
        <th>Depature Date</th>
        <th>Number of Person</th>
        
    </thead>
    <tbody>
        <?php 
                foreach($records as $individual){
                    ?>
                    <tr>
                        <td> <?=$individual['Code']; ?> </td>
                         <td> <?=$individual['email']; ?> </td>
                         <td> <?=$individual['arrival']; ?> </td>
                         <td> <?=$individual['arrival_time']; ?> </td>
                         <td> <?=$individual['depature']; ?> </td>
                         <td> <?=$individual['number']; ?> </td>
                         <td>
                            <a href="" class="btn">Edit</a>
                         </td>
                         <td>
                                <a href='delete.php?email="<?=$individual['email']?>"' class="btn">Delete</a>
                            </form>
                         </td>
                    </tr>
                    <?php
                }
        ?>
        </tbody>
            </table>

<!-- // Display the records
while ($row = mysqli_fetch_assoc($result)) {
    // Display or manipulate the data as needed
    echo "Code:" .$row['Code']. "<br>";
    echo "name:" .$row['name']. "<br>";
    echo "email:" .$row['email']. "<br>";
    echo "arrival:" .$row['arrival']. "<br>";
    echo "time:" .$row['arrival_time']. "<br>";
    echo "departure:" .$row['departure']. "<br>";
    echo "number:" .$row['number']. "<br>";

    // ...
} -->
<!-- 
// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?> -->
