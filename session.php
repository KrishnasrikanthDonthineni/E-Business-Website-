<?php
session_start();
   include('config.php');
   
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"select username,Customer_id from Customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $_SESSION['Customer_id']=$row['Customer_id'];
 // $_SESSION['price']=;
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location: index.html");

      die();
   }
?>