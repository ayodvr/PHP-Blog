<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
 include_once("class/users.php");
 session_start();
 
 if(isset($_GET['post_id'])){
 $post_id = $_GET['post_id'] != "" ? $_GET['post_id'] : "";
 
    $del_post = new User(); 
    $delete_rec = $del_post->delete_post($post_id);  

 } 
      if($_SESSION['username'] == "" && ($_SESSION['username'] != $delete_rec($_SESSION['username']))){
             echo "<script>alert('Ooops! Unauthorized....Please Log in')</script>"; 
 			header("refresh:0.00001; url=index.php");				
 			die();
    }
    
    //print_r($delete_rec);die;
 
 
 ?>