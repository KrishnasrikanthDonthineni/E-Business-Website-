<?php
include('BANKdatabasetotext.php');
include('shippingdatabasetotext.php');
//exec("java -cp .:/home/donthink1/WWW/Projects/simple/samplle/Final/SocketProgramming/Client Client", $output);
//print_r($output);
//include('session.php');
include('config.php');
$Customer_id=$_SESSION['Customer_id'];
$price=$_SESSION['price'];
$Order_id=1;
$username = $_POST['name'];
$CustomerType=$_POST['phonenumber'];
$password = $_POST['city'];
$email = $_POST['zipcode'];

$sel_query="Select * from Orders where Customer_id=$Customer_id";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
$quantity= $row["quantity"];
$item_id= $row["item_id"];
$item_name="phonw";
$INSERT = "INSERT INTO Checkout_order (Order_id,Customer_id,item_name,quantity,totalprice) values(?, ?, ?, ?, ?)";
     $stmt = $db->prepare($INSERT);

     $stmt->bind_param("iisii",$Order_id,$Customer_id,$item_name,$quantity,$price);
     $stmt->execute();

	

   //  header('Location: index.html');
     $stmt->close();



 if (!empty($username) ||!empty($password) || !empty($email) || !empty($CustomerType)) {


     $INSERT = "INSERT INTO shopping (Customer_id,quantity,item_id,name,phonenumber,city,zipcode) values(?, ?, ?, ?, ?, ?, ?)";
     $stmt = $db->prepare($INSERT);

     $stmt->bind_param("iiisisi",$Customer_id,$quantity,$item_id,$username,$CustomerType,$password,$email);
     $stmt->execute();
	 $stmt->close();
	
     
    // $db->close();

} else {
	echo "all fields required";

	die();
}
}
$cardholder = $_POST['cardholder'];
echo $cardholder;
$cardnumber=$_POST['cardnumber'];




if (!empty($cardholder) ||!empty($cardnumber) ) {


     $INSERT = "INSERT INTO bank (Customer_id,cardnumber,cardname,price) values(?, ?, ?, ?)";
     $stmt = $db->prepare($INSERT);

     $stmt->bind_param("iisi",$Customer_id,$cardnumber,$cardholder,$price);
     $stmt->execute();
	

   //  header('Location: index.html');
     $stmt->close();
   //  $db->close();

} else {
	echo "all fields required";

	die();
}


//delete

$sql = "DELETE FROM Orders where Customer_id=$Customer_id ";
if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
$db->close();
}
//exec('php BANKdatabasetotext.php');


?>
