<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../admin/admin_login.php");
    exit();
}
    ?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN</title>
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
                    <a href="admin_index.php"><img src="../images/admin.png" alt="Logo1">
                    </a>
                </div>
                <ul class="side-menu top">
                    <li>
                        <a href="admin_index.php" onclick="showbooking()">
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
                        <a href="room.php">
                            <i class='bx bx-bed'></i>
                            <span class="text">Rooms</span>
                        </a>
                    </li>
                </ul>
                <ul class="side-menu">

                    <li>
                        <a href="../admin_backend/logout.php">
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
                    <section class="content">
