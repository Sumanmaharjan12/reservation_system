<?php
include('connect.php');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['status']) && isset($_POST['code'])) {
    $status = $_POST['status'];
    $code = $_POST['code'];

    // Perform necessary validations and security checks here

    $sql = "UPDATE booking SET status='$status' WHERE code='$code'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Reservation status updated successfully";
    } else {
        echo "Error updating reservation status: " . $conn->connect_error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
