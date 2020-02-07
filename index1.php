<?php
include ('session.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>IT Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="modal_styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
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
      <a class="navbar-brand" href="#">IT Service</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="https://cs.newpaltz.edu/e/b-f19-03/index1.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products List <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a  href="https://cs.newpaltz.edu/e/b-f19-03/Catalogue.php">Catalogue</a></li>
<li><a href="https://cs.newpaltz.edu/e/b-f19-03/files/SocketProgramming/Server/visualize.php">Visulization</a></li>
         

       
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
     <li>	
	<?php
if(isset($_SESSION['username']))
{
echo "Welcome to IT Service {$_SESSION['username']}<br>";
//echo "Customer_id {$_SESSION['Customer_id']}";
}
?>
</li>
      <li><button  style="width:auto;"><span class="glyphicon glyphicon-log-out"><a href = "https://cs.newpaltz.edu/e/b-f19-03/logout.php"></span> LOGOUT</a></button></li>
 

    </ul>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin"></h3>
  <div id="homepage-slideshow" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="router.jpg" alt="" style="width : 1900px; height : 700px;     " />
                    </div>
                    <div class="item">
                        <img src="storage.jpeg" alt="" style="width : 1900px; height : 700px;     " />
                    </div>
                    <div class="item">
                        <img src="visualize.png" alt="" style="width : 1900px; height : 705px;     " />
                    </div>
                 
                </div>
                
            </div>
  <h3>Everthing You Want </h3>
 <h3><?php 
 
?>
</h3>

</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Student Discounts</h3>
  <p> Special Prices For studnets </p>
<p> Quality And Customer Stastisfaction is our major priority</p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">How to order?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p style="color:red">Select the product</p>
      <img src="catalogue.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p style="color:red">Add to cart</p>
      <img src="cart.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p style="color:red">Pay with Card And Get it your Door step</p>
      <img src="payment.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>
<!-- Modal -->
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="validate.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id02" class="modal">
  
  <form class="modal-content animate" action="register.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="username"><b>Username</b></label>
      <input style="width:90%;" type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input style="width:90%;" type="password" placeholder="Enter Password" name="password" required>
        
        <label for="email"><b>E-Mail</b></label>
      <input type="text" placeholder="E-Mail" name="email" required> 
        <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Address" name="address" required>

      <button type="submit">Sign Up</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<!-- Modal Ends -->>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Contact Us <a href="https://www.w3schools.com">ITService@newpaltz.edu</a></p> 
</footer>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
/*
<?php
if(isset($_SESSION['username']))
{
echo "<h2>Hello:{$_SESSION['username']}</h2>";
}
?>
*/
</body>
</html>
