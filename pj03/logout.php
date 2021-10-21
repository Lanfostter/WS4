<?php 
    //Include constants.php for SITEURL
    session_start();
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']
    //2. REdirect to Login Page
    header("Location:login.php");
?>