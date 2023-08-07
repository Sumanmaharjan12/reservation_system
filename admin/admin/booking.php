<?php
require_once("admin_template.php");

?>


<div class="table-data">
    <div class="order">
        <h2>BOOKINGS</h2>
        <table class="table" border="2px">
            <thead>
                <tr>
                    <th class="text-center">Code</th>
                    <th class="text-center">Email </th>
                    <th class="text-center">Arrival</th>
                    <th class="text-center">Arriv Time</th>
                    <th class="text-center">Depature</th>
                    <th class="text-center">Number</th>
                    <th class="text-center">Room No</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php
            include_once "../admin_backend/connect.php";
            $query = "select * from booking";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $currentDateTime = date("Y-m-d H:i:s");

                    // Check if the booking has expired
                    if ($currentDateTime > $row["depature"]) {
                        $deleteQuery = "DELETE FROM booking WHERE code = '{$row['code']}'";
                        mysqli_query($conn, $deleteQuery);
                        continue; // Skip this booking if it has expired
                    }

                    ?>
                    <tr>
                        <td>
                            <?= $row["code"] ?>
                        <td>
                            <?= $row["email"] ?>
                        <td>
                            <?= $row["arrival"] ?>
                        </td>
                        <td>
                            <?= $row["arrival_time"] ?>
                        </td>
                        <td>
                            <?= $row["depature"] ?>
                        </td>
                        <td>
                            <?= $row["number"] ?>
                        </td>
                        <td>
                            <?= $row["room_no"] ?>
                        </td>
                        <td>
                            <?= $row["status"] ?>
                        </td>
                        <td>
                            <select onchange="updateStatus(this.value, '<?= $row['code']; ?>')">
                                <option value="Pending" <?php echo ($row["status"] == "Pending") ? "selected" : ""; ?>>Pending
                                </option>
                                <option value="Confirmed" <?php echo ($row["status"] == "Confirmed") ? "selected" : ""; ?>>
                                    Confirmed</option>
                                <option value="Cancelled" <?php echo ($row["status"] == "Cancelled") ? "selected" : ""; ?>>
                                    Cancelled</option>
                            </select>
                        </td>
                        <td>
                            <a href='../admin_backend/delete_booking.php?email="<?= $row['email'] ?>"' class="btn"><i
                                    class="bx bx-trash delete-icon"></i></a>
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

<script>

function updateStatus(status, code) {
    // Create a new FormData object
    var formData = new FormData();

    // Append the status and code to the FormData object
    formData.append('status', status);
    formData.append('code', code);

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the request
    xhr.open('POST', '../admin_backend/update_status.php', true);

    // Set the onload function
    xhr.onload = function () {
        if (xhr.status === 200) {
            // If the update is successful, update the status in the current view
            var table = document.querySelector('.table');
            var rows = table.getElementsByTagName('tr');

            // Find the row that corresponds to the booking code
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var rowCode = row.cells[0].innerText;
                if (rowCode === code) {
                    // Update the status cell in the row
                    row.cells[7].innerText = status;
                    break;
                }
            }

            console.log(xhr.responseText);
        }
    };

    // Send the request with the FormData
    xhr.send(formData);
}
</script>

</body>

</html>
