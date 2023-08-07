<?php
require_once("admin_template.php");
?>
<div class="form">
    <form action="../admin_backend/add_room.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <label for="room_number">Room No:</label>
            <input type="text" id="room_no" name="room_no" required>
        </div>
        <div class="form-row">
            <label for="room_type">Room Type:</label>
            <input type="text" id="room_type" name="room_type" required>
        </div>
        <div class="form-row">
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>
        </div>
        <div class="form-row">
            <label for="room_image">Room Image:</label>
            <input type="file" name="room_img" accept=".jpg, .png, .jpeg" required>
        </div>
        <div class="form-row">
            <input type="submit" value="Add Room" name="save_room_image">
        </div>
    </form>
</div>

<div class="table-data">
    <div class="order">
        <h1>ROOMS</h1>
        <table class="table" border="2px">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Room No</th>
                    <th class="text-center">Room Type </th>
                    <th class="text-center">Capacity</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>

            <?php
            include_once "../admin_backend/connect.php";

            // Fetch room data
            $roomQuery = "SELECT * FROM room";
            $roomResult = mysqli_query($conn, $roomQuery);

            if (mysqli_num_rows($roomResult) > 0) {
                while ($roomRow = mysqli_fetch_assoc($roomResult)) {
                    // Fetch booking status for the current room
                    $bookingQuery = "SELECT status FROM booking WHERE room_no= " . $roomRow['room_no'];
                    $bookingResult = mysqli_query($conn, $bookingQuery);

                    if ($bookingResult && mysqli_num_rows($bookingResult) > 0) {
                        $bookingRow = mysqli_fetch_assoc($bookingResult);
                        $bookingStatus = $bookingRow['status'];

                        // Set display status based on the booking status
                        $displayStatus = $bookingStatus === 'Confirmed' ? 'Booked' : 'Available';
                    } else {
                        $displayStatus = 'Available';
                    }
                    ?>
                    <tr>
                        <td>
                            <?= $roomRow["id"] ?>
                        </td>
                        <td>
                            <?= $roomRow["room_no"] ?>
                        </td>
                        <td>
                            <?= $roomRow["room_type"] ?>
                        </td>
                        <td>
                            <?= $roomRow["capacity"] ?>
                        </td>
                        <td><img src="upload/<?php echo $roomRow["room_image"]; ?>" width="80"></td>
                        <td>
                            <?= $displayStatus ?>
                        </td>
                        <td>
                            <a href='../admin_backend/delete_room.php?room_no="<?= $roomRow['room_no'] ?>"' class="btn"><i
                                    class="bx bx-trash delete-icon"></i></a>
                            <a href='update_room.php?id="<?= $roomRow['id'] ?>"' class="btn"><i class="bx bx-edit"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </div>
</div>
</section>
</section>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
        const currentPage = window.location.pathname.split('/').pop(); // Get the current page URL
        console.log(currentPage);
        console.log(allSideMenu);
        allSideMenu.forEach(item => {
            const li = item.parentElement;
            console.log(li);

            if (item.getAttribute('href') === currentPage) {
                li.classList.add('active');
            }

            item.addEventListener('click', function () {
                allSideMenu.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });
    });
</script>
</body>

</html>