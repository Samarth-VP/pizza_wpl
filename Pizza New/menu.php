<?php 
session_start();
include "db.php";

 if(!isset($_SESSION["loggedin"]))
 header("location:login_new.php");

?>


<?php 

	function get_pizza() {
		$rs = [];
			$conn = new mysqli('localhost', 'root', '', 'samarth');
			mysqli_select_db( $conn, 'samarth');
			$rs = $conn->query("SELECT * FROM pizza");
			return $rs;
	}

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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/cart.css" />
    <!-- <script src="js/store.js" ></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Pizzeria</title>
    <style>
      .menu {
  
  flex-wrap: none;
  justify-content: space-between;
}
    </style>
      

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
             
            <!-- <a class="nav-link text-white">Disabled</a> -->
            
          </div>
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
    </nav>

    <div class="wrapper">
    <select name='sort'>
    <?php $query = 'SELECT * FROM pizza ORDER BY ASC '.$_REQUEST['sort'];?>
    <option value='ASC'> Price Low to High </option>
    <option value='DESC'> Price High to Low </option>
</select>
          
        
      <div class="title">
        <h4><span>fresh food for good health</span>our menu</h4>
      </div>

      <div class="menu">
        <?php foreach (get_pizza() as $menu) : ?>
        <div class="single-menu">
          <img src="<?php echo $menu['pizza_img'] ?>" alt="" />
          <div class="menu-content">
            <h4><?php echo $menu['pizza_name'] ?> <span><?php echo $menu['pizza_price'] ?></span></h4>
            <p>
            <?php echo $menu['pizza_desc'] ?>
            </p>
            <a class="btn-cart" data-name="<?php echo $menu['pizza_name'];?>" href="cart.php">
            <input class="btn btn-primary" type="submit" value="Add to Cart!">
            </input></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- <nav aria-label="...">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
            >Previous</a
          >
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav> -->
    <!-- <div class="b-example-divider"></div> -->

    <div class="container-fluid" id="footer-container">
      <!-- <div class="container"> -->
      <footer class="py-3 bg-dark">
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
      <!-- </div> -->
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
			$(".btn-cart").on("click",function(){
				var el = $(this);
				input = el.attr('data-name');
        console.log(input);
				$.ajax({

				url:"cart.php",
				method:"POST",
				data:{input:input},
			});
		});
	});
	</script>
    
  </body>
</html>
