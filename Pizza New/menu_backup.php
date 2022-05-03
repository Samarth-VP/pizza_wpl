<?php 
session_start();
include "db.php";

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
    <script src="js/store.js" ></script>
    <title>Pizzeria</title>
  </head>
  <?php
    
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    ?>
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
            <div class=" d-grid gap-2 d-md-flex" >

<?php if(isset($_SESSION['loggedin'])) {?>
   <a class="btn btn-success"  href="logout.php" role="button">Logout</a>
  <?php }?>
   
  
  <?php if(!isset($_SESSION["loggedin"])) {?>
    <a class="btn btn-warning"  href="login_new.php" role="button">Login</a>
    <a class="btn btn-danger"  href="signup_new.php" role="button">Sign-Up</a>
    <?php }?>
</div>
          </div>
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
        <div class="single-menu">
            <form action="manage_cart.php" method="post">
            <img src="img/Pizza/veggie-deluxe-pizza-5.jpg" alt="" />
            <div class="menu-content">
              <h4>Veggie Delight <span>₹500</span></h4>
              <p>
                Aperiam tempore sit,perferendis numquam repudiandae porro
                voluptate dicta saepe facilis.
              </p>
              <button class="btn btn-primary" type="submit" name="Add_To_Cart">Add to Cart!</button>
              <input type="hidden" value="Veggie-Delight" name="Item_Name">
              <input type="hidden" value="500" name="Price">
            </div>
          </form>
        </div>
        <!-- <div class="box">
                <form action="manage_cart.php" method="post">
                    <div class="image">
                        <img src="image/cashew.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>cashew</h3>
                        <div class="price">&#8377 150</div>
                        <button type="submit" class="btn btn-primary" name="Add_To_Cart">add to cart</button>
                        <input type="hidden" value="cashew" name="Item_Name">
                        <input type="hidden" value="150" name="Price">
                    </div>
                </form>
            </div> -->
        <div class="single-menu">
          <img src="img/Pizza/pizza2.jpg" alt="" />
          <div class="menu-content">
            <h4>Veggie Tropicana <span>₹550</span></h4>
            <p>
              Aperiam tempore sit,perferendis numquam repudiandae porro
              voluptate dicta saepe facilis.
            </p>
            <button class="btn btn-primary" type="submit" name="Add_To_Cart">Add to Cart!</button>
            <input type="hidden" value="Veggie-Tropicana" name="Item_Name">
            <input type="hidden" value="550" name="Price">
          </div>
        </div>
        <div class="single-menu">
          <img src="img/Pizza/veggie-deluxe-pizza-5.jpg"  alt="" />
          <div class="menu-content">
            <h4>Veggie Feast <span>₹480</span></h4>
            <p>
              Aperiam tempore sit,perferendis numquam repudiandae porro
              voluptate dicta saepe facilis.
            </p>
            <button class="btn btn-primary" type="submit">Add to Cart!</button>
          </div>
        </div>
        <div class="single-menu">
          <img src="img/Pizza/momo.jpg" alt="" />
          <div class="menu-content">
            <h4>Momo Pizza <span>₹450</span></h4>
            <p>
              Aperiam tempore sit,perferendis numquam repudiandae porro
              voluptate dicta saepe facilis.
            </p>
            <button class="btn btn-primary" type="submit">Add to Cart!</button>
          </div>
        </div>
        <div class="single-menu">
          <img src="img/Pizza/salad.jpg" alt="" />
          <div class="menu-content">
            <h4>chicken fried salad <span>₹250</span></h4>
            <p>
              Aperiam tempore sit,perferendis numquam repudiandae porro
              voluptate dicta saepe facilis.
            </p>
            <button class="btn btn-primary" type="submit">Add to Cart!</button>
          </div>
        </div>
        <div class="single-menu">
          <img src="img/Pizza/corn.jpg" alt="" />
          <div class="menu-content">
            <h4> Corn and Onion <span>₹300</span></h4>
            <p>
              Aperiam tempore sit,perferendis numquam repudiandae porro
              voluptate dicta saepe facilis.
            </p>
            <button class="btn btn-primary" type="submit">Add to Cart!</button>
          </div>
        </div>
      </div>
    </div>
    <nav aria-label="...">
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
    </nav>
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
    
  </body>
</html>
