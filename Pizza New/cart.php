<?php


    $conn = new mysqli('localhost', 'root', '', 'samarth');
			mysqli_select_db( $conn, 'samarth');

      $input = null;

    if(isset($_POST['input'])){

        $input = $_POST['input'];

        $query = "INSERT INTO cart(pizza) values ('$input')";

        mysqli_query($conn, $query);

    }

    $sql = "UPDATE cart SET price = (SELECT pizza_price from pizza where pizza_name = '$input') where pizza = '$input'";
    $result = mysqli_query($conn, $sql);


?>





<?php 
session_start();
if(!isset($_SESSION["loggedin"]))
 header("location:login_new.php");
?>       
      




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/cart.css" />
    <!-- <script src="js/store.js" ></script>s -->
    <style>
      .cart {
  width: 90%;
  height: auto;
  padding: 20px;
  background-color: brown;
  border-radius: 10px;
}
.single-menu h4 span {
  /* float: right; */
  color: #ff7720;
  font-style: italic;
}

.screen {
  position: absolute;
  width: 938px;
  height: 500px;
  left: 171px;
  top: 105px;
  align: center;
  border: 2px;

  background: #f79292;
  border-radius: 71px;
}

.thank {
  position: relative;
width: 315px;
height: 77px;
left: 50px;
top: 40px;

font-weight: 400;
font-size: 44px;
line-height: 67px;

color: #FFFFFF;
}

.total {
position: absolute;
width: 438px;
height: 77px;
left: 0px;
top:  385px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 30px;
line-height: 77px;

color: #ffffff;
}

.pizza {
  float: left;
  left: 0px;
top:  385px;
  font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 30px;
line-height: 60px;

color: #ffffff;
}

.count {
  float: left;
  left: 50px;
top:  385px;
  font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 30px;
line-height: 77px;

color: #ffffff;
}
    </style>

    <title>Pizzeria</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><h2>Pizzeria🍕</h2></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link text-white" aria-current="page" href="menu.php"
              >Menu</a
            >
            <a class="nav-link text-white" href="cart.php">Cart</a>
            <!-- <a class="nav-link text-white" href="#">Pricing</a> -->
            <!-- <a class="nav-link text-white">Disabled</a> -->
            
          </div>
          <div class="navbar-collapse collapse justify-content-end">
                 <ul class="navbar-nav ml-auto">
                   <li class="nav-item">

                <?php if(isset($_SESSION['loggedin'])) {?>    
               <a class="nav-link" style="color:white;" href="#"><img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php  echo "".$_SESSION["Email"]?></a></li>
                <?php }?>

             <?php if(!isset($_SESSION["loggedin"])) {?>
             <a class="btn btn-warning"  href="login_new.php" role="button">Login</a>
              <a class="btn btn-danger"  href="signup_new.php" role="button">Sign-Up</a>
             <?php }?>

             <?php if(isset($_SESSION['loggedin'])) {?>
            <a class="btn btn-success"  href="logout.php" role="button">Logout</a>
             <?php }?>  
             </ul>
         </div>
        </div>
      </div>
    </nav>

    <br>
    <section-1>
      <div class="cart">
        <div class="cart-header">
          <h3 class="cart-heading">Shopping Cart</h3>
          
        </div>

        <?php
     $conn = new mysqli('localhost', 'root', '', 'samarth');
     mysqli_select_db( $conn, 'samarth');

    $nfd = "Cart is empty";
    $input = "";
    $name = "";

    $order = "SELECT pizza, COUNT(pizza) from cart 
    GROUP BY 
    pizza
    HAVING 
    COUNT(pizza) > 0;";

    $result = mysqli_query($conn, $order);

    if(mysqli_num_rows($result) > 0){?>

        <?php 
      while($rows = mysqli_fetch_assoc($result)){

          $piz_n = $rows['pizza'];

          $count = $rows['COUNT(pizza)'];

          $sql = "SELECT * FROM pizza WHERE pizza_name = '$piz_n'";

          $res = mysqli_query($conn,$sql);  
          
          while($row = mysqli_fetch_assoc($res)){
              $name = $row['pizza_name'];
              $image = $row['pizza_img'];
              $price = $row['pizza_price'];

              $ppp = $price*$count
          
          ?>

        <div class="Cart-Item">
        <div class="menu">
        <div class="single-menu" style="padding-left: 30px;">
          <img src="<?php echo $image?>" alt="" />
          <div class="menu-content">
            <h4 style="color: white;"><?php echo $name?> <span style="margin: left 45px;padding-left: 30px;">₹<?php echo $price ?></span></h4>
            <a class="btn-remove" data-src="<?php echo $name;?>" href="cart.php">
            <input class="btn btn-primary" type="submit" value="-">
            </input></a>
            <input type="text" value="<?php echo $count;?> " id="count" style="width: 20px;">
            <a class="btn-add" data-src="<?php echo $name;?>" href="cart.php">
            <input class="btn btn-primary" type="submit" value="+">
            </input></a><h6 style="color: white;"><?php echo $ppp;?></h6>
          </div>
        </div>
      </div>
    </div>
    
    
    <?php

}}

}else{?>
  
  
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;Cart is empty!</h4>
  
  <?php
}   
?> 

