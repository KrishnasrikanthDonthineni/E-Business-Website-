<?php 
//include('../../../session.php');
include('config.php');
$test=0;
$open = fopen('BAc.dat','r');

if (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
	list($name) = $explodeLine;
	$test=$name;

       
   }
fclose($open);

if($test==0){

 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="Orderstatus.css">
</head>
<body>
  <main class="page payment-page">
  <ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Transaction</li><!--
 --><li class="progtrckr-todo">Shipped</li><!--
 --><li class="progtrckr-todo">Delivered</li>
</ol>

</main>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>



<?php 


 
 include('shippingdatabasetotext.php');
exec("java  ShippingClient", $output);
include ('shippingreadAcfile.php');


}
else
{ 


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="Orderstatus.css">
</head>
<body>
  <main class="page payment-page">
  <ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-fail">Transaction</li><!--
 -->
</ol>
</br>
 <h3> Transation Failed Please Try Again </h3>
</br>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>




<?php 


}






?>
