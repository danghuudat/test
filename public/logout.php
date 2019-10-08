<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location:dangnhap.php");
ob_end_flush();
include 'indexadmin.php.php';
//include 'home.php';
exit();



?>