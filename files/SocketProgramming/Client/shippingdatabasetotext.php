<?php
//include('../../session.php');
include('config.php');

$file = "Qc.dat";
$f = fopen($file, 'w'); // Open in write mode

$sql = "SELECT * FROM shopping";
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_assoc($result))
{
    $Shopping_id = $row['Shopping_id'];
    $Custome = $row['Customer_id'];
    $quantity  = $row['quantity'];
     $item_id = $row['item_id'];
     $name  = $row['name'];
	$phonenumber = $row['phonenumber'];
	$city = $row['city'];
        $zipcode = $row['zipcode'];
   

    $accounts = "$Shopping_id :$Custome :$quantity : $item_id : $name : $phonenumber :$city : $zipcode  \n";
    // Or "$user:$pass\n" as @Benjamin Cox points out

    fwrite($f, $accounts);
}

fclose($f);

//echo "TEST!";
?>