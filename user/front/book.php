<?php
session_start();
include('../backend/connect.php');
$query = "select * from room";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="homepage.php"><img src="../image/2.png" alt=""></a>
            <p>Book Now</p>
        </div>
        <div class="search-bar">
            <form action="../backend/search.php" method="get">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class='bx bx-search'></i></button>
                <a href="homepage.php" class="close">&times;</a>
            </form>
        </div>
    </nav>
    <div class="header">

    </div>
    <section class="book">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="room-content">
                <div class="room">
                    <a href="#divone-<?php echo $row['room_no']; ?>"><img src="../../admin/admin/upload/<?php echo $row["room_image"]; ?>" alt=""
                            class="room-img"></a>
                    <div class="detail">
                        <h2 class="room-title"><span class='bx bx-room'>
                                <?php echo $row["room_no"]; ?>
                            </span></h2>
                        <span class="price"><span class='bx bx-bed'>
                                <?php echo $row["room_type"]; ?>
                            </span><br>
                            <span class="price"><span class='bx bx-group'>
                                    <?php echo $row["capacity"]; ?>
                                </span><br>
                                <a href="#divone-<?php echo $row['room_no']; ?>" onclick="setRoomNo(<?php echo $row['room_no']; ?>)"><button
                                        class="btn">Book Now</button></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </section>

    <?php
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="overlay" id="divone-<?php echo $row['room_no']; ?>">
            <div class="wrapper">
                <h2>Please Fill up the Form</h2>
                <a href="#" class="close">&times;</a>
                <div class="content">
                    <div class="container">
                        <?php
                        $email = $_SESSION['email'];
                        ?>
                        <form action="../backend/booking.php" method="POST" onsubmit="return validate()">
                            <div class="input">
                                <?php if (isset($email)) { ?>
                                    <input type="hidden" name="email" id="email" value="<?= $email ?>" required>
                                <?php } ?>
                            </div>
                            <div class="input">
                                <label for="date">Arrival Date:</label><br>
                                <input type="date" name="arrival" id="arrival" required>
                            </div>
                            <div class="input">
                                <label for="time">Time:</label><br>
                                <input type="time" name="arrival_time" id="arrival_time">
                            </div>
                            <div class="input">
                                <label for="date">Departure Date:</label><br>
                                <input type="date" name="depature" id="depature">
                            </div>
                            <div class="input">
                                <label for="number">Number of People:</label><br>
                                <input type="number" name="number" id="number-<?php echo $row['room_no']; ?>"
                                       value="<?php echo $row['capacity']; ?>" readonly>
                            </div>
                            <div class="input">
                                <input type="hidden" name="status" value="Pending">
                            </div>
                            <div class="input">
                                <input type="hidden" name="room_no" id="room_no-<?php echo $row['room_no']; ?>">
                            </div>
                            <button class="button" type="submit">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <script>
        function validate() {
            var inputDate = document.getElementById("arrival").value;
            var inputDate1 = document.getElementById("departure").value;
            var select = new Date(inputDate);
            var select1 = new Date(inputDate1);
            var current = new Date();
            var current1 = new Date();
            if (select < current) {
                alert("You cannot book on a past date.");
                return false;
            } else if (select1 < current1) {
                alert("You cannot book on a past date.");
                return false;
            } else {
                return true;
            }
        }

        function setRoomNo(roomNo) {
            document.getElementById("room_no-" + roomNo).value = roomNo;
        }
    </script>

</body>

</html>
