<?php
include_once("class/users.php");
session_start();
//unset($_SESSION['username']);
//unset($_SESSION['pword']);
session_destroy();
if(!isset($_SESSION['pword']) && !isset($_SESSION['username']) ){
     echo "<script>alert('Logout Successful! ')</script>";
    header("location:index.php"); 
}

?>