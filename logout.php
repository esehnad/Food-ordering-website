<?php 
   
   include('config/constants.php');
           //destroy the session 
           session_destroy();  //unsets $-session['user]
           
           //redirect it to login page
           header('location:'.SITEURL.'admin/login.php');
           
?>