<?php 
include('../../../session.php');

include('config.php');
$Customer_id=$_SESSION['Customer_id'];

$open = fopen('Qs.dat','r');

while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
	list($name,$city,$postcode,$job_title) = $explodeLine;
	echo $name;
   echo $city;
   echo $postcode;
    echo $job_title;
	$qry = "insert into visualize (Customer_id,customer_type,item_name,quantity,totalprice) values('".$Customer_id."','".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($db,$qry);
}

fclose($open);


?>