<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../admin/admin_login.php");
} else {
    ?>  
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../admin_css/header.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
    </head>

    <body>
        
        <div class="dashboard"> <!-- dashboard begins ------------------------------------------------------------------->
        <!-- SIDEBAR -->
            <section id="sidebar">
                <div class="icon1">
                    <a href="../Landing_pages/index.php"><img src="../images/admin.png" alt="Logo1">
                    </a>
                </div>
                <ul class="side-menu top">
                    <li>
                        <a href="admin_index.php">
                            <i class='bx bxs-dashboard'></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="users.php">
                            <i class='bx bx-user'></i>
                            <span class="text">Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="booking.php">
                            <i class='bx bx-time'></i>
                            <span class="text">Booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard_managegallery.php">
                            <i class='bx bx-bed'></i>
                            <span class="text">Rooms</span>
                        </a>
                    </li>
                </ul>
                <ul class="side-menu">
                    <li>
                        <a href="#">
                            <i class='bx bxs-cog'></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="../logout.php" class="logout">
                            <i class='bx bxs-log-out-circle'></i>
                            <span class="text">Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            

            <section class="main"> <!-- main section begins ------------------------------------------------------------>

            <section class="right-upper">
        <div class="right_about">
        <div>
            <p>
                <?php echo $_SESSION['name']; ?>
            </p>
        </div>

        <div class="profile">
            <img src="../images/avatar.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="notification_icon">
            <button class="notification_btn" title="Notification">
                <a href="#"> <span class="material-symbols-outlined">notifications</span>
                </a>
            </button>
                </div>
             </div>
            </section>
            <section class="right-lower">
                        <ul class="box-info">
                        <?php
                            include "../admin_backend/connect.php";
                            //Display the student count 
                            $query = "SELECT COUNT(*) AS user_count FROM sign";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $userCount= $row['user_count'];

                            //Display the Admin Count
                            $query = "SELECT COUNT(*) as admin_count FROM admin";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $adminCount= $row['admin_count'];

                            //Display the Total Count
                            $query = "SELECT COUNT(*) as total_booking FROM booking";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $bookingCount= $row['total_booking'];
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
                       
    </body>  
    </html>
    <?php
}
?>