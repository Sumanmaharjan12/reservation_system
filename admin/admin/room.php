

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
                    <a href="admin_index.php"><img src="../images/admin.png" alt="Logo1">
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
                        <a href="room.php">
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
                        <a href="../admin_backend/logout.php" class="logout">
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
            <html>
            <head>
                <title></title>
            </head>
            <body>
            
                <form action="../admin_backend/add_room.php" method="POST" enctype="multipart/form-data">
                    <label for="room_number">Room No:</label>
                    <input type="text" id="room_no" name="room_no" required>
        
                    <label for="room_type">Room Type:</label>
                    <input type="text" id="room_type" name="room_type" required>
        
                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" required>
                    <label for="room_image">Room Image:</label>
                    <input type="file" id="room_image" name="room_image" accept="image/*" required>
        
                    <input type="submit" value="Add Room">
                </form> 
           
        <div class="table-data">
                <div class="order">
                     <h2>ROOMS</h2>
                    <table class="table" border="2px">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Room No</th>
                                <th class="text-center">Room Type </th>
                                 <th class="text-center">Capacity</th>
                                 <th class="text-center">Image</th>
                            </tr>
                        </thead>
                            <?php
                            include_once "../admin_backend/connect.php";
                            $query="select * from room";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_assoc($result)) {
                                
                            ?>
                            <tr>
                                <td><?=$row["id"]?>
                            <td><?=$row["room_no"]?>
                            <td><?=$row["room_type"]?>
                            <td><?=$row["capacity"]?></td>
                            <td><?=$row["image"]?></td>
                            
                            <td>
                                    <a href='../admin_backend/delete_user.php?email="<?=$row['room_no']?>"' class="btn"><i class="bx bx-trash delete-icon"></i></a>            
                            </td>      
                            </tr>
                            <?php    
                                }
                            }
                            ?>
                        </table>
                </div>
             </div>
                <?php
                }
                ?>