<?php
//include('../../session.php');
include('config.php');
$file = "Qc.dat";
$f = fopen($file, 'w'); // Open in write mode

$sql = "SELECT * FROM bank";
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_assoc($result))
{
    $bank_id = $row['bank_id'];
    $Customer = $row['Customer_id'];
    $cardnumber = $row['cardnumber'];
     $cardname = $row['cardname'];
     $price1 = $row['price'];
   

    $accounts = "$bank_id :$Customer :$cardnumber : $cardname:$price1 \n";
    // Or "$user:$pass\n" as @Benjamin Cox points out

    fwrite($f, $accounts);
}

fclose($f);

//echo "TEST!";
?>