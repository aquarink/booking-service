<?php 

session_start();
session_destroy();
session_unset('mekanik');
header("location: ../adminlogin.php")
?>