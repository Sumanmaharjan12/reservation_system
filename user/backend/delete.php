<?php
include('connect.php');
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $query = "Delete from booking where code=$code";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script> alert('Deleted Sucessfull'); window.location='../front/homepage.php';</script>
        ";
    } else {
        echo "Error deleting the booking.";
        echo "<br /> <a href='../front/homepage.php'>Go Back </a>";
    }
}
mysqli_close($conn);
?>