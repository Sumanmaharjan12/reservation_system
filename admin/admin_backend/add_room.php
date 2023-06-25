<?php
    session_start();
    include('../admin_backend/connect.php');
    $roomNumber=$_POST['room_no'];
    $roomType=$_POST['room_type'];
    $capacity=$_POST['capacity'];

    $targetDir = "/uploads/";
    $targetFile = $targetDir . basename($_FILES["room_image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    $validExtensions = array("jpg", "jpeg", "png");
    if (in_array($imageFileType, $validExtensions)) {
        move_uploaded_file($_FILES["room_image"]["tmp_name"], $targetFile);
        $imagePath = $targetFile;
       
        $sql = "INSERT INTO rooms (room_no, room_type, capacity, image_path) VALUES ('$roomNumber', '$roomType', $capacity, '$imagePath')";
        echo "Room added successfully!";
    } else {
        echo "Invalid image file format. Only JPG, JPEG, and PNG images are allowed.";
    }

        // Close the database connection
        $conn->close();
        ?>