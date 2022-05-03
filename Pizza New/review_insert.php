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
    <div class="b-example-divider"></div>

  <?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "samarth";


$conn = mysqli_connect($servername, $username, $password,$database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}



$fullname =  $_POST['fullname']; 
$email = $_POST['email'];  
$review = $_POST['review']; 

// $sql = "INSERT INTO review
// VALUES ('1', 'Samarth Parasnis', 'sp@gmail.com', 'Very good taste!')";

$sql = "INSERT INTO review (fullname,email,review)
VALUES ( '$fullname', '$email', '$review')";


if(mysqli_query($conn, $sql))
{
   echo '<div class="alert alert-success" role="alert">
    Data entered successfully!
 </div> '; 
} 
else {
    echo '<div class="alert alert-warning" role="alert">
    Error!
 </div> '. mysqli_error($conn); ; 
}
  
?>

<div class="container mb-3 mt-3">
      <form action="review_insert.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" name="fullname"
            >Fullname</label
          >
          <input
          type="text"
           name="fullname"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" name="email">Email</label>
          <input
            type="text"
            name="email"
            class="form-control"
            id="exampleInputPassword1"
          />
        </div>
        <div class="form-group">
  <label for="exampleFormControlTextarea1">Your review!</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" type="text" rows="5" name="review"></textarea>
</div>
<div class="d-flex justify-content-center">
  <button type ="submit" class="btn btn-primary mt-3">Submit</button>
</div>
      
      </form>
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
    <script src="js/sign.js"></script>
  </body>
</html>