<?php

  function get_address() {
    include_once('db.php');
    $id= $_SESSION['id'];
		$add = [];
			$add = ("SELECT address FROM userdetails where user_id = '$id'");
      $res = mysqli_query($conn,$add);
			return $res;
	}
?>






  <div class="address" style="padding-left: 30px; color:white;">SELECT YOUR ADDRESS:
<select>
<?php foreach (get_address() as $addrs): ?>
    <option value="volvo"><?php echo $addrs['address'];?></option>
    
<?php endforeach; ?>
  </select>
  </div>







          <div class="”counter”"></div>
          <div class="”prices”" style="color: white;padding-left: 30px; padding-top: 10px;">The Total is: ₹
            <?php
              $pr = "SELECT SUM(price) from cart";
              $re = mysqli_query($conn,$pr);
              while($ro = mysqli_fetch_assoc($re)){
                $total = $ro["SUM(price)"];
                echo $total;
              }
              ?>&nbsp;&nbsp;&nbsp;
          <button class="btn btn-primary" value="submit" onclick="showthank()">Checkout</button>
          <?php //echo'<script>alert("Done!")</script>';?>
          </div>
        </div>
        
      </div>
    
      
      <div class = "screen" style="display: none" id="after-co" onclick="hidethank()">
      <div class = "thank">THANK YOU!
      <?php
     $conn = new mysqli('localhost', 'root', '', 'samarth');
     mysqli_select_db( $conn, 'samarth');

    $nfd = "Cart is empty";
    $input = "";
    $name = "";

    $order = "SELECT pizza, COUNT(pizza) from cart 
    GROUP BY 
    pizza
    HAVING 
    COUNT(pizza) > 0;";

    $result = mysqli_query($conn, $order);

    if(mysqli_num_rows($result) > 0){?>

        <?php 
      while($rows = mysqli_fetch_assoc($result)){

          $piz_n = $rows['pizza'];

          $count = $rows['COUNT(pizza)'];?>
        <div class = "pizza">
          <?php echo $piz_n; echo " x ". $count; }}?>
        </div>
        <div class = "count"></div>
        <div class = "total">Total price: <?php
              $pr = "SELECT SUM(price) from cart";
              $re = mysqli_query($conn,$pr);
              while($ro = mysqli_fetch_assoc($re)){
                $total = $ro["SUM(price)"];
                echo $total;
              }
              ?>
              </div></div>
      </div>
    </div>
      

    </section-1>

    <div class="container bg">
      <div class="container">
        <footer class="py-3 my-4 bg-dark">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Features</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Pricing</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">FAQs</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">About</a>
            </li>
          </ul>
          <p class="text-center text-white text-">&copy;Pizzeria🍕</p>
        </footer>
      </div>
    </div>



    

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script>
		var input = null;
		$(document).ready(function() {
			$(".btn-remove").on("click",function(){
				var el = $(this);
				input = el.attr('data-src');
        console.log(input);
				$.ajax({

				url:"cart_remove.php",
				method:"POST",
				data:{input:input},
        success:function(data){
							$("#count").html(data);
						}
			});
		});
	});
	</script>

<script>
		var input = null;
		$(document).ready(function() {
			$(".btn-add").on("click",function(){
				var el = $(this);
				input = el.attr('data-src');
        console.log(input);
				$.ajax({

				url:"cart_add.php",
				method:"POST",
				data:{input:input},
        success:function(data){
							$("#count").html(data);
						}
			});
		});
	});
	</script>

<script>
  function showthank() {
			{
				document.getElementById('after-co').style.display = 'block';
			};
		}

    function hidethank() {
			{
				document.getElementById('after-co').style.display = 'none';
			};
		}
</script>



   
  </body>
</html>
