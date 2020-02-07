<?php
include ('session.php');
include ('config.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>IT Service Payment & Shipping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="payment.css">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment & Shipping</h2>
          <p>IT services </p>
        </div>
        <form action="./files/SocketProgramming/Client/orderstatus.php" method="post">
          <div class="products">
            <h3 class="title">Checkout</h3>
<?php
 $count=1;
$id=$_SESSION['Customer_id'];


$price=0;
$sel_query="Select * from Inventory where item_id IN (select item_id from cart where Customer_id=$id)";
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="item">
              <span class="price"><?php $price=$price+$row["price"]; echo $row["price"]; ?></span>
              <p class="item-name">Product <?php echo $count; ?></p>
              <p class="item-description"><?php echo $row["item_name"]; ?></p>
            </div>
<?php $count++; } ?>
		<div class="total">Total<span class="price"><?php echo  $price; $_SESSION['price']=$price;?></span></div>  
 <?php    /*            <div class="item">
              <span class="price">$120</span>

         <p class="item-name">Product 2</p>
              <p class="item-description">Lorem ipsum dolor sit amet</p>  
            </div>  */ ?>
            

          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" name="cardholder" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
             <!--    <label for="">Expiration Date</label> -->
                <div class="input-group expiration-date">
                <!--   <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1"> -->
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" name="cardnumber" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
             <!--   <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1"> -->
              </div>
        <!--      <div class="form-group col-sm-12">
                <button type="button" class="btn btn-primary btn-block">Proceed</button>
              </div> -->
            </div>
	</div>
          <div class="card-details">
            <h3 class="title">Shipping Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Name</label>
                <input id="card-holder" type="text" class="form-control" name="name" placeholder="Name" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
           <!--     <label for="card-holder">Phone Number</label>
                <input id="card-holder" type="text" class="form-control" name="phonenumber" placeholder="9963730322" aria-label="Card Holder" aria-describedby="basic-addon1">  -->

                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">City</label>
                <input id="card-number" type="text" class="form-control" name="city" placeholder="City" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">Zip Code</label>
                <input id="cvc" type="text" class="form-control" name="zipcode" placeholder="12561" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">Proceed</button>
              </div>
            </div>
          </div>
	</form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>