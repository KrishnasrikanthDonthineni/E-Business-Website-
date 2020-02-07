




<?php

include('../../../session.php');
include('config.php');

//exec("java  Client", $output);
//print_r($output);
//include('/home/donthink1/WWW/Projects/simple/samplle/Final/session.php');
//exec('php BANKdatabasetotext.php');
// calling the bank server

$Customer_id=$_SESSION['Customer_id'];
$pri=$_SESSION['price'];
//$Order_id=1;
$username = $_POST['name'];
$password = $_POST['city'];
$email = $_POST['zipcode'];
if($pri>0)
{
if (!empty($username) ||!empty($password) || !empty($email)) {

include('BANKdatabasetotext.php');
exec("java  BankClient", $output);
include ('bankreadAcfile.php');



if($test==0){

$sel_query="Select * from cart where Customer_id=$Customer_id";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 

$quantity= $row["quantity"];
$item_id= $row["item_id"];


$sql_query="Select * from Inventory where item_id='$item_id'";
$res = mysqli_query($db,$sql_query);
while($row1 = mysqli_fetch_assoc($res)) { 

$item_name=$row1["item_name"];
$price=($quantity * $row1["price"]);


$INSERT = "INSERT INTO Checkout_order (Customer_id,item_name,quantity,totalprice) values(?, ?, ?, ?)";
     $stmt = $db->prepare($INSERT);

     $stmt->bind_param("isii",$Customer_id,$item_name,$quantity,$price);
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
}
$cardholder = $_POST['cardholder'];
//echo $cardholder;
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

$sql = "DELETE FROM cart where Customer_id=$Customer_id ";
if ($db->query($sql) === TRUE) {
   // echo "Record deleted successfully";
$db->close();
}
}
}
else 
{
echo "all fields required";

}
}
else
{
echo '<script>alert("Please Go Back to the cart and buy something")</script>';  
                echo '<script>window.location="https://cs.newpaltz.edu/e/b-f19-03/Catalogue.php"</script>';

}



//calling the shipping server


?>


<html>
<head>
  <title>Order Status</title>
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="Orderstatus.css">
</head>
<body>
</br>
</br>
 <a href="https://cs.newpaltz.edu/e/b-f19-03/Catalogue.php">Back To Catalogue<\a>


</body>
</html>
  <?php 

include("config.php");
$Customer_id=$_SESSION['Customer_id'];
 ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Shopping Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
      <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="payment.css">
	

<style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    
  }
 

  </style>


 
      </head>  
      <body>  


 
<div class="pb-5" style="margin-top:80px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Order_id</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">item_name</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                </tr>
              </thead>
              <tbody>
<?php

echo "Your Order History";


$result=mysqli_query($db,"select * from Checkout_order");

$i=0;
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_array($result)) {
if ($row["Customer_id"]==$Customer_id)
{
?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $row["Order_id"]; ?></a></span>
                      </div>
                    </div>
                  </th>
			
                  <td class="border-0 align-middle"><strong><?php echo $row["item_name"]; ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $row["quantity"]; ?></strong></td>
<td class="border-0 align-middle"><strong><?php echo $row["totalprice"]; ?></strong></td>

			<td class="border-0 align-middle">
		

			
			
		</form>

		</td>

                </tr>
<?php
$i++;
}
}
}
else{
    echo "Hey {$_SESSION['username']} your Cart is empty:(";
}
?>
  
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>


    </div>

  </div>   
 </body>  
 </html>
<?php
