<?php
session_start();

include('config.php');
$username = $_POST['username'];
$CustomerType=$_POST['CustomerType'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];


$query = "SELECT * FROM Customer WHERE username='$username' ";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 0) {


       if (!empty($username) ||!empty($password) || !empty($email) || !empty($address)|| !empty($CustomerType)) {


     $INSERT = "INSERT INTO Customer (username,password,CustomerType,email,address) values(?, ?, ?, ?, ?)";
     $stmt = $db->prepare($INSERT);

     $stmt->bind_param("sssss",$username,$password,$CustomerType,$email,$address);
     $stmt->execute();
	

     header('Location: index.html');
     $stmt->close();
     $conn->close();

  echo '<script>alert("Registration Successfull")</script>';

} else {
	echo "all fields required";

	die();
}

  	 
	
  	 // header('location: index1.php');
  	}else {
  		echo '<script>alert("User Already In Use")</script>';  
                echo '<script>window.location="index.html"</script>';

  	}





?>
