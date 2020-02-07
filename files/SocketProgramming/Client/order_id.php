 <?php 
include('../../../session.php');
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
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }

  </style>


 
      </head>  
      <body>  

<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #333399;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IT Services</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="https://cs.newpaltz.edu/e/b-f19-03/index1.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products List <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="https://cs.newpaltz.edu/e/b-f19-03/Catalogue.php">Catalogue</a></li>
>
        </ul>
      </li>
      <li><a href="https://cs.newpaltz.edu/e/b-f19-03/cart.php">CART </a></li>
	<form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><button  style="width:auto;"><span class="glyphicon glyphicon-log-out"><a href = "https://cs.newpaltz.edu/e/b-f19-03/logout.php"></span> LOGOUT</a></button></li>
 

    </ul>
  </div>
</nav>

 
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
