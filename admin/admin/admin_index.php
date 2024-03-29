<?php
require_once ("admin_template.php");
?>
                    <section class="right-lower">
                        <ul class="box-info">
                            <?php
                            include "../admin_backend/connect.php";
                            //Display the student count 
                            $query = "SELECT COUNT(*) AS user_count FROM sign";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $userCount = $row['user_count'];

                            //Display the Admin Count
                            $query = "SELECT COUNT(*) as admin_count FROM admin_detail";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $adminCount = $row['admin_count'];

                            //Display the Total Count
                            $query = "SELECT COUNT(*) as total_booking FROM booking";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $bookingCount = $row['total_booking'];
                            ?>
                            <li>
                                <i class='bx bx-user user-icon'></i>
                                <span class="text">
                                    <h3>
                                        <?php echo $userCount; ?>
                                    </h3>
                                    <p>No. of Users</p>
                                </span>
                            </li>
                            <li>
                                <i class='bx bx-user-circle admin-icon'></i>
                                <span class="text">
                                    <h3>
                                        <?php echo $adminCount; ?>
                                    </h3>
                                    <p>No of Admins</p>
                                </span>
                            </li>
                            <li>
                                <i class='bx bx-calendar booking-icon'></i>
                                <span class="text">
                                    <h3>
                                        <?php echo $bookingCount; ?>
                                    </h3>
                                    <p>Total Booking</p>
                                </span>
                            </li>
                        </ul>

                        <div class="table-data">
                            <div class="order">
                                <h2>Admin</h2>

                                <a href="#divone" class="btn"><i class="bx bx-plus add-icon"></i></a>
                                <table class="table" border="2px">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email </th>
                                            <th class="text-center">Date of Birth</th>
                                            <th class="text-center">Phone Number</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include_once "../admin_backend/connect.php";
                                    $query = "select * from admin_detail";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $row["name"] ?>
                                                <td>
                                                    <?= $row["email"] ?>
                                                <td>
                                                    <?= $row["date"] ?>
                                                </td>
                                                <td>
                                                    <?= $row["number"] ?>
                                                </td>
                                                <td>
                                                    <a href='../admin_backend/delete_admin.php?email="<?= $row['email'] ?>"'
                                                        class="btn"><i class="bx bx-trash delete-icon"></i></a>
                                                </td>
                                            </tr>
                                            <?php


                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>

                    </section><!-- right lower -->
                    </section><!-- content -->
                </section><!-- main -->
                <div class="overlay" id="divone">
                    <div class="wrapper">
                        <h2>Please Fill up the Form</h2>
                        <a href="#" class="close">&times;</a>
                        <div class="content">
                            <div class="container">
                                <form action="../admin_backend/add_admin.php" method="POST">
                                    <div class="input">
                                        <label for="name">Name:</label><br>
                                        <input type="name" name="name" id="name" required>
                                    </div>
                                    <div class="input">
                                        <label for="email">Email:</label><br>
                                        <input type="email" name="email" id="email" required>
                                    </div>
                                    <div class="input">
                                        <label for="date">Date of Birth:</label><br>
                                        <input type="date" name="date" id="date">
                                    </div>
                                    <div class="input">
                                        <label for="number">Phone Number:</label>
                                        <input type="text" name="number" id="number">
                                    </div>
                                    <button class="button" type="submit">Book</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="notification">
                    <p> Welcome,
                        <?php echo $_SESSION['name'] ?>
                    </p>
                    <span class="notification_progress"></span>
                </div>
    </body>

    </html>
 