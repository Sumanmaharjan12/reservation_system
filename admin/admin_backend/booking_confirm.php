<?php
 include_once "../admin_backend/connect.php";

// Check if the booking status is confirmed and show the confirmation message
if (isset($_GET['status']) && $_GET['status'] === 'Confirmed') {
  
    echo '<h1>Booking Confirmed!</h1>';
    echo '<p>Thank you for booking with us. Your booking has been confirmed.</p>';
} else {
    // If the booking status is not confirmed, you can show a different message or redirect to an error page
    // ...
}
?>
