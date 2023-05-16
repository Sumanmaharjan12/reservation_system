<?php
    session_start();

    session_unset();
    header('location:front/login.php');
?>