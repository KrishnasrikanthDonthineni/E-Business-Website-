<?php
  session_start();
include("config.php");
   
$errors = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);

  	$query = "SELECT * FROM Customer WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
         //echo $_SESSION['username'];
  	  $_SESSION['success'] = "You are now logged in";
	
  	  header('location: index1.php');
  	}else {
  		echo '<script>alert("Invalid details")</script>';  
                echo '<script>window.location="index.html"</script>';

  	}
  }
}

?>