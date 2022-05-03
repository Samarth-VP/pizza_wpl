<?php session_start();?>

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
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <title>Pizzeria</title>
  </head>
  <style>
    .b-example-divider {
  height: 3rem;
  background-color: rgba(0, 0, 0, 0.1);
  border: solid rgba(0, 0, 0, 0.15);
  border-width: 1px 0;
  box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
    inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
}

.bi {
  vertical-align: -0.125em;
  fill: currentColor;
}

body {
  /* padding-top: 3rem; */

  color: #5a5a5a;
}

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}

.container-bg {
  background-color: rgb(31, 30, 30);
}

#footer-container {
  background-color: rgb(24, 23, 23);
}

  </style>
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
          <div class="navbar-nav "> 
            
            <a class="nav-link text-white" aria-current="page" href="menu.php"
              >Menu</a
            >
            

            <a class="nav-link text-white" href="cart.php">Cart</a>
             
            

            <?php if(isset($_SESSION['loggedin'])) {?> 
            <a class="nav-link text-white" href="user.php">Address</a>
            <?php }?>
           
            <div class=" d-grid gap-2 d-md-flex" >

                     
           </div>
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



    <!-- <div class="b-example-divider bg-white"></div> -->

    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center">
        <div class="col-10 col-sm-8 col-lg-6">
          <img
            src="img/pizza1.gif"
            class="d-block mx-lg-auto img-fluid"
            alt="Bootstrap Themes"
            width="750"
            height="500"
            loading="lazy"
          />
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Want Tasty Pizza?</h1>
          <h4 class>You are in the right place..!</h4>
          <h6 class="lead">
            Get world's best Pizza delivered at your Doorstep!
          </h6>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a
              href="menu.php"
              type="button"
              class="btn btn-primary btn-lg float-right px-4 me-md-2"
            >
              Menu
            </a>
            
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="b-example-divider"></div> -->
    <div class="container-fluid bg-dark text-white">
      <h2 class="text-center">What Our Customers Say?</h2>
      <div class="card-group">
        <div class="card">
          <img
            src="img/Customer/customer-1.jpg"
            class="card-img-top w-28 p-5 justify-content-center"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title text-black">Authentic!</h5>
            <p class="card-text text-black">
              One of the most authentic Pizza ever in my life.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img
            src="img/Customer/customer-2.jpg"
            class="card-img-top w-28 p-5 justify-content-center"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title text-black">Delicious!</h5>
            <p class="card-text text-black">
              Just one word "Delicious", definitely worth a try with large menus
              available.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img
            src="img/Customer/customer-1.jpg"
            class="card-img-top w-28 p-5 justify-content-center"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title text-black">You have to try once!</h5>
            <p class="card-text text-black">
              You have to try once .. this pizza has one of the most authentic
              taste you will get.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="border border-dark p-4 mb-4">
        <div class="text-center">
        <a class="btn btn-warning" href="review.php" role="button">Write a Review!</a>
        </div>
      </div>
    </div>

    <!-- <div class="b-example-divider"></div> -->

    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseOne"
            aria-expanded="true"
            aria-controls="collapseOne"
          >
            Do I need to register to order?
          </button>
        </h2>
        <div
          id="collapseOne"
          class="accordion-collapse collapse show"
          aria-labelledby="headingOne"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <strong
              >Yes, the user needs to be registered to order pizza and place
              order .</strong
            >
            The user has to register itself before ordering the pizza.
             <!-- <code>.accordion-body</code>,
            though the transition does limit overflow. -->
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo"
          >
            What types of Pizza you offer?
          </button>
        </h2>
        <div
          id="collapseTwo"
          class="accordion-collapse collapse"
          aria-labelledby="headingTwo"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <strong>We offer all types of pizza.</strong> 
            But generally more of our customer base is actually vegetarian.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseThree"
            aria-expanded="false"
            aria-controls="collapseThree"
          >
            How long you have been in the business?
          </button>
        </h2>
        <div
          id="collapseThree"
          class="accordion-collapse collapse"
          aria-labelledby="headingThree"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <strong>We started 6 months ago!</strong> We are very new into business and are working towards providing more dynamic menu to 
          </div>
        </div>
      </div>
    </div>

    <div class="b-example-divider"></div>

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
