<?php
session_start();
/* unset($_SESSION['code']);
 unset($_SESSION['email']);
 unset($_SESSION['arrival']);
 unset($_SESSION['time']);
 unset($_SESSION['depature']);
 unset($_SESSION['number']);
*/
session_destroy();
header('location:../front/index.php');
?>