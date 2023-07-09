<?php
include "../admin_backend/connect.php";

if (isset($_GET['id'])) {
    $room_no = $_GET['id'];
    
    $sql = "SELECT * FROM room WHERE room.id = $room_no";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $i = 0;
        // Looping through the results
        while ($row = mysqli_fetch_assoc($result)) {
            $record = array(
                "id" => $row['id'],
                "room_no" => $row['room_no'],
                "room_type" => $row['room_type'],
                "capacity" => $row['capacity'],
                "room_image" => $row['room_image'],
            );
        }
    } else {
        echo "No records found!!";
        exit();
    }
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Update Room</title>
            <link rel="stylesheet" href="../admin_css/update.css">
        </head>
        <body>
            <div class="container">
                <div class="center">
                    <h1>Update Room</h1>
                    <form action="../admin_backend/roomedit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="room_no" value="<?= $record['id'] ?>">
                        <div class="text">
                            <label for="room_type">Room No:</label>
                            <input type="text" id="room_type" name="room_no" value="<?= $record['room_no'] ?>" readonly>
                        </div>
                        <div class="text">
                            <label for="capacity">Room Type:</label>
                            <input type="text" id="capacity" name="room_type" value="<?= $record['room_type'] ?>" required>
                        </div>
                        <div class="text">
                            <label for="capacity">Capacity:</label>
                            <input type="number" id="capacity" name="capacity" value="<?= $record['capacity'] ?>" required>
                        </div>
                        <div class="text">
                            <label for="room_image">Room Image:</label>
                            <input type="file" name="room_img" accept=".jpg, .png, .jpeg">
                            <img src="upload/<?= $record['room_image'] ?>" width="80">
                        </div>
                        <input type="submit" value="Update Room" name="update_room">
                        <button class="display-button"><a href="room.php">Go back</a></button>
                    </form>
                </div>
            </div>
        </body>
        </html>
        <?php

} else {
    echo "Invalid room number!";
    }
mysqli_close($conn);
?>
        

