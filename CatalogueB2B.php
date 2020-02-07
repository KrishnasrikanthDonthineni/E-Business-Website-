 <?php 
include('session.php');
include("config.php");
  $result1 = mysqli_query($db,"SELECT * FROM Inventory");
$c=$_SESSION['Customer_id'];
   $query2 = "SELECT * FROM Checkout_order where Customer_id=$c"; 

$status=""; 
if(isset($_POST["add_to_cart"]))
{
if($_POST["quantity"]<=$_POST["hidden_quantity"])
 {
$new_quantity = $_POST["hidden_quantity"]-$_POST["quantity"];
$item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
mysqli_query($db,"update Inventory set quantity ='$new_quantity' where item_id='$item_array[item_id]'"); 
mysqli_query($db, "INSERT INTO cart (Customer_id,item_id,quantity) VALUES ('$_SESSION[Customer_id]','$item_array[item_id]','$item_array[item_quantity]')");
$status = "<div class='box'>Product is added to your cart!</div>";
}
}
if(isset($_POST["cart_details"]))
{ $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
$_SESSION["shopping_cart"][0] = $item_array;

            
}
?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>IT Services Shopping Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />

<style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    
  }
box {
  width: 320px;
  padding: 10px;
  border: 5px solid gray;
  margin: 0;
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
       



     <li><a href="https://cs.newpaltz.edu/e/b-f19-03/files/SocketProgramming/Server/visualize.php">Visulization</a></li>
         
        </ul>
       </li>
       <li><a href="https://cs.newpaltz.edu/e/b-f19-03/cart.php">CART</a></li>
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



           <br />  
           <div class="container" style="width:900px;"> 
</br>
		<h3 align="left">click below to download the plugin for socket programming</h3>	
                
		 <a href="B2B-client-plugin-updated.zip"<h3 align="center">>B2B-client-plugin-updated.zip Download</h3></a><br />  
<!-- Write your comments here -->   
                <br />  
             <p>The Ports to connect IT service-1 is Port1 :-11014 (Recieving The data from you) </p>
            <p>Port2 :-11015(Sending The confirmation data from IT-Service) </p>
           <p>  The format for the Order/request file is cutomer_type,item_name,quantity,total_price (Data should be seperated by , ) </p>
               <p> The Staus reply format o (Zero)if successfull and 1 (one)if it is a failure </p> 
               <?php  
                $query = "SELECT * FROM Inventory ORDER BY item_id ASC";  
                $result = mysqli_query($db, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4" style="margin-top:20px;">  
                     <form method="post" action="Catalogue.php?action=add&id=<?php echo $row["item_id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["images"]; ?>" class="img-responsive" /><br />  
				<h4 class="text-info">In-Stock:<?php echo $row["quantity"]; ?></h4>  

                               <h4 class="text-info">Item-Name:<?php echo $row["item_name"]; ?></h4>  
                               <h4 class="text-danger">Price:$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
				<input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>" />
                               <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
			       <table>
  <tr>
    <th><input type="submit" name="cart_details" style="margin-top:5px;" class="btn btn-success" value="Product Details" /></th>
    <th><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" /> </th>

 </tr>	 
             </table>                  
 
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
               <?php ?> <h3>Product Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                                 
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
    <?php      ?> </div> 
 
           <br />
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>

</div>

<?php  /*  ?>
 <div class="container">     
<?php
if (mysqli_num_rows($result) > 0) {
?>       
  <table class="table">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Item Quantity</th>
        <th>Price</th>
<th>Quantity Required</th>
<th></th>
      </tr>
    </thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result1)) {
?>
<tr>
    <td><?php echo $row["item_name"]; ?></td>
    <td>$ <?php echo $row["price"]; ?></td>
    <td><?php echo $row["quantity"]; ?></td>
<td>
<form>
<input type="text" class="form-control" style="width:50%">
</form>
</td>
<td>
<button class="btn btn-primary" type="button">Add to Cart</button>
</td>
    </tr>
<?php
$i++;
}
?>   
  </table>
<?php
}
else{
    echo "No result found";
}
?>
</div>     
 <?php */ ?>
</body>  
 </html>
